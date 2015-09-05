<?php
class Group
{
    private $grpID;

    function __construct($ID){
        $this->grpID = $ID;
    }

    function addMember($usrID){
        $newMember = new Member($mid);
    }
}