<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StatusBooking extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        DB::table('bookingstatus')->insert([
            'id' => 50000,
            'bookingstatus_name' =>'อนุมัติเรียบร้อย',
      
        ]);
        DB::unprepared("UPDATE bookingstatus SET id=0");
       
        DB::table('bookingstatus')->insert([
            'id' => 1,
            'bookingstatus_name' =>'อนุมัติเรียบร้อยนะจ๊ะ',
      
        ]);
       
    }
}
