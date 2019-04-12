@extends('layouts.app',[
'title'=>'new criteria preference',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">Decission Making</div>

                <div class="card-body container">

                    {{-- <h4></h4> --}}
                    <form action="{{ route('decission.generate') }}" method="post">
                        <input type="hidden" name="_method" value="put">
                        {{ csrf_field() }}

                        <div class="row mb-1">
                            <div class="ml-3 form-inline">
                                <select name="table" class="custom-select   mr-1">
                                    <option value="" selected="selected" disabled="disabled" hidden="hidden">Table Name</option>
                                        <option class="m-2" value="Mahasiswa">Mahasiswa</option>
                                </select>

                                <select name="preference" class="custom-select   mr-1">
                                    <option value="" selected="selected" disabled="disabled" hidden="hidden">Preference</option>
                                    @foreach ($preference as $pre)
                                        <option class="m-2" value="{{$pre->id}}">{{$pre->judul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type='submit' class='mt-3 btn btn-sm btn-secondary'>Create</button>
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