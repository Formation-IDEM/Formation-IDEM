<?php
namespace Core;

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
                if( $value === 'required' && empty($request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' est requis.';
                }

                if( $value === 'email' && !filter_var($request[$key], FILTER_VALIDATE_EMAIL) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être une adresse email valide.';
                }

                if( $value === 'alpha' && !preg_match('/^[a-zA-Z_]+$/', $request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type alpha';
                }

                if( $value === 'alphanumeric' && !preg_match('/^[a-zA-Z0-9_]+$/', $request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type alphanumérique';
                }

                if( $value === 'numeric' && !is_numeric($request[$key]) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de type numérique.';
                }

                if( $value === 'confirmed' && empty($request[$key . '_confirmed']) )
                {
                    $this->errors[] = 'Le champ ' . $request[$key] . ' doit être de confirmé.';
                }

                if( strpos(':', $value) )
                {
                    $params = explode(':', $value);
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

                    if( $params[0] === 'matches' )
                    {
                        if( $request[$params[0]] != $request[$params[1]] )
                        {
                            $this->errors[] = 'Les champs ' . $request[$params[1]] . ' et ' . $request[$params[2]] . ' doivent être identiques';
                        }
                    }

                    if( $params[0] === 'differs' )
                    {
                        if( $request[$params[0]] === $request[$params[1]] )
                        {
                            $this->errors[] = 'Les champs ' . $request[$params[1]] . ' et ' . $request[$params[2]] . ' ne doivent pas être identiques';
                        }
                    }

                }

                if( $value === 'trim' )
                {
                    $request[$key] = trim($request[$key]);
                }

                if( $value === 'clean' )
                {
                    $request[$key] = htmlentities($request[$key]);
                }

                if( $value === 'tolower' )
                {
                    $request[$key] = strtolower($request[$key]);
                }

                if( $value === 'ucfirst' )
                {
                    $request[$key] = ucfirst($request[$key]);
                }

                if( $value === 'slug' )
                {
                    $request[$key] = str_replace(' ', '-', $request[$key]);
                }
            }
        }

        if( !empty($errors) )
        {
            //return $this->response->
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
}