<?php

class SignatureGenerator
{
    const SIGNATURE_PARAMETERS = ['ActionType', 'CallerCode', 'Parameters', 'Time'];

    private string $privateKey;

    public function __construct(string $privateKey)
    {
        $this->privateKey = $privateKey;
    }

    public function getSignature(array $parameters): string
    {
        $parameterValues = $this->getSignatureString($parameters);

        $privateKey = file_get_contents($this->privateKey);

        if ($privateKey === false) {
            throw new Exception(sprintf('Failed to read private key file in %s', $this->privateKey));
        }

        $key = openssl_pkey_get_private($privateKey);

        if ($key === false) {
            throw new Exception(sprintf('Failed to read private key from %s file contents', $this->privateKey));
        }

        if (!openssl_sign($parameterValues, $signature, $key)) {
            throw new Exception('Failed to create payload signature');
        }

        return str_replace(["\r", "\n"], '', base64_encode($signature));
    }

    private function getSignatureString(array $parameters): string
    {
        $orderedParameterValues = [];

        foreach (self::SIGNATURE_PARAMETERS as $item) {
            $orderedParameterValues[] = $parameters[$item];
        }

        return implode('', $orderedParameterValues);
    }
}
