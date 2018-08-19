<?php
namespace PHPAPILibrary\Rest\Http\In\RequestTranslator;

use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateRequestException;

interface PathParserInterface
{
    /**
     * @param String $path
     * @return String
     * @throws UnableToTranslateRequestException
     */
    public function getResource(String $path): String;

    /**
     * @param String $path
     * @return null|String
     * @throws UnableToTranslateRequestException
     */
    public function getElement(String $path): ?String;
}
