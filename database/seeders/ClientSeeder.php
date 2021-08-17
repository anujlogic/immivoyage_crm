<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('client')->insert(
            [
                'first_name'         => Str::random(5),
                'last_name'          => Str::random(5),
                'father_husband'     => Str::random(5),
                'age'                => rand(21, 45),
                'email'              => Str::random(5).'@gmail.com',
                'citizenship'        => Str::random(5),
                'visit_purpose'      => Str::random(5),
                'desire_country'     => Str::random(5),
                'travel_purpose'     => Str::random(5),
                'listen_score'       => rand(56, 97),
                'write_score'        => rand(51, 97),
                'read_score'         => rand(47, 97),
                'speak_score'        => rand(41, 98),
                'qualification'      => Str::random(5),
                'work_experience'    => Str::random(5),
                'visa_applied_before'=> Str::random(5),
                'Preference'         => Str::random(5),
                'travel_history'     => Str::random(5),
                'referance'          => Str::random(5),
                'remark'             => Str::random(5),
                'status'             => Str::random(5),
            ],
            [
                'first_name'         => Str::random(5),
                'last_name'          => Str::random(5),
                'father_husband'     => Str::random(5),
                'age'                => rand(21, 45),
                'email'              => Str::random(5).'@gmail.com',
                'citizenship'        => Str::random(5),
                'visit_purpose'      => Str::random(5),
                'desire_country'     => Str::random(5),
                'travel_purpose'     => Str::random(5),
                'listen_score'       => rand(56, 97),
                'write_score'        => rand(51, 97),
                'read_score'         => rand(47, 97),
                'speak_score'        => rand(41, 98),
                'qualification'      => Str::random(5),
                'work_experience'    => Str::random(5),
                'visa_applied_before'=> Str::random(5),
                'Preference'         => Str::random(5),
                'travel_history'     => Str::random(5),
                'referance'          => Str::random(5),
                'remark'             => Str::random(5),
                'status'             => Str::random(5),
            ],    
        );
    }
}