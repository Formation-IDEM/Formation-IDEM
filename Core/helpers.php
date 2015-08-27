<?php
/*  |-----------------------------------------------
 *  |   Fonctions utiles
 *  |-----------------------------------------------
 */

/**
 * Formate correctement les urls
 */
if( !function_exists('url') )
{
    function url($url)
    {
        return 'index.php?url=' . $url;
    }
}

/**
 * Méthode de redirection
 */
if( !function_exists('redirect') )
{
    function redirect($url)
    {
        return \Core\Http\Response::getInstance()->redirect($url);
    }
}

/**
 * Routes
 */
if( !function_exists('route') )
{
    function route()
    {
        return \App\App::getInstance()->route();
    }
}

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
        return \Core\Lang::getInstance($params[0])->get($params[1]);
    }
}

/**
 * Permert de charge un fichier de vue
 */
if( !function_exists('viewFile') )
{
    function viewFile($file, $params = [])
    {
        $file = str_replace('.', '/', $file);
        if( !empty($params) )
        {
            extract($params);
        }
        require_once(ROOT . 'App/Views/' . $file . '.phtml');
    }
}

/*  |-----------------------------------------------
 *  |   Appels rapides aux classes
 *  |-----------------------------------------------
 */

/**
 * Permet de générer une vue
 */
if( !function_exists('view') )
{
    function view($file, $data = [])
    {
        return \Core\Template::getInstance()->render($file, $data);
    }
}

/**
 * Retourne une instance de notre application
 */
if( !function_exists('app') )
{
    function app()
    {
        return \App\App::getInstance();
    }
}

/**
 * Retourne une instance de la classe Response
 */
if( !function_exists('response') )
{
    function response()
    {
        return \Core\Http\Response::getInstance();
    }
}

/**
 * Retourne une instance de la classe Request
 */
if( !function_exists('request') )
{
    function request()
    {
        return \Core\Http\Request::getInstance();
    }
}

/**
 * Helper pour la classe Config
 */
if( !function_exists('config') )
{
    function config($file)
    {
        return \Core\Config::getInstance($file);
    }
}

/**
 * Helper pour la classe session
 */
if( !function_exists('session') )
{
    function session()
    {
        return \Core\Session::getInstance();
    }
}

/*  |-----------------------------------------------
 *  |   Appels rapides aux factories
 *  |-----------------------------------------------
 */

if( !function_exists('collection') )
{
    function collection($collection)
    {
        return \Core\Factories\CollectionFactory::loadCollection($collection);
    }
}