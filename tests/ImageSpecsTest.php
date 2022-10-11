<?php

/*
 * trismegiste/phpunit-assert-picture
 */

use PHPUnit\Framework\TestCase;
use Trismegiste\PhpunitAssertPicture\ImageSpecs;

class ImageSpecsTest extends TestCase
{

    use ImageSpecs;

    public function getFixture(): array
    {
        return [
            [__DIR__ . '/fixtures/capture.png']
        ];
    }

    /** @dataProvider getFixture */
    public function testDimensionWithPathname(string $pic)
    {
        $this->assertDimension(364, 280, $pic);
    }

    /** @dataProvider getFixture */
    public function testDimensionWithResource(string $pic)
    {
        $gd = imagecreatefrompng($pic);
        $this->assertDimension(364, 280, $gd);
    }

    /** @dataProvider getFixture */
    public function testMimeType(string $pic)
    {
        $this->assertMimeType('image/png', $pic);
    }

    /** @dataProvider getFixture */
    public function testIntegrity(string $pic)
    {
        $this->assertIntegrity($pic);
    }

    /** @dataProvider getFixture */
    public function testPortrait(string $pic)
    {
        $this->assertPortait($pic);
    }

}
