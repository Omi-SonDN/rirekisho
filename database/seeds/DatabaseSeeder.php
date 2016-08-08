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
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(CVTableSeeder::class);
        $this->call(RecordTableSeeder::class);
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
        $abc1 = DB::table('positions')->get();
        $abc2 = DB::table('status')->get();
        $key_positions = array_keys($abc1);
        $key_status = array_keys($abc2);

        foreach ($users as $v) {
            DB::table('cvs')->insert([
                //'First_name' => $faker->middleName.' '.$faker->firstName,
                //'Last_name' => $faker->lastName,
                //'Gender' => 1,
                //'Address' => $faker->city,
                'name_cv' => $faker->Name,
                'user_id' => $v->id,
                'created_at' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'apply_to' => array_rand($key_positions),
                'Status' => array_rand($key_status),
                'Status' => 1,
                'type_cv' => rand(0,1),
                'live' => rand(0,1),
                'active' => rand(0,1),
            ]);
        }
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        $faker = Faker::create('vi_VN');
        $counter = range(1, 15);

        DB::table('users')->insert([
            'name' => 'BuiNgoc[superadmin]',
            'email' => 'superadmin@123.com',
            'password' => bcrypt('secret'),
            'role' => 3,
            'First_name' => 'Bui',
            'Last_name' => 'Ngoc',
            'Gender' => 1,
            'Address' => $faker->city,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1994-11-02",
            'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);

        DB::table('users')->insert([
            'name' => 'LinhDang[admin]',
            'email' => 'admin@123.com',
            'password' => bcrypt('secret'),
            'role' => 2,
            'First_name' => 'Bui',
            'Last_name' => 'Admin',
            'Gender' => 1,
            'Address' => $faker->city,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1993-11-02",
            'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dan[applicant]',
            'email' => 'applicant@123.com',
            'password' => bcrypt('secret'),
            'role' => 0,
            'First_name' => 'Ung',
            'Last_name' => 'Vien',
            'Gender' => 1,
            'Address' => $faker->city,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1992-11-02",
            'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);
        DB::table('users')->insert([
            'name' => 'Linh Dang[visitor]',
            'email' => 'visitor@123.com',
            'password' => bcrypt('secret'),
            'role' => 1,
            'First_name' => 'Kiem',
            'Last_name' => 'Duyet',
            'Gender' => rand(0,1),
            'Address' => $faker->city,
            'Phone' => $faker->phoneNumber,
            'Birth_date' => "1991-11-02",
            'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        ]);

        foreach ($counter as $v) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 0,
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => rand(0,1),
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            ]);
        }

        for ($i = 1; $i < 7; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'password' => bcrypt('secret'),
                'role' => 1,
                'First_name' => $faker->middleName.' '.$faker->firstName,
                'Last_name' => $faker->lastName,
                'Gender' => rand(0,1),
                'Address' => $faker->city,
                'Phone' => $faker->phoneNumber,
                'Birth_date' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'Self_intro' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
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
                'active' => rand(0,1),
                'description' => 'Ví trí ' . $i,
            ]);
        }
    }
}
