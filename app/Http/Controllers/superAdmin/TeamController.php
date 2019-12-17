<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Team;

class TeamController extends Controller
{
    public function createTeamView()
    {
    	$teamleader = User::where('role_id','4')->get();
    	$teamMember = User::where('role_id','3')->get();
    	$user_id = session()->get('user_id');
    	$role_id = session()->get('role_id');
    	// echo "<pre>"; print_r($teamleader); exit;
			return view('super-admin.team.add_new_team',compact('teamleader','teamMember','role_id','user_id'));
    }

    public function createTeam(Request $request)
    {
    	$validator = Validator::make($request->all(),[
			    'team_name' => 'required',
			    'team_lead' => 'required',
			    'team_member' => 'required',
				]);
    	if(!$validator->fails()) {
	    	$team = new Team();
	    	$team->team_name = request('team_name');
	    	$team->author_id = request('author_id');
	    	$team->author_role_id = request('author_role_id');
	    	$team->team_lead_id = request('team_lead');
	    	$team->team_member_id = implode(',',request('team_member'));
	    	// echo "<pre>"; print_r($team);exit;
	    	$team->save();
	    	return redirect::back()->with('success', 'Team Created succesfully');
    	}
    	else
    	{
    		return Redirect::back()->withErrors($validator)->withInput($request->input());
    	}
    }

  public function allteam()
  {
  	$team = Team::get();
  }
}
