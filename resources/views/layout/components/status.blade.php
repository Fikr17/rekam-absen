<div class="container">
    <div class="table-responsive-md w-auto">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">aktivitas</th>
                <th scope="col">jam</th>
                @if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
                <th scope="col">email</th>
                @endif
            </tr>
            </thead>
            <tbody>
                @foreach ($arr['aktivitas'] as $item)
                @if (Session::get('email')==$item->email || Session::get('level')=='admin' || Cookie::get('level')=='admin' || $item->email==null)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->jam}}</td>
                    @if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
                    <td>{{$item->email}}</td>
                    @endif
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>