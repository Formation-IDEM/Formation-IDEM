<?php
namespace Core\Html;

/**
 * Class Form
 *
 * @package Core\Html
 */
class Form
{
	private $data = [];

	public function __construct($data = [])
	{
		$this->data = $data;
	}

	/**
	 * Retourne un champ de formulaire de type input
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @param string $type
	 * @return string
	 */
	public function input($name = '', $label = '', $options = [], $type = 'text')
	{
		if( !empty($label) )
		{
			$label = '<label>' . $label . '</label>';
		}

		if( $type === 'textarea' )
		{
			$input = '<textarea name="' . $name . '" class="form-control"';
			foreach( $options as $key => $value )
			{
				$input .= ' ' . $key . '="' . $value . '"';
			}
			$input .= '>' . $this->getValue($name) . '</textarea>';
		}
		else
		{
			$input = '';
			if( isset($options['symbol']) )
			{
				$input = '<div class="input-group">';
				$input .= '<span class="input-group-addon">' . $options['symbol'] . '</span>';
			}

			if( isset($options['icon']) )
			{
				$input = '<div class="input-group">';
				$input .= '<span class="input-group-addon"><i class="fa fa-' . $options['icon'] . '"></i></span>';
			}

			$input .= '<input type="' . $type .'" name="' . $name  .'" class="form-control"';

			if( $type !== 'password' && $type !== 'hidden' )
			{
				$input .= ' value="' . $this->getValue($name) . '"';
			}

			foreach( $options as $key => $value )
			{
				if( $options[$key] != 'icon' || $options[$key] != 'symbol' )
				{
					$input .= ' ' . $key . '="' . $value . '"';
				}
			}
			$input .= '>';

			if( isset($options['symbol']) || isset($options['icon']) )
			{
				$input .= '</div>';
			}
		}

		if( response()->hasError($name) )
		{
			$input .= '<p class="text-danger">' . response()->error($name) . '</p>';
		}

		return $this->formGroup($label . $input);
	}
	
	/**
	 * Place le code dans un form-group
	 * 
	 * @param $html
	 * @return string
	 */
	public function formGroup($html)
	{
		return "<div class=\"form-group\">{$html}</div>";
	}

	/**
	 * Retourne un input de type text
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @return string
	 */
	public function text($name = '', $label = '', $options = [])
	{
		return $this->input($name, $label, $options, 'text');
	}

	/**
	 * Retourne un input de type number
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @return string
	 */
	public function number($name = '', $label = '', $options = [])
	{
		return $this->input($name, $label, $options, 'number');
	}

	/**
	 * Retourne un input de type hidden
	 *
	 * @param string $name
	 * @param string $value
	 * @return string
	 */
	public function hidden($name, $value)
	{
		return $this->input($name, '', ['value' => $value], 'hidden');
	}

	/**
	 * Retourne un input de type password
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @return string
	 */
	public function password($name = '', $label = '', $options = [])
	{
		return $this->input($name, $label, $options, 'password');
	}

	/**
	 * Retourne un input de type email
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @return string
	 */
	public function email($name = '', $label = '', $options = [])
	{
		return $this->input($name, $label, $options, 'email');
	}

	/**
	 * Retourne un textarea
	 *
	 * @param string $name
	 * @param string $label
	 * @param array  $options
	 * @return string
	 */
	public function textarea($name = '', $label = '', $options = [])
	{
		return $this->input($name, $label, $options, 'textarea');
	}

	/**
	 * Retourne un select formaté
	 *
	 * @param string 	$name
	 * @param string 	$label
	 * @param string	$select
	 * @param array 	$options
	 * @param string 	$title
	 * @param boolean 	$multiple
	 * @return string
	 */
	public function select($name, $label, $select = null, $options, $title = 'name', $multiple = false)
	{
		$label = '<label>' . $label . '</label>';
		$input = '<select name="' . $name . '" class="form-control"';
		if( $multiple )
		{
			$input .= ' multiple';
		}
		$input .= '>';

		foreach( $options as $key )
		{
			$input .= '<option value="' . $key->id . '"';
			if( is_object($key) )
			{
				if( ($key->id === $select) && !is_null($select) )
				{
					$input .= ' selected';
				}
				 $input .= '>' . $key->$title . '</option>';
			}
			else
			{
				if( $key === $select )
				{
					$input .= ' selected';
				}
				$input .= '>' . $key . '</option>';
			}
		}

		$input .= '</select>';
		return $this->formGroup($label . $input);
	}

	/**
	 * Génère un checkbox
	 *
	 * @param $name
	 * @param string $label
	 * @return string
	 */
	public function checkbox($name, $label = '')
	{
		$input = '<div class="checkbox">';
		if( is_array($name) )
		{
			$input .= '<label>';
			foreach( $name as $key => $value )
			{
				$input .= '<input name="' . $key . '" type="checkbox" value="' . $this->getValue($key) . '"> ';
			}
			$input .= $label;
			$input .= '</label>';
		}
		else
		{
			$input .= '<label>';
			$input .= '<input name="' . $name . '" type="checkbox" value="' . $this->getValue($name) . '"> ';
			$input .= $label;
			$input .= '</label>';
		}
		$input .= '</div>';

		return $input;
	}

	/**
	 * Génère un bouton de type radio
	 *
	 * @param $name
	 * @param string $label
	 * @return string
	 */
	public function radio($name, $label = '')
	{
		$input = '<div class="radio">';
		if( is_array($name) )
		{
			$input .= '<label>';
			foreach( $name as $key => $value )
			{
				$input .= '<input name="' . $key . '" type="radio" value="' . $this->getValue($key) . '"> ';
			}
			$input .= $label;
			$input .= '</label>';
		}
		else
		{
			$input .= '<label>';
			$input .= '<input name="' . $name . '" type="radio" value="' . $this->getValue($name) . '"> ';
			$input .= $label;
			$input .= '</label>';
		}
		$input . '</div>';

		return $input;
	}

	/**
	 * Boutton de soumission
	 *
	 * @param $value
	 * @param array $options
	 * @return string
	 */
	public function submit($value, $options = [])
	{
		$input = '<input type="submit" value="' . $value . '"';
		foreach( $options as $key => $value )
		{
			$input .= ' ' . $key . '="' . $value . '"';
		}
		$input .= '>';
		return $this->formGroup($input);
	}

	/**
	 * Génère un boutton html
	 *
	 * @param $name
	 * @param array $options
	 * @return string
	 */
	public function button($name, $options = [])
	{
		$button = '<button';
		foreach( $options as $key => $value )
		{
			$button .= ' ' . $key . '="' . $value . '"';
		}
		$button .= '>' . $name . '</button>';

		return $this->formGroup($button);
	}

	/**
	 * Si le formulaire a été saisi, on retourne la valeur du champ
	 *
	 * @param $name
	 * @return null|string
	 */
	public function getValue($name)
	{
		if( request()->postExists($name) )
		{
			return request()->getPost($name);
		}
		else
		{
			if( is_object($this->data) )
			{
				return $this->data->$name;
			}
			else
			{
				if( isset($this->data[$name]) )
				{
					return $this->data[$name];
				}
				return null;
			}
		}
	}

	/**
	 * Retourne checked si le champ est de type boolean true ou integer 1
	 *
	 * @param $name
	 * @return string
	 */
	public function getChecked($name)
	{
		if( request()->postExists($name) && ( request()->getPost($name) === 1 || request()->getPost($name) ===  true) )
		{
			return ' checked';
		}
		else
		{
			if( is_object($this->data) )
			{
				if( ($this->data->$name === true || $this->data->$name === 1) )
				{
					return ' checked';
				}
			}
			else
			{
				if( ($this->data[$name] === true || $this->data[$name] === 1) )
				{
					return ' checked';
				}
				return '';
			}
		}
	}
}