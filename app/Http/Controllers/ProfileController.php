<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\UserInformation;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {   
        $fullName = $request->user()->name;
        // dd($request->user()->userinfo());
        // Split the full name into an array of words
        $nameParts = explode(" ", $fullName);

        // Extract the first letter of the first name
        $firstNameInitial = strtoupper(substr($nameParts[0], 0, 1));

        // Extract the first letter of the last name
        $lastNameInitial = strtoupper(substr($nameParts[count($nameParts) - 1], 0, 1));
        $nameTag = $firstNameInitial . $lastNameInitial;
        return view('profile.edit', [
            'nameTag' => $nameTag,
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();
        $isInfoExists = UserInformation::where('user_id','=',$request->user()->id)->first();
        if(!$isInfoExists){
            $userInfo = new UserInformation();
            $userInfo->user_id = $request->user()->id;
            $userInfo->mobile = $request->mobile;
            $userInfo->city = $request->city;
            $userInfo->state = $request->state;
            $userInfo->pin = $request->pin;
            $userInfo->address = $request->address;
    
            $userInfo->save();
        }else{            
            $isInfoExists->mobile = $request->mobile;
            $isInfoExists->city = $request->city;
            $isInfoExists->state = $request->state;
            $isInfoExists->pin = $request->pin;
            $isInfoExists->address = $request->address;

            $isInfoExists->save();

        }
        
        // dd($userInfo);
        return Redirect::route('profile.edit')->with('status', 'Profile Updated.');
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
}
