<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller
{
    public $blog,$image,$imageName,$directory,$imgUrl;
    public  function addBlog()
    {
        return view('userDashboard.blog.add-blog');
    }
    public function saveBlog(Request $request)
    {
        $this->blog = new Blog();
        $this->blog->author_id = $request->author_id;
        $this->blog->title = $request->title;
        $this->blog->slug = $this->makeSlug($request);
        $this->blog->description = $request->description;
        $this->blog->image =$this->saveImage($request);
        $this->blog->save();
        return back()->with('message', 'Blog saved successfully');
    }
    private function saveImage($request){
        $this->image=$request->file('image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='dashboardAsset/blog-image/';
        $this->imgUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imgUrl;
    }
    private function makeSlug($request){
        if($request->slug){
            $str=$request->slug;
            return preg_replace('/\s+/u','-',trim($str));
        }
        $str=$request->title;
        return preg_replace('/\s+/u','-',trim($str));
    }
    public function manageBlog(){
        $user_id = Auth::id();
        $blogs =  Blog::where('author_id', $user_id)->orderby('id','desc')->get();
        return view('userDashboard.blog.manage-blog',[
            'blogs'=>$blogs
        ]);
    }
    public function status($id)
    {
        $blog = Blog::find($id);

        if($blog->status == 1){
            $blog->status = 0;
        }else{
            $blog->status=1;
        }
        $blog->save();
        return back();
    }
    public function editBlog($id)
    {
        $blog = Blog::find($id);
        return view('userDashboard.blog.edit-blog',compact('blog'));
    }
    public function updateBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->slug = $this->makeSlug($request);
        $blog->description = $request->description;
        if($request->file('image')) {
            if(is_file($blog->image)){unlink($blog->image);}
            $blog->image = $this->saveImage($request);
        }
        $blog->save();
        return redirect('manage-blog')->with('message', 'Blog Updated successfully');
    }
    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        if($request->file('image')) {
            if(is_file($blog->image)){unlink($blog->image);}
        }
        $blog->delete();
        return back()->with('message','Deleted Blog successfully');
    }
}
