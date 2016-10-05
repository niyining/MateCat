<?php

/**
 * Created by PhpStorm.
 * User: domenico
 * Date: 23/02/15
 * Time: 14.54
 */

/**
 * Class Engine_MicrosoftHubStruct
 *
 * This class contains the default parameters for a Moses Engine CREATION
 *
 */
class EnginesModel_AtmanStruct extends EnginesModel_EngineStruct {

    /**
     * @var string
     */
    public $description = "Atman Engine";

    /**
     * @var string
     */
    public $translate_relative_url = "translate";

    /**
     * @var string
     */
    public $contribute_relative_url = "";


    /**
     * @var string
     */
    public $class_load = Constants_Engines::ATMAN;


    /**
     * @var int
     */
    public $google_api_compliant_version = 2;

    /**
     * @var int
     */
    public $penalty = 14;

    /**
     * An empty struct
     * @return EnginesModel_EngineStruct
     */
    public static function getStruct() {
        return new EnginesModel_AtmanStruct();
    }

}