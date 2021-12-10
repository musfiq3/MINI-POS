<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserGroupsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->data['main_menu']= 'Users';
        $this->data['sub_menu'] = 'Groups';
    }

    public function index()
    {
        $this->data['groups'] = Group::all();

        return view('groups.groups', $this->data);
    }

    public function create()
    {
        return view('groups.create', $this->data);
    }

    public function store(Request $request)
    {
        $formData = $request->all();
        if (Group::create($formData))
        {
            Session:: flash('message', 'Groups created Successfully');
        };

        return redirect()->to('groups');
    }

    public function destroy($id)
    {
        if (Group::find($id)->delete())
        {
            Session:: flash('message', 'Groups deleted Successfully');
        };

        return redirect()->to('groups');

    }
}
