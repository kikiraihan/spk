<?php

use Illuminate\Database\Seeder;
use App\Model\CriteriaPreference;

class CriteriaPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $criteria=new CriteriaPreference;

        $criteria->judul="Calon menantu idaman";
        // $criteria->model="Mahasiswa";
        $criteria->ordo=5;
        $criteria->matriks='[["1","5","3","5","2"],["1\/5","1","1\/4","4","1\/2"],["1\/3","4","1","5","1"],["1\/5","1\/4","1\/5","1","1\/2"],["1\/2","2","1","2","1"]]';
        $criteria->matriksNormalised='[[0.44776119402985076,0.40816326530612246,0.5504587155963303,0.29411764705882354,0.4],[0.08955223880597016,0.08163265306122448,0.04587155963302752,0.23529411764705882,0.1],[0.14925373134328357,0.32653061224489793,0.18348623853211007,0.29411764705882354,0.2],[0.08955223880597016,0.02040816326530612,0.03669724770642202,0.058823529411764705,0.1],[0.22388059701492538,0.16326530612244897,0.18348623853211007,0.11764705882352941,0.2]]';
        $criteria->kriteria='[{"title":"Agama","jenis":"Benefit","bobot":0.4201001643982254},{"title":"TOEFL","jenis":"Benefit","bobot":0.11047011382945619},{"title":"IPK","jenis":"Benefit","bobot":0.230677645835823},{"title":"Masak","jenis":"Benefit","bobot":0.06109623583789261},{"title":"Kecantikan","jenis":"Benefit","bobot":0.17765584009860275}]';
        $criteria->save();

    }
}
