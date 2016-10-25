<?php

namespace Daveawb\RAMLParser\Contracts;

use Daveawb\RAMLParser\Definition;

/**
 * Interface ParseRaml
 */
interface ParseRaml
{
    /**
     * Parse a RAML file from a URL.
     *
     * @param string $url
     * @return string
     */
    public function fromUrl(string $url): Definition;

    /**
     * Parse a RAML file from a path.
     *
     * @param string $filePath
     * @return string
     */
    public function fromFile(string $filePath): Definition;
}