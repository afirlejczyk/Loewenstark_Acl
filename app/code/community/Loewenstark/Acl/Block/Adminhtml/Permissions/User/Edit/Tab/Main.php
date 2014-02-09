<?php
/**
 * Created by PhpStorm.
 * User: oma
 * Date: 2/1/14
 * Time: 12:04 PM
 */
class Loewenstark_Acl_Block_Adminhtml_Permissions_User_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Permissions_User_Edit_Tab_Main
{

    public function _prepareForm()
    {
        /*
         * Let original block fill the fieldset.
         */
        $data = parent::_prepareForm();

        /*
         * Add our own element.
         */

        $fieldset = $this->getForm()->getElement('base_fieldset');
        if (!Mage::app()->isSingleStoreMode()) {
           $field = $fieldset->addField('website_limit', 'multiselect', array(
                'name'      => 'website_limit[]',
                'label'     => Mage::helper('cms')->__('Website Limit'),
                'title'     => Mage::helper('cms')->__('Website Limit'),
                'required'  => false,
                'values'    => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true)


           ));
            $renderer = $this->getLayout()->createBlock('adminhtml/store_switcher_form_renderer_fieldset_element');
            $field->setRenderer($renderer);
        }


        /*
          * Repopulate form after adding our own field.
          */
        $formData = Mage::registry('permissions_user')->getData();

        unset($formData['password']);
        $this->getForm()->setValues($formData);

        /*
         * Return parent data.
         */
        return $data;
    }

}