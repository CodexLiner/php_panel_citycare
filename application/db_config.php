<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'admin_fix');
define('DB_PASSWORD', 'Gopal@123');
define('DB_DATABASE', 'admin_fix');
define('SECRET_KEY', 'This is my secret key');
define('SECRET_IV', 'This is my secret key');
 // define('IMAGEPATH', 'http://192.168.1.119/freak/clinicadmin/uploads/'); //
define('IMAGEPATH', 'http://cityapp.host/uploads/');
function getDB()
{
    $dbhost=DB_SERVER;
    $dbuser=DB_USERNAME;
    $dbpass=DB_PASSWORD;
    $dbname=DB_DATABASE;
    try
    {
        $dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
        $dbConnection->exec("set names utf8");
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    catch (PDOException $e)
    {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
}
?>
