<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $company = Company::where('status', 'Active')->get();
        $department = Department::where('status', 'Active')->get();
        $roles = $this->roles();
        
        return view('user', compact('users', 'department', 'company', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'unique:users,email',
            'password' => 'min:6'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_id = $request->company;
        $user->department_id = $request->department;
        $user->role = $request->roles;
        $user->status = null;
        $user->password = bcrypt('abc123');
        $user->save();

        Alert::success('Successfully Saved')->persistent('Dismiss');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'email' => 'unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->company_id = $request->company;
        $user->department_id = $request->department;
        $user->role = $request->roles;
        // $user->status = null;
        $user->save();

        Alert::success('Successfully Updated')->persistent('Dismiss');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function roles()
    {
        return [
            'Adminstrator' => 'Administrator',
            'IT Personnel' => 'IT Personnel',
            'User' => 'User'
        ];
    }

    public function deactivate($id)
    {
        $user = User::findOrFail($id);
        $user->status = 'Inactive';
        $user->save();

        Alert::success('Successfully Deactivated')->persistent('Dismiss');
        return back();
    }

    public function activate($id)
    {
        $user = User::findOrFail($id);
        $user->status = null;
        $user->save();

        Alert::success('Successfully Activated')->persistent('Dismiss');
        return back();
    }
}
