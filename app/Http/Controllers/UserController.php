<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Schema;
use App\Traits\arrayTrait;

class UserController extends Controller
{
    use arrayTrait;

    public function index()
    {
        $user=User::all()->groupBy('kategori');
        $admin=$user['Admin'];
        $penilai=$user['Penilai'];

        $columns = $admin[0]->getFillable();unset($columns[3]);
        // dd($columns);
        // $columns = $this->removeIdTimestampKategoriPasswordAndRememberTokenCol(Schema::getColumnListing('users'));


        return view('user.index',compact(['admin','penilai','columns']));

    }

    public function create()
    {
        $user=new User;
        $columns = $user->getFillable();
        // $columns['field'] = $user->getFillable();
        // $columns['tipe'] = ['text',''];
        // dd($columns);

        return view('user.create',compact(['columns']));
    }


    public function store(Request $request)
    {

        //validasi
        // dd($request->all());

        //simpan
        $user=new User;
        $columns = $user->getFillable();
        foreach($columns as $col){
            $user->$col=$request->$col;
            $user->kategori=='Penilai'?$user->assignRole('Penilai'):$user->assignRole('Admin');
        }
        $user->save();

        return redirect()->route('user');

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
        User::find($id)
            ->delete()
        ;
        return redirect()->route('user');
    }
}
