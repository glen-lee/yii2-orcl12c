<?php

return [
    //Oracle connection setting
    'class' => 'yii\db\Connection',
    'dsn'=>'oci:dbname=//IP_ADDR:PORT/SERVICE_NAME;charset=UTF8',
    'username' => 'DB_USER',
    'password' => 'DB_PASS',
    'charset' => 'UTF8',
    'enableSchemaCache' => true,
];
