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
        $columns = $this->removeIdAndTimestampCol(Schema::getColumnListing('mahasiswas'));

        return view('mahasiswa.index',compact(['mahasiswa','columns']));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
        //
    }
}
