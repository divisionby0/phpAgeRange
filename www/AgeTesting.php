<?php
include_once('ages/AgeRangeType.php');
include_once('ages/IAgeRange.php');
include_once('ages/AgeRange.php');
include_once('ages/AgeOver.php');
include_once('ages/Ages.php');
include_once('ages/AgeUnder.php');
include_once('ages/AnyAge.php');
include_once('ages/json/AgeRangeJsonEncoder.php');

include_once('utils/Logger.php');

class AgeTesting {
    public function __construct(){

        $ageRangeFrom = Ages::$values[3];
        $ageRangeTill =  Ages::$values[80];

        $anyAge = new AnyAge();
        $ageRange = new AgeRange($ageRangeFrom, $ageRangeTill);
        $ageOver = new AgeOver(Ages::$values[7]);
        $ageUnder = new AgeUnder(Ages::$values[67]);

        // testing exceptions
        Logger::logMessage('Testing age under exception...');
        try{
            $ageUnder->getFrom();
        }
        catch(Exception $exception){
            $this->testPassed();
        }

        Logger::logMessage('Testing age over exception...');
        try{
            $ageOver->getTill();
        }
        catch(Exception $exception){
            $this->testPassed();
        }

        Logger::logMessage('Testing any age from exception...');
        try{
            $anyAge->getFrom();
        }
        catch(Exception $exception){
            $this->testPassed();
        }

        Logger::logMessage('Testing any age till exception...');
        try{
            $anyAge->getTill();
        }
        catch(Exception $exception){
            $this->testPassed();
        }

        Logger::logMessage('Testing ageRangeFrom assertion...');
        $ageRangeFromData = $ageRange->getFrom();
        if($ageRangeFromData == $ageRangeFrom){
            $this->testPassed();
        }
        else{
            Logger::logError('ageRangeFrom assertion error. Waiting:'.$ageRangeFrom.'  received: '.$ageRangeFromData);
        }


        Logger::logMessage('Testing ageRangeTill assertion...');
        $ageRangeTillData = $ageRange->getTill();
        if($ageRangeTillData == $ageRangeTill){
            $this->testPassed();
        }
        else{
            Logger::logError('ageRangeTill assertion error. Waiting:'.$ageRangeTill.'  received: '.$ageRangeTillData);
        }

        // testing json
        Logger::logMessage('anyAge = '.AgeRangeJsonEncoder::encode($anyAge));
        Logger::logMessage('ageRange = '.AgeRangeJsonEncoder::encode($ageRange));
        Logger::logMessage('ageOver = '.AgeRangeJsonEncoder::encode($ageOver));
        Logger::logMessage('ageUnder = '.AgeRangeJsonEncoder::encode($ageUnder));
    }

    private function testPassed(){
        Logger::logMessage('<div style="color: white; background-color: green"><b>Test passed</b></div>');
    }
} 