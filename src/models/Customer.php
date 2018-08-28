<?php
/**
 * Created by PhpStorm.
 * User: billyfagan
 * Date: 28/08/2018
 * Time: 11:00
 */

namespace billythekid\v12finance\models;


use billythekid\v12finance\models\exceptions\InvalidTelephoneException;
use JsonSerializable;

class Customer implements JsonSerializable
{
  private $emailAddress = '';
  private $firstName = '';
  private $lastName = '';
  private $homeTelephone = ['Code' => '', 'Number' => ''];
  private $mobileTelephone = ['Code' => '', 'Number' => ''];

  /**
   * @param string $emailAddress
   * @return Customer
   */
  public function setEmailAddress(string $emailAddress): Customer
  {
    $this->emailAddress = $emailAddress;

    return $this;
  }

  /**
   * @param string $firstName
   * @return Customer
   */
  public function setFirstName(string $firstName): Customer
  {
    $this->firstName = $firstName;

    return $this;
  }

  /**
   * @param string $lastName
   * @return Customer
   */
  public function setLastName(string $lastName): Customer
  {
    $this->lastName = $lastName;

    return $this;
  }

  /**
   * @param array $homeTelephone
   * @return Customer
   * @throws InvalidTelephoneException
   */
  public function setHomeTelephone(array $homeTelephone): Customer
  {
    $this->validateTelephoneNumber($homeTelephone);

    $this->homeTelephone['Code']   = (string)$homeTelephone['code'];
    $this->homeTelephone['Number'] = (string)$homeTelephone['number'];

    return $this;
  }

  /**
   * @param array $mobileTelephone
   * @return Customer
   * @throws InvalidTelephoneException
   */
  public function setMobileTelephone(array $mobileTelephone): Customer
  {
    $this->validateTelephoneNumber($mobileTelephone);

    $this->mobileTelephone['Code']   = (string)$mobileTelephone['code'];
    $this->mobileTelephone['Number'] = (string)$mobileTelephone['number'];

    return $this;
  }

  /**
   * @return string
   */
  public function getEmailAddress(): string
  {
    return $this->emailAddress;
  }

  /**
   * @return string
   */
  public function getFirstName(): string
  {
    return $this->firstName;
  }

  /**
   * @return string
   */
  public function getLastName(): string
  {
    return $this->lastName;
  }

  /**
   * @return array
   */
  public function getHomeTelephone(): array
  {
    return $this->homeTelephone;
  }

  /**
   * @return array
   */
  public function getMobileTelephone(): array
  {
    return $this->mobileTelephone;
  }


  /**
   * @param $telephoneNumber
   * @throws InvalidTelephoneException
   */
  private function validateTelephoneNumber($telephoneNumber)
  {
    if (empty($telephoneNumber['code']))
    {
      throw new InvalidTelephoneException("A telephone number requires an area code");
    }
    if (empty($telephoneNumber['number']))
    {
      throw new InvalidTelephoneException("A telephone number requires a number");
    }
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
        'EmailAddress'    => $this->getEmailAddress(),
        'FirstName'       => $this->getFirstName(),
        'LastName'        => $this->getLastName(),
        'HomeTelephone'   => $this->getHomeTelephone(),
        'MobileTelephone' => $this->getMobileTelephone(),
    ];
  }
}