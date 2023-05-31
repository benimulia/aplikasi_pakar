<?php

use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jeniskelamin = [
            [
                'js_kelamin' => 'Laki-laki',
            ],
            [
                'js_kelamin' => 'Perempuan',
            ],
        ];

        foreach ($jeniskelamin as $js) {
            DB::table('kelamin')->insert($js);
        }

        
    }
}
