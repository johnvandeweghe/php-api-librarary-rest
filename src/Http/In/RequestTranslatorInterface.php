<?php
namespace PHPAPILibrary\Rest\Http\In;

use PHPAPILibrary\Http\Data\Request;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateRequestException;
use PHPAPILibrary\Rest\RestRequestInterface;

/**
 * Interface RequestTranslatorInterface
 * @package PHPAPILibrary\Rest\Http\In
 */
interface RequestTranslatorInterface
{
    /**
     * @param Request $request
     * @return RestRequestInterface
     * @throws UnableToTranslateRequestException
     */
    public function translateRequest(Request $request): RestRequestInterface;
}
