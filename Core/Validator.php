<?php
namespace Core;

/**
 * Class Validator
 * @package Core
 */
class Validator
{
    private $rules = [];
    private $errors = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function run()
    {
        $request = request()->all('POST');
        foreach( $this->rules as $key => $value )
        {
            $rule = explode('|', $value);
            foreach( $rule as $r )
            {
                if( array_key_exists($key, $request) )
                {
                    //  Champ requis
                    if ($r === 'required' && empty($request[$key]))
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' est requis.';
                    }

                    //  Champ email
                    if( $r === 'email' && !filter_var($request[$key], FILTER_VALIDATE_EMAIL) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être une adresse email valide.';
                    }

                    //  Champ url
                    if( $r === 'url' && !filter_var($request[$key], FILTER_VALIDATE_URL) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être une url valide.';
                    }

                    //  Champ alpha
                    if( $value === 'alpha' && !preg_match('/^[a-zA-Z_]+$/', $request[$key]) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être de type alpha';
                    }

                    //  Champ alphanumérique
                    if( $r === 'alphanumeric' && !preg_match('/^[a-zA-Z0-9_]+$/', $request[$key]) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être de type alphanumérique';
                    }

                    //  Champ numérique
                    if( $r === 'numeric' && !is_numeric($request[$key]) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être de type numérique.';
                    }

                    //  Champ confirmé
                    if( $r === 'confirmed' && empty($request[$key . '_confirmed']) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être de confirmé.';
                    }

                    //  Numéro de téléphone
                    if( $r === 'phone' &&
                        !preg_match('/^0[1-9]([-\/. ]?[0-9]{2}){4}$/', $request[$key]))
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être un numéro de téléphone valide';
                    }

                    //  Vérification des images
                    if( $r === 'image' && !in_array(['jpg', 'jpeg', 'png'], pathinfo($_FILES[$key], PATHINFO_EXTENSION)) )
                    {
                        $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être une image de type JPG, JPEG ou PNG.';
                    }

                    //  Règles avec attributs
                    if( strpos(':', $r) )
                    {
                        $params = explode(':', $r);

                        //  Champ unique en base de donnée
                        if( $params[0] === 'unique' )
                        {
                            //  Selon si l'id est renseigné
                            if( isset($params[2]) )
                            {
                                $result = CollectionFactory::loadCollection($params[1])
                                    ->select('id')
                                    ->from($params[1])
                                    ->where($params[2], '=', $request[$params[2]])
                                    ->limit(1);
                            }
                            else
                            {
                                $result = CollectionFactory::loadCollection($params[1])
                                    ->select('id')
                                    ->from($params[1])
                                    ->limit(1);
                            }

                            if( count($result) >= 1 )
                            {
                                $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit être unique.';
                            }
                        }

                        if( $params[0] === 'size' )
                        {

                        }

                        //  Longueur minimum
                        if( $params[0] === 'min' )
                        {
                            if( strlen($request[$params[0]]) < $params[1] )
                            {
                                $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit compter ' . $params[1] . ' caractères au minimum.';
                            }
                        }

                        //  Longueur maximum
                        if( $params[0] === 'max' )
                        {
                            if( strlen($request[$params[0]]) > $params[1] )
                            {
                                $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit compter ' . $params[1] . ' caractères au maximum.';
                            }
                        }

                        //  Longueur exacte
                        if( $params[0] === 'equals' )
                        {
                            if( strlen($request[$params[0]]) != $params[1] )
                            {
                                $this->errors[$key] = 'Le champ ' . lang('validation.' . $key) . ' doit compter ' . $params[1] . ' caractères.';
                            }
                        }

                        //  Champs identiques
                        if( $params[0] === 'matches' )
                        {
                            if( $request[$params[0]] != $request[$params[1]] )
                            {
                                $this->errors[$key] = 'Les champs ' . lang('validation.' . $request[$params[1]]) . ' et ' . lang('validation.' . $request[$params[2]]) . ' doivent être identiques';
                            }
                        }

                        //  Champs différents
                        if( $params[0] === 'differs' )
                        {
                            if( $request[$params[0]] === $request[$params[1]] )
                            {
                                $this->errors[$key] = 'Les champs ' . lang('validation.' . $request[$params[1]]) . ' et ' . lang('validation.' . $request[$params[2]]) . ' ne doivent pas être identiques';
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
        }

        if( $this->errors )
        {
            response()->errors($this->errors);
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
        if( isset($this->errors[$key]) )
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