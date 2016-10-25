<?php

namespace Daveawb\RAMLParser;

use Daveawb\RAMLParser\Contracts\ParseRaml;
use Daveawb\RAMLParser\Util\InputHandler;
use Daveawb\RAMLParser\Util\YamlParser;
use Exception;

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
     * @var InputHandler
     */
    private $input;

    /**
     * @var YamlParser
     */
    private $yamlParser;

    /**
     * Parser constructor.
     * @param InputHandler $input
     */
    public function __construct(InputHandler $input, YamlParser $yamlParser)
    {
        $this->input = $input;
        $this->yamlParser = $yamlParser;
    }

    /**
     * Parse a RAML file from a URL.
     *
     * @param string $url
     * @return string
     */
    public function fromUrl(string $url): Definition
    {
        return new Definition([]);
    }

    /**
     * Parse a RAML file from a path.
     *
     * @param string $filePath
     * @return Definition|string
     * @throws Exception
     */
    public function fromFile(string $filePath): Definition
    {
        $file = $this->input->for($filePath);

        $data = $this->yamlParser->parse($file, []);

        return new Definition($data);
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
        $parser = new static(new InputHandler(), new YamlParser());

        if (method_exists($parser, $method)) {
            return call_user_func_array([$parser, $method], $args);
        }
    }
}
