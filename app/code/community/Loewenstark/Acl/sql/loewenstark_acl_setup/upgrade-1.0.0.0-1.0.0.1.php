<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->getConnection()->addColumn($installer->getTable('admin/role'), 'websites', array(
    'type' => Varien_Db_Ddl_Table::TYPE_TEXT,
    'length' => 255,
    'nullable' => true,
    'default' => null,
    'comment' => 'Loewenstark Websites field'
));

$installer->run("ALTER TABLE {$this->getTable('admin_user')} ADD 'website_limit'  TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'website_limits'");

$installer->getConnection()->dropColumn($installer->getTable('admin/role'), 'loewenstark_acl');

$installer->endSetup();
