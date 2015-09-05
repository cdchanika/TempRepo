<?php
class User
{
    private $usrID;
    function __construct($ID){
        $this->usrID = $ID;
    }

    function createGroup(){
        $gid= null;
        $aid= null;
        $newGroup = new Group($gid);
        $newAdmin = new Admin($aid);


    }
}