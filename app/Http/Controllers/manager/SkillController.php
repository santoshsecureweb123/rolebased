<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Skill;

class SkillController extends Controller
{
    public function addSkillView()
    {
        
        $getskill = Skill::get();
    	return view('manager.skils.addskil',compact('getskill'));
    }

    public function addNewskill(Request $request)
    {
    	$getskill = Skill::get();
    	$skill = new Skill();
    	$skill->skills_name = request('skill_name');
    	$skill->save();
        return view('manager.skils.addskil',compact('getskill'));
    }
}
