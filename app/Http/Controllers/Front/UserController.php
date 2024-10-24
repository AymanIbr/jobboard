<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobSaved;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile()
    {
        $profile = Auth::user();
        return view('Front.profile', compact('profile'));
    }

    public function applications()
    {
        $applications = Application::with('job')->where('user_id', Auth::id())->get();
        return view('Front.users.applications', compact('applications'));
    }

    public function savedJobs()
    {
        $savedJobs = JobSaved::with('job')->where('user_id', Auth::user()->id)->get();
        return view('Front.users.savedjobs', compact('savedJobs'));
    }

    public function editDetails()
    {
        $userDetails = User::findOrFail(Auth::user()->id);
        return view('Front.users.editdetails', compact('userDetails'));
    }

    public function updateDetails(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'required|string|max:255',
            'bio' => 'required|string',
            'facebook' => 'required|url|max:150',
            'twiter' => 'required|url|max:150',
            'linkedin' => 'required|url|max:150',
        ]);

        $user = $request->user();
        $user->update($request->only(['name', 'job_title', 'bio', 'facebook', 'twiter', 'linkedin']));
        return redirect()->route('edit.details')->with('success', 'User details updated successfully!');
    }

    public function editCV()
    {
        $userCV = Auth::user()->cv;
        return view('Front.users.editcv', compact('userCV'));
    }

    public function updateCV(Request $request)
    {
        $validator = Validator::make($request->only('cv'), [
            'cv' => 'required|file|max:2048|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if ($request->hasFile('cv')) {

            if ($user->cv && Storage::disk('public')->exists($user->cv))
            {
                Storage::disk('public')->delete($user->cv);
            }
            $ex = $request->file('cv')->getClientOriginalExtension();
            $cv_name = time() . '_usercv.' . $ex;
            $request->file('cv')->storePubliclyAs('cvs', $cv_name, ['disk' => 'public']);
            $user->cv = 'cvs/' . $cv_name;
        }

        $user->save();
        return redirect()->route('edit.cv')->with('success', 'User CV updated successfully!');
    }
}
