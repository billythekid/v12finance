<?php

namespace billythekid\v12finance\models;


use JsonSerializable;

class Retailer implements JsonSerializable
{
  private $authenticationKey;
  private $retailerGuid;
  private $retailerId;

  public function __construct($authenticationKey = null, $retailerGuid = null, $retailerId = null)
  {
    $this->authenticationKey = $authenticationKey;
    $this->retailerGuid      = $retailerGuid;
    $this->retailerId        = $retailerId;
  }

  /**
   * @return string
   */
  public function getAuthenticationKey()
  {
    return $this->authenticationKey;
  }

  /**
   * @return string
   */
  public function getRetailerGuid()
  {
    return $this->retailerGuid;
  }

  /**
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