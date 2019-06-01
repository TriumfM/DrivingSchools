<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    /**
     * @param Request $request
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function authenticate(Request $request)
    {
        //TODO: Scrap and delete
        $validator = Validator::make($request->input(), [
            'number' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()) {
            $user = User::with('token')->where('number', $request->input('number'))->first();

            if ($user != null && $user->role != 'admin' && $user->token->expire < date("Y-m-d")) {

                return redirect('login')
                    ->withErrors(array("error" => "Your account has expired"));
            }

            if ($user != null && $user->role == 'admin' && Auth::attempt(['number' => $request->input('number'), 'password' => $request->input('password')])) {
                // Authentication passed...
                return redirect()->intended('dashboard');

            } elseif ($user != null && $user->role == 'student' && Auth::attempt(['number' => $request->input('number'), 'password' => $request->input('password')])) {
                return redirect()->intended('student/tests');
            } else {
                return redirect('login')
                    ->withErrors(array("error" => "Failed login"));
            }
        }

        return view('auth.login', array('errors' => $validator->messages()));
    }

}
