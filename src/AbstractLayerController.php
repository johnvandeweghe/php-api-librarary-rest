<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\Exception\RequestException;
use PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException;
use PHPAPILibrary\Core\Data\RequestInterface;
use PHPAPILibrary\Core\Data\ResponseInterface;
use PHPAPILibrary\Http\Data\Response;

abstract class AbstractLayerController extends \PHPAPILibrary\Core\Data\AbstractLayerController implements LayerControllerInterface
{

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws RequestException
     * @throws UnableToProcessRequestException
     */
    protected function getResponse(RequestInterface $request): ResponseInterface
    {
        if(!$request instanceof RestRequestInterface) {
            throw new UnableToProcessRequestException(new Response(null), "RestControllers Can only handle RestRequests.");
        }
        return $this->getRestResponse($request);
    }

    /**
     * @param RestRequestInterface $request
     * @return RestResponseInterface
     * @throws RequestException
     * @throws UnableToProcessRequestException
     * @throws \PHPAPILibrary\Core\Data\Exception\AccessDeniedException
     * @throws \PHPAPILibrary\Core\Data\Exception\RateLimitExceededException
     */
    abstract protected function getRestResponse(RestRequestInterface $request): RestResponseInterface;

    /**
     * @param RestRequestInterface $request
     * @return RestResponseInterface
     * @throws RequestException
     * @throws UnableToProcessRequestException
     * @throws \PHPAPILibrary\Core\Data\Exception\AccessDeniedException
     * @throws \PHPAPILibrary\Core\Data\Exception\RateLimitExceededException
     */
    public function handleRestRequest(RestRequestInterface $request): RestResponseInterface
    {
        $response = $this->handleRequest($request);
        if(!$response instanceof RestResponseInterface) {
            throw new \RuntimeException("Expected RestResponse.");
        }
        return $response;
    }
}
