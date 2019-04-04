@extends('layouts.app',[
'title'=>'new criteria preference',
'bodyStyle'=>"font-family: 'Arial', sans-serif;font-size: 1rem"
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">New Criteria-Preference +</div>

                <div class="card-body container">

                    {{-- <h4></h4> --}}
                    <form action="{{ route('criteriaPreference.store') }}" method="post">
                        <input type="hidden" name="_method" value="put" autofocus>
                        {{ csrf_field() }}

                        <div class="row mb-3">
                            <div class="ml-3 form-inline">
                                <input type="text" name="judul_kriteria" placeholder="Judul kriteria" required="required"
                                class="form-control form-control-sm mr-1">
                                <select id="n" name="n" class="custom-select custom-select-sm mr-1">
                                    <option value="" selected="selected" disabled="disabled" hidden="hidden">Pilih jumlah kriteria</option>
                                    <option value="2">2-Dua</option>
                                    <option value="3">3-Tiga</option>
                                    <option value="4">4-Empat</option>
                                    <option value="5">5-Lima</option>
                                    <option value="6">6-Enam</option>
                                    <option value="7">7-Tujuh</option>
                                    <option value="8">8-Delapan</option>
                                    <option value="9">9-Sembilan</option>
                                    <option value="10">10-Sepuluh</option>
                                </select>
                            </div>
                        </div>
                        <div id="inputKriteria" class="pl-0 col-md-6 pb-2"></div>
                        <a href="#inputMatriks" onclick="btnProceed()" class="btn btn-secondary btn-sm">Proceed</a>
                        <div id="inputMatriks" class="mt-3"></div>
                        <div id="wadahMatriksNormalised" class="mt-3"></div>
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
<script src="{{ asset('assets/form_kriteria.js') }}"></script>
@endsection