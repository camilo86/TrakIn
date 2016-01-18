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
use Redirect;
use Session;
use Carbon;
use DateTimeZone;

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
        $meeting->people_in_meeting = "[]";
        $meeting->current_people_in_meeting = "[]";
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
        $meeting->people_in_meeting = "[]";
        $meeting->current_people_in_meeting = "[]";
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

    public function logger($meeting_id)
    {
        return view('meeting.logger')->with('meeting', Meeting::find($meeting_id));
    }

    public function log(Request $request, $id)
    {
        $temp_pin = $request->input('pin');
        $msg = "";

        if(User::where('pin', '=', $temp_pin)->count() <= 0)
        {    
            $msg = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Epic Fail!</strong> I cannot authenticate you. Contact @camilo_g86.</div>';
        }else {
            $current_user = User::where('pin', '=', $temp_pin)->firstOrFail();
            $people_in_meeting = json_decode(Meeting::find($id)->people_in_meeting, true);
            $current_people_in_meeting = json_decode(Meeting::find($id)->current_people_in_meeting, true);

            if(count($current_people_in_meeting) <= 0)
            {
                // I'm about to log someone, so I must go and setup starting time
                $temp = Meeting::find($id);

                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('America/New_York'));

                $temp->last_check = intval($now->format('h'));
                $temp->save();
            }else {
                $boston_timezone = new DateTimeZone('America/New_York');

                $now = new DateTime();
                $now->setTimezone($boston_timezone);
                $now_h = intval($now->format('h'));

                $last_check = Meeting::find($id)->last_check;

                foreach($current_people_in_meeting as $user_id)
                {
                    $temp_u = User::find($id);
                    $temp_u->hours += abs($now_h-$last_check);
                    $temp_u->save();
                }

                $temp_m = Meeting::find($id);
                $temp_m->last_check = intval($now->format('h'));
                $temp_m->save();
            }




            if(in_array($current_user->id, $people_in_meeting))
            { // Check out from meeting
                $temp = Meeting::find($id);

                if(in_array($current_user->id, $current_people_in_meeting))
                {
                    $temp_current_people_in_meeting = json_decode($temp->current_people_in_meeting, true);
                    $temp_current_people_in_meeting = array_diff($temp_current_people_in_meeting, array($current_user->id));
                    $temp->current_people_in_meeting = json_encode($temp_current_people_in_meeting);
                    $temp->save();
                    $msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Nice!</strong> You have successfuly checked out.</div>';
                }else
                {
                    $temp_current_people_in_meeting = json_decode($temp->current_people_in_meeting, true);
                    array_push($temp_current_people_in_meeting, $current_user->id);
                    $temp->current_people_in_meeting = json_encode($temp_current_people_in_meeting);
                    $temp->save();
                    $msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Coolio!</strong> You have checked in!.</div>';
                }
            }else
            {
                // Check in to meeting and adds to current people in meeting list
                $temp = Meeting::find($id);
                $temp_current_people_in_meeting = json_decode($temp->current_people_in_meeting, true);
                array_push($people_in_meeting, $current_user->id);
                array_push($temp_current_people_in_meeting, $current_user->id);
                $temp->people_in_meeting = json_encode($people_in_meeting);
                $temp->current_people_in_meeting = json_encode($temp_current_people_in_meeting);
                $temp->save();

                $msg = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Awesome!</strong> You have checked in!.</div>';
            }
        }
        Session::flash('msg', $msg);
        return Redirect::back();
    }
}
