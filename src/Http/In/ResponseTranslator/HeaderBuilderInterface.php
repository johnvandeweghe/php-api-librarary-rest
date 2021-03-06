<?php
namespace PHPAPILibrary\Rest\Http\In\ResponseTranslator;

use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\RestResponseInterface;

interface HeaderBuilderInterface
{
    /**
     * @param RestResponseInterface $response
     * @return string[][]
     * @throws UnableToTranslateResponseException
     */
    public function buildHeaders(RestResponseInterface $response): array;
}
