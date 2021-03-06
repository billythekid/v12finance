<?php
/**
 * Application Request Class
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\Customer;
use billythekid\v12finance\models\Order;
use billythekid\v12finance\models\Retailer;
use JsonSerializable;

/**
 * Class ApplicationRequest
 *
 * @package billythekid\v12finance\models\requests
 */
class ApplicationRequest implements JsonSerializable
{
  /**
   * The retailer
   *
   * @var Retailer
   */
  private $retailer;
  /**
   * The order
   *
   * @var Order
   */
  private $order;
  /**
   * The customer (optional)
   *
   * @var Customer
   */
  private $customer;
  /**
   * Whether to wait for a decision
   *
   * @var bool
   */
  private $waitForDecision;

  /**
   * ApplicationRequest constructor.
   *
   * @param Retailer      $retailer
   * @param Order         $order
   * @param Customer|null $customer
   * @param bool          $waitForDecision
   */
  public function __construct(Retailer $retailer, Order $order, Customer $customer = null, $waitForDecision = false)
  {
    $this->retailer        = $retailer;
    $this->order           = $order;
    $this->customer        = $customer;
    $this->waitForDecision = $waitForDecision;
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
   * Gets the order
   *
   * @return Order
   */
  public function getOrder(): Order
  {
    return $this->order;
  }

  /**
   * Gets the customer
   *
   * @return Customer
   */
  public function getCustomer(): Customer
  {
    return $this->customer;
  }

  /**
   * Gets whether to wait for a decision or not
   *
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
        'Customer'        => $this->getCustomer(),
        'Order'           => $this->getOrder(),
        'Retailer'        => $this->getRetailer(),
        'WaitForDecision' => $this->isWaitForDecision() ? "true" : "false",
    ];
  }
}