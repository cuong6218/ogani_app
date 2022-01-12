<?php

use Illuminate\Support\Facades\Request;

function formatText($text)
{
    return $text . "Hello world";
}
function formatPhoneNumber($phone)
{
    return preg_replace('/^(\d{2})(\d{3})(\d{4})$/i', '0$1.$2.$3', $phone);;
}
function checkCurrentUrl($url)
{
    if (Request::route()->getName() == $url) return true;
    return false;
}
