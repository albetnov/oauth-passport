<?php

namespace Database\Seeders;

use App\Models\Todo as ModelsTodo;
use Illuminate\Database\Seeder;

class Todo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsTodo::factory(100)->create();
    }
}
