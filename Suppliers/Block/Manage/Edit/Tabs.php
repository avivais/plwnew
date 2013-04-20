<?php
    class Plw_Suppliers_Block_Manage_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {
        public function __construct() {
            parent::__construct();
            $this->setId('suppliers_tabs');
            $this->setDestElementId('edit_form');
            $this->setTitle(Mage::helper('suppliers')->__('Supplier Information'));
        }

        protected function _beforeToHtml() {
            $this->addTab('form_section', array(
            'label' => Mage::helper('suppliers')->__('Supplier Information'),
            'title' => Mage::helper('suppliers')->__('Supplier Information'),
            'content' => $this->getLayout()->createBlock('suppliers/manage_edit_tab_form')->toHtml(),
            ));
            
            return parent::_beforeToHtml();
        }
    }
