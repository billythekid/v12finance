<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 14:59
 */

namespace billythekid\v12finance\models\responses;


use billythekid\v12finance\models\FinanceProduct;
use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

class FinanceProductListResponse implements JsonSerializable
{

  private $errors = [];
  private $financeProducts = [];

  /**
   * FinanceProductListResponse constructor.
   *
   * @param ResponseInterface $responseObject
   */
  public function __construct(ResponseInterface $responseObject)
  {
    $object = json_decode($responseObject->getBody());

    foreach ($object->Errors as $error)
    {
      $this->errors[] = new ResponseError($error->Code, $error->Description, $error->Reference);
    }


    foreach ($object->FinanceProducts as $product)
    {
      $this->financeProducts[] = (new FinanceProduct())
          ->setApr($product->APR)
          ->setCalculationFactor($product->CalculationFactor)
          ->setDeferredPeriod($product->DeferredPeriod)
          ->setDescription($product->Description)
          ->setDocumentFee($product->DocumentFee)
          ->setDocumentFeeCollectionMonth($product->DocumentFeeCollectionMonth)
          ->setDocumentFeeMaximum($product->DocumentFeeMaximum)
          ->setDocumentFeeMinimum($product->DocumentFeeMinimum)
          ->setMaxLoan($product->MaxLoan)
          ->setMinLoan($product->MinLoan)
          ->setMonthlyRate($product->MonthlyRate)
          ->setMonths($product->Months)
          ->setName($product->Name)
          ->setOptionPeriod($product->OptionPeriod)
          ->setProductGuid($product->ProductGuid)
          ->setProductId($product->ProductId)
          ->setServiceFee($product->ServiceFee)
          ->setTag($product->Tag);
    }

  }


  /**
   * @return array
   */
  public function getErrors(): array
  {
    return $this->errors;
  }

  /**
   * @return array
   */
  public function getFinanceProducts(): array
  {
    return $this->financeProducts;
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
        "Errors"          => $this->getErrors(),
        "FinanceProducts" => $this->getFinanceProducts(),
    ];
  }
}