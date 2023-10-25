<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [['מזומן', 'money'], ['כרטיס אשראי', 'credit card'], ['ביט', 'Bit'], ['העברה בנקאית', 'Money Transfer'], ['גיפט קארד', 'Gift Card']];
        foreach ($methods as $method) {
            DB::table('methods')->insert([
                'type' => $method[0],
                'english_type' => $method[1]
            ]);
        }
    }
}
