<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\DataInterface;

abstract class AbstractRestRequest implements RestRequestInterface
{
    public function getData(): DataInterface
    {
        return $this->getRestData();
    }
}
