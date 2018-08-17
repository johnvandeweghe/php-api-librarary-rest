<?php
namespace PHPAPILibrary\Rest\Http\In;

use PHPAPILibrary\Core\Data\Exception\AccessDeniedException;
use PHPAPILibrary\Core\Data\Exception\RateLimitExceededException;
use PHPAPILibrary\Core\Data\Exception\RequestException;
use PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException;
use PHPAPILibrary\Core\Data\RequestInterface;
use PHPAPILibrary\Core\Data\ResponseInterface;
use PHPAPILibrary\Http\Data\Request;
use PHPAPILibrary\Http\Data\Response;

abstract class AbstractLayerController extends \PHPAPILibrary\Http\Data\AbstractLayerController
{
    /**
     * @param Request $request
     * @return Response
     * @throws RequestException
     * @throws AccessDeniedException
     * @throws RateLimitExceededException
     * @throws UnableToProcessRequestException
     */
    protected function getHttpDataResponse(Request $request): Response
    {
        try {
            $dataRequest = $this->getRequestTranslator()->translateRequest($request);

            $dataResponse = $this->getNextLayer()->handleRequest($dataRequest);
        } catch (\PHPAPILibrary\Core\Data\Exception\AccessDeniedException $exception) {
            $networkResponse = $this->getResponseTranslator()->translateResponse($exception->getResponse());
            throw new AccessDeniedException($networkResponse);
        } catch (\PHPAPILibrary\Core\Data\Exception\RateLimitExceededException $exception) {
            $networkResponse = $this->getResponseTranslator()->translateResponse($exception->getResponse());
            throw new RateLimitExceededException($networkResponse);
        } catch (\PHPAPILibrary\Core\Data\Exception\RequestException $exception) {
            $networkResponse = $this->getResponseTranslator()->translateResponse($exception->getResponse());
            throw new RequestException($networkResponse);
        } catch (\PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException $exception) {
            $networkResponse = $this->getResponseTranslator()->translateResponse($exception->getResponse());
            throw new UnableToProcessRequestException($networkResponse);
        }

        return $this->getResponseTranslator()->translateResponse($dataResponse);
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws RequestException
     * @throws RateLimitExceededException
     * @throws UnableToProcessRequestException
     */
    protected function handleRateLimitExceeded(RequestInterface $request): ResponseInterface
    {
        //TODO
        return ;
    }

    /**
     * @param RequestInterface $request
     * @return ResponseInterface
     * @throws RequestException
     * @throws AccessDeniedException
     * @throws UnableToProcessRequestException
     */
    protected function handleDeniedAccess(RequestInterface $request): ResponseInterface
    {
        //TODO
        return ;
    }

    /**
     * @return \PHPAPILibrary\Rest\AbstractLayerController
     */
    abstract protected function getNextLayer(): \PHPAPILibrary\Rest\AbstractLayerController;

    /**
     * @return RequestTranslatorInterface
     */
    abstract protected function getRequestTranslator(): RequestTranslatorInterface;

    /**
     * @return ResponseTranslatorInterface
     */
    abstract protected function getResponseTranslator(): ResponseTranslatorInterface;
}
