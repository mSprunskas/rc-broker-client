<?php

declare(strict_types=1);

require 'vendor/autoload.php';

$parameters = [
    'ActionType' => 437,
    'CallerCode' => 'Acme',
    'Parameters' => '<asmuo><tipas>JURIDINIS_ASMUO</tipas><kodas>000000000</kodas></asmuo>',
    'Time' => (new DateTime())->format('Y-m-d H:i:s'),
];

$parameters['Signature'] = (new SignatureGenerator(__DIR__  . '/keys/private.pem'))->getSignature($parameters);

$client = new SoapClient('https://ws.registrucentras.lt:443/broker/?wsdl');

$response = $client->__soapCall('GetData', [$parameters]);

var_dump($response);
