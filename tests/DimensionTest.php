<?php

/*
 * trismegiste/phpunit-assert-picture
 */

use PHPUnit\Framework\TestCase;
use Trismegiste\PhpunitAssertPicture\Dimension;

class DimensionTest extends TestCase
{

    use Dimension;

    public function testDimensionWithPathname()
    {
        $pic = __DIR__ . '/fixtures/capture.png';
        $this->assertDimension(364, 280, $pic);
    }

}
