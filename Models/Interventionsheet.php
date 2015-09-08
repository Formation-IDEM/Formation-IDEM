<?php

class Interventionsheet extends Model
{
	protected $_participation;
	protected $_ref_pedago;

	public function __construct()
	{
		parent::__construct();
		$this->_table = 'interventionsheets';

		$this->_fields['id'] = 0;
		$this->_fields['date'] = date('Y-m-d', time());
		$this->_fields['total_hours'] = 0;
		$this->_fields['morning'] = 1;
		$this->_fields['afternoon'] = 1;
		$this->_fields['observations'] = '';
		$this->_fields['ref_pedago_id'] = 0;
		$this->_fields['participation_id'] = 0;
	}

	public function getParticipation()
	{
		if(!$this->_participation)
		{
			$this->_participation = App::getModel('Participation')->getFilteredItems('participation_id', $this->_fields['id']);
		}
		return $this->_participation;
	}

	public function getRefPedago()
	{
		if(!$this->_ref_pedago)
		{
			$this->_ref_pedago = App::getModel('RefPedago')->load($this->_fields['ref_pedago_id']);
		}
		return $this->_ref_pedago;
	}

}

?>