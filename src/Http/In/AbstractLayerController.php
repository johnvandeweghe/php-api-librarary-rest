<?php
namespace PHPAPILibrary\Rest\Http\In;

use PHPAPILibrary\Core\Data\Exception\AccessDeniedException;
use PHPAPILibrary\Core\Data\Exception\RateLimitExceededException;
use PHPAPILibrary\Core\Data\Exception\RequestException;
use PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException;
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
        $dataRequest = $this->getRequestTranslator()->translateRequest($request);

        $dataResponse = $this->getNextLayer()->handleRestRequest($dataRequest);

        return $this->getResponseTranslator()->translateResponse($dataResponse);
    }

    /**
     * @return \PHPAPILibrary\Rest\AbstractLayerController
     */
    abstract protected function getNextLayer(): \PHPAPILibrary\Rest\LayerControllerInterface;

    /**
     * @return RequestTranslatorInterface
     */
    abstract protected function getRequestTranslator(): RequestTranslatorInterface;

    /**
     * @return ResponseTranslatorInterface
     */
    abstract protected function getResponseTranslator(): ResponseTranslatorInterface;
}
