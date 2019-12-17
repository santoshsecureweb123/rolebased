<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class SuperAdminController extends Controller
{
   function getEditIdRecord(Request $request){
   	
   	$id = request('id');
   	$user = User::where('id',$id)->get();
   	return response(['user'=>$user]);
   }
   function deleteUser(Request $request){
        $id = request('id');
        // echo $id; exit;
        $user = User::find($id);
        $user->delete();
        return redirect('all_users');
    }
}
