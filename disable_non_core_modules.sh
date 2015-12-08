#!/bin/sh

MODULES_DEACTIVATOR_FILE=app/etc/modules/zzzzz_DisableModules.xml
SCRIPT_FOLDER="`dirname ${BASH_SOURCE[0]}`"
PHP_BIN=php

echo "<?xml version=\"1.0\"?>" > $MODULES_DEACTIVATOR_FILE
echo "<config>" >> $MODULES_DEACTIVATOR_FILE
echo "    <modules>" >> $MODULES_DEACTIVATOR_FILE

for m in $($PHP_BIN $SCRIPT_FOLDER/active_non_core_modules.php)
do
    echo "        <$m>" >> $MODULES_DEACTIVATOR_FILE
    echo "            <active>false</active>" >> $MODULES_DEACTIVATOR_FILE
    echo "        </$m>" >> $MODULES_DEACTIVATOR_FILE
done

echo "    </modules>" >> $MODULES_DEACTIVATOR_FILE
echo "</config>" >> $MODULES_DEACTIVATOR_FILE