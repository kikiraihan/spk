@extends('layouts.app',[
'title'=>'Create Mahasiswa',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">New +</div>

                <div class="container">
                    <div class="card-body">

                        <form action="{{ route('user.store') }}" method="post">
                            <input type="hidden" name="_method" value="put">
                            {{ csrf_field() }}

                            @foreach ($columns as $col)
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label col-form-label-sm text-capitalize" for="{{$col}}">{{$col}} </label>
                                    <div class="col-sm-10">

                                        @if ($col=='kategori')

                                            <select required name="{{$col}}" class="custom-select custom-select-sm ">
                                                <option class="m-2" value="">-Pilih-</option>
                                                <option class="m-2" value="Penilai" {{old($col)=="Penilai"?"selected":"" }}>Penilai</option>
                                                <option class="m-2" value="Admin" {{old($col)=="Admin"?"selected":"" }}>Admin</option>
                                            </select>

                                        @elseif ($col=='password')
                                            <input name="{{$col}}" type="password"
                                            class="form-control form-control-sm {{ $errors->has($col) ? ' is-invalid' : '' }}" value="{{ old($col) }}"
                                            id="{{$col}}" placeholder="Masukan {{$col}}">
                                        @else
                                            <input name="{{$col}}" type="text"
                                            class="form-control form-control-sm {{ $errors->has($col) ? ' is-invalid' : '' }}" value="{{ old($col) }}"
                                            id="{{$col}}" placeholder="Masukan {{$col}}">
                                        @endif

                                        @if ($errors->has($col))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>*{{ $errors->first($col) }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>
                            @endforeach


                            <div class="row">
                                <button type='submit' class='mt-3  btn btn-sm btn-secondary'>Create</button>
                            </div>


                        </form>


                    </div>
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