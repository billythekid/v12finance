<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 13:29
 */

namespace billythekid\v12finance\models\responses;


use billythekid\v12finance\models\Customer;
use billythekid\v12finance\models\exceptions\InvalidTelephoneException;
use billythekid\v12finance\models\OrderLine;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class ApplicationStatusResponse implements JsonSerializable
{

  private $applicationFormUrl = null;
  private $applicationGuid = '';
  private $applicationId = -1;
  private $authorisationCode = null;

  private $salesReference = null;
  private $status = -1;

  private $customer = null;
  private $errors = [];
  private $orderLines = null;


  /**
   * ApplicationStatusResponse constructor.
   *
   * @param ResponseInterface $responseObject
   * @throws \billythekid\v12finance\models\exceptions\InvalidTelephoneException
   */
  public function __construct(ResponseInterface $responseObject)
  {
    $object = json_decode($responseObject->getBody());

    $this->applicationFormUrl = $object->ApplicationFormUrl ?? null;
    $this->applicationGuid    = $object->ApplicationGuid ?? '';
    $this->applicationId      = $object->ApplicationId ?? -1;
    $this->authorisationCode  = $object->AuthorisationCode ?? null;
    $this->salesReference     = $object->SalesReference ?? null;
    $this->status             = $object->Status;

    if ($object->Customer)
    {
      $this->customer = (new Customer())
          ->setEmailAddress($object->Customer->EmailAddress ?? '')
          ->setFirstName($object->Customer->FirstName ?? '')
          ->setLastName($object->Customer->LastName);
      try
      {
        if (!empty($object->Customer->HomeTelephone))
        {
          $this->customer->setHomeTelephone([
              'code'   => $object->Customer->HomeTelephone->Code,
              'number' => $object->Customer->HomeTelephone->Number,
          ]);
        }
        if (!empty($object->Customer->MobileTelephone))
        {
          $this->customer->setMobileTelephone([
              'code'   => $object->Customer->MobileTelephone->Code,
              'number' => $object->Customer->MobileTelephone->Number,
          ]);
        }
      } catch (InvalidTelephoneException $e)
      {
      }
    }

    foreach ($object->Errors as $error)
    {
      $this->errors[] = new ResponseError($error->Code, $error->Description, $error->Reference);
    }

    foreach ($object->OrderLines as $line)
    {
      $this->orderLines[] = (new OrderLine())
          ->setItem($line->Item)
          ->setSku($line->SKU)
          ->setQty($line->Qty)
          ->setPrice($line->Price);
    }

  }

  /**
   * @return bool
   */
  public function hasErrors()
  {
    return count($this->errors) > 0;
  }

  /**
   * @return array
   */
  public function getErrors()
  {
    return $this->errors;
  }

  /**
   * @return string|null
   */
  public function getApplicationFormUrl(): ?string
  {
    return $this->applicationFormUrl;
  }

  /**
   * @return string
   */
  public function getApplicationGuid(): string
  {
    return $this->applicationGuid;
  }

  /**
   * @return int
   */
  public function getApplicationId(): int
  {
    return $this->applicationId;
  }

  /**
   * @return string|null
   */
  public function getAuthorisationCode(): ?string
  {
    return $this->authorisationCode;
  }

  /**
   * @return string|null
   */
  public function getSalesReference(): ?string
  {
    return $this->salesReference;
  }

  /**
   * @return int
   */
  public function getStatus(): int
  {
    return $this->status;
  }

  /**
   * @return Customer|null
   */
  public function getCustomer(): ?Customer
  {
    return $this->customer;
  }

  /**
   * @return array|null
   */
  public function getOrderLines(): ?array
  {
    return $this->orderLines;
  }

  /**
   * Specify data which should be serialized to JSON
   *
   * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
   * @return mixed data which can be serialized by <b>json_encode</b>,
   * which is a value of any type other than a resource.
   * @since 5.4.0
   */
  public function jsonSerialize()
  {
    return [
        'ApplicationFormUrl' => $this->getApplicationFormUrl(),
        'ApplicationGuid'    => $this->getApplicationGuid(),
        'ApplicationId'      => $this->getApplicationId(),
        'AuthorisationCode'  => $this->getAuthorisationCode(),
        'Customer'           => $this->getCustomer(),
        'Errors'             => $this->getErrors(),
        'OrderLines'         => $this->getOrderLines(),
        'SalesReference'     => $this->getSalesReference(),
        'Status'             => $this->getStatus(),
    ];
  }

}