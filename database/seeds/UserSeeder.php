<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert(
          [
              'name'=>'www',
              'email'=>'1292qq.com',
              'password'=>'123',
              'created_at'=>\Carbon\Carbon::now()->toDateTimeString(),
              'updated_at'=>\Carbon\Carbon::now()->toDateTimeString(),
          ]
        );
    }
}
