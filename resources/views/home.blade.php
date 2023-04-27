@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>ADMIN PANEL</h1>
                    
                    <a href="{{ route('admin.create') }}">Crear publicacion</a>
                    <table class="table table-dark table-hover">
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th></th>
                            <th></th>
                        </tr>

                        @foreach ($posts as $post)

                        <tr>
                            <td>{{ $post->name }}</td>
                            <td>


                            @if(  $post->status  == 1)
                                    <p>Visible</p>
                            @else
                                <p>Hidden</p>
                            @endif
                            </td>
                            <td><img width='100px'src="{{ asset('storage/images/'.$post->url) }}" alt="{{ $post->name }}"></td>
                            <td><a href="{{ route('admin.delete', ['id' => $post->id]) }}" class="btn btn-danger">DELETE</a></td>
                            <td><a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="btn btn-primary">EDIT</a></td>
                        </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
