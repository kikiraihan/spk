@extends('layouts.app',[
'title'=>'Mahasiswa',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">




            {{-- <div class="accordion">
                <div class="card">
                    <div class="card-header" data-toggle="collapse" data-target="#collapseOne">

                    </div>
                    <div id="collapseOne" class="collapse" >

                    </div>
                </div>
            </div> --}}

            <div class="card">
                <div class="card-header pl-3" data-toggle="collapse" data-target="#collapseMatriks">
                    Matriks
                </div>
                <div id="collapseMatriks" class="collapse" >
                    <div class="card-body container">
                        <small class="text-secondary">Berisi beberapa matriks yang dibuat saat proses topsis..</small>
                        <hr>
                        <div class='row'>

                            <div class='col-md-4'>
                                <table class="table text-center table-striped table-bordered border border-white-50 table-sm small">
                                    <caption class="text-left ">Matriks Awal</caption>
                                    <thead>
                                        <tr>
                                            @foreach ($title as $t)
                                            <td>{{ $t }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($matriks); $i++)
                                        <tr>
                                            @for ($z = 0; $z < count($matriks[$i])-1; $z++)
                                            <td>{{ $matriks[$i][$z]}}</td>
                                            @endfor
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div class='col-md-4'>
                                <table class="table text-center table-striped table-bordered border border-white-50 table-sm small">
                                    <caption class="text-left ">Matriks Normalised <b>Weighted</b></caption>
                                    <thead>
                                        <tr>
                                            @foreach ($title as $t)
                                            <td>{{ $t }}</td>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($matriksWeightedTopsis); $i++)
                                        <tr>
                                            @for ($z = 0; $z < count($matriksWeightedTopsis[$i])-1; $z++)
                                            <td>{{ number_format((float)$matriksWeightedTopsis[$i][$z], 2,".","") }}</td>
                                            @endfor
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div class='col-md-3 offset-md-1'>
                                <table class="table text-center table-striped table-bordered border border-white-50 table-sm small">
                                    <caption class="text-left ">Matriks <b>D+</b> dan <b>D-</b></caption>
                                    <thead>
                                        <tr>
                                            <td>D+</td>
                                            <td>D-</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < count($dNegatif); $i++)
                                        <tr>
                                            <td>{{ number_format((float)$dPositif[$i], 3,".","") }}</td>
                                            <td>{{ number_format((float)$dNegatif[$i], 3,".","") }}</td>
                                        </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>

                            <div class='col-md-6'>
                                <table class="table table-striped table-borderless border border-white-50 table-sm small">
                                    <caption class="text-left ">Matriks <b>Solusi Ideal</b></caption>
                                    <tbody>
                                        <tr>
                                            <td><b>Atribut</b></td>
                                            @foreach ($title as $t)
                                            <td>{{ $t }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td><b>Jenis</b></td>
                                            @foreach ($solusiIdeal as $sol)
                                            <td>{{ $sol['jenis'] }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td><b>Positif</b></td>
                                            @foreach ($solusiIdeal as $sol)
                                            <td>{{ number_format((float)$sol['positif'], 3,".","") }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td><b>Negatif</b></td>
                                            @foreach ($solusiIdeal as $sol)
                                            <td>{{ number_format((float)$sol['negatif'], 3,".","") }}</td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>




                        </div>

                    </div>
                </div>
            </div>

            <hr>


            <div class="card">

                <div class="card-header pl-3"data-toggle="collapse" data-target="#collapseResult">
                    Result
                </div>
                <div id="collapseResult" class="collapse show" >

                    <div class="card-body container">
                        <small class="text-secondary">Urutan table setelah diranking berdasarkan bobot preferensi..</small>
                        <hr>
                        <table class="table table-responsive-md table-striped table-borderless border border-white-50 table-sm small">
                            <caption class="text-left ">Data Ordered by Rank</caption>
                            <thead class="thead-light text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Bobot</th>

                                    {{-- @foreach ($title as $t)
                                    <th>{{ $t }}</th>
                                    @endforeach --}}

                                    @foreach ($kolomGet as $kolom)
                                    <th class="{{ $kolom=='id'?'text-info font-weight-bold text-right':'text-center ' }}">{{ $kolom }}</td>
                                        @endforeach

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php $no=0;  @endphp
                                    @foreach ($hasil as $index=>$m)
                                    <tr class="{{ $no<=2?'text-success':'' }}">
                                        <th>{{ ++$no }}</th>
                                        <td class="text-center">{{ $rank[$m->id]['nilai'] }}</td>

                                        {{-- @for ($z = 0; $z < count($matriks[$index])-1; $z++)
                                        <td class="text-center">{{ $matriks[$index][$z]}}</td><-- baris matriks == index == (i)mahasiswa -->
                                        @endfor --}}

                                        @foreach ($kolomGet as $kolom)
                                        <td class="
                                            {{ $kolom=='id'?'text-info font-weight-bold text-right':'text-center ' }}
                                        ">{{ $m->$kolom }}</td>
                                        @endforeach

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