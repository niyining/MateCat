<?php
class oauthAtmanController extends viewController{
	private $incomingUrl;

	public function __construct() {

        //SESSION ENABLED
        parent::sessionStart();
		parent::__construct();
		parent::makeTemplate("sid.html");
		$sid = $_GET[ 'sid' ];
		$this->sid = $sid;
	}

	public function doAction() {
		//$this->generateAuthURL();
	}

	public function setTemplateVars() {
		$this->template->sid = $this->sid;
	}
}

?>