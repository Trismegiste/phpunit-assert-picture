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

    public function assertIntegrity(string $pic, string $message = 'Picture id corrupted'): void
    {
        $gd = imagecreatefromstring(file_get_contents($pic));
        $this->assertTrue(($gd !== false) && (imagesx($gd) > 0) && (imagesy($gd) > 0), $message);
    }

    public function assertPortait($pic, string $message = 'Picture is not in portrait mode'): void
    {
        if (is_string($pic)) {
            list($width, $height) = getimagesize($pic);
            $this->assertGreaterThan($width, $height, $message);
        } else {
            $this->assertGreaterThan(imagesx($pic), imagesy($pic), $message);
        }
    }

    public function assertLandscape($pic, string $message = 'Picture is not in landscape mode'): void
    {
        if (is_string($pic)) {
            list($width, $height) = getimagesize($pic);
            $this->assertLessThan($width, $height, $message);
        } else {
            $this->assertLessThan(imagesx($pic), imagesy($pic), $message);
        }
    }

}
