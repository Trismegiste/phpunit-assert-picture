<?php

/*
 * trismegiste/phpunit-assert-picture
 */

use PHPUnit\Framework\TestCase;
use Trismegiste\PhpunitAssertPicture\TextContent;

class TextContentTest extends TestCase
{

    use TextContent;

    public function testFixtures()
    {
        $this->assertPictureContainsString('distinguishable', __DIR__ . '/fixtures/capture.png');
    }

}
