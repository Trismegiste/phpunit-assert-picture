<?php

/*
 * trismegiste/phpunit-assert-picture
 */

namespace Trismegiste\PhpunitAssertPicture;

use thiagoalessio\TesseractOCR\TesseractOCR;

/**
 * 
 */
trait TextContent
{

    public function assertPictureContainsString($text, $picture): void
    {
        $ocr = new TesseractOCR();
        if (is_string($picture)) {
            $ocr->imageData(file_get_contents($picture), filesize($picture));
        } else {
            ob_start();
            imagepng($picture);
            $ocr->imageData(ob_get_clean());
        }
        $extract = $ocr->run();

        $this->assertStringContainsString($extract, $text);
    }

}
