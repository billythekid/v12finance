This project is on a bit of a hiatus as the client I was building it for decided to use another finance provider hence the 70% completedness of this!

Feel free to PR the few missing classes or I'll get to it as a side-project eventually. 

[Here are the API docs](https://billythekid.github.io/v12finance/docs/namespaces/billythekid.v12finance.html)

Here's some example code for how to use this

```php
<pre><?php
  include('../vendor/autoload.php');

  use billythekid\v12finance\models\Customer;
  use billythekid\v12finance\models\exceptions\InvalidTelephoneException;
  use billythekid\v12finance\models\FinanceProduct;
  use billythekid\v12finance\models\Order;
  use billythekid\v12finance\models\OrderLine;
  use billythekid\v12finance\models\requests\ApplicationRequest;
  use billythekid\v12finance\models\requests\ApplicationStatusRequest;
  use billythekid\v12finance\models\requests\FinanceProductListRequest;
  use billythekid\v12finance\models\responses\FinanceProductListResponse;
  use billythekid\v12finance\models\Retailer;
  use billythekid\v12finance\V12FinanceClient;

  $faker    = Faker\Factory::create();
  $retailer = new Retailer(
      'YOUR AUTHENTICATION KEY',
      "YOUR RETAILER GUID",
      'YOUR RETAILER ID');

  $client = new V12FinanceClient();

  // Get all the products available to this retailer
  $productListRequest = new FinanceProductListRequest($retailer);
  /** @var FinanceProductListResponse $products */
  $products = $client->getRetailerFinanceProducts($productListRequest);

  /** @var FinanceProduct $product */
  $product = $products->getFinanceProducts()[0];

  echo json_encode($product, 128) . "\n\n";
  $customer = (new Customer())
      ->setEmailAddress($faker->email)
      ->setFirstName($faker->firstName)
      ->setLastName($faker->lastName);
  try
  {
    $customer->setHomeTelephone(['code' => '01234', 'number' => '567890'])
        ->setMobileTelephone(['code' => '07777', 'number' => '888999']);
  } catch (InvalidTelephoneException $e)
  {  /* nothing to do here */
  }

  $lineItems = [
      (new OrderLine())
          ->setItem($faker->words(3, true))
          ->setPrice($faker->randomFloat(2, 100, 1000))
          ->setQty($faker->numberBetween(1, 5))
          ->setSku('item1sku'),
      (new OrderLine())
          ->setItem($faker->words(3, true))
          ->setPrice($faker->randomFloat(2, 100, 1000))
          ->setQty($faker->numberBetween(1, 5))
          ->setSku('item2sku'),
  ];

  echo json_encode($lineItems, JSON_PRETTY_PRINT) . "\n\n";

  $totalPrice = ($lineItems[0]->getQty() * $lineItems[0]->getPrice()) + ($lineItems[1]->getQty() * $lineItems[1]->getPrice());

  echo "Total Price: {$totalPrice}\n\n";

  $salesReference = $faker->word;
  $order          = (new Order())
      ->setCashPrice($totalPrice)
      ->setDeposit(round($totalPrice / 2))
      ->setProductId($product->getProductId())
      ->setProductGuid($product->getProductGuid())
      ->setDuplicateSalesReferenceMethod("Ignore")
      ->setIpAddress(@$_SERVER['REMOTE_ADDR'])
      ->setLines($lineItems)
      ->setSalesReference($salesReference);
  //      ->setSalesReference('testing PHP wrapper');

  echo json_encode($order, JSON_PRETTY_PRINT) . "\n\n";

  $applicationRequest = new ApplicationRequest($retailer, $order, $customer, false);
  $response           = $client->submitApplication($applicationRequest);

  //  $statusRequest = new ApplicationStatusRequest($retailer, "SOME_APPLICATION_ID");
  //  $response      = $client->checkApplicationStatus($statusRequest);


  //$headers = $client->headers('GetRetailerFinanceProducts', $productListRequest);
  ?>
<?php
//foreach ($headers as $name => $values) {
//  echo $name . ': ' . implode(', ', $values) . "\r\n";
//}

echo json_encode($response, JSON_PRETTY_PRINT);

```
