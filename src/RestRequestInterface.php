<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\RequestInterface;

/**
 * Interface RestRequestInterface
 * @package PHPAPILibrary\Rest
 */
interface RestRequestInterface extends RequestInterface {
    /**
     * @return String
     */
    public function getResource(): String;

    /**
     * @return null|String
     */
    public function getElement(): ?String;

    /**
     * @return RestRequestDataInterface
     */
    public function getRestData(): RestRequestDataInterface;
}
