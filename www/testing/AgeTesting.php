<?php
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/IAgeRange.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/AgeOver.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/AgeRange.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/Ages.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/AgeUnder.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/AnyAge.php');
include_once('../../wp-content/plugins/medical_ensurance/php/div0/company/admin/ages/json/AgeRangeJsonEncoder.php');

include_once('../../wp-content/plugins/medical_ensurance/php/div0/utils/Logger.php');

class AgeTesting {
    public function __construct(){
        $anyAge = new AnyAge();
        $ageRange = new AgeRange(Ages::$values[3], Ages::$values[80]);
        $ageOver = new AgeOver(Ages::$values[7]);
        $ageUnder = new AgeUnder(Ages::$values[67]);

        // testing exceptions
        Logger::logMessage('Testing age over exception...');
        try{
            $ageOver->getFrom();
        }
        catch(Exception $exception){
            Logger::logMessage("Test passed");
        }
    }
} 