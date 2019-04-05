@extends('layouts.app',[
'title'=>'Mahasiswa',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">All Mahasiswa </div>
                <div class="card-body container">
                    {{-- <a href="{{ route('mahasiswa.create') }}" class="btn btn-outline-primary btn-sm border border-white-50">New +</a> --}}
                    {{-- <hr> --}}
                    <table class="table table-striped table-borderless border border-white-50 table-sm small">
                        <caption class="text-left ">Data setiap mahasiswa</caption>
                        <thead class="thead-light text-center">
                            <tr>
                                <th>No</th>
                                <th>nama</th>
                                <th>jurusan</th>
                                <th>alamat</th>
                                <th>agama</th>
                                <th>toefl</th>
                                <th>ipk</th>
                                <th>masak</th>
                                <th>kecantikan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=0 @endphp
                            @foreach ($mahasiswa as $m)
                            <tr>
                                <th>{{ ++$no }}</th>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->jurusan }}</td>
                                <td>{{ $m->alamat }}</td>
                                <td class="text-center">{{ $m->agama }}</td>
                                <td class="text-center">{{ $m->toefl }}</td>
                                <td class="text-center">{{ $m->ipk }}</td>
                                <td class="text-center">{{ $m->masak }}</td>
                                <td class="text-center">{{ $m->kecantikan }}</td>
                                <td class="text-center">+-</td>
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