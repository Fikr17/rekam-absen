@if (Session::get('level')=='admin' || Cookie::get('level')=='admin')
<h3 class="text-center">OS Usage</h3>
<div class="table-responsive-md w-auto">
    <table class="table">
        <thead>
            <tr>
                <th class="text-center" scope="col">ID</th>
                <th class="text-center" scope="col">RAM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arr['os_usage'] as $item)
            <tr>
                <td class="text-center">{{$item->id}}</td>
                <td class="text-center">{{$item->ram}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif