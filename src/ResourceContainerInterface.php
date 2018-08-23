<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Rest\Http\In\ResponseTranslator\ResourceSerializerInterface;

/**
 * Interface ResourceRegistryInterface
 * @package PHPAPILibrary\Rest
 */
interface ResourceContainerInterface
{
    /**
     * @param string $resource
     * @return null|LayerControllerInterface
     */
    public function getController(string $resource): ?LayerControllerInterface;

    /**
     * @param string $resource
     * @return null|ResourceSerializerInterface
     */
    public function getSerializer(string $resource): ?ResourceSerializerInterface;
}
