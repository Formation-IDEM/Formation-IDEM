<?php
namespace App\Middlewares;

use \Core\Middleware;

class RedirectIfNotAuthentifiedMiddleware extends Middleware
{
    public function handle()
    {
        if( !auth()->check() )
        {
            return redirect(url('/login'))->flash('danger', 'Vous devez être connecté pour accéder à cette page');
        }
    }
}