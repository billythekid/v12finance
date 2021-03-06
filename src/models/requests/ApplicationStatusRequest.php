<?php
/**
 * Objects of this class represent an application status request.
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\Retailer;
use JsonSerializable;

/**
 * Class ApplicationStatusRequest
 *
 * @package billythekid\v12finance\models\requests
 */
class ApplicationStatusRequest implements JsonSerializable
{

  /**
   * The application ID
   *
   * @var string|null
   */
  private $applicationId;

  /**
   * Include extra details
   *
   * @var bool
   */
  private $includedExtraDetails;

  /**
   * Include financials
   *
   * @var bool
   */
  private $includeFinancials;

  /**
   * The retailer
   *
   * @var Retailer
   */
  private $retailer;

  /**
   * ApplicationStatusRequest constructor.
   *
   * @param Retailer $retailer
   * @param null     $applicationId
   * @param bool     $includedExtraDetails
   * @param bool     $includeFinancials
   */
  public function __construct(Retailer $retailer, $applicationId = null, $includedExtraDetails = false, $includeFinancials = false)
  {
    $this->retailer             = $retailer;
    $this->applicationId        = $applicationId;
    $this->includedExtraDetails = $includedExtraDetails;
    $this->includeFinancials    = $includeFinancials;
  }

  /**
   * Gets the application ID
   *
   * @return int|null
   */
  public function getApplicationId()
  {
    return $this->applicationId;
  }

  /**
   * Gets if the response should include extra details
   *
   * @return bool
   */
  public function isIncludedExtraDetails(): bool
  {
    return $this->includedExtraDetails;
  }

  /**
   * Gets if the response should include financials
   *
   * @return bool
   */
  public function isIncludeFinancials(): bool
  {
    return $this->includeFinancials;
  }

  /**
   * Gets the retailer
   *
   * @return Retailer
   */
  public function getRetailer(): Retailer
  {
    return $this->retailer;
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
        'ApplicationId'       => $this->getApplicationId(),
        'IncludeExtraDetails' => $this->isIncludedExtraDetails(),
        'InlcudeFinancials'   => $this->isIncludeFinancials(),
        'Retailer'            => $this->getRetailer(),
    ];
  }

}