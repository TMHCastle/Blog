<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function index(){
        $blogs = Blog::orderBy('created_at', 'desc')
                    ->paginate(10);

        return view('blog.index', compact('blogs'));
    }

    public function create(){
        return view('blog.create');
    }

    public function store(Request $request) //这里的 $request 是通过依赖注入的方法实例化的 Request 类的对象，包含的有所有请求的信息
    {
        // 我们只需要调用 Blog模型 的静态方法 create() 插入 $request->post() 数据即可   
        $blog = Blog::create($request->post()); //改方法的返回值是新插入的数据生成的对象
        // redirect() 页面重定向    
        return redirect()->route('blog.show', $blog); // 这里我们将 $blog 作为参数请求 BlogController@show 
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blog.show', compact('blog'));
    }

    public function edit($id){ 
        $blog = Blog::find($id);
        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id){
        $blog = Blog::find($id);
        $blog->update($request->post());
        return redirect()->route('blog.show', $blog);
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        session()->flash('success', '删除文章成功！');
        return redirect()->route('blog.index'); //跳转到首页
    }
}
