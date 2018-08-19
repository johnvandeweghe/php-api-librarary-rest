<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Core\Data\DataInterface;

interface RestResponseDataInterface extends DataInterface
{
    /**
     * @return ResourceInterface[]|null
     */
    public function getResources(): ?array;
}
