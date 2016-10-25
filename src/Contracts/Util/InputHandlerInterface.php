<?php
namespace Daveawb\RAMLParser\Contracts\Util;


/**
 * Class InputHandler
 * @package Daveawb\RAMLParser\Util
 */
interface InputHandlerInterface
{
    /**
     * @param string $file
     * @return \SplFileInfo
     */
    public function for (string $file);
}