<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('it_skill')->delete();
        $CVs = DB::table('CV')->get();
        $a = array("japanese", "english", "chinese", "french");
        $b = array("C", "Java", "PHP", "Ruby");

        foreach ($CVs as $v) {
            DB::table('it_skill')->insert([
                'skill_type' => 0,
                'study_time' => 6,
                'work_time' => 3,
                'name' => $a[array_rand($a,1)],
                'cv_id' => $v->id
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('it_skill')->insert([
                'skill_type' => 1,
                'study_time' => 9,
                'work_time' => 5,
                'name' => $b[array_rand($b,1)],
                'cv_id' => $v->id
            ]);
        }


    }
}
