<?php

class Image
{

    static function show($img)
    {

        header("Content-Type: image/jpeg");
        // чтобы не кэшировалось изорбражение
        header("Expires: on, 01 Jan 1970 00:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        $fileHeader = fopen($img, 'r', false);
        $response = "";

        if ($fileHeader) {
            $response = stream_get_contents($fileHeader);
            fclose($fileHeader);
        }

        exit($response);
    }

}