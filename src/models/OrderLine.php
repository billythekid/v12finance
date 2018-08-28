<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 11:24
 */

namespace billythekid\v12finance\models;


use JsonSerializable;

class OrderLine implements JsonSerializable
{
  private $item = '';
  private $price = 0.00;
  private $qty = 0;
  private $sku = '';

  /**
   * @param string $item
   * @return OrderLine
   */
  public function setItem(string $item): OrderLine
  {
    $this->item = $item;

    return $this;
  }

  /**
   * @param float $price
   * @return OrderLine
   */
  public function setPrice(float $price): OrderLine
  {
    $this->price = $price;

    return $this;
  }

  /**
   * @param int $qty
   * @return OrderLine
   */
  public function setQty(int $qty): OrderLine
  {
    $this->qty = $qty;

    return $this;
  }

  /**
   * @param string $sku
   * @return OrderLine
   */
  public function setSku(string $sku): OrderLine
  {
    $this->sku = $sku;

    return $this;
  }

  /**
   * @return string
   */
  public function getItem(): string
  {
    return $this->item;
  }

  /**
   * @return float
   */
  public function getPrice(): float
  {
    return $this->price;
  }

  /**
   * @return int
   */
  public function getQty(): int
  {
    return $this->qty;
  }

  /**
   * @return string
   */
  public function getSku(): string
  {
    return $this->sku;
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
        'Item'  => $this->getItem(),
        'Price' => (string) $this->getPrice(),
        'Qty'   => (string) $this->getQty(),
        'SKU'   => $this->getSku(),
    ];
  }
}