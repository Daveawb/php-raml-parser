<?php

namespace Daveawb\RAMLParser\Util;

use Exception;
use SplFileInfo;

/**
 * Class YamlParser
 * @package Daveawb\RAMLParser\Util
 */
class YamlParser
{
    /**
     * @param SplFileInfo $file
     * @param array $callbacks
     * @return mixed
     * @throws Exception
     */
    public function parse(SplFileInfo $file, array $callbacks = [])
    {
        if ($file->isFile() && $file->isReadable()) {
            return yaml_parse_file($file->getPathname(), 0, $nDocs, $callbacks);
        }

        throw new Exception('File does not exist or is unreadable.');
    }
}
