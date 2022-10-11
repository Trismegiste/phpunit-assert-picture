<?php

/*
 * trismegiste/phpunit-assert-picture
 */

namespace Trismegiste\PhpunitAssertPicture;

/**
 * Picture dimension, format and specification assertions
 */
trait ImageSpecs
{

    public function assertPictureHeight(int $target, $pic, string $message = ''): void
    {
        if (is_string($pic)) {
            list(, $height) = getimagesize($pic);
            $this->assertEquals($target, $height, $message);
        } else {
            $this->assertEquals($target, imagesy($pic), $message);
        }
    }

    public function assertPictureWidth(int $target, $pic, string $message = ''): void
    {
        if (is_string($pic)) {
            list($width) = getimagesize($pic);
            $this->assertEquals($target, $width, $message);
        } else {
            $this->assertEquals($target, imagesx($pic), $message);
        }
    }

    public function assertDimension(int $width, int $height, $pic, string $message = ''): void
    {
        $this->assertPictureHeight($height, $pic, $message);
        $this->assertPictureWidth($width, $pic, $message);
    }

    public function assertMimeType(string $target, string $pic, string $message = ''): void
    {
        list(,, $type) = getimagesize($pic);
        $this->assertEquals($target, image_type_to_mime_type($type), $message);
    }

}