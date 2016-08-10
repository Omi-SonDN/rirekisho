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
            1  => array('id' => 1, 'status'  => 'Chờ duyệt', 'allow_sendmail'                 => '', 'prev_status'  => '', 'email_template'                          => '<p>Ch&agrave;o bạn&nbsp;[First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn. Hiện tại hồ sơ của bạn đang trong qu&aacute; tr&igrave;nh chờ duyệt.</p><p>Ch&uacute;ng t&ocirc;i sẽ xem x&eacute;t v&agrave; phản hồi cho bạn sớm nhất. Cảm ơn bạn đ&atilde; quan t&acirc;m v&agrave; gửi hồ sơ đến cho ch&uacute;ng t&ocirc;i.</p><p>Tr&acirc;n trọng!</p>'),
            2  => array('id' => 2, 'status'  => 'Đồng ý phỏng vấn', 'allow_sendmail'          => '1', 'prev_status' => '1,6', 'email_template'                       => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p><p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p><p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p><p>Tr&acirc;n trọng, k&iacute;nh mời!</p>'),
            3  => array('id' => 3, 'status'  => 'Đã đặt lịch phỏng vấn', 'allow_sendmail'     => '1', 'prev_status' => '2', 'email_template'                         => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p><p>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date]</p><p>- Địa điểm: [Address]</p><p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p><p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p><p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p><p>Tr&acirc;n trọng, k&iacute;nh mời!</p>'),
            4  => array('id' => 4, 'status'  => 'Loại', 'allow_sendmail'                      => '0', 'prev_status' => '8,12,17,21,24,25,28,30,31', 'email_template' => ''),
            5  => array('id' => 5, 'status'  => 'Testing', 'allow_sendmail'                   => '0', 'prev_status' => '11', 'email_template'                        => ''),
            6  => array('id' => 6, 'status'  => 'Đã qua test', 'allow_sendmail'               => '1', 'prev_status' => '5,10', 'email_template'                      => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn đ&atilde; vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i! Ch&uacute;ng t&ocirc;i muốn mời bạn tới c&ocirc;ng ty tham gia buổi phỏng vấn.</p><p><strong>- Thời gian: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p><p><strong>- Địa điểm: [Address]</strong></p><p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p><p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p><p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p><p>Tr&acirc;n trọng!</p>'),
            7  => array('id' => 7, 'status'  => 'Không qua test', 'allow_sendmail'            => '1', 'prev_status' => '5,10', 'email_template'                      => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn chưa vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i! Cảm ơn bạn đ&atilde; quan t&acirc;m đến th&ocirc;ng tin tuyển dụng của ch&uacute;ng t&ocirc;i!</p><p>Tr&acirc;n trọng!</p>'),
            8  => array('id' => 8, 'status'  => 'Đã phỏng vấn', 'allow_sendmail'              => '0', 'prev_status' => '3', 'email_template'                         => ''),
            9  => array('id' => 9, 'status'  => 'Đã đồng ý làm bài test', 'allow_sendmail'    => '0', 'prev_status' => '2,23', 'email_template'                      => '<p>&nbsp;</p><p>&nbsp;</p>'),
            10 => array('id' => 10,  'status' => 'Đã làm bài Test', 'allow_sendmail'           => '0', 'prev_status' => '13', 'email_template'                        => ''),
            11 => array('id' => 11,  'status' => 'Đã gửi bài test', 'allow_sendmail'           => '0', 'prev_status' => '22', 'email_template'                        => ''),
            12 => array('id' => 12,  'status' => 'Từ chối làm bài Test', 'allow_sendmail'      => '1', 'prev_status' => '2,23', 'email_template'                      => ''),
            13 => array('id' => 13,  'status' => 'Đã nhận bài Test gửi về', 'allow_sendmail'   => '0', 'prev_status' => '1', 'email_template'                         => ''),
            14 => array('id' => 14,  'status' => 'Nhận', 'allow_sendmail'                      => '1', 'prev_status' => '8,30', 'email_template'                      => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến l&agrave;m việc&nbsp;tại c&ocirc;ng ty với vị tr&iacute; <strong>[Positions]</strong>.</p><p><strong>- Thời gian bắt đầu: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p><p><strong>- Địa điểm: [Address]</strong></p><p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p><p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p><p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p><p>Tr&acirc;n trọng, k&iacute;nh mời!</p>'),
            15 => array('id' => 15,  'status' => 'Đã gửi mail offer', 'allow_sendmail'         => '0', 'prev_status' => '14', 'email_template'                        => ''),
            16 => array('id' => 16,  'status' => 'Đã checkin', 'allow_sendmail'                => '0', 'prev_status' => '19', 'email_template'                        => ''),
            17 => array('id' => 17,  'status' => 'Đã checkout', 'allow_sendmail'               => '0', 'prev_status' => '18,26', 'email_template'                     => ''),
            18 => array('id' => 18,  'status' => 'Đã từ chối offer', 'allow_sendmail'          => '0', 'prev_status' => '15', 'email_template'                        => ''),
            19 => array('id' => 19,  'status' => 'Đã xác nhận offer', 'allow_sendmail'         => '0', 'prev_status' => '15', 'email_template'                        => ''),
            20 => array('id' => 20,  'status' => 'Lưu Hồ Sơ', 'allow_sendmail'                 => '0', 'prev_status' => '16', 'email_template'                        => ''),
            21 => array('id' => 21,  'status' => 'Từ chối phỏng vấn', 'allow_sendmail'         => '0', 'prev_status' => '6', 'email_template'                         => ''),
            22 => array('id' => 22,  'status' => 'Đã đặt lịch làm Test', 'allow_sendmail'      => '0', 'prev_status' => '9', 'email_template'                         => ''),
            23 => array('id' => 23,  'status' => 'Đã gửi mail từ chối', 'allow_sendmail'       => '0', 'prev_status' => '7,1', 'email_template'                      => ''),
            24 => array('id' => 24,  'status' => 'Không tới phỏng vấn', 'allow_sendmail'       => '0', 'prev_status' => '3', 'email_template'                         => ''),
            25 => array('id' => 25,  'status' => 'Không check in', 'allow_sendmail'            => '1', 'prev_status' => '19', 'email_template'                        => ''),
            26 => array('id' => 26,  'status' => 'Đã đặt lịch PV lại lần 2', 'allow_sendmail'  => '0', 'prev_status' => '29', 'email_template'                        => ''),
            27 => array('id' => 27,  'status' => 'Từ chối pv lần 2', 'allow_sendmail'          => '0', 'prev_status' => '27', 'email_template'                        => ''),
            28 => array('id' => 28,  'status' => 'Phỏng vấn lại', 'allow_sendmail'             => '1', 'prev_status' => '3', 'email_template'                         => '<p>Ch&agrave;o bạn [First_name]!</p><p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i mời bạn đến tham dự <strong>phỏng vấn lần 2</strong> tại c&ocirc;ng ty.</p><p>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date]</p><p>- Địa điểm: [Address]</p><p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p><p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại&nbsp;<a href="tel:04.3795.5299">04.3795.5299</a>&nbsp;để th&ocirc;ng b&aacute;o.</p><p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p><p>Tr&acirc;n trọng, k&iacute;nh mời!</p>'),
            29 => array('id' => 39,  'status' => 'Đã phỏng vấn lần 2', 'allow_sendmail'        => '0', 'prev_status' => '27', 'email_template'                        => ''),
            30 => array('id' => 30,  'status' => 'Không tới phỏng vấn lần 2', 'allow_sendmail' => '0', 'prev_status' => '27', 'email_template'                        => ''),
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
                'name' => 'Vị trí ' . $i,
                'active' => rand(0,1),
                'description' => 'Vị trí ' . $i,
            ]);
        }
    }
}
