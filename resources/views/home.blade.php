@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
    <div  style="margin-left: 250px; float:left; width: 50%; height: 800px; overflow-y:scroll">
        @foreach($posts as $post)
        <div style=" float:left; margin: 10px; padding:5px; width: 200px; height: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
            <div style=" float: left; width: 100%; height: 200px; background-color: lightblue;">
                <img style="width: 100%; height: 200px;" src="{{url('storage/'.$post->src)}}">
                <div style="width: 100%; font-size: 14px; padding: 3px;"> {{ $post->name }}</div>
                <div style="background-color: #FAF0E6;width: 100%; padding: 3px;"> {{ $post->price }} руб.</div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
