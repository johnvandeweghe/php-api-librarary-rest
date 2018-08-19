<?php
namespace PHPAPILibrary\Rest\Http\In\RequestTranslator;

use PHPAPILibrary\Http\Data\Request;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateRequestException;

class RequestTranslator extends AbstractRequestTranslator
{
    /**
     * @var PathParserInterface
     */
    private $pathParser;

    /**
     * RequestTranslator constructor.
     * @param PathParserInterface $pathParser
     */
    public function __construct(PathParserInterface $pathParser)
    {
        $this->pathParser = $pathParser;
    }

    /**
     * @param Request $request
     * @return String
     * @throws UnableToTranslateRequestException
     */
    protected function getResource(Request $request): String
    {
        return $this->pathParser->getResource($request->getPath());
    }

    /**
     * @param Request $request
     * @return String
     * @throws UnableToTranslateRequestException
     */
    protected function getElement(Request $request): ?String
    {
        return $this->pathParser->getElement($request->getPath());
    }
}
