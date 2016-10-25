<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * @var array
     */
    protected $raml;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->parse = new \Daveawb\RAMLParser\Parser(
            new \Daveawb\RAMLParser\Util\InputHandler(),
            new \Daveawb\RAMLParser\Util\YamlParser()
        );
    }

    /**
     * @Given /^I have a file "([^"]*)"$/
     */
    public function iHaveAFile($file)
    {
        $path = realpath(__DIR__ . "/../raml/$file");

        $this->raml = $this->parse->fromFile($path);
    }

    /**
     * @Then /^The ([^"]*) is "([^"]*)"$/
     */
    public function thePropertyIs(string $method, string $value)
    {
        $method = static::camelCase($method);

        if (method_exists($this->raml, $method)) {
            if (! assert($received = $this->raml->$method() === $value)) {
                $this->expected($value)->received($received);
            };

            return true;
        }

        $this->expected('a valid method')->received($method);
    }

    /**
     * @param $value
     * @return $this
     */
    private function expected($value)
    {
        $this->expected = $value;

        return $this;
    }

    /**
     * @param $value
     * @throws Exception
     */
    private function received($value)
    {
        throw new Exception("Expected: $this->expected but received $value");
    }

    /**
     * @param $str
     * @param array $noStrip
     * @return mixed|string
     */
    public static function camelCase($str, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);
        $str = lcfirst($str);

        return $str;
    }
}
