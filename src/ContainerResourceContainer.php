<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Rest\Http\In\ResponseTranslator\ResourceSerializerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;

/**
 * Class ContainerResourceRegistry
 * @package PHPAPILibrary\Rest
 */
class ResourceContainer implements ResourceContainerInterface
{
    /**
     * @var ContainerInterface
     */
    private $controllerContainer;
    /**
     * @var ContainerInterface
     */
    private $serializerContainer;

    /**
     * ContainerResourceRegistry constructor.
     * @param ContainerInterface $controllerContainer
     * @param ContainerInterface $serializerContainer
     */
    public function __construct(ContainerInterface $controllerContainer, ContainerInterface $serializerContainer)
    {
        $this->controllerContainer = $controllerContainer;
        $this->serializerContainer = $serializerContainer;
    }

    /**
     * @param string $resource
     * @return null|LayerControllerInterface
     */
    public function getController(string $resource): ?LayerControllerInterface
    {
        try {
            return $this->controllerContainer->get($resource);
        } catch (ContainerExceptionInterface $e) {
            return null;
        }
    }

    /**
     * @param string $resource
     * @return null|ResourceSerializerInterface
     */
    public function getSerializer(string $resource): ?ResourceSerializerInterface
    {
        try {
            return $this->serializerContainer->get($resource);
        } catch (ContainerExceptionInterface $e) {
            return null;
        }
    }
}
