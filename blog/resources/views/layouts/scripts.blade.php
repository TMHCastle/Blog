@extends('layouts.app')

@section('scripts')
<script> 
    function deleteConfirm(id) {     
        var confirm = window.confirm('确认要删除这篇文章吗？');        
        if(confirm === true) {
            $("#delete-blog-" + id).submit(); //提交表单
        }else {    
            window.alert('你选择不删除！');
        }
    }
</script>
@endsection