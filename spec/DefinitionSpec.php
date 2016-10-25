<?php

namespace spec\Daveawb\RAMLParser;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DefinitionSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            'title' => 'Title',
            'description' => 'Description',
            'base_uri' => 'http://localhost'
        ]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Daveawb\RAMLParser\Definition');
    }

    function it_can_get_a_title()
    {
        $this->title()
            ->shouldBe('Title');
    }

    function it_can_get_a_description()
    {
        $this->description()
            ->shouldBe('Description');
    }

    function it_can_get_a_default_description()
    {
        $this->beConstructedWith([]);

        $this->description('default')
            ->shouldBe('default');
    }

    function it_can_get_a_base_uri()
    {
        $this->baseUri()
            ->shouldBe('http://localhost');
    }

    function it_can_get_a_default_base_uri()
    {
        $this->beConstructedWith([]);

        $this->baseUri('http://anotherhost.dev')
            ->shouldBe('http://anotherhost.dev');
    }
}
