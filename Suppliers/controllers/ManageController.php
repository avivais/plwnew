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
        
        public function saveAction() {
            $data = $this->getRequest()->getPost();
            if ($data) {
                $id = $this->getRequest()->getParam('id');
                $model = Mage::getModel('suppliers/suppliers')->load($id);
                $createdTime = $model->getCreatedTime();
                $updateTime = $model->getUpdateTime();
                
                $model = Mage::getModel('suppliers/suppliers');
                $model->setData($data)
                    ->setId($this->getRequest()->getParam('id'));
                
                try {
                    if ($createdTime == NULL || $updateTime == NULL) {
                        $model->setCreatedTime(now())
                            ->setUpdateTime(now());
                    } else {
                        $model->setUpdateTime(now());
                        $model->setCreatedTime($createdTime);
                    }
                    $model->save();
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('suppliers')->__('Item was successfully saved'));
                    Mage::getSingleton('adminhtml/session')->setFormData(false);
                    if ($this->getRequest()->getParam('back')) {
                        $this->_redirect('*/*/edit', array('id' => $model->getId()));
                        return;
                    }
                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFormData($data);
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
            }
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('suppliers')->__('Unable to find item to save'));
            $this->_redirect('*/*/');
        }

        public function deleteAction() {
            if( $this->getRequest()->getParam('id') > 0 ) {
                try {
                    $model = Mage::getModel('suppliers/suppliers');
                    $model->setId($this->getRequest()->getParam('id'))
                        ->delete();
                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                    $this->_redirect('*/*/');
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                }
            }
            $this->_redirect('*/*/');
        }
    }

