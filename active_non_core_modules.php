<?php

require_once('app/Mage.php');

$modules = Mage::app()->getConfig()->getNode('modules')->asCanonicalArray();

$modules = array_filter($modules, function ($module) {
    return $module['codePool'] != 'core' && $module['active'] === 'true';
});

echo(implode(PHP_EOL, array_keys($modules)));