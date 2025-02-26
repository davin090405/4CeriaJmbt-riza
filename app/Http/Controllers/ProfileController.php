<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
use App\Models\House;
use App\Models\PhoneNumber;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, $tab): View
    {
        $user = User::with('PhoneNumber')->find(Auth::id());
        $contacts = Contact::all();
        $houses = House::with(['housePic' => function ($query){
            $query->limit(1);
        } ])->where('id_user', Auth::id())->get();
        return view('profile', compact('user', 'contacts', 'tab', 'houses'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->validate([
            'username'=>'sometimes|required|string|max:55|unique:users,username,'.Auth::id(),
            'email'=>'sometimes|required|string|email|max:255|unique:users,email,'.Auth::id()
        ]);
        
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if ($request->user()->isDirty('username')) {
            dd('Username is dirty and will be updated: ' . $request->user()->username);
        }
        $user = User::find(Auth::id());
        $user->username = $request->username;
        $user->save();

        $request->user()->save();


        return Redirect::route('profile.edit', 1)->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function addPhoneNumber(Request $request){
        $request->validate([
            'create_phoneNumber'=>['string', 'max:15']
        ]);
        PhoneNumber::create([
            'contact'=>$request->create_phoneNumber,
            'id_user'=>Auth::id()
        ]);
        return Redirect::route('profile.edit', 1)->with('status', 'Phone Number Added');
    }
    public function deletePhoneNumber($id){
        $phone = PhoneNumber::find($id);
        $phone->delete();
        return Redirect::route('profile.edit', 1)->with('status', 'Phone Number Deleted');
    }
    public function editPhoneNumber(Request $request, $id){
        $request->validate([
            'update_phoneNumber'=>['string', 'max:15']
        ]);
        $phone = PhoneNumber::find($id);
        $phone->contact = $request->update_phoneNumber;
        $phone->save();
        return Redirect::route('profile.edit', 1)->with('status', 'Phone Number Updated');
    }
}
