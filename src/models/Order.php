<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 11:32
 */

namespace billythekid\v12finance\models;


use JsonSerializable;

class Order implements JsonSerializable
{
  private $cashPrice = 0.0;
  private $deposit = 0.0;
  private $duplicateSalesReferenceMethod = "ShowError";
  private $productGuid = '';
  private $productId = '';
  private $salesReference = '';
  private $vLink = false;
  private $ipAddress = '';
  /* @var $lines OrderLine[] */
  private $lines = [];

  /**
   * @return float
   */
  public function getCashPrice(): float
  {
    return $this->cashPrice;
  }


  /**
   * @return float
   */
  public function getDeposit(): float
  {
    return $this->deposit;
  }


  /**
   * @return string
   */
  public function getDuplicateSalesReferenceMethod(): string
  {
    return $this->duplicateSalesReferenceMethod;
  }


  /**
   * @return string
   */
  public function getProductGuid(): string
  {
    return $this->productGuid;
  }


  /**
   * @return string
   */
  public function getProductId(): string
  {
    return $this->productId;
  }


  /**
   * @return string
   */
  public function getSalesReference(): string
  {
    return $this->salesReference;
  }


  /**
   * @return bool
   */
  public function isVLink(): bool
  {
    return $this->vLink;
  }


  /**
   * @return string
   */
  public function getIpAddress(): string
  {
    return $this->ipAddress;
  }


  /**
   * @return OrderLine[]
   */
  public function getLines(): array
  {
    return $this->lines;
  }

  /**
   * @param float $cashPrice
   * @return Order
   */
  public function setCashPrice(float $cashPrice): Order
  {
    $this->cashPrice = $cashPrice;

    return $this;
  }

  /**
   * @param float $deposit
   * @return Order
   */
  public function setDeposit(float $deposit): Order
  {
    $this->deposit = $deposit;

    return $this;
  }

  /**
   * @param string $duplicateSalesReferenceMethod
   * @return Order
   */
  public function setDuplicateSalesReferenceMethod(string $duplicateSalesReferenceMethod): Order
  {
    $this->duplicateSalesReferenceMethod = $duplicateSalesReferenceMethod;

    return $this;
  }

  /**
   * @param string $productGuid
   * @return Order
   */
  public function setProductGuid(string $productGuid): Order
  {
    $this->productGuid = $productGuid;

    return $this;
  }

  /**
   * @param string $productId
   * @return Order
   */
  public function setProductId(string $productId): Order
  {
    $this->productId = $productId;

    return $this;
  }

  /**
   * @param string $salesReference
   * @return Order
   */
  public function setSalesReference(string $salesReference): Order
  {
    $this->salesReference = $salesReference;

    return $this;
  }

  /**
   * @param bool $vLink
   * @return Order
   */
  public function setVLink(bool $vLink): Order
  {
    $this->vLink = $vLink;

    return $this;
  }

  /**
   * @param string $ipAddress
   * @return Order
   */
  public function setIpAddress(string $ipAddress): Order
  {
    $this->ipAddress = $ipAddress;

    return $this;
  }

  /**
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