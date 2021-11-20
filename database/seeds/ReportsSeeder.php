<?php

use Illuminate\Database\Seeder;

class ReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reports')->insert([
            'external_id' => '1',
            'title'       => 'Meu primeiro teste no reports',
            'url'         => 'http://localhost:8000',
            'summary'     => 'Meu sumario...',
            'created_at'  => \Carbon\Carbon::now(),
            'updated_at'  => \Carbon\Carbon::now()
        ]);
    }
}
