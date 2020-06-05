<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __controller()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        return view('/frontend/profile',compact('user'));
    }

    public function update_image(Request $request)
    {
        $user = auth()->user();
        if($image = $request->file('image'))
        {
            $file_to_store = time() . '_' . $user->name . '_' . '.' . $image->getClientOriginalExtension();
            if($user->photo != null)
            {
                unlink('images/'. $user->photo);
            }
            $user->photo = $file_to_store;
            $user->save();
            $image->move(public_path('images') , $file_to_store);
            

            return response()->json([
                'uploaded_image' => '<img src="/images/'.$file_to_store .'"class="rounded-circle" height="180">',
            ]);

        }
    }
}
