<?php
namespace PHPAPILibrary\Rest\Http\In\RequestTranslator;

use PHPAPILibrary\Http\Data\Response;
use PHPAPILibrary\Http\Data\ResponseData;
use PHPAPILibrary\Rest\Http\In\Exception\UnableToTranslateRequestException;

class RegexPathParser implements PathParserInterface
{
    /**
     * @var string
     */
    private $pattern;

    /**
     * RegexPathParser constructor.
     * @param string $pattern
     */
    public function __construct(string $pattern)
    {
        if(@preg_match($pattern, null) === false) {
            throw new \RuntimeException("Unable to parse regex pattern", preg_last_error());
        }
        $this->pattern = $pattern;
    }

    /**
     * @param String $path
     * @return string[] - Keyed parts of match
     * @throws UnableToTranslateRequestException
     */
    protected function parsePath(String $path): array
    {
        $matches = [];
        if(preg_match($this->pattern, $path, $matches) === 0) {
            throw new UnableToTranslateRequestException(new Response(new ResponseData(400)), "Unable to parse request path: did not match regex");
        }

        return $matches;
    }

    /**
     * @param String $path
     * @return String
     * @throws UnableToTranslateRequestException
     */
    public function getResource(String $path): String
    {
        $parsedPath = $this->parsePath($path);

        if(!isset($parsedPath["resource"])) {
            throw new UnableToTranslateRequestException(new Response(new ResponseData(404)));
        }

        return $parsedPath["resource"];
    }

    /**
     * @param String $path
     * @return null|String
     * @throws UnableToTranslateRequestException
     */
    public function getElement(String $path): ?String
    {
        $parsedPath = $this->parsePath($path);

        return $parsedPath["element"] ?? null;
    }
}
