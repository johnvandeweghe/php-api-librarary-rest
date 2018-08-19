<?php
namespace PHPAPILibrary\Rest\Http\In\RequestTranslator;

use PHPAPILibrary\Http\Data\Request;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateRequestException;
use PHPAPILibrary\Rest\Http\In\RequestTranslatorInterface;
use PHPAPILibrary\Rest\RestRequest;
use PHPAPILibrary\Rest\RestRequestData;
use PHPAPILibrary\Rest\RestRequestDataInterface;
use PHPAPILibrary\Rest\RestRequestInterface;

abstract class AbstractRequestTranslator implements RequestTranslatorInterface
{
    /**
     * @param Request $request
     * @return RestRequestInterface
     * @throws UnableToTranslateRequestException
     */
    public function translateRequest(Request $request): RestRequestInterface
    {
        return new RestRequest(
            $request->getVerb(),
            $request->getIdentity(),
            $this->getRestRequestData($request),
            $this->getResource($request),
            $this->getElement($request)
        );
    }

    /**
     * @param Request $request
     * @return String
     * @throws UnableToTranslateRequestException
     */
    abstract protected function getResource(Request $request): String;


    /**
     * @param Request $request
     * @return String
     * @throws UnableToTranslateRequestException
     */
    abstract protected function getElement(Request $request): ?String;

    /**
     * @param Request $request
     * @return RestRequestDataInterface
     * @throws UnableToTranslateRequestException
     */
    protected function getRestRequestData(Request $request): RestRequestDataInterface
    {
        return new RestRequestData(
            $request->getHttpData()->getData(),
            $request->getHttpData()->getQueryParameters(),
            $request->getHttpData()->getHeaders()
        );
    }
}
