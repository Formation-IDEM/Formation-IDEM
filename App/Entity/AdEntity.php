<?php
namespace Entity;
/**
 * AdEntity.php
 */

use \Core\Entity;

class AdEntity extends Entity
{
	public function getUrl()
	{
		return 'index.php?p=ad&id=' . $this->id;
	}
}
