<?php
namespace App\Middlewares;

use \Core\Middleware;

class RedirectIfAuthentifiedMiddleware extends Middleware
{
    public function handle()
    {
        if( auth()->check() )
        {
            return redirect(url('/'))->flash('danger', 'Vous êtes déjà connecté.');
        }
    }
}