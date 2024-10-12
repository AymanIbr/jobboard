<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('category')->paginate(10);
        return response()->view('Dashboard.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('active', true)->get();
        return response()->view('Dashboard.jobs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_region' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'job_type' => 'required|string|in:Part Time,Full Time',
            'category_id' => 'required|exists:categories,id',
            'vacancy' => 'required|integer|min:1',
            'salary' => 'required|numeric|min:0',
            'experience' => 'required|string|in:1-3 years,3-6 years,6-9 years',
            'gender' => 'required|string|in:M,F',
            'application_deadline' => 'required|date',
            'jobdescription' => 'required|string',
            'responsibilities' => 'required|string',
            'education_experience' => 'required|string',
            'other_benifits' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $slug = strtolower(str_replace(' ', '-', $request->job_title));

        $job = Job::create($request->except('image', 'logo') + [
            'slug' => $slug,
            'image' => $this->uploadFile($request->file('image')),
            'logo' => $this->uploadFile($request->file('logo')),
        ]);

        return response()->json([
            'message' => 'Saved Successfully',
            'job' => $job
        ], 201);
    }

    private function uploadFile($file)
    {
        if ($file) {
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storePubliclyAs('images', $filename, ['disk' => 'public']);
            return 'images/' . $filename;
        }
        return null;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        // \dd($job->gender);
        $categories = Category::where('active', '=', true)->get();
        return response()->view('Dashboard.jobs.edit', compact('job', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        $validator = Validator($request->all(), [
            'job_title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'job_region' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'job_type' => 'required|string|in:Part Time,Full Time',
            'category_id' => 'required|exists:categories,id',
            'vacancy' => 'required|integer|min:1',
            'salary' => 'required|numeric|min:0',
            'experience' => 'required|string|in:1-3 years,3-6 years,6-9 years',
            'gender' => 'required|string|in:M,F',
            'application_deadline' => 'required|date',
            'jobdescription' => 'required|string',
            'responsibilities' => 'required|string',
            'education_experience' => 'required|string',
            'other_benifits' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
        $slug = strtolower(str_replace(' ', '-', $request->job_title));

        $oldImage = $job->image;
        $oldLogo = $job->logo;

        $imagePath = $request->file('image') ? $this->uploadFile($request->file('image')) : $oldImage;
        $logoPath = $request->file('logo') ? $this->uploadFile($request->file('logo')) : $oldLogo;

        $job->update($request->except('image', 'logo') + [
            'slug' => $slug,
            'image' => $imagePath,
            'logo' => $logoPath,
        ]);

        if ($request->file('image') && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }
        if ($request->file('logo') && $oldLogo) {
            Storage::disk('public')->delete($oldLogo);
        }
        return response()->json([
            'message' => 'Saved Successfully',
            'job' => $job
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        $isDeleted  = $job->delete();
        if ($isDeleted) {
            $images = [$job->image, $job->logo];
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
            return response()->json([
                'title' => 'Success',
                'text' => 'User Deleted Successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Failed',
                'text' => 'User Deleted Failed',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
