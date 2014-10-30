<?php

class TeamController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
   public function __construct(Team $team)
    {
        $this->team = $team;
    }

    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Team $team)
    {
        $data = Input::all();
        $name = Input::get('teamname');
        $rules = array(
            'teamname' => 'required|min:3|max:64|unique:teams'
        );
        $validator = Validator::make($data, $rules);

        if($validator->fails())
        {
            $messages = $validator->messages();
            return Redirect::to('/')->withErrors($validator);
        }
        else
        {
            $team->name = Input::get('teamname');
            $team->master =  Auth::user()->_id;
            $team =  Auth::user()->teams()->save($team);
            $team->save();
            return Redirect::route('main');
        }
    }

     public function getTeam($id=null)
    {
        if($id==null)
        {
            $teams = Auth::user()->teams()->get();
            return Response::json($teams->toArray());
        }
    /*    else
        {
            $taskboards = Taskboard::find($id);
            if($taskboards==null){return Redirect::route('404');}
            $boardname = $taskboards->name;
            //return View::make('login', array('boardname'=> $boardname));
            return View::make('login', array('boardname'=> $boardname,'boardid' => $id));
            //return 'boardname='.$boardname;
            //return Response::json($taskboards->toArray());
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
