<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Mail\UserRegister;
use Illuminate\Support\Facades\Mail;
use App\Skill;
use App\User;
use Hash;
// use Mail;

class UserController extends Controller
{

    public function showUserForm()
    {
        $getskill = Skill::get();
        return view('manager.user.addnewuser',compact('getskill'));
    }

    public function addNewUser(Request $request){
        $userid = request('user_id');
        if(isset($userid) &&  $userid != ''){
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email',
                'dob' => 'required|date',
                'address' => 'required',
                'phone_number' => 'required|min:10|numeric',
                'skills' => 'required',
                'experience' => 'required',
                'designation' => 'required',
            ]);
        } 
        else {
    	$validator = Validator::make($request->all(),[
			    'name' => 'required',
			    'email' => 'required|email',
			    'password' => 'required|min:5|max:15',
			    'dob' => 'required|date',
			    'address' => 'required',
			    'phone_number' => 'required|min:10|numeric',
			    'skills' => 'required',
			    'experience' => 'required',
			    'designation' => 'required',
			    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
			]);
    	}
    	if(!$validator->fails()) {

            if(isset($userid) &&  $userid != ''){
               
                $newImage = request()->file('image');

                if(isset($newImage) && $newImage != "")
                {
                    $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    request()->image->move(public_path('image'), $imageName);
                }
                else
                {
                    $imageName = request('old_img');
                }
                $getskill = User::where('id',$userid)->update(['name' => request('name'),'email'=> request('email'),'date_of_birth'=>request('dob'),'address'=>request('address'),'phone_no'=>request('phone_number'),'skills'=>implode(",", request('skills')),'experience'=>request('experience'),'designation'=>request('designation'),'image'=>$imageName]);
                 return redirect::back()->with('success', 'User Update succesfully');

            }            
            else{

    		$imageName = time().'.'.request()->image->getClientOriginalExtension();
        		request()->image->move(public_path('image'), $imageName);
    		$email = request('email');
    		$password = request('password');
    		$user = new User();
    		$user->name = request('name');
    		$user->email = request('email');
    		$user->date_of_birth = request('dob');
    		$user->address = request('address');
    		$user->phone_no = request('phone_number');
    		$user->skills = implode(",", request('skills'));
    		$user->experience = request('experience');
    		$user->designation = request('designation');
    		$user->image = $imageName;
    		$user->password = Hash::make(request('password'));
    		$user->save();

    		$data['email'] = $email;
    		$user['password'] = $password;

    		Mail::to($data['email'])->send(new UserRegister($user));

    		 return redirect::back()->with('success', 'User register succesfully');
            }
    	}
    	else{
            
    		return Redirect::back()->withErrors($validator)->withInput($request->input());
    	}
    }

    public function getAllUser()
    {
    	$getUser = User::get(); 
    	$getskill = Skill::get();   	
    	return view('manager.user.alluser',compact('getUser','getskill'));
    }

    public function deleteUser()
    {
    	$userId = request('userId'); 
        $success = User::where('id',$userId)->delete();
        return response(['success'=>true]);
    } 

    public function editUser()
    {
    	$userId = request('userId'); 
        $getuser = User::where('id',$userId)->first();
		$skillID = explode(",",$getuser->skills);
		
        return response(['success'=>true,'uid'=>$getuser->id,'name'=>$getuser->name,'email'=>$getuser->email,'dob'=>$getuser->date_of_birth,'address'=>$getuser->address,'phone_no'=>$getuser->phone_no,'skill'=>$skillID,'experience'=>$getuser->experience,'designation'=>$getuser->designation,'image'=>$getuser->image]);
    }
}
