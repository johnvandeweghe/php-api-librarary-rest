<?php
namespace PHPAPILibrary\Rest\Http\In;

use PHPAPILibrary\Http\Data\Response;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\RestResponseInterface;

/**
 * Interface ResponseTranslatorInterface
 * @package PHPAPILibrary\Rest\Http\In
 */
interface ResponseTranslatorInterface
{
    /**
     * @param RestResponseInterface $response
     * @return Response
     * @throws UnableToTranslateResponseException
     */
    public function translateResponse(RestResponseInterface $response): Response;
}
