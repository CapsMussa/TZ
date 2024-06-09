<div style="margin-top: 10px; width: 400px;">
    <h2>Редактируем</h2>


    <form action="{{ route('admin.update.users', $users->id)}}" method="post">
        @csrf
        @method('patch')
        <input style="margin-top: 5px;" type="text" name="name" value="{{ $users->name }}"><br>

        <select style="margin-top: 5px;" class="form-select" name="role" aria-label="-">
                <option value="admin">Админ</option>
                <option value="user">Пользователь</option>

        </select><br>
        <input style="margin-top: 5px;" type="submit" value="Сохранить">
    </form>
</div>

