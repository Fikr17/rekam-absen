@if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
<form action="/absen" class="row" method="post">
    <div class="col-auto">
        <label class="col-form-label">Reset Scrap </label>
        <i class="fa-solid fa-angles-right"></i>
    </div>
    @csrf
    <div class="col-auto">
        <button class="btn btn-outline-danger" type="submit" name="reset">Reset <i class="fa-solid fa-clock-rotate-left"></i></button>
    </div>

    <div class="valid-feedback">
        
    </div>
</form>

<div class="table-responsive-md w-auto">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">email</th>
            <th scope="col">tanggal</th>
            <th scope="col">id kelas</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($arr['rencana'] as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->email}}</td>
                <td>{{$item->tanggal_absen}}</td>
                <td>{{$item->id_link_absen}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif