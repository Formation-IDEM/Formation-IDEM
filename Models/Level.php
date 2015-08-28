<?php 

class Level extends Model
{
	// Attributs	
	
	protected $_trainer = null;

	protected $_matter = null;
		
	// Constructeur
	public function __construct()
	{
		parent::__construct();
		
		$this->_table = 'levels';
		$this->_fields['id'] = 0;
		$this->_fields['note'] = 1;
		$this->_fields['appreciation'] = '';
		$this->_fields['trainer_id'] = 0;
		$this->_fields['matter_id'] = 0;
	}
	
	public function getTrainer()
	{
		if(!$this->_trainer)
		{
			$this->_trainer = App::getModel('Trainer')->load($this->getData('trainer_id'));
		}
		return $this->_trainer;
	}
	
	public function getMatter()
	{
		if(!$this->_matter)
		{
			$this->_matter = App::getModel('Matter')->load($this->getData('matter_id'));
		}
		return $this->_matter;
	}
}
?>