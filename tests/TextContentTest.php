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
            [__DIR__ . '/fixtures/capture.png', 'distinguishable'],
            [__DIR__ . '/fixtures/sample.png', 'YOLO']
        ];
    }

    /** @dataProvider getFixture */
    public function testOcrFromPathname(string $pic, string $needle)
    {
        $this->assertPictureContainsString($needle, $pic);
    }

    /** @dataProvider getFixture */
    public function testOcrFromPResource(string $pic, string $needle)
    {
        $gd = imagecreatefrompng($pic);
        $this->assertPictureContainsString($needle, $gd);
    }

}
