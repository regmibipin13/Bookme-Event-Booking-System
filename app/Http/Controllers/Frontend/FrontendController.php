<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Reservation;

class FrontendController extends Controller
{
    public function home()
    {
    	return view('frontend.pages.home');
    }

    public function showsandprograms(Request $request)
    {
        if($request->search !== null) {
            $events = Event::where('name','like','%'.$request->search.'%')->paginate(20);
        } else {
            $events = Event::orderBy('id','desc')->paginate(20);
        }
    	return view('frontend.pages.shows_and_programs',compact('events'));
    }

    public function showsandprogramsDetail(Event $event)
    {
        if($event->total_seats > $event->total_reservation) {
            if(request()->ajax()) {
                return response()->json(json_decode($event->custom_seats));
            }
        	return view('frontend.pages.detail_shows_and_programs',compact('event'));
        } else {
            return abort(404);
        }
    }

    public function success()
    {
        return view('frontend.pages.success');
    }
    public function account()
    {
        $user = auth()->user()->load(['reservations']);
        return view('frontend.account.index',compact('user'));
    }

    public function update_account(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['confirmed','required'],
        ]);
        auth()->user()->update($request->except(['password_confirmation']));
        return redirect()->back()->with('success','Profile Updated Successfully');
    }

    public function reserveSeats(Request $request, Event $event)
    {
        if($event->is_custom_seat) {

            // real event seats
            $eventSeats = json_decode($event->custom_seats);

            // requested event seats
            $requestedSeats = $request->seats;
            $requestedSeatsArray = collect($requestedSeats)->map->name->toArray();

            $totalSeatsToReserved = implode(',', $requestedSeatsArray);

            if($event->available_seats < count($requestedSeatsArray)) {
                return redirect()->back()->with('danger',count($requestedSeatsArray).'seats are not available');
            }
            // looping each real seats
            foreach($eventSeats as $key => $seat) {
                if(in_array($seat->name,$requestedSeatsArray)) {
                    $eventSeats[$key]->occupied = true;
                }
            }
            $event->custom_seats = json_encode($eventSeats);
            $event->save();
        } else {
            $totalSeatsToReserved = $request->seats;

            if($event->available_seats < $totalSeatsToReserved) {
                return redirect()->back()->with('danger',$totalSeatsToReserved.'seats are not available');
            }
        }

        Reservation::create([
            'seats' => $totalSeatsToReserved,
            'event_id' => $event->id,
            'user_id' => auth()->id(),
        ]);

        if(request()->ajax()) {
            return response()->json(['success','Seat Reserved Successfully']);
        }

        return redirect()->to('/success');

    }
}













