<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plans;
class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metals =  [
            [
              'plan_name' => 'Silver'
           
            ],
            [
              'plan_name' => 'Gold'
              ],
              [
                'plan_name' => 'Platinum'
              ]
             
          ];
          Plans::insert($metals);
    }
}
