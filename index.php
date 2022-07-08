<?php

declare(strict_types=1);

$parameters = [
    'ActionType' => 437,
    'CallerCode' => 'Acme', // TODO: this one should be registered in remote system
    'Parameters' => '<asmuo><tipas>JURIDINIS_ASMUO</tipas><kodas>000000000</kodas></asmuo>',
    'Time' => (new DateTime())->format('Y-m-d H:i:s'),
];

$orderedParameterValues = [];

foreach (['ActionType', 'CallerCode', 'Parameters', 'Time'] as $item) {
    $orderedParameterValues[] = $parameters[$item];
}

$parameterValues = implode('', $orderedParameterValues);

$privateKeyFile = __DIR__  . '/keys/private.pem';
$privateKey = file_get_contents($privateKeyFile);

if ($privateKey === false) {
    throw new Exception(sprintf('Failed to read private key file in %s', $privateKeyFile));
}

$key = openssl_pkey_get_private($privateKey);

if ($key === false) {
    throw new Exception(sprintf('Failed to read private key from %s file contents', $privateKeyFile));
}

if (!openssl_sign($parameterValues, $signature, $key)) {
    throw new Exception('Failed to create payload signature');
}

//$parameters['Signature'] = $signature;

print_r($parameters);
echo "\r\n";
echo 'https://ws.registrucentras.lt/broker/index.rest.php?' . http_build_query($parameters);
echo "\r\n";




