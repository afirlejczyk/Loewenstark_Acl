<?php

class Loewenstark_Acl_Block_Adminhtml_Permissions_Tab_Rolesextend
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function getTabLabel()
    {
        return Mage::helper('adminhtml')->__('Role Info');
    }

    public function getTabTitle()
    {
        return $this->getTabLabel();
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }

    public function _beforeToHtml() {
        $this->_initForm();

        return parent::_beforeToHtml();

    }

    protected function _initForm()
    {

        $form = new Varien_Data_Form();

        $fieldset = $form->addFieldset('base_fieldset', array('legend'=>Mage::helper('adminhtml')->__('Role Information Extend')));

        $field = $fieldset->addField('websites', 'multiselect',
            array(
                'name'  => 'websites[]',
                'label' => $this->_helper()->__('Websites'),
                'id'    => 'websites',
               // 'values' => Mage::helper('loewenstark_acl')->getWebsiteAsOption()
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true)

            )
        );

        $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
        $field->setRenderer($renderer);
        $form->setValues($this->getRole()->getData());

        $this->setForm($form);
        //return parent::_prepareForm();
    }



    /**
     *
     * @return Mage_Admin_Model_Roles
     */
    protected function getRole()
    {
        return Mage::registry('current_role');
    }

    /**
     *
     * @return Mage_Admin_Model_Roles
     */
    protected function getRoles()
    {
        return $this->getRole();
    }

    /**
     *
     * @return Loewenstark_Acl_Helper_Data
     */
    protected function _helper()
    {
        return Mage::helper('loewenstark_acl');
    }



}