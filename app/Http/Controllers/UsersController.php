<?php

namespace App\Http\Controllers;

use App\Entities\UserToken;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Find All
     *
     * @return mixed
     */
    public function index($offset){

        $usersCount = User::count();
        $users = User::with('token')->take($offset)->get();

        return array("count" => $usersCount, "users" => $users);
    }

    /**
     * Find by Id
     *
     * @param $userId
     * @return mixed
     */

   public function show($userId){
       $user = User::with('token')->findOrfail ($userId);

       return $user;
   }

    /**
     * Store User
     *
     * @param Request $request
     * @return User
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'number' => 'required|unique:users,number',
            'password' => 'required',
            'role' =>'in:admin,student|required',
            'expire' => 'required_if:role,==,student'
        ]);

        if($validator->passes()){

            $user = new User();

            $user->full_name = $request->json('full_name');
            $user->number = $request->json('number');
            $user->role = $request->json('role');
            $user->password =  bcrypt ($request->json('password'));

            $user->save();

            $expire = new UserToken();
            $expire->user_id = $user->id;
            $expire->expire = $request->expire;


            $expire->save();

            return $user;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Update User
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'full_name' => 'required',
            'number' => 'required',
            'role' =>'in:admin,student|required',
            'expire' => 'required_if:role,==,student'
        ]);

        if($validator->passes()){

            $user = User::findOrfail($id);

            $user->full_name = $request->json('full_name');
            $user->number = $request->json('number');

            if($request->json('password') != null){
                $user->password = bcrypt($request->json('password'));
            }


            $expire = UserToken::where('user_id', $user->id)->first();
            $expire->user_id = $user->id;
            $expire->expire = $request->json('expire');
            $expire->update();


            $user->update();

            return $user;
        }

        return response()->json(["errors" => $validator->messages()], 422);
    }

    /**
     * Delete User
     *
     * @param $id
     */

    public function destroy($id) {
        $user = User::findOrfail($id);

        $user->delete();
    }

    public function checkAuth(){

        $userId = Auth::user()['id'];
        $user = User::where('id', $userId)->first();

        return $user->role;
    }

}
