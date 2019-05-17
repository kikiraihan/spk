@extends('layouts.app',[
'title'=>'input penilaian',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">Input Penilaian</div>

                <div class="card-body container">
                    <form action="{{ route('penilaianAlternatif.storeByAdmin') }}" method="post">


                    <div class="col-md-4">
                        <label for="" class="small d-inline-block">Penilaian atas nama :</label>
                        <select name="id_penilai" class="custom-select custom-select-sm d-inline">
                            <option value="1" selected="selected" hidden="hidden">Pilih Penilai</option>

                            @foreach ($penilai as $p)
                                <option value="{{$p->id}}">{{$p->name}}</option>
                            @endforeach

                        </select>
                    </div>


                    <hr>
                    {{-- <h4></h4> --}}
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="id_preferensi" value="{{ $id_preferensi }}">
                        {{ csrf_field() }}

                        <div class="row p-4">
                                @foreach ($mahasiswa as $m)
                                <div class="col-md-3 col-sm-6">
                                    <div class="card">
                                        <p class="card-header text-center bg-white " >{{ $m->nama }}</p>
                                        <div class="card-body text-center">
                                            <label class="small">Penilaian :</label>
                                            <div class="container-fluid">
                                                @foreach ($preferenceKriteria as $kriteria)
                                                    <select name="nilai[{{$m->id}}][{{$kriteria->title}}]" class="custom-select custom-select-sm mb-2">
                                                        <option value="1" selected="selected" hidden="hidden">{{ $kriteria->title }} {{" - ".$kriteria->jenis}} ({{number_format($kriteria->bobot,2)}})</option>
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            <option value="{{ $i }}" {{ (old("nilai[".$m->id."][".$kriteria->title."]")==$i?'selected':'') }} > {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                        </div>

                        <button type='submit' class='mt-3 btn btn-sm btn-primary'>Simpan</button>
                        {{-- <div id="inputKriteria" class="pl-0 col-md-6 pb-2"></div>
                        <div id="inputMatriks" class="mt-3"></div>
                        <div id="wadahMatriksNormalised" class="mt-3"></div> --}}
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css-halaman')

@endsection

@section('script-halaman')
{{-- <script src="{{ asset('assets/form_kriteria.js') }}"></script> --}}
@endsection