<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Mahasiswa;
use App\Model\CriteriaPreference;
use Illuminate\Support\Facades\DB;
use App\Traits\manipulasiMatriksTopsis;
use App\Traits\manipulasiModelPenilaianAlternatif;
use App\Rules\DateDecissionGenerateRule;

class DecissionController extends Controller
{

    use manipulasiMatriksTopsis, manipulasiModelPenilaianAlternatif;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tables=DB::select('SHOW TABLES');
        // foreach ($tables as $table) {
        //     foreach ($table as $key => $value) {
        //         $listTable[]=$value;
        //     }
        // }
        // dd($listTable);

        $preference=CriteriaPreference::all();
        $mahasiswa=Mahasiswa::all();

        return view('decission.index',compact(['preference','mahasiswa']));
    }



    public function generate(Request $request)
    {

        // {{-- -----------------  UNTUK TIS    -------------- --}}
        $this->validate($request, [
            'date' => new DateDecissionGenerateRule,
            'table' => "required",
            'preference' => "required",
            ]);

        // echo "valid";
        // dd($request->all());
        // {{-- -----------------  UNTUK TIS    -------------- --}}





        //AMBIL BOBOT DAN TITLE
        $preference=CriteriaPreference::with('penilaianAlternatif')->find($request->preference);

        //decode semua json nilai, menjadi collection
        $this->decodeAllJsonNilai($preference);

        $penilaianPerIdMahasiswa=$preference->penilaianAlternatif->groupBy('id_mahasiswa');//mahasiswa tpi cuma matriks


        foreach (json_decode($preference->kriteria) as $kri) {
            $bobot[]=$kri->bobot;
            $title[]=$kri->title;
            $jenis[]=$kri->jenis;
        }
        // array_push($title,'id');
        // $mahasiswa=Mahasiswa::all($title);


        //buat matriks mahasiswa +id id kolom akhir
        $i=0;
        foreach($penilaianPerIdMahasiswa as $id_mahasiswa=>$penilaian)
        {
            $z=0;
            foreach($title as $t)
            {
                $matriks[$i][$z++]=$this->nilaiSebenarnyaPerTitle($penilaian,$t);
            }
            $matriks[$i][$z++]=$id_mahasiswa;
            $i++;
        }
        // dd($matriks);

        //normalisasi
        $matriksPembagi=$this->sumPerColumnsBerpangkatDiakarkanTanpaKolomTerakhir($matriks);
        $matriksNormalisedTopsis=$this->normalise($matriks,$matriksPembagi);

        //normalisasi Terbobot
        $matriksWeightedTopsis=$this->normalisedWeighted($matriksNormalisedTopsis,$bobot);
        $maxMin=$this->kriteriaMaxMin($matriksWeightedTopsis);

        //matriks solusi ideal (array kriteria['jenis','positif','negatif'])
        $solusiIdeal=$this->matriksSolusiIdeal($maxMin,$jenis);

        //jarak solusi positif dan negatig (total per alternatif)
        $dPositif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"positif");
        $dNegatif=$this->distance($matriksWeightedTopsis,$solusiIdeal,"negatif");
        // dd($maxMin);


        //nilai preferensi/akhir/rank
        $rank=$this->nilaiPreferensi($dPositif,$dNegatif,$matriksWeightedTopsis);
        arsort($rank);

        //get and ORDER by RANK
        //make string "FIELD(id,'31','2','2')" that included by rank key
        $first='FIELD(id';$middle="";$last=")";
        foreach ($rank as $key => $value) $middle.=",'".$key."'";//itu berisi idtable

        //kolom yang di get
        // foreach($title as $t) $kolomGet[]=strtolower($t);
        $kolomGet=['id','nama'];
        // array_push($kolomGet,'nama');
        // array_push($kolomGet,'id');
        $hasil=Mahasiswa::select($kolomGet)->orderByRaw($first.$middle.$last)->get();

        // dd($hasil);

        // dd($dNegatif);
        return view('decission.result',compact([
            'hasil','rank','matriks',
            'matriksWeightedTopsis',
            'solusiIdeal','title',
            'dNegatif',
            'dPositif',
            'kolomGet',
        ]));

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











//dummy data dari contoh ada di excell

// $matriksaa[0][0]=3;
// $matriksaa[0][1]=3;
// $matriksaa[0][2]=4;
// $matriksaa[0][3]=5;
// $matriksaa[0][4]=null;

// $matriksaa[1][0]=4;
// $matriksaa[1][1]=3;
// $matriksaa[1][2]=4;
// $matriksaa[1][3]=2;
// $matriksaa[1][4]=null;

// $matriksaa[2][0]=2;
// $matriksaa[2][1]=5;
// $matriksaa[2][2]=3;
// $matriksaa[2][3]=3;
// $matriksaa[2][4]=null;

// $matriksaa[3][0]=3;
// $matriksaa[3][1]=3;
// $matriksaa[3][2]=5;
// $matriksaa[3][3]=4;
// $matriksaa[3][4]=null;

// $matriksaa[4][0]=4;
// $matriksaa[4][1]=4;
// $matriksaa[4][2]=3;
// $matriksaa[4][3]=3;
// $matriksaa[4][4]=null;

// $bobotaa=[4,5,2,3];
// $jenisaa=['Cost','Benefit','Benefit','Benefit'];