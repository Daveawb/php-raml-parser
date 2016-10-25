<?php

namespace Daveawb\RAMLParser;

use Daveawb\RAMLParser\Contracts\ParseRaml;

/**
 * Class Parser
 * @package Daveawb\RAMLParser
 *
 * @example
 * $parse = new \Daveawb\RAMLParser\Parser();
 * $raml = $parse->fromFile('raml/api.raml');
 */
class Parser implements ParseRaml
{
    /**
     * Parse a RAML file from a URL.
     *
     * @param string $url
     * @return string
     */
    public function fromUrl(string $url): string
    {
        // TODO: Implement parseUrl() method.
    }

    /**
     * Parse a RAML file from a path.
     *
     * @param string $filePath
     * @return string
     */
    public function fromFile(string $filePath): string
    {
        // TODO: Implement parseFile() method.
    }

    /**
     * Allow static overloading of the methods.
     *
     * @param string $method
     * @param array $args
     * @return mixed
     */
    public static function __callStatic(string $method, array $args = [])
    {
        $parser = new static;

        if (method_exists($parser, $method)) {
            return call_user_func_array([$parser, $method], $args);
        }
    }
}
