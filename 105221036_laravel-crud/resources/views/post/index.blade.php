@extends('layouts.app')

@section('title', 'Semua Post')
 
@section('content')
<div class="wrapper">
<h1 style="text-align: center;">Semua Post</h1>

@if (session('success'))
    <div class="alert-success">
       <p>{{ session('success') }}</p> 
    </div>
@endif
<a href="{{ route('post.create') }}" class="btn btn-primary my-3">Add Book</a>
<table style="width:100%; border:0;margin:0">
    <thead>
        <tr>
            <th>Title</th>
            <th>Body</th>
            <th colspan='2'>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($posts as $post)
        <tr>
            <td style="width: 200px" >{{ $post->title}}</td>
            <td  style="width: 500px" >{{ $post->body }}</td> 
            <td style="width: 100px"><a href="{{ route('post.edit', $post->id) }}" class="btn btn-success my-3">Edit</a></td>
            <form method="POST" action="{{ url('/post', $post->id ) }}">
                @csrf
                @method('DELETE')
            <td style="width: 100px"><button class="btn-red">Hapus</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
</table> 
</div>
@endsection

