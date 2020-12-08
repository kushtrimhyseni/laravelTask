@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Articles Table</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}" title="Create an article"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Published Date</th>
            <th>Status</th>
            <th>Date Created</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->publish_date }}</td>
                <td>{{ $article->is_publish? "Published":"Unpublished" }}</td>
                <td>{{ date_format($article->created_at, 'jS M Y') }}</td>
                <td>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $articles->links() !!}

@endsection