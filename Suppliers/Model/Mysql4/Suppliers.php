<?php
	class Plw_Suppliers_Model_Mysql4_Suppliers extends Mage_Core_Model_Mysql4_Abstract
	{
    		public function _construct()
		{
        		$this->_init('suppliers/suppliers', 'id');
    		}
	}

