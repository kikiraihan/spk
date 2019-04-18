@extends('layouts.app',[
'title'=>'Penilaian Alternatif',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">Penilaian Alternatif Tiap Preferensi</div>
                <div class="card-body container">

                        <hr>
                        <table class="table table-success table-striped table-borderless border border-white-50 text-center table-sm small">
                            <caption class="text-left ">Preferensi yang telah di nilai sebelumnya</caption>
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Nama Table</th> --}}
                                    <th>Judul</th>
                                    <th>Kriteria</th>
                                    <th>Ordo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=0 @endphp
                                @foreach ($preferenceSukses as $pre)
                                <tr>
                                    <th>{{ ++$no }}</th>
                                    <td>{{ $pre->judul }}</td>
                                    <td>
                                        @php $kriteria=json_decode($pre->kriteria) @endphp
                                        @for ($i = 0; $i < count($kriteria); $i++)
                                            [ <b>{{$kriteria[$i]->title}}</b> => {{number_format($kriteria[$i]->bobot,2)}} ],
                                        @endfor
                                    </td>
                                    <td>{{ $pre->ordo }}</td>

                                    <td class="text-center dropdown dropleft">

                                            <span class="btn btn-sm btn-light"data-toggle="dropdown">
                                                ☰
                                            </span>

                                            <div class="dropdown-menu">


                                                <a class="dropdown-item small" href="{{ route('penilaianAlternatif.show', ['id_preferensi'=>$pre->id]) }}">Lihat</a>

                                                <form style="display: inline;" method="post" action="{{ route('penilaianAlternatif.destroy', ['id_preferensi'=>$pre->id]) }}">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field()}}
                                                    <button class="dropdown-item small text-danger" >Hapus</button>
                                                </form>

                                            </div>

                                    </td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <hr>
                    <table class="table table-warning table-striped table-borderless border border-white-50 text-center table-sm small">
                        <caption class="text-left ">Wait List, preferensi yang belum di nilai</caption>
                        <thead class="thead-light text-center">
                            <tr>
                                <th>No</th>
                                {{-- <th>Nama Table</th> --}}
                                <th>Judul</th>
                                <th>Kriteria</th>
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
                                        [ <b>{{$kriteria[$i]->title}}</b> => {{number_format($kriteria[$i]->bobot,2)}} ],
                                    @endfor
                                </td>
                                <td>{{ $pre->ordo }}</td>
                                <td class="text-center dropdown dropleft">

                                        <span class="btn btn-sm btn-light"data-toggle="dropdown">
                                            ☰
                                        </span>

                                        <div class="dropdown-menu">


                                            <a class="dropdown-item small" href="{{ route('penilaianAlternatif.create', ['id_preferensi'=>$pre->id]) }}" class="btn btn-sm btn-info">Input +</a>

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