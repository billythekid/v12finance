<?php
/**
 * Objects of this class represent an order
 */

namespace billythekid\v12finance\models;

use JsonSerializable;

/**
 * Class Order
 *
 * @package billythekid\v12finance\models
 */
class Order implements JsonSerializable
{
  /**
   * Cash price
   *
   * @var float
   */
  private $cashPrice = 0.0;
  /**
   * Deposit amount
   *
   * @var float
   */
  private $deposit = 0.0;
  /**
   * Duplicate sales reference method
   *
   * @var string
   */
  private $duplicateSalesReferenceMethod = "ShowError";
  /**
   * Product GUID
   *
   * @var string
   */
  private $productGuid = '';
  /**
   * Product ID
   *
   * @var string
   */
  private $productId = '';
  /**
   * Sales reference
   *
   * @var string
   */
  private $salesReference = '';
  /**
   * V Link
   *
   * @var bool
   */
  private $vLink = false;
  /**
   * IP address
   *
   * @var string
   */
  private $ipAddress = '';
  /**
   * Any line items
   *
   * @var $lines OrderLine[]
   */
  private $lines = [];

  /**
   * Gets the cash price
   *
   * @return float
   */
  public function getCashPrice(): float
  {
    return $this->cashPrice;
  }


  /**
   * Gets the deposit
   *
   * @return float
   */
  public function getDeposit(): float
  {
    return $this->deposit;
  }


  /**
   * Gets the duplicate sales reference method
   *
   * @return string
   */
  public function getDuplicateSalesReferenceMethod(): string
  {
    return $this->duplicateSalesReferenceMethod;
  }


  /**
   * Gets the product GUID
   *
   * @return string
   */
  public function getProductGuid(): string
  {
    return $this->productGuid;
  }


  /**
   * Gets the product ID
   *
   * @return string
   */
  public function getProductId(): string
  {
    return $this->productId;
  }


  /**
   * Gets the sales reference
   *
   * @return string
   */
  public function getSalesReference(): string
  {
    return $this->salesReference;
  }


  /**
   * Determines if this has a V link
   *
   * @return bool
   */
  public function isVLink(): bool
  {
    return $this->vLink;
  }


  /**
   * Gets the IP address
   *
   * @return string
   */
  public function getIpAddress(): string
  {
    return $this->ipAddress;
  }


  /**
   * Gets the line items
   *
   * @return OrderLine[]
   */
  public function getLines(): array
  {
    return $this->lines;
  }

  /**
   * Sets the cash price
   *
   * @param float $cashPrice
   * @return Order
   */
  public function setCashPrice(float $cashPrice): Order
  {
    $this->cashPrice = $cashPrice;

    return $this;
  }

  /**
   * Sets the deposit
   *
   * @param float $deposit
   * @return Order
   */
  public function setDeposit(float $deposit): Order
  {
    $this->deposit = $deposit;

    return $this;
  }

  /**
   * Sets the duplicate sales reference method
   *
   * @param string $duplicateSalesReferenceMethod
   * @return Order
   */
  public function setDuplicateSalesReferenceMethod(string $duplicateSalesReferenceMethod): Order
  {
    $this->duplicateSalesReferenceMethod = $duplicateSalesReferenceMethod;

    return $this;
  }

  /**
   * Sets the product GUID
   *
   * @param string $productGuid
   * @return Order
   */
  public function setProductGuid(string $productGuid): Order
  {
    $this->productGuid = $productGuid;

    return $this;
  }

  /**
   * Sets the product ID
   *
   * @param string $productId
   * @return Order
   */
  public function setProductId(string $productId): Order
  {
    $this->productId = $productId;

    return $this;
  }

  /**
   * Sets the sales reference
   *
   * @param string $salesReference
   * @return Order
   */
  public function setSalesReference(string $salesReference): Order
  {
    $this->salesReference = $salesReference;

    return $this;
  }

  /**
   * Sets the V link
   *
   * @param bool $vLink
   * @return Order
   */
  public function setVLink(bool $vLink): Order
  {
    $this->vLink = $vLink;

    return $this;
  }

  /**
   * Sets the IP address
   *
   * @param string $ipAddress
   * @return Order
   */
  public function setIpAddress(string $ipAddress): Order
  {
    $this->ipAddress = $ipAddress;

    return $this;
  }

  /**
   * Sets the order lines
   *
   * @param OrderLine[] $lines
   * @return Order
   */
  public function setLines(array $lines): Order
  {
    $this->lines = $lines;

    return $this;
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
        'CashPrice'                     => (string)$this->getCashPrice(),
        'Deposit'                       => (string)$this->getDeposit(),
        'DuplicateSalesReferenceMethod' => $this->getDuplicateSalesReferenceMethod(),
        'ProductGuid'                   => $this->getProductGuid(),
        'ProductId'                     => $this->getProductId(),
        'SalesReference'                => $this->getSalesReference(),
        'vLink'                         => $this->isVLink() ? "true" : "false",
        'IpAddress'                     => $this->getIpAddress(),
        'Lines'                         => $this->getLines(),
    ];
  }
}