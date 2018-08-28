<?php

namespace billythekid\v12finance;

use billythekid\v12finance\models\requests\ApplicationRequest;
use billythekid\v12finance\models\requests\FinanceProductListRequest;
use billythekid\v12finance\models\responses\ApplicationStatusResponse;
use billythekid\v12finance\models\responses\FinanceProductListResponse;
use billythekid\v12finance\models\Retailer;
use GuzzleHttp\Client;

class V12FinanceClient
{

  private $baseUri = "https://apply.v12finance.com/latest/retailerapi/";

  private $client;

  public function __construct()
  {
    $this->client = new Client(['base_uri' => $this->baseUri]);
  }

  /**
   * @param ApplicationRequest $applicationRequest
   * @return ApplicationStatusResponse
   * @throws models\exceptions\InvalidTelephoneException
   */
  public function submitApplication(ApplicationRequest $applicationRequest)
  {
    return new ApplicationStatusResponse($this->queryApi('SubmitApplication', $applicationRequest));
  }

  /**
   * @param FinanceProductListRequest $financeProductListRequest
   * @return models\responses\FinanceProductListResponse
   */
  public function getRetailerFinanceProducts(FinanceProductListRequest $financeProductListRequest)
  {
    return new FinanceProductListResponse($this->queryApi('GetRetailerFinanceProducts', $financeProductListRequest));
  }

  /**
   * @param string $endpoint
   * @param        $data - serializable by json_encode()
   * @return \Psr\Http\Message\ResponseInterface
   */
  private function queryApi(string $endpoint, $data)
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

  }

}