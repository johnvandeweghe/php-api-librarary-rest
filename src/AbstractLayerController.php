<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\Exception\RequestException;
use PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException;
use PHPAPILibrary\Core\Data\RequestInterface;
use PHPAPILibrary\Core\Data\ResponseInterface;

abstract class AbstractLayerController extends \PHPAPILibrary\Core\Data\AbstractLayerController
{

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws RequestException
     * @throws UnableToProcessRequestException
     */
    protected function getResponse(RequestInterface $request): ResponseInterface
    {

    }

    abstract protected function getRestResponse(/*todo*/) {
        //TODO
    }
}
