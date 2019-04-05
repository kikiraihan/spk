@extends('layouts.app',[
'title'=>'new criteria preference',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">All Preference </div>
                <div class="card-body container">
                    <a href="{{ route('criteriaPreference.create') }}" class="btn btn-outline-primary btn-sm border border-white-50">New +</a>
                    <hr>
                    <table class="table table-striped table-borderless border border-white-50 text-center table-sm small">
                        <caption class="text-left ">Preferensi kriteria pada beberapa kondisi/kasus.</caption>
                        <thead class="thead-light text-center">
                            <tr>
                                <th>No</th>
                                {{-- <th>Nama Table</th> --}}
                                <th>Judul</th>
                                <th>Kriteria</th>
                                <th>Matriks</th>
                                <th>Ordo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=0 @endphp
                            @foreach ($preference as $pre)
                            <tr>
                                <th>{{ ++$no }}</th>
                                <td>{{ $pre->judul }}</td>
                                <td>
                                    @php $kriteria=json_decode($pre->kriteria) @endphp
                                    @for ($i = 0; $i < count($kriteria); $i++)
                                        [ {{$kriteria[$i]->title}} => {{$kriteria[$i]->bobot}} ],<br>
                                    @endfor
                                </td>
                                <td>
                                    @php $matriks=json_decode($pre->matriks) @endphp
                                    @for ($i = 0; $i < count($matriks); $i++)
                                        @for ($z = 0; $z < count($matriks[$i]); $z++)
                                            [ {{$matriks[$i][$z]}} ]
                                        @endfor
                                        ,<br>
                                    @endfor
                                </td>
                                <td>{{ $pre->ordo }}</td>
                                <td>+-</td>
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