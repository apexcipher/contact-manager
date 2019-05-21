<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\UserContacts as User_contacts;
use App\Users as Users;

use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function index()
    {
        $data['users'] = Users::all();
        $data['user_contactss'] = User_contacts::where('user_id', Auth::user()->id)->get();
        return view('user_contacts/index', $data);
    }
    
    public function add()
    {
        return view('user_contacts/add');
    }
    
    public function addPost()
    {
        $user_contacts_data = array(
            'first_name'      => Input::get('first_name'),
            'middle_name'     => Input::get('middle_name'),
            'last_name'       => Input::get('last_name'),
            'primary_phone'   => Input::get('primary_phone'),
            'secondary_phone' => Input::get('secondary_phone'),
            'email_id'        => Input::get('email_id'),
            'user_image'      => '',
            'user_id'      => Auth::user()->id,
        );

        if (Input::hasFile('user_image')) {
            $destinationPath = 'uploads';
            $user_image      = Input::file('user_image');
            $user_image_name = $user_image->getClientOriginalName();
            $user_image->move($destinationPath, $user_image_name);
            $user_contacts_data['user_image'] = $user_image_name;
        }
        $user_contacts_id = User_contacts::insert($user_contacts_data);
        return redirect('user_contacts')->with('message', 'User_contacts successfully added');
    }
    
    /**
     * @param $id
     */
    public function delete($id)
    {
        $user_contacts = User_contacts::find($id);
        $user_contacts->delete();
        return redirect('user_contacts')->with('message', 'User_contacts deleted successfully.');
    }
    
    /**
     * @param $id
     */
    public function edit($id)
    {
        $data['user_contacts'] = User_contacts::find($id);
        return view('user_contacts/edit', $data);
    }
    
    public function editPost()
    {
        $id            = Input::get('user_contacts_id');
        $user_contacts = User_contacts::find($id);

        if (Input::hasFile('user_image')) {
            $destinationPath = 'uploads';
            $user_image      = Input::file('user_image');
            $user_image_name = $user_image->getClientOriginalName();
            $user_image->move($destinationPath, $user_image_name);
            @unlink($destinationPath . '/' . $user_contacts->user_image);
        } else {
            $user_image_name = $user_contacts->user_image;
        }

        $user_contacts_data = array(
            'first_name'      => Input::get('first_name'),
            'middle_name'     => Input::get('middle_name'),
            'last_name'       => Input::get('last_name'),
            'primary_phone'   => Input::get('primary_phone'),
            'secondary_phone' => Input::get('secondary_phone'),
            'email_id'        => Input::get('email_id'),
            'user_image'      => $user_image_name,
            'user_id'      => Auth::user()->id,

        );
        $user_contacts_id = User_contacts::where('id', '=', $id)->update($user_contacts_data);
        return redirect('user_contacts')->with('message', 'User_contacts Updated successfully');
    }

    /**
     * @param $id
     */
    public function changeStatus($id)
    {
        $user_contacts         = User_contacts::find($id);
        $user_contacts->status = !$user_contacts->status;
        $user_contacts->save();
        return redirect('user_contacts')->with('message', 'Change user_contacts status successfully');
    }
    
    /**
     * @param $id
     */
    public function view($id)
    {
        $data['user_contacts'] = User_contacts::where('user_id', Auth::user()->id)->find($id);
        return view('user_contacts/view', $data);

    }
}
