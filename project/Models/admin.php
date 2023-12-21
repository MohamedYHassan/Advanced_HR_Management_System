<?php 

require_once 'user.php';
class admin extends user 
{
private static $instance = null;

private function __construct()
{
}

public function __clone() {
    trigger_error( "Cannot clone instance of Singleton pattern ...", E_USER_ERROR );
    }
    public function __wakeup() {
    trigger_error('Cannot deserialize instance of Singleton pattern ...', E_USER_ERROR );
    }


    public static function getInstance()
    {
    if( !is_object(self::$instance) )
        self::$instance = new self;
    return self::$instance;
    }
}





?>