<?php
namespace App\Exceptions;

/**
 * Class RouterException
 *
 * @package App\Exceptions
 */
class RouterException extends \Exception
{
    public function __construct($message = null, $code = 0)
    {
        if( $message )
        {
            return redirect(url('/'));
        }
    }
}