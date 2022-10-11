<?php

/*
 * trismegiste/phpunit-assert-picture
 */

namespace Trismegiste\PhpunitAssertPicture;

use GdImage;
use thiagoalessio\TesseractOCR\TesseractOCR;

/**
 * 
 */
trait TextContent
{

    public function assertPictureContainsString(string $needle, string|GdImage $picture, string $message = ''): void
    {
        $ocr = new TesseractOCR();
        if (is_string($picture)) {
            $ocr->imageData(file_get_contents($picture), filesize($picture));
        } else {
            ob_start();
            imagepng($picture);
            $content = ob_get_clean();
            $ocr->imageData($content, strlen($content));
        }
        $extract = $ocr->run();

        $this->assertStringContainsString($needle, $extract, $message);
    }

}
