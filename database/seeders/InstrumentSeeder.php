<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instrument;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
                //
        $data = [
            ["id" => 1, "title" => "Akreditasi Universitas Global Jakarta", "content" => "https://s.jgu.ac.id/m/SertifikatAkreditasi"],
            ["id" => 2, "title" => "Manual Mutu", "content" => "https://drive.google.com/drive/folders/1eGLZCaMqC3g7AXmZ_J1JSNu1ncw1FM-1?usp=sharing"],
            ["id" => 3, "title" => "Standar Mutu", "content" => "https://drive.google.com/drive/u/5/folders/1YJXMevuyUGX_7FhJ25Gdn34_vVEc687-"],
            ["id" => 4, "title" => "Standar Operasional Prosedur", "content" => "https://drive.google.com/drive/u/5/folders/11bcfzfZLbYMg3ykGauj-VQhILzGJlLPj"],
            ["id" => 5, "title" => "Pedoman Audit Mutu Internal (AMI)", "content" => "https://drive.google.com/drive/folders/1WgOaPEgx2n1FEL3VrqzNUQGLKvIENztb?usp=drive_link"],
            ["id" => 6, "title" => "Sistem Tata Kelola Organisasi Penjamin Mutu", "content" => "https://drive.google.com/drive/folders/1vBlHGzo0X5OC_ucABOBTy-xao3dFGx1_?usp=sharing"],
            ["id" => 7, "title" => "Peraturan Rektor", "content" => "https://drive.google.com/drive/folders/17bREROtaIXG76k7dpdAf14_Ak4KbNCCu?usp=sharing"],
            ["id" => 8, "title" => "RPJP", "content" => ""],
            ["id" => 9, "title" => "Renstra", "content" => ""],
            ["id" => 10, "title" => "Renop", "content" => ""],
        ];

        foreach ($data as $x) {
            if(!Instrument::where('id', $x['id'])->first()){
                $m = new Instrument();
                $m->id = $x['id'];
                $m->title = $x['title'];
                $m->content = $x['content'];
                $m->save();
            }
        }
    }
}
