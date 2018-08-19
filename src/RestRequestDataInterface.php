<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\DataInterface;

interface RestRequestDataInterface extends DataInterface
{
    /**
     * Get data parsed from an HTTP request.
     * @return array|object|null
     */
    public function getData();

    /**
     * Get associative array of url parameters.
     * @return string[]
     */
    public function getQueryParameters(): array;

    /**
     * Get header lines.
     * @return string[][]
     */
    public function getHeaders(): array;
}
