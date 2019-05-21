<?php

namespace App\Http\Controllers;

use App\Users as Users;
use Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{

    public function index()
    {
        $data['userss'] = Users::all();
        return view('users/index', $data);
    }
    
    public function add()
    {
        return view('users/add');
    }
    
    public function addPost()
    {
        $users_data = array(
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'email'      => Input::get('email'),
            'password'   => Hash::make(Input::get('password')),
            'gender'     => Input::get('gender'),
        );
        $users_id = Users::insert($users_data);
        return redirect('users')->with('message', 'Users successfully added');
    }
    /**
     * @param $id
     */
    public function delete($id)
    {
        $users = Users::find($id);
        $users->delete();
        return redirect('users')->with('message', 'Users deleted successfully.');
    }
    /**
     * @param $id
     */
    public function edit($id)
    {
        $data['users'] = Users::find($id);
        return view('users/edit', $data);
    }
    
    public function editPost()
    {
        $id    = Input::get('users_id');
        $users = Users::find($id);

        $users_data = array(
            'first_name' => Input::get('first_name'),
            'last_name'  => Input::get('last_name'),
            'email'      => Input::get('email'),
            'gender'     => Input::get('gender'),
        );
        $users_id = Users::where('id', '=', $id)->update($users_data);
        return redirect('users')->with('message', 'Users Updated successfully');
    }

    /**
     * @param $id
     */
    public function changeStatus($id)
    {
        $users         = Users::find($id);
        $users->status = !$users->status;
        $users->save();
        return redirect('users')->with('message', 'Change users status successfully');
    }
    /**
     * @param $id
     */
    public function view($id)
    {
        $data['users'] = Users::find($id);
        return view('users/view', $data);

    }
}
