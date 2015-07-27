<?php
namespace App\Middlewares;

use \Core\Middleware;

class RedirectIfAuthentifiedMiddleware extends Middleware
{
    public function handle()
    {
        if( $_SERVER['REMOTE_ADDR'] === '192.168.20.1' )
        {
            die('salut !' . $_SERVER['REMOTE_ADDR']);
        }
    }
}