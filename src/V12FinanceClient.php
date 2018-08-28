<?php
/**
 * This is the main API wrapper client for the V12 Retail Finance "REST" API
 */

namespace billythekid\v12finance;

use billythekid\v12finance\models\requests\ApplicationRequest;
use billythekid\v12finance\models\requests\FinanceProductListRequest;
use billythekid\v12finance\models\responses\ApplicationStatusResponse;
use billythekid\v12finance\models\responses\FinanceProductListResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use \Exception;

/**
 * Class V12FinanceClient
 *
 * @package billythekid\v12finance
 */
class V12FinanceClient
{

  /**
   * The API base uri
   *
   * @var string
   */
  private $baseUri = "https://apply.v12finance.com/latest/retailerapi/";

  /**
   * A guzzle client for running http requests
   *
   * @var Client
   */
  private $client;

  /**
   * V12FinanceClient constructor.
   */
  public function __construct()
  {
    $this->client = new Client(['base_uri' => $this->baseUri]);
  }

  /**
   * Submit an application to V12
   *
   * @param ApplicationRequest $applicationRequest
   * @return ApplicationStatusResponse
   * @throws models\exceptions\InvalidTelephoneException
   * @throws Exception
   */
  public function submitApplication(ApplicationRequest $applicationRequest)
  {
    return new ApplicationStatusResponse($this->queryApi('SubmitApplication', $applicationRequest));
  }

  /**
   * Get the finance products available for a retailer
   *
   * @param FinanceProductListRequest $financeProductListRequest
   * @return models\responses\FinanceProductListResponse
   * @throws Exception
   */
  public function getRetailerFinanceProducts(FinanceProductListRequest $financeProductListRequest)
  {
    return new FinanceProductListResponse($this->queryApi('GetRetailerFinanceProducts', $financeProductListRequest));
  }

  /**
   * Send data to the API endpoints at V12
   *
   * @param string $endpoint
   * @param        $data - serializable by json_encode()
   * @return \Psr\Http\Message\ResponseInterface
   * @throws Exception
   */
  private function queryApi(string $endpoint, $data)
  {
    try
    {
      return $this->client->request(
          'POST',
          $endpoint,
          [
              'headers' => [
                  'Content-Type' => 'application/json',
              ],
              'body'    => json_encode($data),
          ]
      );
    } catch (GuzzleException $e)
    {
      throw new Exception("There was an issue connecting to V12", $e->getCode());
    }

  }

}