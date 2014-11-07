<?php
require 'vendor/autoload.php';

$dummyData = require 'dummy-data.php';
$config = require 'config.php';
$client = new Guzzle\Http\Client($config['host']);

try {
    // Create a pool of requests to perform
    $requests = [];
    foreach ($dummyData as $jsonData) {
        $requests[] = $client->post(
            '/',
            ['Content-Type' => 'application/json'],
            json_encode($jsonData)
        );
    }

    // Send the requests and wait for responses
    $responses = $client->send($requests);

    // Responses received, loop through them and save PNG-files
    foreach ($responses as $i => $response) {
        $file = __DIR__ . '/output/' . $i . '.png';
        file_put_contents($file, $response->getBody());
        echo 'Stored ' . $file . PHP_EOL;
    }

    // All done!
    echo 'Done!' . PHP_EOL;

} catch (Guzzle\Common\Exception\MultiTransferException $e) {
    echo 'The following exceptions were encountered:' . PHP_EOL;
    foreach ($e as $exception) {
        echo $exception->getMessage() . PHP_EOL;
    }
}