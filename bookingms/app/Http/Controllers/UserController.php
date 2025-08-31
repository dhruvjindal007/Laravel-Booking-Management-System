<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\User;
use App\Models\WebPage;
use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = User::get();
        return view('AdminDashboard.Users.index', ['data' => $data]);
    }
    public function add()
    {
        return view('AdminDashboard.Users.addEdit');
    }
    public function save(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'phone_no' => 'nullable|string|max:15',
        //     'user_type' => 'required|in:1,2',
        // ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
            'password' => Hash::make('secret'),
            'user_type' => $request->get('user_type') // 1 for admin, 2 for user
        ]);
        $user->save();
        return redirect()->route('user');
    }
    public function edit($id)
    {
        $data = User::find($id);
        return view('AdminDashboard.Users.addEdit', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:users,email',
        //     'phone_no' => 'nullable|string|max:15',
        //     'user_type' => 'required|in:1,2',
        // ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone_no = $request->get('phone_no');
        $user->password = Hash::make('secret');
        $user->user_type = $request->get('user_type'); // 1 for admin, 2 for user
        $user->save();
        return redirect()->route('user');
    }
    public function viewDelete($id)
    {
        $data = User::findOrFail($id);
        return view('AdminDashboard.Users.delete', compact('data'));
    }
    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user')->with('success', 'User deleted successfully.');
    }
    public function getProfile()
    {
        // Logic to get user profile
        $data = User::find(Auth::user()->id);
        if (Auth::user()->user_type == 1) {
            $view = 'AdminDashboard.Profile.index';
        } else {
            $view = 'UserDashboard.Profile.index';
        }
        return view($view, ['data' => $data]);
    }
    public function saveProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone_no = $request->get('phone_no');
        $user->password = Hash::make('secret');
        $user->user_type = $request->get('user_type'); // 1 for admin, 2 for user
        $user->save();
        return redirect()->route('user.profile.get');
    }
    public function admindashboard()
    {
        // Logic for admin dashboard
        $data['totalUsers'] = $data['adminUsers'] = $data['clientUsers'] = $data['totalBookings'] = $data['completedBookings'] = $data['totalWebpages'] = $data['activeWebpages'] = 0;
        $data['totalUsers'] = User::count();
        $data['adminUsers'] = User::where('user_type', 1)->count();
        $data['clientUsers'] = User::where('user_type', 2)->count();

        $data['totalBookings'] = Bookings::count();
        $data['completedBookings'] = Bookings::where('status', 3)->count();

        $data['totalWebpages'] = WebPage::count();
        $data['activeWebpages'] = WebPage::where('status', 1)->count();

        return view('AdminDashboard.index', ['data' => $data]);
    }
    public function userDashboard()
    {
        $data['totalBookings'] = Bookings::where('user_id', Auth::user()->id)->count();
        $data['completedBookings'] = Bookings::where('status', 3)->where('user_id', Auth::user()->id)->count();
        return view('UserDashboard.index', ['data' => $data]);
    }
}
