<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\Hobby;
use App\Models\UserHobby;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $states = State::all();
        $hobbies = Hobby::all();

        return view('users.create', compact('states', 'hobbies'));
    }
    public function getCity(Request $request)
    {
        $stateId = $request->input('state_id');
        $cities = City::where('state_id', $stateId)->get();

        return response()->json($cities);
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'contact_number' => 'required',
        'gender' => 'required',
        'profile_pic' => 'image|max:2048',
        'state_id' => 'required',
        'city_id' => 'required',
        'hobbies' => 'array',
    ]);

    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->contact_number = $request->input('contact_number');
    $user->gender = $request->input('gender');
    $user->state_id = $request->input('state_id');
    $user->city_id = $request->input('city_id');

    if ($request->hasFile('profile_pic')) {
        $profilePic = $request->file('profile_pic');
        $profilePicPath = $profilePic->store('profile_pics', 'public');
        $user->profile_pic = $profilePicPath;
    }
// echo "<pre>"; print_r($user); exit;
    $user->save();

    if ($request->input('hobbies')) {
        $user->hobbies()->sync($request->input('hobbies'));
    }
    return redirect()->route('users.index')->with('success', 'User created successfully');
}


    public function show($id)
    {
        $user=User::with('hobbies')->findOrFail($id);
        //echo "<pre>"; print_r($user); exit;
        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user=User::with('hobbies')->findOrFail($id);

        $states = State::all();
        $cities = City::where('state_id', $user->state_id)->get();
        $hobbies = Hobby::all();
       // $user_hobbie = Hobby::all();
        $errors = Validator::make([], [])->getMessageBag();
       // echo "<pre>"; print_r($user); exit;

        return view('users.edit', compact('user', 'states', 'cities', 'hobbies'))->withErrors($errors);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'gender' => 'required',
            'profile_pic' => 'image|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
            'hobbies' => 'array',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->contact_number = $request->input('contact_number');
        $user->gender = $request->input('gender');
        $user->state_id = $request->input('state_id');
        $user->city_id = $request->input('city_id');
    
        if ($request->hasFile('profile_pic')) {
            $profilePic = $request->file('profile_pic');
            $profilePicPath = $profilePic->store('profile_pics', 'public');
            $user->profile_pic = $profilePicPath;
        }
    
        $user->save();
    
        if ($request->input('hobbies')) {
            $user->hobbies()->sync($request->input('hobbies'));
        } else {
            $user->hobbies()->detach(); // Remove all existing hobbies if no hobbies are selected
        }
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('users.index')->with('error', 'User not found');
        }

        $user->hobbies()->detach();
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
