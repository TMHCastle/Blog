@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">文章列表</div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th>文章标题</th>
                            <th>发布时间</th>
                            <th>相关操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->created_at }}</td>
                                @auth
                                    <td><a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-info">编辑文章</a></td>
                                @endauth
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $blogs->links() }}
                    </tfoot>
                </table>
            </div>     
        </div>   
    </div>
</div>
@endsection