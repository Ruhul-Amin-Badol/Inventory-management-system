<?php

namespace Database\Seeders;
// use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\HASH;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class userProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

           $data = [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('4444'),
           ];

        DB::table('users')->insert($data);
    }
}
