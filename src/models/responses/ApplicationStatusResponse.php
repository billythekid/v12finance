<?php
/**
 * Objects of this class represent a application status response from the V12 server.
 */

namespace billythekid\v12finance\models\responses;


use billythekid\v12finance\models\Customer;
use billythekid\v12finance\models\exceptions\InvalidTelephoneException;
use billythekid\v12finance\models\OrderLine;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ApplicationStatusResponse
 *
 * @package billythekid\v12finance\models\responses
 */
class ApplicationStatusResponse implements JsonSerializable
{

  /**
   * Application form URL
   *
   * @var null
   */
  private $applicationFormUrl = null;
  /**
   * Application GUID
   *
   * @var string
   */
  private $applicationGuid = '';
  /**
   * Application ID
   *
   * @var string
   */
  private $applicationId = null;
  /**
   * Authorisation code
   *
   * @var null
   */
  private $authorisationCode = null;

  /**
   * Sales reference
   *
   * @var null
   */
  private $salesReference = null;
  /**
   * Status
   *
   * @var mixed
   */
  private $status = null;

  /**
   * Customer details
   *
   * @var Customer|null
   */
  private $customer = null;
  /**
   * Errors
   *
   * @var array
   */
  private $errors = [];
  /**
   * Order line items
   *
   * @var OrderLine[]
   */
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
    $this->applicationId      = $object->ApplicationId ?? null;
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
   * Check if there were errors
   *
   * @return bool
   */
  public function hasErrors()
  {
    if (is_array($this->errors))
    {
      return count($this->errors) > 0;
    }

    return false;
  }

  /**
   * Gets the errors
   *
   * @return array
   */
  public function getErrors()
  {
    return $this->errors;
  }

  /**
   * Gets the application form URL
   *
   * @return string|null
   */
  public function getApplicationFormUrl()
  {
    return $this->applicationFormUrl;
  }

  /**
   * Gets the application GUID
   *
   * @return string
   */
  public function getApplicationGuid(): string
  {
    return $this->applicationGuid;
  }

  /**
   * Gets the application ID
   *
   * @return string
   */
  public function getApplicationId(): string
  {
    return $this->applicationId;
  }

  /**
   * Gets the authorisation code
   *
   * @return string|null
   */
  public function getAuthorisationCode()
  {
    return $this->authorisationCode;
  }

  /**
   * Gets the sales reference
   *
   * @return string|null
   */
  public function getSalesReference()
  {
    return $this->salesReference;
  }

  /**
   * Gets the status
   *
   * @return mixed
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Gets the customer
   *
   * @return Customer|null
   */
  public function getCustomer()
  {
    return $this->customer;
  }

  /**
   * Gets the line items
   *
   * @return array|null
   */
  public function getOrderLines()
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