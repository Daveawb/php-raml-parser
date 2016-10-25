<?php

namespace spec\Daveawb\RAMLParser\Util;

use Exception;
use PhpSpec\ObjectBehavior;

class YamlParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Daveawb\RAMLParser\Util\YamlParser');
    }

    function it_should_parse_a_yaml_file(\SplFileInfo $splFileInfo)
    {
        $splFileInfo->isFile()
            ->shouldBeCalled()
            ->willReturn(true);

        $splFileInfo->isReadable()
            ->shouldBeCalled()
            ->willReturn(true);

        $splFileInfo->getPathname()
            ->shouldBeCalled()
            ->willReturn(__DIR__ . '/example.raml');

        $this->parse($splFileInfo, [])
            ->shouldBeArray();
    }

    function it_should_throw_exception_with_unreadable_file(\SplFileInfo $splFileInfo)
    {
        $splFileInfo->isFile()
            ->shouldBeCalled()
            ->willReturn(true);

        $splFileInfo->isReadable()
            ->shouldBeCalled()
            ->willReturn(false);

        $this->shouldThrow(Exception::class)->during('parse', [$splFileInfo, []]);
    }

    function it_should_throw_exception_when_file_does_not_exist(\SplFileInfo $splFileInfo)
    {
        $splFileInfo->isFile()
            ->shouldBeCalled()
            ->willReturn(false);

        $this->shouldThrow(Exception::class)->during('parse', [$splFileInfo, []]);
    }
}
