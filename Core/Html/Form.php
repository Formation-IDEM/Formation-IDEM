<?php
namespace Core\Html;
/**
 * Form.php
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
		$label = empty($label) ? ucfirst($name) : $label;
		$label = '<label>' . $label . '</label>';
		if( $type === 'textarea' )
		{
			$input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '<textarea>';
		}
		else
		{
			$input = '<input type="' . $type .'" name="' . $name . '" value="' . $this->getValue($name) .'" class="form-control">';
		}
		
		return $this->formGroup($input);
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
		return $this->input($name, $label, $options, 'email');
	}

	/**
	 * Si le formulaire a été saisi, on retourne la valeur du champ
	 *
	 * @param $name
	 * @return null|string
	 */
	public function getValue($name)
	{
		if( isset($_POST[$name]) )
		{
			return htmlspecialchars($_POST[$name]);
		}
		else
		{
			if( array_key_exists($this->data[$name]) )
			{
				return $this->data[$name];
			}
			return null;
		}
	}
}