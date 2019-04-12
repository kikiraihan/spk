@extends('layouts.app',[
'title'=>'Show input penilaian',
'bodyStyle'=>""
])

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-header pl-3">Penilaian</div>

                <div class="card-body container">
                    <table class="table table-striped table-borderless border border-white-50 table-sm small">
                        <caption class="text-left ">Hasil Penilaian</caption>
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                @foreach (json_decode($penilaian[0]->nilai) as $title=>$nil)
                                <th class="text-center">{{ $title }}</th>
                                @endforeach
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=0 @endphp
                            @foreach ($penilaian as $p)
                            <tr>
                                <th>{{ ++$no }}</th>
                                <td >{{ $p->mahasiswa->nama }} <span class="text-info">({{ $p->mahasiswa->id }})</span></td>
                                @foreach (json_decode($p->nilai) as $title=>$nil)
                                <td class="text-center">{{ $nil }}</td>
                                @endforeach
                                <td class="text-center">+-</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <hr>
                    <div class="row p-4">
                        @foreach ($penilaian as $p)
                        <div class="col-md-3 col-sm-6">
                            <div class="card">
                                <p class="card-header text-center bg-white " >{{ $p->mahasiswa->nama }}</p>
                                <div class="card-body text-center">
                                    <ul class="list-group list-group-flush">
                                        @foreach (json_decode($p->nilai) as $title=>$nil)
                                        <li class="list-group-item small">
                                            {{ $title }} - {{ $nil }}
                                            {{-- <select name="nilai[{{$p->mahasiswa->id}}][{{$title}}]" class="custom-select custom-select-sm mb-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                <option value="{{ $i }}" {{ (old("nilai[".$p->mahasiswa->id."][".$title."]")==$i?'selected':'') }} > {{ $i." - ".$title }} </option>
                                                @endfor
                                            </select> --}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
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