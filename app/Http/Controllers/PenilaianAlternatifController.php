<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CriteriaPreference;
use Illuminate\Support\Facades\Auth;
use App\Model\Mahasiswa;
use App\Model\PenilaianAlternatif;

class PenilaianAlternatifController extends Controller
{

    public function index()
    {

        //memiliki penilaian, dan penilaiannya ber id User ini
        $preferenceSukses=CriteriaPreference::WhereHavePenilaianThatIdPenilai(Auth::user()->id)->get();

        //memiliki penilaian, tapi bukan User ini, atau tidak memiliki penilaian
        $sukses[]=0;
        foreach($preferenceSukses as $pre)$sukses[]=$pre->id;
        $preference=CriteriaPreference::WhereHavePenilaianThatNotIdPenilaiOrDoesntHavePenilaian(Auth::user()->id,$sukses)->get();

        return view('penilaianAlternatif.index',compact(['preference','preferenceSukses']));
    }


    public function create($id_preferensi)
    {
        // $request->id_preferensi;
        $preference=CriteriaPreference::where('id',$id_preferensi)->first(['id','judul','kriteria']);
        $mahasiswa=Mahasiswa::all(['id','nama']);
        $preferenceKriteria=json_decode($preference->kriteria);

        // dd($preference);
        return view('penilaianAlternatif.create',compact(['mahasiswa','preferenceKriteria','id_preferensi']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(json_encode($request->nilai[1]));

        foreach ($request->nilai as $id_mahasiswa => $nilai)
        {
            $alternatif=new PenilaianAlternatif;
            $alternatif->nilai=json_encode($nilai);
            $alternatif->id_penilai=$request->user()->id;
            $alternatif->id_preferensi=$request->id_preferensi;
            $alternatif->id_mahasiswa=$id_mahasiswa;
            $alternatif->save();
        }
        return redirect()->route('penilaianAlternatif');
    }

    public function show($id_preferensi)
    {

        $penilaian=PenilaianAlternatif::with('mahasiswa')
        ->where('id_penilai',Auth::user()->id)
        ->where('id_preferensi', $id_preferensi)
        ->get()
        ;
        // dd($penilaian);

        return view('penilaianAlternatif.show',compact(['penilaian']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
