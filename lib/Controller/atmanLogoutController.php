<?php
header("Access-Control-Allow-Origin: *");
class atmanLogoutController extends ajaxController{

    private $userData = array();
    private $user_logged;

    public function __construct() {

        parent::sessionStart();
        parent::__construct();

        $this->user_logged = false;
        $this->userData = array();
    }

    public function doAction(){
        $_SESSION[ 'uid' ] = "";
        $_SESSION[ 'cid' ] = "";
        $_SESSION[ 'userData' ] = array();
        header('Location: http://mymatecat.com:8080');
    }
}