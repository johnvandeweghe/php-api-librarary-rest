<?php
namespace PHPAPILibrary\Rest\Http\In\ResponseTranslator;

use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\ResourceInterface;

/**
 * Converts resources (should check type) into Http\Data data.
 * Interface ResourceSerializerInterface
 * @package PHPAPILibrary\Rest\Http\In\ResponseTranslator
 */
interface ResourceSerializerInterface
{
    /**
     * @param ResourceInterface[]|null $resources
     * @return array|object|null
     * @throws UnableToTranslateResponseException
     */
    public function serialize(?array $resources);
}
