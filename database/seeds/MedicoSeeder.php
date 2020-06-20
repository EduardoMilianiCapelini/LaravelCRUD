<?php

use Illuminate\Database\Seeder;
use App\Models\ModelMedico;

class MedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ModelMedico $medico)
    {
        $medico->create([
            'name'=>'João',
            'activities'=>'Clínico geral',
            'price'=>'10.22',
            'id_user'=>'1',
        ]);

        $medico->create([
            'name'=>'Maria',
            'activities'=>'Dentista',
            'price'=>'10.23',
            'id_user'=>'1',
        ]);

        $medico->create([
            'name'=>'José',
            'activities'=>'Cirurgião',
            'price'=>'10.24',
            'id_user'=>'2',
        ]);
         $medico->create([
            'name'=>'Camila',
            'activities'=>'Fisioterapeuta',
            'price'=>'10.25',
            'id_user'=>'2',
        ]);
    }
}
