<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function validateHeader($header)
{
    $key = "Url-Encoding";

    if (array_key_exists($key, $header)) {

        $inComingHeader = $header[$key];
        $myHeader = 'utf-86';

        if ($inComingHeader == $myHeader) {
            return true;
        }
    }

    sendError("Request Url Not Found");

}
