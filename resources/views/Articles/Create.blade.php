@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}" title="Go back" style="margin-left: 50px;"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('articles.store') }}" method="POST" >
        @csrf

        <div class="row d-block">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-left: 50px;">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <strong>Content:</strong>
                    <input type="text" name="content" class="form-control" placeholder="Content">
                </div>
            </div>
            <div class="col-md-4">
            <div class="form-group col-md-4" style="margin-left:38px">
                <strong>Status:</strong><br>
                 <label>Published</label>
                   <input type="radio" name="is_publish" value="true">
                 <label>Unpublished</label>
                     <input type="radio" name="is_publish" value="false">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group col-md-4" style="margin-left:38px">
                <strong>Published Date:</strong><br>
                <input type="date" name="publish_date">                 
            </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-start">
                <button type="submit" class="btn btn-primary" style="margin-left: 50px;">Submit</button>
            </div>
        </div>

    </form>
@endsection