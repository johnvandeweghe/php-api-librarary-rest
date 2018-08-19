<?php
namespace PHPAPILibrary\Rest;

class RestRequestData implements RestRequestDataInterface
{

    /**
     * @var array|object|null
     */
    private $data;
    /**
     * @var string[]
     */
    private $queryParameters;
    /**
     * @var string[][]
     */
    private $headers;

    /**
     * RestRequestData constructor.
     * @param array|object|null $data
     * @param string[] $queryParameters
     * @param string[][] $headers
     */
    public function __construct($data, array $queryParameters, array $headers)
    {
        $this->data = $data;
        $this->queryParameters = $queryParameters;
        $this->headers = $headers;
    }

    /**
     * Get data parsed from an HTTP request.
     * @return array|object|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get associative array of url parameters.
     * @return string[]
     */
    public function getQueryParameters(): array
    {
        return $this->queryParameters;
    }

    /**
     * Get header lines.
     * @return string[][]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
    }

    /**
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
    }
}
