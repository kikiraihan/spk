<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;
use App\Model\CriteriaPreference;

class DecissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $preference=CriteriaPreference::all();
        $mahasiswa=Mahasiswa::all();

        return view('decission.index',compact(['preference','mahasiswa']));
    }



    public function generate(Request $request)
    {
        // dd($request->all());

        //ambil bobot dan title
        $preference=CriteriaPreference::find($request->preference);
        foreach (json_decode($preference->kriteria) as $kri) {
            $bobot[]=$kri->bobot;
            $title[]=$kri->title;
            $jenis[]=$kri->jenis;
        }
        array_push($title,'id');

        $mahasiswa=Mahasiswa::all($title);


        //buat matriks mahasiswa +id id kolom akhir
        $i=0;
        foreach($mahasiswa as $m){
            $z=0;
            foreach($title as $t){
                $matriks[$i][$z++]=$m->$t;
            }
            $i++;
        }

        $matriksaa[0][0]=3;
        $matriksaa[0][1]=3;
        $matriksaa[0][2]=4;
        $matriksaa[0][3]=5;
        $matriksaa[0][4]=null;

        $matriksaa[1][0]=4;
        $matriksaa[1][1]=3;
        $matriksaa[1][2]=4;
        $matriksaa[1][3]=2;
        $matriksaa[1][4]=null;

        $matriksaa[2][0]=2;
        $matriksaa[2][1]=5;
        $matriksaa[2][2]=3;
        $matriksaa[2][3]=3;
        $matriksaa[2][4]=null;

        $matriksaa[3][0]=3;
        $matriksaa[3][1]=3;
        $matriksaa[3][2]=5;
        $matriksaa[3][3]=4;
        $matriksaa[3][4]=null;

        $matriksaa[4][0]=4;
        $matriksaa[4][1]=4;
        $matriksaa[4][2]=3;
        $matriksaa[4][3]=3;
        $matriksaa[4][4]=null;

        $bobotaa=[4,5,2,3];
        $jenisaa=['Cost','Benefit','Benefit','Benefit'];


        //normalisasi
        $matriksPembagi=$this->sumPerColumnsBerpangkatDiakarkanTanpaKolomTerakhir($matriksaa);
        $matriksNormalisedTopsis=$this->normalise($matriksaa,$matriksPembagi);

        //normalisasi Terbobot
        $matriksWeightedTopsis=$this->normalisedWeighted($matriksNormalisedTopsis,$bobotaa);
        $maxMin=$this->kriteriaMaxMin($matriksWeightedTopsis);

        //matriks solusi ideal
        $solusiIdeal=$this->matriksSolusiIdeal($maxMin,$jenisaa);

        //jarak solusi positif(total per alternatif)
        $dPositif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"positif");
        $dNegatif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"negatif");

        //jarak solusi negatif(total per alternatif)

        dd($dNegatif);

    }



    public function normalisedWeighted($normalised,$bobot){
        for($baris = 0; $baris < count($normalised); $baris++)
        {
            for($kolom = 0; $kolom < count($normalised[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
            {
                $normalised[$baris][$kolom] = $normalised[$baris][$kolom]*$bobot[$kolom];
            }
        }
        return $normalised;
    }


    public function normalise($matriks,$pembagi){
        for($baris = 0; $baris < count($matriks); $baris++)
        {
            for($kolom = 0; $kolom < count($matriks[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
            {
                $matriks[$baris][$kolom] = $matriks[$baris][$kolom]/$pembagi[$kolom];
            }
        }
        return $matriks;
    }



    public function sumPerColumnsBerpangkatDiakarkanTanpaKolomTerakhir($matriks){
        $sumCol=[];
        for( $kolom = 0; $kolom < count($matriks[0])-1; $kolom++){//-1, kolom terakhir diabaikan
            $sumCol[$kolom]=0;
            for( $baris = 0; $baris < count($matriks); $baris++){
                $matriks[$baris][$kolom]=pow($matriks[$baris][$kolom],2);
                $sumCol[$kolom]=$sumCol[$kolom]+$matriks[$baris][$kolom];
            }
            $sumCol[$kolom]=sqrt($sumCol[$kolom]);
        }
        return $sumCol;//array sumColumnsBerpangkat per Column
    }





    public function kriteriaMaxMin($matriksWeightedTopsis){
        for( $kolom = 0; $kolom < count($matriksWeightedTopsis[0])-1; $kolom++){//-1, kolom terakhir diabaikan
            $matriksPerCol=[];
            for( $baris = 0; $baris < count($matriksWeightedTopsis); $baris++){
                $matriksPerCol[]=$matriksWeightedTopsis[$baris][$kolom];
            }
            $maxMin[$kolom]['max']=max($matriksPerCol);
            $maxMin[$kolom]['min']=min($matriksPerCol);
        }
        return $maxMin;//array per Kriteria
    }

    public function matriksSolusiIdeal($maxmin,$jenis){
        for ($i=0; $i < count($maxmin); $i++)
        {
            if ($jenis[$i]=="Benefit") {
                $solusiIdeal[$i]['jenis']=$jenis[$i];
                $solusiIdeal[$i]['positif']=$maxmin[$i]['max'];
                $solusiIdeal[$i]['negatif']=$maxmin[$i]['min'];
            }
            elseif($jenis[$i]=="Cost")
            {
                $solusiIdeal[$i]['jenis']=$jenis[$i];
                $solusiIdeal[$i]['positif']=$maxmin[$i]['min'];
                $solusiIdeal[$i]['negatif']=$maxmin[$i]['max'];
            }
        }
        return $solusiIdeal;//array per Kriteria
    }

    public function distance($weighted,$solusiIdeal,$psOrNg){
        for($baris = 0; $baris < count($weighted); $baris++)
        {
            for($kolom = 0; $kolom < count($weighted[$baris])-1; $kolom++)//-1, kolom terakhir diabaikan
            {
                $weighted[$baris][$kolom] = pow($weighted[$baris][$kolom]-$solusiIdeal[$kolom][$psOrNg],2);
            }
        }

        $hasil=$this->sumPerRowsDiakarkanTanpaKolomTerakhir($weighted);

        return $hasil;
    }


    public function sumPerRowsDiakarkanTanpaKolomTerakhir($matriks){
        for( $baris = 0; $baris < count($matriks); $baris++){
            $sumRow[$baris]=0;
            for( $kolom = 0; $kolom < count($matriks[0])-1; $kolom++){
                $sumRow[$baris]=$sumRow[$baris]+$matriks[$baris][$kolom];
            }
            $sumRow[$baris]=sqrt($sumRow[$baris]);
        }
        return $sumRow;//array sumRowsBerpangkat per Row
    }
































    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
