@extends('layouts.app',[
'title'=>'User',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">All User </div>
                <div class="card-body container">
                    <a href="{{ route('user.create') }}" class="btn btn-outline-primary btn-sm border border-white-50">Create +</a>
                    <hr>
                    <table class="table table-striped table-borderless border border-white-50 table-sm small">
                            <caption class="text-left ">Data setiap admin</caption>
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    @foreach ($columns as $col)
                                    <th class="text-capitalize">{{ $col }}</th>
                                    @endforeach

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @php $no=0 @endphp
                                @foreach ($admin as $admin)
                                <tr>
                                    <th>{{ ++$no }}</th>
                                    @foreach ($columns as $col)
                                    <td>{{ $admin->$col }}</td>
                                    @endforeach

                                    <td class="text-center dropdown dropleft">

                                            <span class="btn btn-sm btn-light"data-toggle="dropdown">
                                                ☰
                                            </span>
                                            <div class="dropdown-menu">

                                                <form style="display: inline;" method="post" action="{{ route('user.destroy', ['id'=>$admin->id]) }}">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        {{ csrf_field()}}
                                                    <button class="dropdown-item small text-danger" >Hapus</button>
                                                </form>
                                                <a class="dropdown-item small" href="#">-</a>

                                            </div>

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <table class="table table-striped table-borderless border border-white-50 table-sm small">
                        <caption class="text-left ">Data setiap penilai</caption>
                        <thead class="thead-light text-center">
                            <tr>
                                <th>No</th>
                                @foreach ($columns as $col)
                                <th class="text-capitalize">{{ $col }}</th>
                                @endforeach

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no=0 @endphp
                            @foreach ($penilai as $penilai)
                            <tr>
                                <th>{{ ++$no }}</th>
                                @foreach ($columns as $col)
                                <td>{{ $penilai->$col }}</td>
                                @endforeach

                                <td class="text-center dropdown dropleft">

                                        <span class="btn btn-sm btn-light"data-toggle="dropdown">
                                            ☰
                                        </span>
                                        <div class="dropdown-menu">

                                            <form style="display: inline;" method="post" action="{{ route('user.destroy', ['id'=>$penilai->id]) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field()}}
                                                <button class="dropdown-item small text-danger" >Hapus</button>
                                            </form>
                                            <a class="dropdown-item small" href="#">-</a>

                                        </div>

                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css-halaman')
<style>
    table tbody tr th{
        text-align: center;
        width: 1em;
    }
</style>
@endsection

@section('script-halaman')

@endsection