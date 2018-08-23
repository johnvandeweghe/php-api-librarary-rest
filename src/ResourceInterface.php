<?php
namespace PHPAPILibrary\Rest;

/**
 * Interface ResourceInterface
 * @package PHPAPILibrary\Rest
 */
interface ResourceInterface extends \Serializable
{
    /**
     * For use in serialization when resource is unknown (So we don't assume requested resource is what's returned).
     * @return string
     */
    public function getResourceName(): string;
    //Marker interface
}
