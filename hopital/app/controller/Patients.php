<?php
require_once("../helpers/session_helpers.php");
require_once("../models/doctor.php");
require_once("/pages.php");


class Patients extends AbstractController {


    public function __construct() {
        if(isLoggedin() == false){
            header("../views/login.php");
        }
        $this->UserModel = $this->load("Patient");

    }

}