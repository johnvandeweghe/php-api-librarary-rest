<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\DataInterface;
use PHPAPILibrary\Core\Data\IdentityInterface;

class RestRequest implements RestRequestInterface
{
    /**
     * @var String
     */
    private $verb;
    /**
     * @var null|IdentityInterface
     */
    private $identity;
    /**
     * @var RestRequestDataInterface
     */
    private $data;
    /**
     * @var String
     */
    private $resource;
    /**
     * @var null|String
     */
    private $element;

    /**
     * RestRequest constructor.
     * @param String $verb
     * @param null|IdentityInterface $identity
     * @param RestRequestDataInterface $data
     * @param String $resource
     * @param null|String $element
     */
    public function __construct(
        String $verb,
        ?IdentityInterface $identity,
        RestRequestDataInterface $data,
        String $resource,
        ?String $element
    )
    {
        $this->verb = $verb;
        $this->identity = $identity;
        $this->data = $data;
        $this->resource = $resource;
        $this->element = $element;
    }

    /**
     * @return String
     */
    public function getVerb(): String
    {
        return $this->verb;
    }

    /**
     * @return String
     */
    public function getPath(): String
    {
        return $this->getResource();
    }

    /**
     * @return IdentityInterface|null
     */
    public function getIdentity(): ?IdentityInterface
    {
        return $this->identity;
    }

    /**
     * @return DataInterface
     */
    public function getData(): DataInterface
    {
        return $this->getRestData();
    }

    /**
     * @return String
     */
    public function getResource(): String
    {
        return $this->resource;
    }

    /**
     * @return null|String
     */
    public function getElement(): ?String
    {
        return $this->element;
    }

    /**
     * @return RestRequestDataInterface
     */
    public function getRestData(): RestRequestDataInterface
    {
        return $this->data;
    }
}
