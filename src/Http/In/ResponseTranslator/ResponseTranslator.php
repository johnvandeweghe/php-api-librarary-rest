<?php
namespace PHPAPILibrary\Rest\Http\In\ResponseTranslator;

use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateResponseException;
use PHPAPILibrary\Rest\RestResponseInterface;

/**
 * Class ResponseTranslator
 * @package PHPAPILibrary\Rest\Http\In\ResponseTranslator
 */
class ResponseTranslator extends AbstractResponseTranslator
{
    /**
     * @var ResourceSerializerInterface
     */
    private $resourceSerializer;
    /**
     * @var HeaderBuilderInterface
     */
    private $headerBuilder;

    /**
     * ResponseTranslator constructor.
     * @param ResourceSerializerInterface $resourceSerializer
     * @param HeaderBuilderInterface $headerBuilder
     */
    public function __construct(
        ResourceSerializerInterface $resourceSerializer,
        HeaderBuilderInterface $headerBuilder
    )
    {
        $this->resourceSerializer = $resourceSerializer;
        $this->headerBuilder = $headerBuilder;
    }

    /**
     * @param RestResponseInterface $response
     * @return array|object|null
     * @throws UnableToTranslateResponseException
     */
    protected function getData(RestResponseInterface $response)
    {
        return $this->resourceSerializer->serialize($response->getRestData()->getResources());
    }

    /**
     * @param RestResponseInterface $response
     * @return string[][]
     * @throws UnableToTranslateResponseException
     */
    protected function getHeaders(RestResponseInterface $response): array
    {
        return $this->headerBuilder->buildHeaders($response);
    }
}
