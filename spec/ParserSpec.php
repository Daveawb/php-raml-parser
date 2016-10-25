<?php

namespace spec\Daveawb\RAMLParser;

use Daveawb\RAMLParser\Definition;
use Daveawb\RAMLParser\Util\InputHandler;
use Daveawb\RAMLParser\Util\YamlParser;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SplFileInfo;

class ParserSpec extends ObjectBehavior
{
    function let(InputHandler $fileInfo, YamlParser $yaml)
    {
        $this->beConstructedWith($fileInfo, $yaml);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Daveawb\RAMLParser\Parser');
    }

    function it_parses_a_raml_file(YamlParser $yaml)
    {
        $yaml->parse(Argument::type(SplFileInfo::class), Argument::type('array'))
            ->shouldBeCalled()
            ->willReturn([]);

        $this->fromFile('file.raml')
            ->shouldHaveType(Definition::class);
    }

    function it_parses_a_raml_url()
    {
        $this->fromUrl('http://localhost.com/raml.raml')
            ->shouldHaveType(Definition::class);
    }
}
