<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\DataInterface;
use PHPAPILibrary\Core\Data\IdentityInterface;
use PHPAPILibrary\Core\Data\RequestInterface;

class RestRequest implements RequestInterface {

    /**
     * @return String
     */
    public function getVerb(): String
    {
        // TODO: Implement getVerb() method.
    }

    /**
     * @return String
     */
    public function getPath(): String
    {
        // TODO: Implement getPath() method.
    }

    /**
     * @return IdentityInterface|null
     */
    public function getIdentity(): ?IdentityInterface
    {
        // TODO: Implement getIdentity() method.
    }

    /**
     * @return DataInterface
     */
    public function getData(): DataInterface
    {
        return $this->getRestData();
    }

    public function getRestData(): RestData
    {

    }
}
