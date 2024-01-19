@if (Session::get('log')==True || Cookie::get('log')==True)
<h3 class="text-center">Rekam absen</h3>
<div class="table-responsive-md w-auto">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Course</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arr['rekam'] as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->tanggal}}</td>
                <td>{{$item->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif