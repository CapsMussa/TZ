<div style="margin-top: 10px; width: 400px;">
    <h2>Редактируем</h2>
    <form action="{{ route('admin.update.tag', $data->id)}}" method="post">
        @csrf
        @method('patch')
        <input style="margin-top: 5px;" type="text" name="title" value="{{ $data->title }}"><br>
        <input style="margin-top: 5px;" type="submit" value="Сохранить">
    </form>
</div>

