<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 14:58
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\Retailer;
use JsonSerializable;

class FinanceProductListRequest implements JsonSerializable
{
  /**
   * @var Retailer
   */
  private $retailer;

  public function __construct(Retailer $retailer)
  {
    $this->retailer = $retailer;
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
        'Retailer' => $this->getRetailer(),
    ];
  }
}