<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function index()
    {
        $query = Bookings::select('bookings.*', 'users.name as user_name');
        $query->leftjoin('users', 'bookings.user_id', '=', 'users.id');
        $data = $query->get();
        return view('AdminDashboard.Bookings.index', ['data' => $data]);
    }
    public function userBookings()
    {
        $query = Bookings::select('bookings.*', 'users.name as user_name');
        $query->leftjoin('users', 'bookings.user_id', '=', 'users.id');
        $query->where('bookings.user_id', Auth::user()->id);
        $data = $query->get();
        return view('UserDashboard.Bookings.index', ['data' => $data]);
    }
    public function add()
    {
        $data = User::get();
        return view('AdminDashboard.Bookings.addEdit', ['data' => $data]);
    }
    public function save(Request $request)
    {
        // if (!Auth::check()) {
        //     return back()->with('error', 'User not authenticated');
        // }
        // dd([
        //     'user_type' => Auth::user()->user_type,
        //     'auth_user_id' => Auth::id(),
        //     'request_user_name' => $request->get('user_name'),
        //     'final_user_id' => Auth::user()->user_type == 1
        //         ? $request->get('user_name')
        //         : Auth::id()
        // ]);

        $request->validate([
            'booking_name' => 'required|string',
            'booking_on' => 'required|date',
            'booking_status' => 'required|in:0,1',
            'user_name' => 'required_if:auth_user_type,1', // only required if admin
        ]);

        $userId = Auth::check() ? (
            Auth::user()->user_type == 1
            ? $request->get('user_name')
            : Auth::id()
        ) : null;

        if (!$userId) {
            return back()->with('error', 'User ID is missing.');
        }
        $booking = new Bookings([
            'name' => $request->get('booking_name'),
            'booking_datetime' => $request->get('booking_on'),
            'status' => $request->get('booking_status'),
            'user_id' => Auth::user()->user_type == 1 ? $request->get('user_name') : Auth::user()->id,
        ]);
        $booking->save();
        return redirect()->route('booking.all')->with('success', 'Booking saved successfully');
        ;
    }
    public function getBookingById($id)
    {
        $data = User::get();
        $booking = Bookings::find($id);
        return view('AdminDashboard.Bookings.addEdit', ['data' => $data, 'booking' => $booking]);
    }
    public function updateBookingById(Request $request, $id)
    {
        $booking = Bookings::find($id);
        $booking->name = $request->get('booking_name');
        $booking->booking_datetime = $request->get('booking_on');
        $booking->status = $request->get('booking_status');
        $booking->user_id = Auth::user()->user_type == 1 ? $request->get('user_name') : Auth::user()->id;
        $booking->save();
        if (Auth::user()->user_type == 1) {
            $route = 'booking.all';
        } else {
            $route = 'booking.user';
        }
        return redirect()->route($route);
    }
    public function viewDelete($id)
    {
        if (Auth::user()->user_type == 1) {
            $view = 'AdminDashboard.Bookings.delete';
        } else {
            $view = 'UserDashboard.Bookings.delete';
        }
        return view($view);
    }
    public function delete($id)
    {
        $status = Bookings::where('id', $id)->delete();
        if (Auth::user()->user_type == 1) {
            $route = 'booking.all';
        } else {
            $route = 'booking.my';
        }
        return redirect()->route($route);
    }
}
