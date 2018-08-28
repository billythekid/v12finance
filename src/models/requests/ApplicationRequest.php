<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 11:38
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\Customer;
use billythekid\v12finance\models\Order;
use billythekid\v12finance\models\Retailer;
use JsonSerializable;

class ApplicationRequest implements JsonSerializable
{
  private $retailer;
  private $order;
  private $customer;
  private $waitForDecision;

  public function __construct(Retailer $retailer, Order $order, Customer $customer = null, $waitForDecision = false)
  {
    $this->retailer        = $retailer;
    $this->order           = $order;
    $this->customer        = $customer;
    $this->waitForDecision = $waitForDecision;
  }

  /**
   * @return Retailer
   */
  public function getRetailer(): Retailer
  {
    return $this->retailer;
  }

  /**
   * @return Order
   */
  public function getOrder(): Order
  {
    return $this->order;
  }

  /**
   * @return Customer
   */
  public function getCustomer(): Customer
  {
    return $this->customer;
  }

  /**
   * @return bool
   */
  public function isWaitForDecision(): bool
  {
    return $this->waitForDecision;
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
        'Retailer'        => $this->getRetailer(),
        'Order'           => $this->getOrder(),
        'Customer'        => $this->getCustomer(),
        'WaitForDecision' => $this->isWaitForDecision() ? "true" : "false",
    ];
  }
}