<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\AccessController\AllowAllAccessController;
use PHPAPILibrary\Core\Data\AccessControllerInterface;
use PHPAPILibrary\Core\Data\CacheController\NullCacheController;
use PHPAPILibrary\Core\Data\CacheControllerInterface;
use PHPAPILibrary\Core\Data\Exception\RequestException;
use PHPAPILibrary\Core\Data\Exception\UnableToProcessRequestException;
use PHPAPILibrary\Core\Data\Logger\NullLogger;
use PHPAPILibrary\Core\Data\LoggerInterface;
use PHPAPILibrary\Core\Data\RateController\NoRateController;
use PHPAPILibrary\Core\Data\RateControllerInterface;
use PHPAPILibrary\Http\Data\ResponseData;

class LayerController extends AbstractLayerController
{
    /**
     * @var ResourceContainerInterface
     */
    private $container;
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
     * LayerController constructor.
     * @param ResourceContainerInterface $container
     * @param null|AccessControllerInterface $accessController
     * @param null|CacheControllerInterface $cacheController
     * @param null|RateControllerInterface $rateController
     * @param null|LoggerInterface $logger
     */
    public function __construct(
        ResourceContainerInterface $container,
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

        $this->container = $container;
        $this->accessController = $accessController;
        $this->cacheController = $cacheController;
        $this->rateController = $rateController;
        $this->logger = $logger;
    }

    /**
     * @param RestRequestInterface $request
     * @return RestResponseInterface
     * @throws RequestException
     * @throws UnableToProcessRequestException
     * @throws \PHPAPILibrary\Core\Data\Exception\AccessDeniedException
     * @throws \PHPAPILibrary\Core\Data\Exception\RateLimitExceededException
     */
    protected function getRestResponse(RestRequestInterface $request): RestResponseInterface
    {
        $controller = $this->container->getController($request->getResource());
        if(!$controller) {
            throw new RequestException(
                new \PHPAPILibrary\Http\Data\Response(
                    new ResponseData(404, "Resource not found: {$request->getResource()}")
                ),
                null
            );
        }
        return $controller->handleRestRequest($request);
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
