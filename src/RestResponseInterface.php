<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\ResponseInterface;

/**
 * Interface RestResponseInterface
 * @package PHPAPILibrary\Rest
 */
interface RestResponseInterface extends ResponseInterface
{
    /**
     * @return RestResponseDataInterface
     */
    public function getRestData(): RestResponseDataInterface;
}
