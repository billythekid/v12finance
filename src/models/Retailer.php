<?php
/**
 * Objects of this class represent a retailer
 */

namespace billythekid\v12finance\models;

use JsonSerializable;

/**
 * Class Retailer
 *
 * @package billythekid\v12finance\models
 */
class Retailer implements JsonSerializable
{
  /**
   * The retailer's authentication key
   *
   * @var null
   */
  private $authenticationKey;
  /**
   * The retailer's GUID
   *
   * @var null
   */
  private $retailerGuid;
  /**
   * The retailer's ID
   *
   * @var null
   */
  private $retailerId;

  /**
   * Retailer constructor.
   *
   * @param null $authenticationKey
   * @param null $retailerGuid
   * @param null $retailerId
   */
  public function __construct($authenticationKey = null, $retailerGuid = null, $retailerId = null)
  {
    $this->authenticationKey = $authenticationKey;
    $this->retailerGuid      = $retailerGuid;
    $this->retailerId        = $retailerId;
  }

  /**
   * Gets the authentication key
   *
   * @return string
   */
  public function getAuthenticationKey()
  {
    return $this->authenticationKey;
  }

  /**
   * Gets the GUID
   *
   * @return string
   */
  public function getRetailerGuid()
  {
    return $this->retailerGuid;
  }

  /**
   * Gets the ID
   *
   * @return string
   */
  public function getRetailerId()
  {
    return $this->retailerId;
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
        'AuthenticationKey' => $this->getAuthenticationKey(),
        'RetailerGuid'      => $this->getRetailerGuid(),
        'RetailerId'        => $this->getRetailerId(),
    ];
  }
}