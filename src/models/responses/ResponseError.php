<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 13:49
 */

namespace billythekid\v12finance\models\responses;


use JsonSerializable;

class ResponseError implements JsonSerializable
{
  private $code;
  private $description;
  private $reference;

  /**
   * ApplicationStatusResponseError constructor.
   *
   * @param $code
   * @param $description
   * @param $reference
   */
  public function __construct($code, $description, $reference)
  {

    $this->code        = $code;
    $this->description = $description;
    $this->reference   = $reference;
  }

  /**
   * @return mixed
   */
  public function getCode()
  {
    return $this->code;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @return mixed
   */
  public function getReference()
  {
    return $this->reference;
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
        'Code'        => $this->getCode(),
        'Description' => $this->getDescription(),
        'Reference'   => $this->getReference(),
    ];
  }
}