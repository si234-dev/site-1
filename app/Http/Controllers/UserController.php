<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

 Class UserController extends Controller 
{
    private $request;
    public function __construct(Request $request){
    $this->request = $request;
    }



    public function getUsers(){
    $users = User::all();
    return response()->json($users, 200);
    }
    public function index()
    {
    $users = User::all();
    return response()->json($users, 200);
    }

    public function add(Request $request ){
    $rules = [
    'username' => 'required|string|unique:users,username|max:20',
    'password' => 'required|string|min:5|max:20',
    'jobid' => 'required|numeric|min:1|not_in:0',
    
    ];
    

    $this->validate($request,$rules);

    $user = User::create($request->all());

    return response()->json([
        'message' => 'User created successfully',
        'data' => $user
    ]);


    }
        public function show($id){


// FindOrFail automatically throws an exception if not found
        $user = User::findOrFail($id);
        return response()->json(['message' => 'User retrieved successfully', 'data' => $user]);




        /*
    if (!User::find($id)) {
        return response()->json([
            'message' => 'User not found'
        ], 404);
    }
    $user = User::findOrFail($id);
    return response()->json([
        'message' => 'User retrieved successfully',
        'data' => $user
    ]);

    */


     }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }



public function update(Request $request, $id)
{
    $this->validate($request, [
        'username' => 'required|string|max:20',
        'password' => 'required|string|min:5|max:20'
    ]);

    $user = User::findOrFail($id);

    $user->username = $request->username;
    $user->password = $request->password;

    $user->save();

    return response()->json([
        'message' => 'User updated successfully',
        'data' => $user
    ]);
}
}



