<?php

namespace Daveawb\RAMLParser\Util;

use Daveawb\RAMLParser\Contracts\Util\InputHandlerInterface;

/**
 * Class InputHandler
 * @package Daveawb\RAMLParser\Util
 */
class InputHandler implements InputHandlerInterface
{
    /**
     * @param string $file
     * @return \SplFileInfo
     */
    public function for(string $file)
    {
        return new \SplFileInfo($file);
    }
}
