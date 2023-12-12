<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'status_nome' => 'Em Progresso',            
        ]);

        Status::create([
            'status_nome' => 'Concluído',            
        ]);
    }
}
