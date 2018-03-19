@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
             <div class="col-md-10 col-md-offset-1">
                 <div class="panel panel-default">
                     <div class="panel-heading">
                         <p>新增一篇文章</p>
                         <a href="{{ url('admin/article') }}">返回</a>
                     </div>
                     <div class="panel-body">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <b><strong>新增失败</strong>输入不符合要求</b><br>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif

                         <form action="{{ url('admin/article') }}" method="POST">
                            {!! csrf_field() !!}
                             <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                             <br>
                             <textarea name="body" rows="10" class="form-control" required="required" placeholder="请输入内容"></textarea>
                             <br>
                             <button class="btn btn-lg btn-info">新增文章</button>
                         </form>
                     </div>
                 </div>
             </div>
        </div>
    </div>
@stop