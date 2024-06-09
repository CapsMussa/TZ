<div style="margin-top: 10px; width: 400px;">
    <h2>Редактируем</h2>
    <img style=" margin-top: 10px; width: 150px; height: 150px;" src="{{url('storage/'.$data->src)}}"><br>



    <form action="{{ route('admin.update.post', $data->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <input style="margin-top: 20px;" type="text" name="name" value="{{ $data->name }}"><br>
        Заменить картинку
        <input style="margin-top: 5px;" type="file" name="src" class="upload" id="photo-upload"/><br>
        <input style="margin-top: 5px;" type="text" name="price" value="{{ $data->price }}"><br>
        <input style="margin-top: 5px;" type="submit" value="Сохранить">
    </form>
</div>

