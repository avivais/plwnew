<?php
	class Plw_Suppliers_Block_Manage_Grid extends Mage_Adminhtml_Block_Widget_Grid
	{
  		public function __construct()
  		{
      			parent::__construct();
      			$this->setId('suppliersGrid');
      			$this->setDefaultSort('id');
      			$this->setDefaultDir('ASC');
      			$this->setSaveParametersInSession(true);
  		}

  		protected function _prepareCollection()
  		{
      			$collection = Mage::getModel('suppliers/suppliers')->getCollection();
      			$this->setCollection($collection);
      			return parent::_prepareCollection();
  		}

  		protected function _prepareColumns()
  		{
	      		$this->addColumn('id', array(
          			'header'    => Mage::helper('suppliers')->__('ID'),
          			'align'     =>'center',
          			'width'     => '50px',
          			'index'     => 'id',
      			));

      			$this->addColumn('name', array(
          			'header'    => Mage::helper('suppliers')->__('Name'),
          			'index'     => 'name',
      			));

                        $this->addColumn('address', array(
                                'header'    => Mage::helper('suppliers')->__('Address'),
                                'index'     => 'address',
                        ));

                        $this->addColumn('phone', array(
                                'header'    => Mage::helper('suppliers')->__('Phone'),
                                'index'     => 'phone',
                        ));

                        $this->addColumn('email_1', array(
                                'header'    => Mage::helper('suppliers')->__('Primary E-Mail'),
                                'index'     => 'email_1',
                        ));

                        $this->addColumn('email_2', array(
                                'header'    => Mage::helper('suppliers')->__('Secondary E-Mail'),
                                'index'     => 'email_2',
                        ));

			return parent::_prepareColumns();
		}
        
        protected function _prepareMassaction() {
            $this->setMassactionIdField('id');
            $this->getMassactionBlock()->setFormFieldName('suppliers');

            $this->getMassactionBlock()->addItem('delete', array(
                'label' => Mage::helper('suppliers')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('suppliers')->__('Are you sure?')
            ));

            return $this;
        }

		public function getRowUrl($row)
		{
			return $this->getUrl('*/*/edit', array('id' => $row->getId()));
		}
	}
