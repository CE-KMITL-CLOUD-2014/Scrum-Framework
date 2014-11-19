<?php

use Jenssegers\Mongodb\Model as Eloquent;

class Team extends Eloquent {

    protected $collection = 'teams';
    protected $connection = 'mongodb';


    public function teamMembers()
    {
        return $this->belongsToMany('User', 'email', 'teams', 'teamMembers');
    }
   
      public function taskboards()
    {
        return $this->embedsMany('Taskboard');
    }

    //Function for add product owner. 
    public function addProductOwner($name)
    {
        if($this->po==null){
            $this->po = array($name);
        }
        else{
            $temp = $this->po;
            array_push($temp, $name);
            $this->po = $temp;
        }
        $this->save();
        return true;
    }

    //Function for add Teammember.
    public function addTeamMember($name)
    {
        if($this->tm==null){
            $this->tm = array($name);
        }
        else{
            $temp = $this->tm;
            array_push($temp, $name);
            $this->tm = $temp;   
        }
        $this->save();
        return true;
    }

    //Function for checkuser.
    public function checkuser($name)
    {
        $check = User::where('email',$name)->get();
        if(User::where('email',$name)->get()!="[]"){
            return true;
        }
        else{
            return false;
        }
    }

    //Add team in User Collection.
    public function addTeaminUsers($teammember, $teamid)
    {
        $user = User::where('email',$teammember)->first();
        if(!array_key_exists('teams', $user)){
            $user->teams = array($teamid);
        }
        else{
            $temp = $user->teams;
            array_push($temp, $teamid);
            $user->teams = $temp;  
        }
        $user->save();
    }

    //Add User in teams Collection.
    public function addUserInteamMembers($teammember, $teamid)
    {
        //Add teamMembers field.
        $user = User::where('email',$teammember)->first();
        $temp = $this->teamMembers;
        array_push($temp, $user->_id);
        $this->teamMembers = $temp;
        $this->save();
    }

    //Delete Product owner.
    public function deleteProductOwner($poname)
    {
        $po = $this->po;
        $key = array_search($poname,$po);
        unset($po[$key]);
        $this->po = $po;
        $this->save();
    }

    //Delete TeamMember.
    public function deleteTeamMember($tmname)
    {
        $tm = $this->tm;
        $key = array_search($tmname,$tm);
        unset($tm[$key]);
        $this->tm = $tm;
        $this->save();
    }

    //Delete email => teamMember feild in teams Collection.     
    public function deleteInteamMembers($email)
    {
        $members = $this->teamMembers;
        $user = User::where('email',$email)->first();
        $key = array_search($user->_id,$members);
        unset($members[$key]);
        $this->teamMembers = $members;
        $this->save();
    }

    //Boolean for find this email is Product Owner?
    public function findInPo($email)
    {
        $po = $this->po;
        if($key = array_search($email,$po) !== false){
            return true;
        }
        return false;
    }

    //Boolean for find this email is Team Member?
     public function findInTm($email)
    {
        $tm = array();
        if($this->tm != null){
            $tm = $this->tm;
        }
        if($key = array_search($email,$tm) !== false){
            return true;
        }
        return false;
    }

     //Boolean for find this email is Scrum Master?
     public function findInMaster($email)
    {
        $tm = $this->master;
        if($tm === $email){
            return true;
        }
        return false;
    }

    public function store($data)
    {
        $this->name = $data['teamname'];
        $this->master =  Auth::user()->email;
        Auth::user()->teams()->save($this);
        $this->save();
    }
}
