<?php

/*
 * trismegiste/phpunit-assert-picture
 */

namespace Trismegiste\PhpunitAssertPicture;

/**
 * Picture dimansion assertions
 */
trait Dimension
{

    public function assertPictureHeight(int $target, $pic): void
    {
        if (is_string($pic)) {
            $source = imagecreatefromstring(file_get_contents($pic));
        } else {
            $source = $pic;
        }

        $this->assertEquals($target, imagesy($source));
    }

    public function assertPictureWidth(int $target, $pic): void
    {
        if (is_string($pic)) {
            $source = imagecreatefromstring(file_get_contents($pic));
        } else {
            $source = $pic;
        }

        $this->assertEquals($target, imagesx($source));
    }

    public function assertDimension(int $width, int $height, $pic): void
    {
        $this->assertPictureHeight($height, $pic);
        $this->assertPictureWidth($width, $pic);
    }

}
