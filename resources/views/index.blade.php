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
                <form action="../" method="get">
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
    <main>
        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 g-2">
                    @foreach($posts as $post)
                        <div class="col" style="padding: 10px 20px;">
                            <div class="card shadow-sm">
                                <img style="margin-left: 25px; width: 70%; height:200px;" src="{{url('storage/'.$post->src)}}">
                                <div class="card-body" style="height: 130px; margin-top: -15px;">
                                    {{$post->name}}
                                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 5px;">
                                        {{ $post->price }} руб.
                                        <div class="btn-group" tabindex="0">
                                            <div data-bs-theme="dark">
                                                <div class="collapse text-bg-dark" id="navbarHeader{{ $post->id }}"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

