<?php
	class Plw_Suppliers_Block_Manage extends Mage_Adminhtml_Block_Widget_Grid_Container
	{
  		public function __construct()
  		{
    			$this->_controller = 'manage';
    			$this->_blockGroup = 'suppliers';
    			$this->_headerText = Mage::helper('suppliers')->__('Manage Suppliers');
    			$this->_addButtonLabel = Mage::helper('suppliers')->__('Add Supplier');
    			parent::__construct();
  		}
	}

