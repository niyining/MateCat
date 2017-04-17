<?php

class atmanLoginController extends ajaxController{

    private $userData = array();
    private $user_logged;

    public function __construct() {

        parent::sessionStart();
        parent::__construct();

        $this->user_logged = true;
        $this->userData = array(
            "uid" => $_POST["uid"],
            "cid" => $_POST["email"],
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "email" => $_POST["email"],
            "org" => $_POST["org"]
        );
    }

    public function doAction(){
        if($this->user_logged && !empty($this->userData)){
            $_SESSION[ 'uid' ] = $this->userData["uid"];
            $_SESSION[ 'cid' ] = $this->userData["email"];
            $_SESSION[ 'userData' ] = $this->userData;
            //$_SESSION[ 'cid' ] = $this->userData["email"];
            $this->result = array(
                "error" => 0,
                "msg" => "登录成功",
                "data" => $this->userData
            );
        }
    }
}