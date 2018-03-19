@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-md-10 col-md-offset-1">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <p>修改一篇文章</p>
                         <a href="{{ url('admin/article') }}">返回</a>
                     </div>
                     <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <b><strong>修改失败</strong>输入不符合要求</b><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                         <form action="{{ url('admin/article/'.$article->id) }}" method="POST">
                             {{ method_field('PATCH') }}
                             {!! csrf_field() !!}
                             <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{ $article->title }}">
                             <br>
                             <textarea name="body" rows="10" class="form-control" required="required" placeholder="请输入内容">{{ $article->body }}</textarea>
                             <br>
                             <button class="btn btn-lg btn-info">確認</button>
                         </form>
                     </div>
                 </div>
             </div>
        </div>
    </div>
@stop