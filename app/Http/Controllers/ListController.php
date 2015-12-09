<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\UserList;
use Auth;

class ListController extends Controller
{
    public function index()
    {
        return view('list.index')->with('lists', Auth::user()->lists);
    }

    public function create()
    {
        return view('list.create');
    }

    public function store(Request $request)
    {
        $list = new UserList();
        $list->user_id = Auth::user()->id;
        $list->name = $request->input('name');
        $list->description = $request->input('description');
        $list->save();
        return redirect('/list');
    }

    public function show($id)
    {
        $data = array('list' => UserList::find($id), 'users_in_list' => UserList->getUsers($id));
        return view('list.show')->with('list', $data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
