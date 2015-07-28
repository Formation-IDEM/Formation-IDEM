<?php
if( !function_exists('url') )
{
    function url($url)
    {
        return 'index.php?url=' . $url;
    }
}