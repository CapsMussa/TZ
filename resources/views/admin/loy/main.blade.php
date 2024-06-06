<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>


    <title>Админ панель</title>
</head>
<body id="vse">

<div style="float: left; border-right: 1px solid green; text-align: center;">
    <div style="margin-top: 10px; width: 400px;">
        <h2>Настройка магазина</h2>
        <form action="">
            <input style="margin-top: 5px;" type="text" placeholder="Название магазина"><br>
            <input style="margin-top: 5px;" type="submit" value="Сохранить">
        </form>
    </div>


    <div style="margin-top: 50px; text-align: left;">
        <h2>Создать карточку товар</h2>
        <form action="{{ route('admin.store.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input style="margin-top: 5px;" type="text" name="name" placeholder="Название товара"><br>
            <input style="margin-top: 5px;" type="file" name="src" class="upload" id="photo-upload"/><br>
            <input style="margin-top: 5px;" type="text" name="price" placeholder="Цена товара"><br>
            <select style="margin-top: 5px;" class="form-select" name="category_id" aria-label="-">
                <option selected>Категория товара</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->title }}</option>
                @endforeach
            </select><br>
            <div class="form-check">
                <select style="margin-top: 5px;" class="form-select" name="tag_id" aria-label="-">
                    <option selected>Выберите фирму</option>

                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>


            <input style="margin-top: 5px;" name="active" type="text" placeholder="Видимость"><br>
            <input style="margin-top: 5px;" type="submit" value="Создать">
        </form>
    </div>

    <div style="margin-top: 10px; width: 400px;">
        <h2>Создать категорию</h2>
        <form action="{{ route('admin.store.category') }}" method="post">
            @csrf
            <input style="margin-top: 5px;" type="text" name="title" placeholder="Название категории"><br>
            <input style="margin-top: 5px;" type="submit" value="Создать">
        </form>
    </div>


    <div style="margin-top: 10px; width: 400px;">
        <h2>Создать Фирму</h2>
        {{--        <form action="{{ route('admin.store.tag') }}" method="post">--}}
        <input style="margin-top: 5px;" class="title_firm" type="text" name="title" placeholder="Добавить фирму"><br>
        <button style="margin-top: 5px;" class="sbt" value="Создать"> Создать</button>
        {{--        </form>--}}
    </div>

    <script>
        $(document).ready(function () {
        });
        $('button.sbt').on('click', function () {
            var title = $('input.title_firm').val();
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
            $.ajax({
                method: "POST",
                url: `{{route('admin.store.tag') }}`,
                data: {title: title},
                cache: false
            })

        .done(function( html ) {
            $('input.title_firm').val('');
                $( "#table" ).append( html );
            });

        })
    </script>

</div>
<div style="padding: 20px;">
    <nav class="nav">
        <a style="margin: 10px;" class="nav-link" href="{{ route('admin.index') }}">Карточки</a>
        <a style="margin: 10px;" class="nav-link" href="{{ route('admin.category') }}">Категории</a>
        <a style="margin: 10px;" class="nav-link" href="{{ route('admin.colors') }}">Фирмы</a>
        <a style="margin: 10px;" class="nav-link" href="{{ route('admin.users') }}">Пользователи</a>
    </nav>
</div>


<div id="content">
    @yield('content')
</div>
</body>
</html>
