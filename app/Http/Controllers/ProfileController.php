<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    /**
     * Update the user's profile information.
     */


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

    public function edit(Request $request){
        $user_id = Auth::user()->id;
        $users = User::where('id', $user_id)->get();
       $userrole= $users[0]['role'];
        $user = User::where('id',$user_id)->first();
        return view('profile.edit',compact('user','userrole'));
    }

    public function update(Request $request){
        // echo 123;exit;
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000',
            'email' => 'required',
            // 'password' => 'required',
        ]);

        $user = User::where('id',Auth::user()->id)->first();

        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'),$imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->email = $request->email;

        $user->update();
        return redirect('profile/edit')->withSuccess('profile Updated !!!');
    }
}

