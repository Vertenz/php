<?php

    function makePreview($img){
        $imagickSrc = new Imagick($img);
        $compressionList = [Imagick::COMPRESSION_JPEG2000
        ];

        $imagickDst = new Imagick();
        $imagickDst->setCompression(80);
        $imagickDst->setCompressionQuality(80);
        $imagickDst->newPseudoImage(
            $imagickSrc->getImageWidth(),
            $imagickSrc->getImageHeight(),
            'canvas:white'
        );
        $imagickDst->compositeImage(
            $imagickSrc,
            Imagick::COMPOSITE_ATOP,
            0,
            0
        );
        $imagickDst->adaptiveResizeImage(250,250);
        $imagickDst->setImageFormat("jpg");
        $imagickDst->writeImage($img);

        return $imagickSrc;
    }
