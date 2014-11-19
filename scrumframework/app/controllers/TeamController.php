<?php

class TeamController extends \BaseController {
   
   //Store team in teams Collection.
    public function store()
    {
        $data = Input::all();
        $name = Input::get('teamname');
        $rules = array(
            'teamname' => 'required|min:3|max:64|unique:teams,name'
        );
        $validator = Validator::make($data, $rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('main')->withErrors($validator);
        }
        else
        {
            $team = new Team;
            $team->store($data);
            return Redirect::route('main');
        }
    }

    public function adduser()
    {
         //Find Team for add role and member in team collection.
        $teamid = Input::get('teamid');
        $team = Team::find($teamid);
        $teammember = Input::get('emailmember');
        //Check user if it alive in database.
        if($team->checkuser($teammember))
        {
            if(Input::get('role')=='po')
            {
                $team->addProductOwner($teammember);
            }
            else if(Input::get('role')=='tm')
            {
                $team->addTeamMember($teammember);
            }
            $team->addTeaminUsers($teammember,$teamid);
            $team->addUserInteamMembers($teammember,$teamid);
            
              return Redirect::to('/main');
        }
        return "Can't add this email.";
    }

    public function deleteProductOwner($tid, $poname)
    {
        //Delete in Teams Collection.
        $team = Team::find($tid);
        $team->deleteProductOwner($poname);
          $team->deleteInteamMembers($poname);
        //Delete in Users Collection.
         if(!($team->findInTm($poname) && ($team->findInMaster($poname))))
        {
            $user = User::where('email', $poname)->first();
            $user->deleteteams($poname);
        }
        return Redirect::to('/main');       
    }

      public function deleteTeamMember($tid, $tmname)
    {
        //Delete in Teams Collection.
        $team = Team::find($tid);
        $team->deleteTeamMember($tmname);
        $team->deleteInteamMembers($tmname);

        //Delete in Users Collection.
        if(!($team->findInPo($tmname) && ($team->findInMaster($tmname))))
        {
            $user = User::where('email', $tmname)->first();
            $user->deleteteams($tmname);
        }

        return Redirect::to('/main');       
    }
}
