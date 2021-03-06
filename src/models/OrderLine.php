<?php
/**
 * Objects of this class represent a line item
 */

namespace billythekid\v12finance\models;


use JsonSerializable;

/**
 * Class OrderLine
 *
 * @package billythekid\v12finance\models
 */
class OrderLine implements JsonSerializable
{
  /**
   * Item
   *
   * @var string
   */
  private $item = '';
  /**
   * Price
   *
   * @var float
   */
  private $price = 0.00;
  /**
   * Quantity
   *
   * @var int
   */
  private $qty = 0;
  /**
   * SKU
   *
   * @var string
   */
  private $sku = '';

  /**
   * Sets the item
   *
   * @param string $item
   * @return OrderLine
   */
  public function setItem(string $item): OrderLine
  {
    $this->item = $item;

    return $this;
  }

  /**
   * Sets the price
   *
   * @param float $price
   * @return OrderLine
   */
  public function setPrice(float $price): OrderLine
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Sets the quantity
   *
   * @param int $qty
   * @return OrderLine
   */
  public function setQty(int $qty): OrderLine
  {
    $this->qty = $qty;

    return $this;
  }

  /**
   * Sets the SKu
   *
   * @param string $sku
   * @return OrderLine
   */
  public function setSku(string $sku): OrderLine
  {
    $this->sku = $sku;

    return $this;
  }

  /**
   * Gets the item
   *
   * @return string
   */
  public function getItem(): string
  {
    return $this->item;
  }

  /**
   * Gets the price
   *
   * @return float
   */
  public function getPrice(): float
  {
    return $this->price;
  }

  /**
   * Gets the quantity
   *
   * @return int
   */
  public function getQty(): int
  {
    return $this->qty;
  }

  /**
   * Gets the SKU
   *
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
        'Price' => (string)$this->getPrice(),
        'Qty'   => (string)$this->getQty(),
        'SKU'   => $this->getSku(),
    ];
  }
}