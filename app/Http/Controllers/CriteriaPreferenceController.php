<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CriteriaPreference;

class CriteriaPreferenceController extends Controller
{

    public function index()
    {
        $preference=CriteriaPreference::all();

        return view('kriteriaPreference.index',compact(['preference']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteriaPreference.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        // dd($request->all());


        //pembuatan variabel
        $martiks=json_encode($request->matriks);//matriks
        $bobot=json_decode($request->bobotKriteria);//kriteria(bobot,jenis,title)
        for ($i=0; $i < $request->n; $i++) {
            $kriteria[$i]=[
                'title'=>$request->kriteria[$i],
                'jenis'=>$request->jenis[$i],
                'bobot'=>$bobot[$i],
            ];
        }
        $kriteria=json_encode($kriteria);

        //penyimpanan
        $preference=new CriteriaPreference;
        $preference->judul=$request->judul;//judul
        $preference->ordo=$request->n;//ordo
        $preference->matriks=$martiks;//matriks
        $preference->matriksNormalised=$request->matriksNormalised;//matriksNormalised
        $preference->kriteria=$kriteria;//kriteria,jenis,bobot
        $preference->save();

        return redirect()->route('criteriaPreference');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        CriteriaPreference::find($id)
            ->delete()
        ;
        return redirect()->route('criteriaPreference');
    }
}
