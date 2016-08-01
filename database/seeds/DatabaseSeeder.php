<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\CV;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // buoc 1...
//    public function run()
//    {
//        Model::unguard();
//        $this->call(UsersTableSeeder::class);
//        $this->call(CVTableSeeder::class);
//        $this->call(RecordTableSeeder::class);
//        $this->call(StatusTableSeeder::class);
//        $this->call(PositionsTableSeeder::class);
//        Model::reguard();
//    }

      // buoc 2
    public function run()
    {
        Model::unguard();
        $this->call(SkillSeeder::class);
        Model::reguard();
    }

}

class RecordTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('Records')->delete();
        $faker = Faker::create('vi_VN');
        $faker1 = Faker::create();
        $CVs = DB::table('cvs')->get();

        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 0,
                'Date' => '2012-11-03',
                'Content' => 'Đại học XXX - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 1,
                'Date' => '2012-12-07',
                'Content' => 'Công ty ' . $faker->middleName . ' ' . $faker->firstName . ' - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 1,
                'Date' => '2014-04-17',
                'Content' => 'Công ty ' . $faker->middleName . ' ' . $faker->firstName . ' - ' . $faker->city,
                'cv_id' => $v->id,
            ]);
        }
        foreach ($CVs as $v) {
            DB::table('Records')->insert([
                'Type' => 2,
                'Date' => '2012-12-07',
                'Content' => $faker->city,
                'cv_id' => $v->id,
            ]);
        }
    }
}

class CVTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cvs')->delete();
        $faker = Faker::create('vi_VN');
        $faker1 = Faker::create();
        $faker2 = Faker::create('ja_JP');
        $users = DB::table('users')->where('role', 0)->get();
        $visitor = DB::table('users')->where('role', 1)->get();
        $admin = DB::table('users')->where('role', 2)->first();
        $superadmin = DB::table('users')->where('role', 3)->first();
        //admin
        DB::table('cvs')->insert([
            'First_name' => 'Linh',
            'Last_name' => 'Dang',
            'Gender' => 0,
            'Address' => $faker->city,
            'user_id' => $admin->id,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1994-11-02",
            'Self_intro' => $faker1->paragraph($nbSentences = 3, $variableNbSentences = true),
            'Status' => 1,
        ]);
        //superadmin
        DB::table('cvs')->insert([
            'First_name' => 'Bui',
            'Last_name' => 'Ngoc',
            'Gender' => 1,
            'Address' => $faker->city,
            'user_id' => $superadmin->id,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1994-11-02",
            'Self_intro' => $faker1->paragraph($nbSentences = 3, $variableNbSentences = true),
            'Status' => 1,
        ]);
        foreach ($users as $v) {
            DB::table('cvs')->insert([
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => 1,
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'user_id' => $v->id,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker2->realText($maxNbChars = 200),
                'Status' => 1,
                //'active' => 1,
            ]);
        }
        foreach ($visitor as $v) {
            DB::table('cvs')->insert([
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => 1,
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'user_id' => $v->id,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker2->realText($maxNbChars = 200),
                'Status' => 1,
                //'active' => 1,
            ]);
        }
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $faker = Faker::create();
        $counter = range(1, 25);

        DB::table('users')->insert([
            'name' => 'BuiNgoc[superadmin]',
            'email' => 'superadmin@123.com',
            'password' => bcrypt('secret'),
            'role' => 3,
        ]);

        DB::table('users')->insert([
            'name' => 'LinhDang[admin]',
            'email' => 'admin@123.com',
            'password' => bcrypt('secret'),
            'role' => 2,
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dan[applicant]',
            'email' => 'applicant@123.com',
            'password' => bcrypt('secret'),
            'role' => 0,
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dang[visitor]',
            'email' => 'visitor@123.com',
            'password' => bcrypt('secret'),
            'role' => 1,
        ]);

        foreach ($counter as $v) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
            ]);
        }

        foreach ($counter as $v) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 0,
            ]);
        }
    }
}
class StatusTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('status')->delete();
        $is_check = DB::table('status')->get();
        $arr_status = array(
            1  => array('id' => 1, 'status' => 'Chờ duyệt'),
            2  => array('id' => 2, 'status' => 'Đồng ý phỏng vấn'),
            3  => array('id' => 3, 'status' => 'Đã đặt lịch phỏng vấn'),
            4  => array('id' => 4, 'status' => 'Loại'),
            5  => array('id' => 5, 'status' => 'Testing'),
            6  => array('id' => 6, 'status' => 'Đã qua test'),
            7  => array('id' => 7, 'status' => 'Không qua test'),
            8  => array('id' => 8, 'status' => 'Đã phỏng vấn'),
            9  => array('id' => 9, 'status' => 'Đã đồng ý làm bài test'),
            10 =>  array('id' => 10,'status' => 'Đã làm bài Test'),
            11 =>  array('id' => 11,'status' => 'Đã gửi bài test'),
            12 =>  array('id' => 12,'status' => 'Từ chối làm bài Test'),
            13 =>  array('id' => 13,'status' => 'Đã nhận bài Test gửi về'),
            14 =>  array('id' => 14,'status' => 'Nhận'),
            15 =>  array('id' => 15,'status' => 'Đã gửi mail offer'),
            16 =>  array('id' => 16,'status' => 'Đã checkin'),
            17 =>  array('id' => 17,'status' => 'Đã checkout'),
            18 =>  array('id' => 18,'status' => 'Đã từ chối offer'),
            19 =>  array('id' => 19,'status' => 'Đã xác nhận offer'),
            20 =>  array('id' => 20,'status' => 'Lưu Hồ Sơ'),
            21 =>  array('id' => 21,'status' => 'Từ chối phỏng vấn'),
            22 =>  array('id' => 22,'status' => 'Đã đặt lịch làm Test'),
            23 =>  array('id' => 23,'status' => 'Waiting'),
            24 =>  array('id' => 24,'status' => 'Đã gửi mail từ chối'),
            25 =>  array('id' => 25,'status' => 'Không tới phỏng vấn'),
            26 =>  array('id' => 26,'status' => 'Không check in'),
            27 =>  array('id' => 27,'status' => 'Đã đặt lịch PV lại lần 2'),
            28 =>  array('id' => 28,'status' => 'Từ chối pv lần 2'),
            29 =>  array('id' => 29,'status' => 'Phỏng vấn lại'),
            30 =>  array('id' => 30,'status' => 'Đã phỏng vấn lần 2'),
            31 =>  array('id' => 31,'status' => 'Không tới phỏng vấn lần 2'),
            32 =>  array('id' => 32,'status' => 'Kích hoạt CV')
        );
        if (count($is_check) == 0) {
            DB::table('status')->insert($arr_status);
        }
    }
}
class PositionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('positions')->delete();
        for ($i = 1; $i < 6; $i++) {
            DB::table('positions')->insert([
                'name' => 'Ví trí ' . $i,
                'active' => '1',
                'description' => 'Ví trí 1 ' . $i,
            ]);
        }
    }
}
