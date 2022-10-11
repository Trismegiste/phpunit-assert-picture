<?php

/*
 * trismegiste/phpunit-assert-picture
 */

use PHPUnit\Framework\TestCase;
use Trismegiste\PhpunitAssertPicture\TextContent;

class TextContentTest extends TestCase
{

    use TextContent;

    public function getFixture(): array
    {
        return [
            [__DIR__ . '/fixtures/capture.png']
        ];
    }

    /** @dataProvider getFixture */
    public function testOcrFromPathname(string $pic)
    {
        $this->assertPictureContainsString('distinguishable', $pic);
    }

    /** @dataProvider getFixture */
    public function testOcrFromPResource(string $pic)
    {
        $gd = imagecreatefrompng($pic);
        $this->assertPictureContainsString('distinguishable', $gd);
    }

}
