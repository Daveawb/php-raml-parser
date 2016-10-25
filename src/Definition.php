<?php

namespace Daveawb\RAMLParser;

/**
 * Class Definition
 * @package Daveawb\RAMLParser
 */
class Definition
{
    /**
     * @var array
     */
    protected $data;

    /**
     * Definition constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string $default
     * @return string
     */
    public function title(): string
    {
        return $this->getDataItem('title');
    }

    /**
     * @param string $default
     * @return string
     */
    public function description(string $default = ''): string
    {
        return $this->getDataItem('description', $default);
    }

    /**
     * @param string $default
     * @return string
     */
    public function baseUri(string $default = ''): string
    {
        return $this->getDataItem('base_uri', $default);
    }

    /**
     * @param string $item
     * @param null $default
     * @return mixed|null
     */
    protected function getDataItem(string $item, $default = null)
    {
        if (array_key_exists($item, $this->data)) {
            return $this->data[$item];
        }

        return $default;
    }
}
