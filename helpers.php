<?php
if( !function_exists('url') )
{
    function url($url)
    {
        return htmlspecialchars($url);
    }
}