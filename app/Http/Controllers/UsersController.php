<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\CreateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class UsersController extends Controller
{
    public function index()
    {
        $this->data['users'] = User::all();
        $this->data['groups']= Group::all();

        return view('users.users', $this->data);
    }

    public function create()
    {
        $this->data['groups']       = Group::arrayForSelect();
        $this->data['headline']     = 'Add New User';

        return view('users.form', $this->data);
    }


    public function store(CreateUserRequest $request)
    {
        $formData = $request->all();
        if (User::create($formData))
        {
            Session:: flash('message', 'Users created Successfully');
        };

        return redirect()->to('users');

    }

    public function show($id)
    {
        $this->data['user'] =User::find($id);
        $this->data['tab_menu'] = 'user.info';

        return view('users.show', $this->data);
    }


    public function edit($id)
    {

        $this->data['user'] = User::find($id);

        $this->data['groups'] = Group::get();   /**  Used in create  */

        return view('users.edit', $this->data );

    }


    public function update(Request $request, $id)
    {
        $data               = $request->all();
        $user               = User::find($id);
        $user->group_id     = $data['group_id'];
        $user->name         = $data['name'];
        $user->email        = $data['email'];
        $user->phone        = $data['phone'];
        $user->address      = $data['address'];

        if( $user->save() ) {
            Session::flash('message', 'User Updated Successfully');
        }

        return redirect()->to('users');
    }


    public function destroy($id)
    {
        if( User::find($id)->delete() ) {
            Session::flash('message', 'User Deleted Successfully');
        }

        return redirect()->to('users');

    }
}
