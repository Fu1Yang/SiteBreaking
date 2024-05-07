<?php //config.php 
return [
    'database_host' => 'mysql-srv',
    'database_name' => 'SiteBreaking',
    'database_username' => 'root',
    'database_password' => 'password',
    'cryptage_key'=> bin2hex(random_bytes(32))
];