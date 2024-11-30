<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $posts=Post::all();
    return view("posts.index",compact("posts"));
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
            if ($request->hasfile('images')) {
                $images = [];
                foreach ($request->file('images') as $image) {
                    $name =  $image->getClientOriginalName()."-" .time() .
                    $image->getClientOriginalExtension();
                    $image->move(public_path('images/post'), $name); // تأكد من أن المسار صحيح
                    $images[] = 'images/post/' . $name; // تخزين المسار النسبي
                }
            }

            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => json_encode($images),
            ]);

       return redirect()->route("posts.index")->with('success','posts add successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(Request $request, Post $post)
     {
         // التحقق من صحة البيانات
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string',
             'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

         // تحديث عنوان ووصف المنشور
         $post->title = $request->title;
         $post->description = $request->description;

         // معالجة الصور
         $images = [];
         if ($request->hasfile('images')) {
             // حذف الصور القديمة إذا كانت موجودة
             if ($post->image) {
                 $oldImages = json_decode($post->image);
                 foreach ($oldImages as $oldImage) {
                     if (file_exists(public_path($oldImage))) {
                         unlink(public_path($oldImage)); // حذف الصورة القديمة
                     }
                 }
             }

             // إضافة الصور الجديدة
             foreach ($request->file('images') as $image) {
                 $name =  $image->getClientOriginalName()."-" .time() .
                 $image->getClientOriginalExtension();
                 $image->move(public_path('images/post'), $name);
                 $images[] = 'images/post/' . $name;
             }
         } else {
             // إذا لم يتم تحميل أي صور جديدة، احتفظ بالصور القديمة
             $images = json_decode($post->image);
         }

         // تحديث حقل الصور
         $post->image = json_encode($images);

         // حفظ التغييرات
         $post->save();

         return redirect()->route("posts.index")->with('success', 'Post updated successfully');
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index")
        ->with('success','posts deleted successfully');

    }
}
