<?php
    class Plw_Suppliers_ManageController extends Mage_Adminhtml_Controller_Action {
        public function indexAction() {
            $this->loadLayout()
                ->_setActiveMenu('suppliers/items');
            $this->renderLayout();
        }

        public function editAction() {
            $id = $this->getRequest()->getParam('id');
            $model = Mage::getModel('suppliers/suppliers')->load($id);
            if ($model->getId() || $id == 0) {
                $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
                if (!empty($data)) {
                    $model->setData($data);
                }
                Mage::register('suppliers_data', $model);
                $this->loadLayout();
                $this->_setActiveMenu('suppliers/items');
                $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
                $this->_addContent($this->getLayout()->createBlock('suppliers/manage_edit'))
                    ->_addLeft($this->getLayout()->createBlock('suppliers/manage_edit_tabs'));
                $this->renderLayout();
            } else {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('suppliers')->__('Item does not exist'));
                $this->_redirect('*/*/');
            }
        }

        public function newAction() {
            $this->_forward('edit');
        }
    }

