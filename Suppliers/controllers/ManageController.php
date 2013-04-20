<?php
	class Plw_Suppliers_ManageController extends Mage_Adminhtml_Controller_Action
	{
		public function indexAction()
		{
			$this->loadLayout()
				->_setActiveMenu('suppliers/items');
			$this->renderLayout();
		}
	}

