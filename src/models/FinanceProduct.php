<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 15:05
 */

namespace billythekid\v12finance\models;


use JsonSerializable;

/**
 * Class FinanceProduct
 *
 * @package billythekid\v12finance\models
 */
class FinanceProduct implements JsonSerializable
{

  /**
   * @var float
   */
  private $apr = 0.0;
  /**
   * @var float
   */
  private $calculationFactor = 0.0;
  /**
   * @var int
   */
  private $deferredPeriod = 0;
  /**
   * @var string
   */
  private $description = '';
  /**
   * @var float
   */
  private $documentFee = 0.0;
  /**
   * @var int
   */
  private $documentFeeCollectionMonth = 0;
  /**
   * @var int
   */
  private $documentFeeMaximum = 0;
  /**
   * @var int
   */
  private $documentFeeMinimum = 0;
  /**
   * @var float
   */
  private $maxLoan = 0.0;
  /**
   * @var float
   */
  private $minLoan = 0.0;
  /**
   * @var float
   */
  private $monthlyRate = 0.0;
  /**
   * @var int
   */
  private $months = 12;
  /**
   * @var string
   */
  private $name = '';
  /**
   * @var int
   */
  private $optionPeriod = 0;
  /**
   * @var string
   */
  private $productGuid = '';
  /**
   * @var int
   */
  private $productId = 0;
  /**
   * @var int
   */
  private $serviceFee = 0;
  /**
   * @var string
   */
  private $tag = '';

  /**
   * @param float $apr
   * @return FinanceProduct
   */
  public function setApr(float $apr): FinanceProduct
  {
    $this->apr = $apr;

    return $this;
  }

  /**
   * @param float $calculationFactor
   * @return FinanceProduct
   */
  public function setCalculationFactor(float $calculationFactor): FinanceProduct
  {
    $this->calculationFactor = $calculationFactor;

    return $this;
  }

  /**
   * @param int $deferredPeriod
   * @return FinanceProduct
   */
  public function setDeferredPeriod(int $deferredPeriod): FinanceProduct
  {
    $this->deferredPeriod = $deferredPeriod;

    return $this;
  }

  /**
   * @param string $description
   * @return FinanceProduct
   */
  public function setDescription(string $description): FinanceProduct
  {
    $this->description = $description;

    return $this;
  }

  /**
   * @param float $documentFee
   * @return FinanceProduct
   */
  public function setDocumentFee(float $documentFee): FinanceProduct
  {
    $this->documentFee = $documentFee;

    return $this;
  }

  /**
   * @param int $documentFeeCollectionMonth
   * @return FinanceProduct
   */
  public function setDocumentFeeCollectionMonth(int $documentFeeCollectionMonth): FinanceProduct
  {
    $this->documentFeeCollectionMonth = $documentFeeCollectionMonth;

    return $this;
  }

  /**
   * @param int $documentFeeMaximum
   * @return FinanceProduct
   */
  public function setDocumentFeeMaximum(int $documentFeeMaximum): FinanceProduct
  {
    $this->documentFeeMaximum = $documentFeeMaximum;

    return $this;
  }

  /**
   * @param int $documentFeeMinimum
   * @return FinanceProduct
   */
  public function setDocumentFeeMinimum(int $documentFeeMinimum): FinanceProduct
  {
    $this->documentFeeMinimum = $documentFeeMinimum;

    return $this;
  }

  /**
   * @param float $maxLoan
   * @return FinanceProduct
   */
  public function setMaxLoan(float $maxLoan): FinanceProduct
  {
    $this->maxLoan = $maxLoan;

    return $this;
  }

  /**
   * @param float $minLoan
   * @return FinanceProduct
   */
  public function setMinLoan(float $minLoan): FinanceProduct
  {
    $this->minLoan = $minLoan;

    return $this;
  }

  /**
   * @param int $monthlyRate
   * @return FinanceProduct
   */
  public function setMonthlyRate(int $monthlyRate): FinanceProduct
  {
    $this->monthlyRate = $monthlyRate;

    return $this;
  }

  /**
   * @param int $months
   * @return FinanceProduct
   */
  public function setMonths(int $months): FinanceProduct
  {
    $this->months = $months;

    return $this;
  }

  /**
   * @param string $name
   * @return FinanceProduct
   */
  public function setName(string $name): FinanceProduct
  {
    $this->name = $name;

    return $this;
  }

  /**
   * @param int $optionPeriod
   * @return FinanceProduct
   */
  public function setOptionPeriod(int $optionPeriod): FinanceProduct
  {
    $this->optionPeriod = $optionPeriod;

    return $this;
  }

  /**
   * @param string $productGuid
   * @return FinanceProduct
   */
  public function setProductGuid(string $productGuid): FinanceProduct
  {
    $this->productGuid = $productGuid;

    return $this;
  }

  /**
   * @param int $productId
   * @return FinanceProduct
   */
  public function setProductId(int $productId): FinanceProduct
  {
    $this->productId = $productId;

    return $this;
  }

  /**
   * @param int $serviceFee
   * @return FinanceProduct
   */
  public function setServiceFee(int $serviceFee): FinanceProduct
  {
    $this->serviceFee = $serviceFee;

    return $this;
  }

  /**
   * @param string $tag
   * @return FinanceProduct
   */
  public function setTag(string $tag): FinanceProduct
  {
    $this->tag = $tag;

    return $this;
  }

  /**
   * @return float
   */
  public function getApr(): float
  {
    return $this->apr;
  }

  /**
   * @return float
   */
  public function getCalculationFactor(): float
  {
    return $this->calculationFactor;
  }

  /**
   * @return int
   */
  public function getDeferredPeriod(): int
  {
    return $this->deferredPeriod;
  }

  /**
   * @return string
   */
  public function getDescription(): string
  {
    return $this->description;
  }

  /**
   * @return float
   */
  public function getDocumentFee(): float
  {
    return $this->documentFee;
  }

  /**
   * @return int
   */
  public function getDocumentFeeCollectionMonth(): int
  {
    return $this->documentFeeCollectionMonth;
  }

  /**
   * @return int
   */
  public function getDocumentFeeMaximum(): int
  {
    return $this->documentFeeMaximum;
  }

  /**
   * @return int
   */
  public function getDocumentFeeMinimum(): int
  {
    return $this->documentFeeMinimum;
  }

  /**
   * @return float
   */
  public function getMaxLoan(): float
  {
    return $this->maxLoan;
  }

  /**
   * @return float
   */
  public function getMinLoan(): float
  {
    return $this->minLoan;
  }

  /**
   * @return float
   */
  public function getMonthlyRate(): float
  {
    return $this->monthlyRate;
  }

  /**
   * @return int
   */
  public function getMonths(): int
  {
    return $this->months;
  }

  /**
   * @return string
   */
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @return int
   */
  public function getOptionPeriod(): int
  {
    return $this->optionPeriod;
  }

  /**
   * @return string
   */
  public function getProductGuid(): string
  {
    return $this->productGuid;
  }

  /**
   * @return int
   */
  public function getProductId(): int
  {
    return $this->productId;
  }

  /**
   * @return int
   */
  public function getServiceFee(): int
  {
    return $this->serviceFee;
  }

  /**
   * @return string
   */
  public function getTag(): string
  {
    return $this->tag;
  }

  /**
   * @return mixed|void
   */
  public function jsonSerialize()
  {
    return [
        "APR"                        => $this->getApr(),
        "CalculationFactor"          => $this->getCalculationFactor(),
        "DeferredPeriod"             => $this->getDeferredPeriod(),
        "Description"                => $this->getDescription(),
        "DocumentFee"                => $this->getDocumentFee(),
        "DocumentFeeCollectionMonth" => $this->getDocumentFeeCollectionMonth(),
        "DocumentFeeMaximum"         => $this->getDocumentFeeMaximum(),
        "DocumentFeeMinimum"         => $this->getDocumentFeeMinimum(),
        "MaxLoan"                    => $this->getMaxLoan(),
        "MinLoan"                    => $this->getMinLoan(),
        "MonthlyRate"                => $this->getMonthlyRate(),
        "Months"                     => $this->getMonths(),
        "Name"                       => $this->getName(),
        "OptionPeriod"               => $this->getOptionPeriod(),
        "ProductGuid"                => $this->getProductGuid(),
        "ProductId"                  => $this->getProductId(),
        "ServiceFee"                 => $this->getServiceFee(),
        "Tag"                        => $this->getTag(),
    ];
  }


}