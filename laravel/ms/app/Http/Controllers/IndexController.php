<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use DB;

class IndexController extends Controller {

    public function index() {
        /*    $users = DB::table('users')
          ->join('ranks', 'users.ranks_id', '=', 'ranks.id')
          ->select('users.*', 'users.fullname', 'ranks.rank')
          ->get();

         */
        return view('index');
    }

    public function userlist() {
        $data = new User;
        //dd($data);
        $users = $data->join('ranks', 'users.rank_id', '=', 'ranks.id')
                ->select('users.*', 'users.fullname', 'ranks.rank')
                ->where('users.deleted', '=', '0')
                ->get();
        return response()->json(array("users" => $users));
    }

    public function getDeleteUser($id) {
        $user = User::where('id', $id)->first();
        $user->deleted = "1";
        $user->save();
        return response()->json(array("message" => "Deleted successfully."));
    }

    public function adduser(Request $request) {
        $fullname=$request['fullname'];
        $username=$request['username'];
        $password=  sha1($request['password']);
        $email=$request['email'];
        $rank_id=$request['rank_id'];
        $status=$request['status'];
        $remarks=$request['remarks'];
        $hash=  sha1($fullname.$username.$email.$remarks);
        $created_by="NA";
        $updated_by="NA";
      
        $user = new User;
        $user->fullname=$fullname;
        $user->username=$username;
        $user->password=$password;
        $user->email=$email;
        $user->rank_id=$rank_id;
        $user->status=$status;
        $user->remarks=$remarks;
        $user->hash=$hash;
        $user->created_by=$created_by;
        $user->updated_by=$updated_by;
        if($user->save()){
         return response()->json(["message"=>"successfull"]);   
        } else {
            return response()->json(["message"=>"error"]);
        }
        
    }
    
    function home(Request $request) {
    $userID = $request['userID'];
    $userName = $request['userName'];
    return view('home', [
      'userID'=> $userID,
      'userName' => $userName
    ]);
}

}
