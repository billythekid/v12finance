<?php
/**
 * Objects of this class represent application update requests
 */

namespace billythekid\v12finance\models\requests;

use billythekid\v12finance\models\exceptions\InvalidUpdateException;
use billythekid\v12finance\models\Retailer;
use JsonSerializable;

/**
 * Class ApplicationUpdateRequest
 *
 * @package billythekid\v12finance\models\requests
 */
class ApplicationUpdateRequest implements JsonSerializable
{

  /**
   * The application ID
   *
   * @var string|null
   */
  private $applicationId = null;
  /**
   * The retailer
   *
   * @var Retailer
   */
  private $retailer;
  /**
   * The update to be performed
   *
   * @var string|null
   */
  private $update = null;
  /**
   * The loan amount
   *
   * @var float
   */
  private $loanAmount = 0.0;
  /**
   * The refund amount
   *
   * @var float
   */
  private $refundAmount = 0.0;
  /**
   * The sales reference
   *
   * @var string|null
   */
  private $salesReference = null;
  /**
   * The second sales reference
   *
   * @var string|null
   */
  private $secondSalesReference = null;
  /**
   * The new sales reference
   *
   * @var string|null
   */
  private $newSalesReference = null;
  /**
   * The new second sales reference
   *
   * @var string|null
   */
  private $newSecondSalesReference = null;
  /**
   * The date of birth
   *
   * @var string|null
   */
  private $dateOfBirth = null;
  /**
   * The updates that are allowed
   *
   * @var string[]
   */
  private $updatesAvailable = [
      'Cancel',
      'RequestPayment',
      'PartialRefund',
      'AmendSalesReference',
  ];


  /**
   * ApplicationUpdateRequest constructor.
   *
   * @param Retailer $retailer
   */
  public function __construct(Retailer $retailer)
  {
    $this->retailer = $retailer;
  }

  /**
   * Sets the update
   *
   * @param string $update
   * @return ApplicationUpdateRequest
   * @throws InvalidUpdateException
   */
  public function setUpdate(string $update): ApplicationUpdateRequest
  {
    if (!in_array($update, $this->updatesAvailable))
    {
      throw new InvalidUpdateException("Updates must be one of: " . implode(', ', $this->updatesAvailable));
    }

    $this->update = $update;

    return $this;
  }

  /**
   * Set the loan amount
   *
   * @param float $loanAmount
   * @return ApplicationUpdateRequest
   */
  public function setLoanAmount(float $loanAmount): ApplicationUpdateRequest
  {
    $this->loanAmount = $loanAmount;

    return $this;
  }

  /**
   * Set the refund amount
   *
   * @param float $refundAmount
   * @return ApplicationUpdateRequest
   */
  public function setRefundAmount(float $refundAmount): ApplicationUpdateRequest
  {
    $this->refundAmount = $refundAmount;

    return $this;
  }

  /**
   * Set the current sales reference
   *
   * @param string $salesReference
   * @return ApplicationUpdateRequest
   */
  public function setSalesReference(string $salesReference): ApplicationUpdateRequest
  {
    $this->salesReference = $salesReference;

    return $this;
  }

  /**
   * Set the current second sales reference
   *
   * @param string $secondSalesReference
   * @return ApplicationUpdateRequest
   */
  public function setSecondSalesReference(string $secondSalesReference): ApplicationUpdateRequest
  {
    $this->secondSalesReference = $secondSalesReference;

    return $this;
  }

  /**
   * Set the new sales reference
   *
   * @param string $newSalesReference
   * @return ApplicationUpdateRequest
   */
  public function setNewSalesReference(string $newSalesReference): ApplicationUpdateRequest
  {
    $this->newSalesReference = $newSalesReference;

    return $this;
  }

  /**
   * Set the new second sales reference
   *
   * @param string $newSecondSalesReference
   * @return ApplicationUpdateRequest
   */
  public function setNewSecondSalesReference(string $newSecondSalesReference): ApplicationUpdateRequest
  {
    $this->newSecondSalesReference = $newSecondSalesReference;

    return $this;
  }


  /**
   * Set the date of birth
   *
   * @param string $dateOfBirth
   * @return ApplicationUpdateRequest
   */
  public function setDateOfBirth(string $dateOfBirth): ApplicationUpdateRequest
  {
    $this->dateOfBirth = $dateOfBirth;

    return $this;
  }


  /**
   * Get the application ID
   *
   * @return string|null
   */
  public function getApplicationId()
  {
    return $this->applicationId;
  }

  /**
   * Get the retailer
   *
   * @return Retailer
   */
  public function getRetailer(): Retailer
  {
    return $this->retailer;
  }

  /**
   * Get the update
   *
   * @return null|string
   */
  public function getUpdate()
  {
    return $this->update;
  }

  /**
   * Get the loan amount
   *
   * @return float
   */
  public function getLoanAmount(): float
  {
    return $this->loanAmount;
  }

  /**
   * Get the refund amount
   *
   * @return float
   */
  public function getRefundAmount(): float
  {
    return $this->refundAmount;
  }

  /**
   * Get the current sales reference
   *
   * @return null|string
   */
  public function getSalesReference()
  {
    return $this->salesReference;
  }

  /**
   * Get the current second sales reference
   *
   * @return null|string
   */
  public function getSecondSalesReference()
  {
    return $this->secondSalesReference;
  }

  /**
   * Get the new sales reference
   *
   * @return null|string
   */
  public function getNewSalesReference()
  {
    return $this->newSalesReference;
  }

  /**
   * Get the new second sales reference
   *
   * @return null|string
   */
  public function getNewSecondSalesReference()
  {
    return $this->newSecondSalesReference;
  }

  /**
   * Get the date of birth
   *
   * @return null|string
   */
  public function getDateOfBirth()
  {
    return $this->dateOfBirth;
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
        'Retailer'                => $this->getRetailer(),
        'ApplicationId'           => $this->getApplicationId(),
        'Update'                  => $this->getUpdate(),
        'LoanAmount'              => $this->getLoanAmount(),
        'RefundAmount'            => $this->getRefundAmount(),
        'SalesReference'          => $this->getSalesReference(),
        'NewSalesReference'       => $this->getNewSalesReference(),
        'NewSecondSalesReference' => $this->getNewSecondSalesReference(),
    ];
  }

}