<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('admin.blog.blog', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'blogname' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:1,2',
        ]);

        $blog = new Blog();
        $blog->title = $request->blogname;
        $blog->description = $request->description;
        $blog->status = $request->status;

        // Tạo slug từ tiêu đề của blog
        $blog->slug = Str::slug($request->blogname);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image'), $imageName);
        $blog->thump = $imageName;

        if (Auth::check()) {
            $blog->user_id = Auth::user()->id;
        }
        $blog->save();

        return redirect('admin/blog/')->with('success', 'Blog created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $blog = Blog::findOrFail($id);

        $request->validate([
            'blogname' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'status' => 'required|in:1,2',
        ]);

        $blog->title = $request->blogname;
        $blog->description = $request->description;
        $blog->status = $request->status;

        // Tạo slug từ tiêu đề của blog
        $blog->slug = Str::slug($request->blogname);


        // Kiểm tra xem người dùng đã tải lên ảnh mới hay không
        if ($request->hasFile('image')) {

            $imagePath = public_path('image/' . $blog->thump);
            // Kiểm tra xem tệp ảnh tồn tại trước khi xóa
            if (file_exists($imagePath)) {
                // Xóa tệp ảnh
                unlink($imagePath);
            }
            
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $blog->thump = $imageName;
        }
        if (Auth::check()) {
            $blog->user_id = Auth::user()->id;
        }
        $blog->save();
        return redirect('admin/blog/')->with('success', 'Blog update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $blog = Blog::findOrFail($id);

        // Kiểm tra xem người dùng hiện tại có quyền xóa bài viết không (nếu cần)
        // if (!Auth::user()->can('delete', $blog)) {
        //     abort(403); // Trả về lỗi 403 Forbidden nếu không có quyền
        // }
        // Xóa ảnh liên quan nếu tồn tại
        if ($blog->thump) {
            // Đường dẫn đến thư mục chứa ảnh
            $imagePath = public_path('image/' . $blog->thump);

            // Kiểm tra xem tệp ảnh tồn tại trước khi xóa
            if (file_exists($imagePath)) {
                // Xóa tệp ảnh
                unlink($imagePath);
            }
        }

        // Xóa bài viết
        $blog->delete();

        return redirect('admin/blog/')->with('success', 'Blog deleted successfully.');
    }
}
