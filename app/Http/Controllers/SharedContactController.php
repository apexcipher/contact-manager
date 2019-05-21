<?php

namespace App\Http\Controllers;

use App\SharedContact as Contacts_shared;
use App\UserContacts as User_contacts;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Response;

class SharedContactController extends Controller
{
    public function index()
    {
        // $data['contacts_shareds'] = Contacts_shared::all();
        $data['contacts_shareds'] = \DB::table('user_contacts')->select('user_contacts.*')->join('contacts_shared','user_contacts.id','=','contacts_shared.user_contacts_id')->where('contacts_shared.user_id', Auth::user()->id)->get();
        // $data['contacts_shareds'] = Contacts_shared::where('shared_to', Auth::user()->id)->get();
        return view('contacts_shared/index', $data);
    }

    public function add()
    {
        return view('contacts_shared/add');
    }

    public function addPost(Request $request)
    {
        foreach ($request->contactList as $key => $value) {
            
            $contacts_shared_data[] = array(
                'user_contacts_id' => $value,
                'shared_to' => $request->shared_to,
                'user_id'          => Auth::user()->id,
            );
            $contacts_shared_id = Contacts_shared::insert($contacts_shared_data);
        }
        // // $contacts_shared_data = array(
        //     'user_contacts_id' => Input::get('user_contacts_id'),
        //     'shared_to' => Input::get('shared_to'),
        //     'user_id'          => Auth::user()->id,
        // );
        return Response::json(['status' => 'true', 'data' => $contacts_shared_data ],200);
        // return redirect('contacts_shared')->with('message', 'Contacts_shared successfully added');
    }
    
    /**
     * @param $id
     */
    public function delete($id)
    {
        $contacts_shared = Contacts_shared::find($id);
        $contacts_shared->delete();
        return redirect('contacts_shared')->with('message', 'Contacts_shared deleted successfully.');
    }
    
    /**
     * @param $id
     */
    public function edit($id)
    {
        $data['contacts_shared'] = Contacts_shared::find($id);
        return view('contacts_shared/edit', $data);
    }

    public function editPost()
    {
        $id              = Input::get('contacts_shared_id');
        $contacts_shared = Contacts_shared::find($id);

        $contacts_shared_data = array(
            'user_contacts_id' => Input::get('user_contacts_id'),
             'shared_to' => Input::get('shared_to'),
            'user_id'          => Auth::user()->id,
        );
        $contacts_shared_id = Contacts_shared::where('id', '=', $id)->update($contacts_shared_data);
        return redirect('contacts_shared')->with('message', 'Contacts_shared Updated successfully');
    }

    /**
     * @param $id
     */
    public function changeStatus($id)
    {
        $contacts_shared         = Contacts_shared::find($id);
        $contacts_shared->status = !$contacts_shared->status;
        $contacts_shared->save();
        return redirect('contacts_shared')->with('message', 'Change contacts_shared status successfully');
    }
    
    /**
     * @param $id
     */
    public function view($id)
    {
        // $data['contacts_shareds'] = Contacts_shared::find($id);
        $data['user_contacts'] = User_contacts::find($id);
        return view('contacts_shared/view', $data);

    }
}
