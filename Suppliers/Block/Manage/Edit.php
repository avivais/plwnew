<?php
    class Plw_Suppliers_Block_Manage_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {
        public function __construct()
        {
            parent::__construct();

            $this->_objectId = 'id';
            $this->_blockGroup = 'suppliers';
            $this->_controller = 'manage';

            $this->_updateButton('save', 'label', Mage::helper('suppliers')->__('Save'));
            $this->_updateButton('delete', 'label', Mage::helper('suppliers')->__('Delete'));
            $this->_addButton('saveandcontinue', array(
                'label' => Mage::helper('suppliers')->__('Save And Continue Edit'),
                'onclick' => 'saveAndContinueEdit()',
                'class' => 'save',
            ), -100);

            $this->_formScripts[] = "
                function saveAndContinueEdit(){
                    editForm.submit($('edit_form').action+'back/edit/');
                }
            ";
        }

        public function getHeaderText() {
            if( Mage::registry('suppliers_data') && Mage::registry('suppliers_data')->getId() ) {
                return Mage::helper('suppliers')->__("Edit Supplier '%s'", $this->htmlEscape(Mage::registry('suppliers_data')->getName()));
            } else {
                return Mage::helper('suppliers')->__('Add Supplier');
            }
        }
    }
