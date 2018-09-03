<?php
/**
 * Objects of this class represent an application status request.
 *
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
   * @var int|null
   */
  private $applicationId;
  /**
   * @var bool
   */
  private $includedExtraDetails;
  /**
   * @var bool
   */
  private $includeFinancials;
  /**
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
   * @return int|null
   */
  public function getApplicationId(): ?int
  {
    return $this->applicationId;
  }

  /**
   * @return bool
   */
  public function isIncludedExtraDetails(): bool
  {
    return $this->includedExtraDetails;
  }

  /**
   * @return bool
   */
  public function isIncludeFinancials(): bool
  {
    return $this->includeFinancials;
  }

  /**
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