<?php
/**
 * Helper pour les clés de langues
 * Retourne une clé de langue avec deux paramètres
 * comme ceci : fichier.cle
 */
if( !function_exists('lang') )
{
    function lang($string)
    {
        $params = explode('.', $string);
        return Lang::getInstance($params[0])->get($params[1]);
    }
}
