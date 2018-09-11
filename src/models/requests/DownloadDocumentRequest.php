<?php
/**
 * Objects of this represent a download document request
 */

namespace billythekid\v12finance\models\requests;


use billythekid\v12finance\models\exceptions\InvalidDocumentException;
use billythekid\v12finance\models\Retailer;
use JsonSerializable;

/**
 * Class DownloadDocumentRequest
 *
 * @package billythekid\v12finance\models\requests
 */
class DownloadDocumentRequest implements JsonSerializable
{
  /**
   * The retailer
   *
   * @var Retailer
   */
  private $retailer;

  /**
   * The application ID
   *
   * @var string
   */
  private $applicationId;

  /**
   * The document type required
   *
   * @var string
   */
  private $documentType;


  /**
   * Holds the document types allowed
   */
  const ALLOWED_DOCUMENT_TYPES = ['Secci', 'Agreement'];


  /**
   * DownloadDocumentRequest constructor.
   *
   * @param Retailer $retailer
   */
  public function __construct(Retailer $retailer)
  {
    $this->retailer = $retailer;
  }

  /**
   * Sets the application ID
   *
   * @param string $applicationId
   * @return DownloadDocumentRequest
   */
  public function setApplicationId(string $applicationId): DownloadDocumentRequest
  {
    $this->applicationId = $applicationId;

    return $this;
  }


  /**
   * Sets the document type
   *
   * @param string $documentType
   * @return DownloadDocumentRequest
   * @throws InvalidDocumentException
   */
  public function setDocumentType(string $documentType): DownloadDocumentRequest
  {
    if (!in_array($documentType, self::ALLOWED_DOCUMENT_TYPES))
    {
      throw new InvalidDocumentException("Document types must be one of: " . implode(', ', self::ALLOWED_DOCUMENT_TYPES));
    }
    $this->documentType = $documentType;

    return $this;
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
   * Gets the application ID
   *
   * @return string
   */
  public function getApplicationId(): string
  {
    return $this->applicationId;
  }

  /**
   * Gets the document type
   *
   * @return string
   */
  public function getDocumentType(): string
  {
    return $this->documentType;
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
        'Retailer'      => $this->getRetailer(),
        'ApplicationId' => $this->getApplicationId(),
        'DocumentType'  => $this->getDocumentType(),
    ];
  }


}