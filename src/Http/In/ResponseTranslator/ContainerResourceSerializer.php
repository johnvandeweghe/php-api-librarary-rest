<?php
namespace PHPAPILibrary\Rest\Http\In\ResponseTranslator;

use PHPAPILibrary\Http\Data\Response;
use PHPAPILibrary\Http\Data\ResponseData;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\ResourceContainerInterface;
use PHPAPILibrary\Rest\ResourceInterface;

class ContainerResourceSerializer implements ResourceSerializerInterface
{
    /**
     * @var ResourceContainerInterface
     */
    private $container;

    /**
     * ContainerResourceSerializer constructor.
     * @param ResourceContainerInterface $container
     */
    public function __construct(ResourceContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param ResourceInterface[]|null $resources
     * @return array|object|null
     * @throws UnableToTranslateResponseException
     */
    public function serialize(?array $resources)
    {
        if($resources === null) {
            return null;
        }

        return array_map([$this, 'serializeOne'], $resources);
    }

    /**
     * @param ResourceInterface|null $resource
     * @return array|object|null
     * @throws UnableToTranslateResponseException
     */
    public function serializeOne(?ResourceInterface $resource)
    {
        $serializer = $this->container->getSerializer($resource->getResourceName());
        if(!$serializer) {
            throw new UnableToTranslateResponseException(new Response(new ResponseData(500)));
        }

        return $serializer->serializeOne($resource);
    }
}
