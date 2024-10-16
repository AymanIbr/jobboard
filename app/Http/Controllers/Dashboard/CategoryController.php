<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return response()->view('Dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('Dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatore = Validator($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'required|image|max:2048|mimes:png,jpg',
        ]);
        if (!$validatore->fails()) {
            $category = new Category();
            $category->name = $request->get('name');
            $category->active = $request->get('active');
            if ($request->hasFile('image')) {
                $ex = $request->file('image')->getClientOriginalExtension();
                $image_name = time() . '_category.' . $ex;
                $request->file('image')->storePubliclyAs('images', $image_name, ['disk' => 'public']);
                $category->image = 'images/' . $image_name;
            }
            $isSaved = $category->save();
            return response()->json([
                'message' => $isSaved ? 'Saved Successfuly' : 'Failed to Save'
            ], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validatore->getMessageBag()->first()
            ], Response::HTTP_BAD_REQUEST);
        }
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
    public function edit(Category $category)
    {
        return response()->view('Dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatore = Validator($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'active' => 'required|boolean',
            'image' => 'nullable|image|max:2048|mimes:jpg,png',
        ]);
        if (!$validatore->fails()) {
            $category->name = $request->get('name');
            $category->active = $request->get('active');
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($category->image);
                $ex = $request->file('image')->getClientOriginalExtension();
                $image_name = time() . '_category.' . $ex;
                $request->file('image')->storePubliclyAs('images', $image_name, ['disk' => 'public']);
                $category->image = 'images/'. $image_name;
            }
            $isUpdate = $category->save();
            return response()->json([
                'message' => $isUpdate ? 'Update Successfuly' : 'Failed to Save'
            ], $isUpdate ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json([
                'message' => $validatore->getMessageBag()->first()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        if ($isDeleted) {

            Storage::disk('public')->delete($category->image);
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
