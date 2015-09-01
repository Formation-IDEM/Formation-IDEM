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

/**
 * Affiche un bandeau de navigation
 */
if( !function_exists('nav') )
{
    function nav($array)
    {
        $url = '<ol class="breadcrumb">';
        $url .= '<li><i class="fa fa-dashboard"></i> <a href="index.php">Accueil</a></li>';

        $count = 0;
        foreach( $array as $key => $value )
        {
            $class = (count($array) === $count ) ? ' class="active"' : '';
            $url .= '<li' . $class . '><a href="' . $value . '">' . $key . '</a></li>';
            $count++;
        }
        $url .= '</ol>';
        return $url;
    }
}