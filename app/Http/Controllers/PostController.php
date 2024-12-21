<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use tidy;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $image->getClientOriginalName() . '-' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/posts'), $imageName);
                $images[] = $imageName;
            }
        }
    
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'images' => json_encode($images), // تأكد من تخزين الصور بتنسيق مناسب
        ]);
    
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact('post'));
    
        /* dd($post); */
}

    //طريقة 
    /* public function show($id){
        $post=Post::where("id",$id)->get();
        dd($post);
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
//هذا السطر وظيفته التأكد من ان الامور تمام ومافي ايرور 
/*     dd($post);
 */}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        /* $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imageName = $request->file("image")->getClientOriginalName() . "-" . time() . $request->file("image")->getClientOriginalExtension();
            $request->file("image")->move(public_path("images/posts"), $imageName);
            $data['image'] = $imageName;
        }
    
        $post->update($data);
    
        return redirect()->route('posts.index', $post->id); */
        /* dd($request); */

        if ($request->has('remove_images')) {
            $existingImages = json_decode($post->images, true);
            $imagesToKeep = array_diff($existingImages, $request->remove_images);
            
            foreach ($request->remove_images as $imageToRemove) {
                $imagePath = public_path('images/posts/' . $imageToRemove);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // حذف الصورة من النظام
                }
            }
        } else {
            $imagesToKeep = json_decode($post->images, true);
        }
    
        $newImages = [];
        if($request->hasFile('new_images')){
            foreach($request->file('new_images') as $image){
                $imageName = time() . '-' . $image->getClientOriginalName();
                $image->move(public_path('images/posts'), $imageName);
                $newImages[] = $imageName;
            }
        }
    
        $allImages = array_merge($imagesToKeep, $newImages);
    
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'images' => json_encode($allImages)
        ]);
    
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }
    
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
