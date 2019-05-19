<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Session;
use Hash;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate the data
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|email|unique:users',
        ]);

        // check if the password is set
        if ($request->has('password') && !empty($request->password)) {
            # set the manually typed password
            $password = trim($request->password);
        }
        else{
            # generate random password
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $string = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i=0; $i < $length; ++$i) { 
                $string .= $keyspace[random_int(0, $max)];
            }

            $user->password = Hash::make($string);
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);

        if ($user->save()) {
            return redirect()->route('users.show', $user->id);
        }
        else{
            Session::flash('danger', 'Sorry a problem has occured while creating this user.');
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
        $user = User::findOrFail($id);
        return view('manage.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email'.$id, // make email unique and ignore the $id
        ]);

        // find the current user
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password_options == 'auto') {
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $string = '';
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i=0; $i < $length; ++$i) { 
                $string .= $keyspace[random_int(0, $max)];
            }

            $user->password = Hash::make($string);
        }
        else if ($request->password_options == 'manual'){
            $user->password = Hash::make($request->password);
        }

        if ($user->save()) {
            return redirect()->route('users.show', $id);
        }
        else{
            Session::flash('danger', 'There was a problem saving the updated user info to the database. Try again');
            return redirect()->route('users.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
