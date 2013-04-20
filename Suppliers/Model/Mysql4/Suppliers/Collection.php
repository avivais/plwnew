<?php
	class Plw_Suppliers_Model_Mysql4_Suppliers_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
	{
    		public function _construct()
    		{
        		parent::_construct();
        		$this->_init('suppliers/suppliers');
    		}
	}

