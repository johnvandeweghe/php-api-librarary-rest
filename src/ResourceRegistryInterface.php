<?php
namespace PHPAPILibrary\Rest;

use PHPAPILibrary\Rest\Http\In\ResponseTranslator\ResourceSerializerInterface;

interface ResourceRegistryInterface
{
    public function register(string $resource, LayerControllerInterface $controller, ResourceSerializerInterface $serializer);

    public function getController(string $resource): LayerControllerInterface;

    public function getSerializer(string $resource): ResourceSerializerInterface;
}
