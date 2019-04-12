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
                    <div></div>
                    <hr>
                    {{-- <h4></h4> --}}
                    <form action="{{ route('penilaianAlternatif.store') }}" method="post">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}

                        <div class="form-row">
                            @foreach ($preferenceKriteria as $kriteria)
                                <div class="col">
                                    <b class="form-control form-control-plaintext " >
                                        <span class="small font-weight-bold">{{ $kriteria->title}}</span>
                                        <span class="small ">{{" - ".$kriteria->jenis}} ({{number_format($kriteria->bobot,2)}})</span>
                                    </b>
                                </div>
                            @endforeach
                        </div>
                        @foreach ($mahasiswa as $m)
                        <div class="form-group">
                            <div class="form-row">
                                @foreach ($preferenceKriteria as $kriteria)
                                    <div class="col">
                                        <select name="nilai[{{$m->id}}]" class="custom-select custom-select-sm mr-1">
                                            {{-- <option value="1" selected="selected" disabled="disabled" hidden="hidden">{{ $kriteria->title }}</option> --}}
                                            @for ($i = 1; $i <= 5; $i++)
                                                <option class="m-2" value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                            <label class="small" >
                                {{ $m->nama }}
                                {{-- <span class="text-secondary font-weight-bold">(id-{{ $m->id }})</span> --}}
                            </label>
                        </div>
                        @endforeach

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