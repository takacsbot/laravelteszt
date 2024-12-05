@extends('layouts.app')
@section('title', '| Names oldal')
@section('content')

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Azonosító</th>
            <th>Családnév</th>
            <th>Név</th>
            <th>Létrehozás</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        @foreach($names as $name)
            <tr>
                <td>{{ $name->id }}</td>
                @empty($name->family)
                    <td><strong>Nincs adat.</strong></td>
                @else
                    <td>{{ $name->family->surname }}</td>
                @endempty
                <td>{{ $name->name }}</td>
                <td>{{ $name->created_at }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger btn-delete-name" data-id="{{ $name->id }}">Törlés</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h3 class="mt-3">Új név hozzáadása</h3>
<form method="post" action="/names/manage/name/new">
    @csrf
    <div class="form-group">
        <label for="inputFamily">Családnév</label>
        <select id="inputFamily" name="inputFamily" class="form-control">
            @foreach($families as $family)
                <option value="{{ $family->id }}">{{ $family->surname }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="inputName">Keresztnév</label>
        <input type="text" class="form-control" id="inputName" name="inputName">
    </div>
    <button type="submit" class="btn btn-primary">Hozzáadás</button>
</form>
@endsection
@section('script')
    <script>
        $(".btn-delete-name").on('click', function(){
            let thisBtn = $(this);
            let id = thisBtn.data('id');

            $.ajax({
                type: "POST",
                url: '/names/delete',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(){
                    thisBtn.closest('tr').fadeOut();
                },
                error: function(){
                    alert('Nem sikerült a törlés!');
                }
            });
        });
    </script>
@endsection