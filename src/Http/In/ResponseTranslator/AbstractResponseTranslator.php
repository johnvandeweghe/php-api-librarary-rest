<?php
namespace PHPAPILibrary\Rest\Http\In\ResponseTranslator;

use PHPAPILibrary\Http\Data\Response;
use PHPAPILibrary\Http\Data\ResponseData;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\Http\In\ResponseTranslatorInterface;
use PHPAPILibrary\Rest\RestResponseInterface;

/**
 * Class AbstractResponseTranslator
 * @package PHPAPILibrary\Rest\Http\In\ResponseTranslator
 */
abstract class AbstractResponseTranslator implements ResponseTranslatorInterface
{
    /**
     * @param RestResponseInterface $response
     * @return Response
     * @throws UnableToTranslateResponseException
     */
    public function translateResponse(RestResponseInterface $response): Response
    {
        return new Response(
            $this->getResponseData($response),
            $response->getCacheControl()
        );
    }

    /**
     * @param RestResponseInterface $response
     * @return ResponseData
     * @throws UnableToTranslateResponseException
     */
    protected function getResponseData(RestResponseInterface $response): ResponseData
    {
        return new ResponseData(
            $response->getRestData()->getResources() === null ? 201 : 200,
            $this->getData($response),
            $this->getHeaders($response),
            []
        );
    }

    /**
     * @param RestResponseInterface $response
     * @return array|object|null
     * @throws UnableToTranslateResponseException
     */
    abstract protected function getData(RestResponseInterface $response);

    /**
     * @param RestResponseInterface $response
     * @return string[][]
     * @throws UnableToTranslateResponseException
     */
    abstract protected function getHeaders(RestResponseInterface $response): array;

}
