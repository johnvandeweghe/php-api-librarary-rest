<?php
namespace PHPAPILibrary\Rest\Http\In;

use PHPAPILibrary\Core\Data\AccessController\AllowAllAccessController;
use PHPAPILibrary\Core\Data\AccessControllerInterface;
use PHPAPILibrary\Core\Data\CacheController\NullCacheController;
use PHPAPILibrary\Core\Data\CacheControllerInterface;
use PHPAPILibrary\Core\Data\Logger\NullLogger;
use PHPAPILibrary\Core\Data\LoggerInterface;
use PHPAPILibrary\Core\Data\RateController\NoRateController;
use PHPAPILibrary\Core\Data\RateControllerInterface;
use PHPAPILibrary\Rest\LayerControllerInterface;

class LayerController extends AbstractLayerController
{

    /**
     * @var \PHPAPILibrary\Rest\AbstractLayerController
     */
    private $nextLayer;

    /**
     * @var AccessControllerInterface
     */
    private $accessController;
    /**
     * @var CacheControllerInterface
     */
    private $cacheController;
    /**
     * @var RateControllerInterface
     */
    private $rateController;
    /**
     * @var LoggerInterface
     */
    private $logger;
    /**
     * @var RequestTranslatorInterface
     */
    private $requestTranslator;
    /**
     * @var ResponseTranslatorInterface
     */
    private $responseTranslator;

    /**
     * LayerController constructor.
     * @param LayerControllerInterface $nextLayer
     * @param RequestTranslatorInterface $requestTranslator
     * @param ResponseTranslatorInterface $responseTranslator
     * @param null|AccessControllerInterface $accessController
     * @param null|CacheControllerInterface $cacheController
     * @param null|RateControllerInterface $rateController
     * @param null|LoggerInterface $logger
     */
    public function __construct(
        LayerControllerInterface $nextLayer,
        RequestTranslatorInterface $requestTranslator,
        ResponseTranslatorInterface $responseTranslator,
        ?AccessControllerInterface $accessController = null,
        ?CacheControllerInterface $cacheController = null,
        ?RateControllerInterface $rateController = null,
        ?LoggerInterface $logger = null
    )
    {
        if($accessController === null) {
            $accessController = new AllowAllAccessController();
        }

        if($cacheController === null) {
            $cacheController = new NullCacheController();
        }

        if($rateController === null) {
            $rateController = new NoRateController();
        }

        if($logger === null) {
            $logger = new NullLogger();
        }

        $this->accessController = $accessController;
        $this->cacheController = $cacheController;
        $this->rateController = $rateController;
        $this->logger = $logger;
        $this->nextLayer = $nextLayer;
        $this->requestTranslator = $requestTranslator;
        $this->responseTranslator = $responseTranslator;
    }

    /**
     * @return RequestTranslatorInterface
     */
    protected function getRequestTranslator(): RequestTranslatorInterface
    {
        return $this->requestTranslator;
    }

    /**
     * @return ResponseTranslatorInterface
     */
    protected function getResponseTranslator(): ResponseTranslatorInterface
    {
        return $this->responseTranslator;
    }

    /**
     * @return LayerControllerInterface
     */
    protected function getNextLayer(): LayerControllerInterface
    {
        return $this->nextLayer;
    }

    /**
     * @return AccessControllerInterface
     */
    protected function getAccessController(): AccessControllerInterface
    {
        return $this->accessController;
    }

    /**
     * @return CacheControllerInterface
     */
    protected function getCacheController(): CacheControllerInterface
    {
        return $this->cacheController;
    }

    /**
     * @return RateControllerInterface
     */
    protected function getRateController(): RateControllerInterface
    {
        return $this->rateController;
    }

    /**
     * @return LoggerInterface
     */
    protected function getLogger(): LoggerInterface
    {
        return $this->logger;
    }
}
