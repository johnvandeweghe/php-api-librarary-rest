<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\RequestInterface;

interface RestRequestInterface extends RequestInterface {
    public function getResource(): String;

    public function getElement(): String;

    public function getRestData(): RestDataInterface;
}
