<?php

    class Plw_Suppliers_Block_Manage_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {
        protected function _prepareForm() {
            $form = new Varien_Data_Form();
            $this->setForm($form);
            $fieldset = $form->addFieldset('suppliers_form', array('legend'=>Mage::helper('suppliers')->__('Supplier information')));

            $fieldset->addField('name', 'text', array(
                'label' => Mage::helper('suppliers')->__('Name'),
                'class' => 'required-entry',
                'required' => true,
                'name' => 'name',
            ));

            $fieldset->addField('address', 'text', array(
                'label' => Mage::helper('suppliers')->__('Address'),
                'required' => true,
                'name' => 'address',
            ));

            $fieldset->addField('phone', 'text', array(
                'label' => Mage::helper('suppliers')->__('Phone'),
                'required' => true,
                'name' => 'phone',
            ));

            $fieldset->addField('email_1', 'text', array(
                'label' => Mage::helper('suppliers')->__('Primary E-Mail'),
                'required' => true,
                'name' => 'email_1',
            ));
            
            $fieldset->addField('email_2', 'text', array(
                'label' => Mage::helper('suppliers')->__('Secondary E-Mail'),
                'required' => true,
                'name' => 'email_2',
            ));

      
            if (Mage::getSingleton('adminhtml/session')->getSuppliersData()) {
                $form->setValues(Mage::getSingleton('adminhtml/session')->getSuppliersData());
                Mage::getSingleton('adminhtml/session')->setSuppliersData(null);
            } elseif ( Mage::registry('suppliers_data') ) {
                $form->setValues(Mage::registry('suppliers_data')->getData());
            }
            return parent::_prepareForm();
        }
    }
