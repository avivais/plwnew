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

/*      $fieldset->addField('adress1', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Adress'),
          'required'  => false,
          'name'      => 'adress1',
          ));

         $fieldset->addField('adress2', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Additional Adress'),
          'required'  => false,
          'name'      => 'adress2',
          ));

          $fieldset->addField('email_1', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Email'),
          'required'  => true,
          'name'      => 'email_1',
          ));
           $fieldset->addField('email_2', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Additional Email'),
          'required'  => false,
          'name'      => 'email_2',
          ));

                 $fieldset->addField('account', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Account'),
'required'  => false,
          'name'      => 'account',
          ));

           $fieldset->addField('phone', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Phone'),
          'required'  => false,
          'name'      => 'phone',
          ));

          $fieldset->addField('credit', 'text', array(
          'label'     => Mage::helper('suppliers')->__('Credit'),
          'required'  => true,
          'name'      => 'credit',
          ));
        $fieldset->addField('description', 'select', array(
            'label'     => Mage::helper('suppliers')->__('Description'),
            'name'      => 'description',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('suppliers')->__('Show'),
                ),

                array(
                    'value'     => 0,
                    'label'     => Mage::helper('suppliers')->__('Hide'),
                ),
            ),
        ));



      $fieldset->addField('names', 'select', array(
          'label'     => Mage::helper('suppliers')->__('Names'),
          'name'      => 'names',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('suppliers')->__('Show'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('suppliers')->__('Hide'),
              ),
          ),
      ));

      $fieldset->addField('comments', 'select', array(
          'label'     => Mage::helper('suppliers')->__('Comments'),
          'name'      => 'comments',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('suppliers')->__('Show'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('suppliers')->__('Hide'),
              ),
          ),
      ));

      $fieldset->addField('image', 'select', array(
          'label'     => Mage::helper('suppliers')->__('Image'),
          'name'      => 'image',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('suppliers')->__('Show'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('suppliers')->__('Hide'),
              ),
          ),
      ));

      $fieldset->addField('model', 'select', array(
          'label'     => Mage::helper('suppliers')->__('Models'),
          'name'      => 'model',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('suppliers')->__('Show'),
              ),

              array(
                  'value'     => 0,
                  'label'     => Mage::helper('suppliers')->__('Hide'),
              ),
              ),
        ));*/
      
      if ( Mage::getSingleton('adminhtml/session')->getSuppliersData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getSuppliersData());
          Mage::getSingleton('adminhtml/session')->setSuppliersData(null);
      } elseif ( Mage::registry('suppliers_data') ) {
          $form->setValues(Mage::registry('suppliers_data')->getData());
      }
      return parent::_prepareForm();
  }
}
