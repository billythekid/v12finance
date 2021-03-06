<?php
/**
 * Objects of this class represent a request to list the financial products available to the retailer
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\Retailer;
use JsonSerializable;

/**
 * Class FinanceProductListRequest
 *
 * @package billythekid\v12finance\models\requests
 */
class FinanceProductListRequest implements JsonSerializable
{
  /**
   * The retailer
   * @var Retailer
   */
  private $retailer;

  /**
   * FinanceProductListRequest constructor.
   *
   * @param Retailer $retailer
   */
  public function __construct(Retailer $retailer)
  {
    $this->retailer = $retailer;
  }

  /**
   * Gets the retailer
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
        'Retailer' => $this->getRetailer(),
    ];
  }
}