<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('display'))
{
    function display($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
    }   
}