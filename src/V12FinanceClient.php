<?php
/**
 * This is the main API wrapper client for the V12 Retail Finance "REST" API
 */

namespace billythekid\v12finance;

use billythekid\v12finance\models\requests\ApplicationRequest;
use billythekid\v12finance\models\requests\ApplicationStatusRequest;
use billythekid\v12finance\models\requests\ApplicationUpdateRequest;
use billythekid\v12finance\models\requests\FinanceProductListRequest;
use billythekid\v12finance\models\responses\ApplicationStatusResponse;
use billythekid\v12finance\models\responses\FinanceProductListResponse;
use GuzzleHttp\Client;

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
   */
  public function submitApplication(ApplicationRequest $applicationRequest)
  {
    return new ApplicationStatusResponse($this->queryApi('SubmitApplication', $applicationRequest));
  }

  /**
   * Submit an application status request to V12
   *
   * @param ApplicationStatusRequest $request
   * @return ApplicationStatusResponse
   * @throws models\exceptions\InvalidTelephoneException
   */
  public function checkApplicationStatus(ApplicationStatusRequest $request)
  {
    return new ApplicationStatusResponse($this->queryApi('CheckApplicationStatus', $request));
  }

  /**
   * Make an update to an application
   *
   * @param ApplicationUpdateRequest $request
   * @return ApplicationStatusResponse
   * @throws models\exceptions\InvalidTelephoneException
   */
  public function updateApplication(ApplicationUpdateRequest $request)
  {
    return new ApplicationStatusResponse($this->queryApi('UpdateApplication', $request));
  }

  /**
   * Get the finance products available for a retailer
   *
   * @param FinanceProductListRequest $financeProductListRequest
   * @return models\responses\FinanceProductListResponse
   */
  public function getRetailerFinanceProducts(FinanceProductListRequest $financeProductListRequest)
  {
    return new FinanceProductListResponse($this->queryApi('GetRetailerFinanceProducts', $financeProductListRequest));
  }

  /**
   * Gets the headers of the response
   *
   * @param $endpoint
   * @param $payload
   * @return \string[][]
   */
  public function headers($endpoint, $payload)
  {
    return $this->queryApi($endpoint, $payload)
        ->getHeaders();
  }

  /**
   * Send data to the API endpoints at V12 Finance
   *
   * @param string $endpoint
   * @param        $data - serializable by json_encode()
   * @return \Psr\Http\Message\ResponseInterface
   */
  private function queryApi(string $endpoint, $data)
  {
    return $this->client->post(
        $endpoint,
        [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'body'    => json_encode($data),
        ]
    );
  }

}