<?php
namespace Core;

use Core\Helpers\String;
use Core\Http\Request;
use Core\Factories\CollectionFactory;

/**
 * Class Validation
 * @package Core
 */
class Validation
{
    private $data;
    private $rules;
    private $request;

    private $errors = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
        $this->request = new Request();
        $this->response = new Response();
    }

    public function run()
    {
        $request = $this->request->all('POST');

        foreach( $this->rules as $key => $value )
        {
            if( array_key_exists($key, $request) )
            {
                //  Champ requis
                if( $value === 'required' && empty($request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' est requis.';
                }

                //  Champ email
                if( $value === 'email' && !filter_var($request[$key], FILTER_VALIDATE_EMAIL) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être une adresse email valide.';
                }

                //  Champ url
                if( $value === 'url' && !filter_var($request[$key], FILTER_VALIDATE_URL) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être une url valide.';
                }

                //  Champ alpha
                if( $value === 'alpha' && !preg_match('/^[a-zA-Z_]+$/', $request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type alpha';
                }

                //  Champ alphanumérique
                if( $value === 'alphanumeric' && !preg_match('/^[a-zA-Z0-9_]+$/', $request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type alphanumérique';
                }

                //  Champ numérique
                if( $value === 'numeric' && !is_numeric($request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type numérique.';
                }

                //  Champ confirmé
                if( $value === 'confirmed' && empty($request[$key . '_confirmed']) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de confirmé.';
                }

                //  Règles avec attributs
                if( strpos(':', $value) )
                {
                    $params = explode(':', $value);

                    //  Champ unique en base de donnée
                    if( $params[0] === 'unique' )
                    {
                        $result = CollectionFactory::loadCollection($params[1])
                            ->select('id')
                            ->from($params[1])
                            ->where($params[2], '=', $request[$params[2]])
                            ->limit(1);
                        if( count($result) > 1 )
                        {
                            $this->errors[] = 'Le champ ' . $request[$key] . ' doit être unique.';
                        }
                    }

                    //  Champs identiques
                    if( $params[0] === 'matches' )
                    {
                        if( $request[$params[0]] != $request[$params[1]] )
                        {
                            $this->errors[] = 'Les champs ' . $request[$params[1]] . ' et ' . $request[$params[2]] . ' doivent être identiques';
                        }
                    }

                    //  Champs différents
                    if( $params[0] === 'differs' )
                    {
                        if( $request[$params[0]] === $request[$params[1]] )
                        {
                            $this->errors[] = 'Les champs ' . $request[$params[1]] . ' et ' . $request[$params[2]] . ' ne doivent pas être identiques';
                        }
                    }

                }

                //  TRIM
                if( $value === 'trim' )
                {
                    $request[$key] = trim($request[$key]);
                }

                //  htmlentities
                if( $value === 'entities' )
                {
                    $request[$key] = htmlentities($request[$key]);
                }

                //  tolower
                if( $value === 'tolower' )
                {
                    $request[$key] = strtolower($request[$key]);
                }

                //  ucfirst
                if( $value === 'ucfirst' )
                {
                    $request[$key] = ucfirst($request[$key]);
                }

                //  slug
                if( $value === 'slug' )
                {
                    $request[$key] = String::url_slug($request[$key]);
                }
            }
        }

        if( !empty($this->errors) )
        {
            return false;
        }
        return true;
    }

    /**
     * Retourne un tableau contenant les erreurs
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Retourne une erreur précise
     *
     * @param $key
     * @return null
     */
    public function getError($key)
    {
        if( array_key_exists($this->errors[$key]) )
        {
            return $this->errors[$key];
        }
        return null;
    }

    /**
     * Détermine si un élément possède une erreur ou non
     *
     * @param $key
     * @return bool
     */
    public function hasError($key)
    {
        if( array_key_exists($this->errors[$key]) )
        {
            return true;
        }
        return false;
    }
}