<?php
require_once 'abstract.php';

class Script_Debug extends Mage_Shell_Abstract
{
    public function run()
    {
        // Switch to some specific store view
        Mage::init(/* 'default' <- store code */);

        // Initialize area (<frontend> configuration nodes under modules config.xml)
        Mage::app()->loadArea(Mage_Core_Model_App_Area::AREA_FRONTEND);

        // Add some rewrite
        Mage::app()->getConfig()->setNode('global/models/catalog/rewrite/product', 'Catalog_Product_Debug');

        // Echo 'It works!'
        Mage::getModel('catalog/product')->testDebugMethod();
    }
}

$shell = new Script_Debug();

class Catalog_Product_Debug extends Mage_Catalog_Model_Product
{
    public function testDebugMethod()
    {
        echo 'It works!' . PHP_EOL;
    }
}

$shell->run();
