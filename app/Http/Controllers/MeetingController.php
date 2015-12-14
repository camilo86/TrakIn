<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Meeting;
use App\User;
use DateTime;
use Auth;
use Response;

class MeetingController extends Controller
{

    public function index()
    {
        return view('meeting.index')->with('meetings', Auth::user()->meetings);
    }

    public function create()
    {
        return view('meeting.create');
    }

    public function store(Request $request)
    {
        $meeting = new Meeting();

        $meeting->name = $request->input('name');
        $meeting->user_id = Auth::user()->id;
        $meeting->description = $request->input('description');
        $meeting->start_date = new DateTime($request->input('start_date'));
        $meeting->end_date = new DateTime($request->input('end_date'));
        $meeting->save();
        return redirect('/');
    }

    public function meetingCreationTool(Request $request)
    {
        $meeting = new Meeting();

        $meeting->name = $request->input('name');
        $meeting->user_id = Auth::user()->id;
        $meeting->description = $request->input('description');
        $meeting->start_date = new DateTime($request->input('start_date'));
        $meeting->end_date = new DateTime($request->input('end_date'));
        $meeting->save();
        return redirect('/');
    }

    public function show($id)
    {
        return view('meeting.show')->with('meeting', Meeting::find($id));
    }

    public function edit($id)
    {
        return view('meeting.edit')->with('meeting', Meeting::find($id));
    }

    public function update(Request $request, $id)
    {
        $meeting = Meeting::findOrFail($id);
        $this->validate($request, [
        'name' => 'required',
        'description' => 'required'
        ]);

        $input = $request->all();
        $meeting->fill($input)->save();

        return view('meeting.show')->with('meeting', Meeting::find($id));

    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);
        $meeting->delete();
        return redirect('/');
    }

    public function dashboard()
    {
         return View('dashboard.home')->with('meetings', Auth::user()->meetings);
    }

}
