<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;
use Illuminate\Support\Facades\Schema;
use App\Traits\arrayTrait;


class MahasiswaController extends Controller
{
    use arrayTrait;

    public function index()
    {
        $mahasiswa=Mahasiswa::all();
        $columns = $mahasiswa[0]->getFillable();
        // dd($columns);
        // $columns = $this->removeIdAndTimestampCol(Schema::getColumnListing('mahasiswas'));

        return view('mahasiswa.index',compact(['mahasiswa','columns']));
    }


    public function create()
    {
        $mahasiswa=new Mahasiswa;
        $columns = $mahasiswa->getFillable();

        return view('mahasiswa.create',compact(['columns']));
    }


    public function store(Request $request)
    {

        //validasi

        //simpan
        $mahasiswa=new Mahasiswa;
        $columns = $mahasiswa->getFillable();
        foreach($columns as $col){
            $mahasiswa->$col=$request->$col;
        }
        $mahasiswa->save();

        return redirect()->route('mahasiswa');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Mahasiswa::find($id)
            ->delete()
        ;
        return redirect()->route('mahasiswa');
    }
}
