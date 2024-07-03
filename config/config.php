<?php // config.php
$secretFilePath = 'password';

return [
    'database_host' => 'mysql-srv',
    'database_name' => 'SiteBreaking',
    'database_username' => 'root',
    'database_password' => $secretFilePath,
    'cryptage_key' => bin2hex(random_bytes(32))
];
