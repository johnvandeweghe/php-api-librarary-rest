<?php
namespace PHPAPILibrary\Rest;

interface LayerControllerInterface extends \PHPAPILibrary\Core\Data\LayerControllerInterface
{
    /**
     * @param RestRequestInterface $request
     * @return RestResponseInterface
     */
    public function handleRestRequest(RestRequestInterface $request): RestResponseInterface;
}
