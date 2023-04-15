<?php

namespace Database\Seeders;

use App\Models\ShowNum;
use Illuminate\Database\Seeder;

class ShowNumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ShowNum::all()->each->delete();
        foreach (range(1, 18) as $i) {
            $a = new ShowNum(["name" => "name $i"]);
            $a->save();
        }
    }
}
