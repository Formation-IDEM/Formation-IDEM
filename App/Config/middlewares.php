<?php
/**
 * Liste des middlewares
 */
return [
    'guest' =>  'RedirectIfAuthentified',
    'auth'  =>  'RedirectIfNotAuthentified',
];