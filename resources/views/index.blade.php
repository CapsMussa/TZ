@extends('layouts.app')

@section('content')

    <main class="py-4">
        <div style="margin-left: 25px;">
            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                <svg xmlns="http://www.w3.org/2000/svg"  width="50" height="50" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </a>
        </div>


        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Меню</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
            </div>
            <div style="text-align: center;">
                <form action="../index" method="get">
                    <input type="text" name="name" placeholder="Найти">
                    <input type="submit" value="Найти">
                </form>
            </div>
            <div class="offcanvas-body">
                <div>
                    @foreach($categories_idx as $cat_idx)
                        <a href="?category_id={{$cat_idx->id}}">{{$cat_idx->title}}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <div  style="margin-left: 250px; float:left; width: 50%; height: 800px; overflow-y:scroll">

        @foreach($posts as $post)
            <div style=" float:left; margin: 10px; padding:5px; width: 200px; height: 300px; box-shadow: 0 0 10px rgba(0,0,0,0.5);">
                <div style=" float: left; width: 100%; height: 200px; background-color: lightblue;">
                    <img style="width: 100%; height: 200px;" src="{{url('storage/'.$post->src)}}">
                    <div style="width: 100%; font-size: 14px; padding: 3px;"> {{ $post->name }}</div>
                    <div style="background-color: #FAF0E6;width: 100%; padding: 3px;"> {{ $post->price }} руб.</div>
                    <button style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem; float: right; margin-top: -30px;" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2{{$post->id}}" aria-expanded="false" aria-controls="multiCollapseExample2">Выбрать</button>


                    <div class="row" >
                        <div class="col">
                            <div style="position: absolute; top:150px; left: 200px; width: 1000px; height: 500px;" class="collapse multi-collapse" id="multiCollapseExample2{{$post->id}}">
                                <div class="card card-body">
                                    <button class="btn btn-close" style="float: right;" type="button"  data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2{{$post->id}}" aria-expanded="false"></button>
                                    <img style="width: 30%; height: fit-content;" src="{{url('storage/'.$post->src)}}">
                                    <div style="width: 100%; font-size: 18px; padding: 3px;"> {{ $post->name }}</div>
                                    <div style="background-color: #FAF0E6; color: #555; font-size: 20px ;width: 100%; padding: 3px;"> {{ $post->price }} руб.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>





    <div class="container" style="float: left;">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <img style="width: 100%; height: 200px;" src="{{url('storage/'.$post->src)}}">
                    <div class="card-body">
                        <p class="card-text">{{ $post->name }}</p>
                        <p class="card-text" style="background-color: #FAF0E6; color: #555;">{{ $post->price }} руб.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2{{$post->id}}" aria-expanded="false" aria-controls="multiCollapseExample2">View</button>
                            </div>
                            <div class="row" >
                                <div class="col">
                                    <div style="position: absolute; top:150px; left: 200px; width: 1000px; height: 500px;" class="collapse multi-collapse" id="multiCollapseExample2{{$post->id}}">
                                        <div class="card card-body">
                                            <button class="btn btn-close" style="float: right;" type="button"  data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2{{$post->id}}" aria-expanded="false"></button>
                                            <img style="width: 30%; height: fit-content;" src="{{url('storage/'.$post->src)}}">
                                            <div style="width: 100%; font-size: 18px; padding: 3px;"> {{ $post->name }}</div>
                                            <div style="background-color: #FAF0E6; color: #555; font-size: 20px ;width: 100%; padding: 3px;"> {{ $post->price }} руб.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

