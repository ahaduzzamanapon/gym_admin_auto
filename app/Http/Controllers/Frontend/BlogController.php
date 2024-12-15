<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Schema;

class BlogController extends Controller
{
    
    
    public function index()
    {
        $blogs = Blog::latest()
        ->where('status', 1)
        ->select('id', 'title_slug', 'title', 'image')
        ->paginate(9);

    


        return view('frontend.blogs.blogs', compact('blogs'));
    }

    public function details($slug) {
        $blog = Blog::where('title_slug', $slug)->first();
    
        $blog_random = Blog::where('status', 1)
                           ->whereKeyNot($blog ? $blog->getKey() : null) // Exclude current blog
                           ->inRandomOrder()
                           ->paginate(6);
    
        return view('frontend.blog_details.blog_details', compact('blog', 'blog_random'));
    }
    
    

    public function admin_index(){
        $blogs = Blog::latest()->get();
        //  dd($blogs);
        return view('backend.blogs.index', compact('blogs'));
    }

    public function create(){
        return view('backend.blogs.create');
    }

    public function store(Request $request) {
       

        // if (!Schema::hasColumn('blogs', 'big_description')) {
        //     Schema::table('blogs', function ($table) {
        //         $table->text('big_description')->nullable();
        //     });
        // }
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required', // Adjust the image validation rules as needed
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) . '.' . $image->getClientOriginalExtension();
            
            $destinationPath = public_path('/blogimages');
            $image->move($destinationPath, $imageName);
        } else {
            // Handle the case when no image is uploaded
           
            Toastr::error('Please upload an image', 'Error');
            return redirect()->back();
        }
    
        // Store other data along with the image
        // For example:

    //     $folderPath = storage_path("app/blog_desc");
    //    // dd($folderPath);
    //     if (!file_exists($folderPath)) {
    //         mkdir($folderPath, 0777, true);
    //     }
    //     $filename = "blog_" . date('Ymd_His') . "_" . Str::random(5) . ".txt";
    //     file_put_contents("{$folderPath}/{$filename}", $request->description);




      $blog_check =  Blog::create([
            'title' => $request->title,
            'title_slug' => Str::slug($request->title) . '-' . Str::random(5), // 'my-first-post
            'description' => $request->description,
            // 'big_description' => "{$folderPath}/{$filename}",
            'image' => $imageName,
            'status' => 0,
            'created_at' => now(),
        ]);
        if(!$blog_check){
            Toastr::error('Blog post not created successfully', 'Error');
            return redirect()->back();
        }
    
        Toastr::success('Blog post created successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }
    public function show($id){
        
        $single_blog = Blog::find($id);
        return view('backend.blogs.show', compact('single_blog'));
    }

    public function edit($id){
        $single_blog = Blog::find($id);
        return view('backend.blogs.edit', compact('single_blog'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
      
        if($request->status == '0'){
            $status = 0;
        }
        else{
            $status = 1;
        }

        $blog = Blog::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '_' . str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT) . '.' . $image->getClientOriginalExtension();
            if(file_exists(public_path('blogimages/'.$blog->image))){
                unlink(public_path('blogimages/'.$blog->image));
            }
            $destinationPath = public_path('/blogimages');
            $image->move($destinationPath, $imageName);
            $blog->image = $imageName;
        }else{
            $imageName = Blog::find($id)->image;
            $blog->image = $imageName;
        }
        
        $blog->title = $request->title;
        $blog->title_slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->status = $status;
        $blog->created_at = now();
        $blog->save();
        Toastr::success('Blog post updated successfully', 'Success');
        return redirect()->route('admin.blogs.index');
    }

    public function delete($id){
        $blog = Blog::find($id);
        if(file_exists(public_path('blogimages/'.$blog->image))){
            unlink(public_path('blogimages/'.$blog->image));
        }
        $blog->delete();
        return response()->json(['success' => 'Blog post deleted successfully', 'status' => 'success', 'code' => 200]);
    }
    
}
