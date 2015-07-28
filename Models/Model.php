<?php
include_once 'Controllers/Database.php';
/**
 * Model (Généralités) classe mère
 */
abstract class Model {


	protected $_table = '';
	protected $_fields = array();

	function __construct() {


	}

	public function load($id){

		/*$bdd = Database::getInstance()->getConnexion();
		$query = 'SELECT * FROM'.$this->_table.'WHERE id='.$id;
		$result = $bdd->query($query) or die ('Erreur');*/

		$query = 'SELECT * FROM '.$this->_table.' WHERE id='.$id;
		$bdd = Database::getInstance()->execute($query);
		//$this->_fields = $bdd;
		foreach ($bdd as $key => $value) {

			if (array_key_exists($key, $this->_fields)) {
				$this->_fields[$key]=$value;
			}
		}
		return $this;				
	}

	public function getData($cle){

		if (isset($this->_fields[$cle])) {

			return $this->_fields[$cle];

		}else{

			return '';
		}

	}

	public function store($table){

		//Stocker tableau dans fields

		foreach ($table as $key => $value) {
			
			if (array_key_exists($key, $this->_fields)) {
				
				$this->_fields[$key]=$value;

			}
		}


		return $this;

	}

	public function save(){


		if ($this->getData(1)) {

			$update = 'UPDATE '.$this->_table.' SET ';
			$compteur = 1;

			foreach ($this->_fields as $key => $value) {

				if ($compteur == sizeof($this->_fields)) {
					if (is_int($value)) {
						$update .= $key.'='.$value;
					}else{
						$update .= $key.'="'.$value.'"';
					}

				}else{
					if (!is_string($value)) {
						$update .= $key.'='.$value.',';
					}else{
						$update .= $key.'="'.$value.'",';
					}
				}

				$compteur++;
			}

			$update .= ' WHERE id = '.$this->getData("id");
			Database::getInstance()->execute($update);

		}else{

			$colonnes = '';
			$valeurs = '';
			$count = 1;

			foreach ($this->_fields as $cle => $valeur) {
				if( $cle == 'id' ) {
					$count++;
					continue;
				}

				$colonnes .= $cle;

				if (is_string($valeur)) {
					$valeurs .= "'".$valeur."'";


				}else{
					$valeurs .= $valeur;
				}

				if ($count < sizeof($this->_fields)) {
					$colonnes .= ' , ';
					$valeurs .= ' , ';

				}
				$count++;

			}

			$insert = 'INSERT INTO '.$this->_table.' ( '.$colonnes.') VALUES ( '.$valeurs.' )';	
			$res = Database::getInstance()->execute($insert);

			if( $res ) {
				$this->_fields['id'] = Database::getInstance()->getLastInsertId($this->_table);
				return $this;
			} else {
				return false;
			} 
			/*$lastId = Database::getInstance()->getLastInsertId($this->_table);
			var_dump($lastId);
			$this->_fields['id']= $lastId;*/
			//Prendre la dernière id pour ne pas faire un create à chaque fois
		}		
	}

	public function delete(){

		$query = 'DELETE FROM '.$this->_table.' WHERE id='.$this->_fields['id'];
		$result = Database::getInstance()->getResultats($query);
		return $result;

	}

	public function __set($key, $value){

		$this->{$key} = $value;
		return $this;

	}

	public function __get($key)
	{

		return $this->{$key};

	}

}
?>