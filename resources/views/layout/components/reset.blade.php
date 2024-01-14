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

<div class="table-responsive-md">
    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="text-align: center">Setiap Hari</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($arr['setiap_hari'] as $item)
            <tr>
                <td>{{$item->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif