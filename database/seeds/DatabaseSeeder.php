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
        $this->call(companies::class);
        $this->call(f_general::class);
        $this->call(f_slide::class);
        $this->call(group::class);
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
        $key_status = $key_positions = array();
        foreach ($abc1 as $item){
            $key_positions[$item->id] = $item->id;
        }
        foreach ($abc2 as $item){
            $key_status[$item->id] = $item->id;
        }

        foreach ($users as $v) {
            DB::table('cvs')->insert([
                //'First_name' => $faker->middleName.' '.$faker->firstName,
                //'Last_name' => $faker->lastName,
                //'Gender' => 1,
                //'Address' => $faker->city,
                'name_cv' => $faker->text,
                'user_id' => $v->id,
                //'created_at' => $faker->date($format = 'Y-m-d', $max = '1995-11-03'),
                'created_at' => $faker->dateTimeBetween('-3 years', 'now'),
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
        $counter = range(1, 50);

        DB::table('users')->insert([
            'userName' => 'BuiNgoc[superadmin]',
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
            'userName' => 'LinhDang[admin]',
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
            'userName' => 'Linh Dan[applicant]',
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
            'userName' => 'Linh Dang[visitor]',
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
                'userName' => $faker->name,
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
                'userName' => $faker->name,
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

            1  => array('id' => 1, 'status'  => 'Chờ duyệt', 'allow_sendmail'                 => '', 'prev_status'  => '', 'infor'=>'', 'email_template'                          => ' <p>Ch&agrave;o bạn&nbsp;[First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn. Hiện tại hồ sơ của bạn đang trong qu&aacute; tr&igrave;nh chờ duyệt.</p> <p>Ch&uacute;ng t&ocirc;i sẽ xem x&eacute;t v&agrave; phản hồi cho bạn sớm nhất. Cảm ơn bạn đ&atilde; quan t&acirc;m v&agrave; gửi hồ sơ đến cho ch&uacute;ng t&ocirc;i.</p> <p>Tr&acirc;n trọng!</p>', 'role_VisitorStatus'=>1),
            2  => array('id' => 2, 'status'  => 'Đồng ý phỏng vấn', 'allow_sendmail'          => '1', 'prev_status' => '1,6', 'infor'=>'', 'email_template'                       => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i đ&atilde; nhận được hồ sơ của bạn, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p> <p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p> <p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p> <p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 'role_VisitorStatus'=>1),
            3  => array('id' => 3, 'status'  => 'Đã đặt lịch phỏng vấn', 'allow_sendmail'     => '1', 'prev_status' => '2', 'infor'=>'Date,Time,Address,Attach', 'email_template'                         => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến tham dự phỏng vấn tại c&ocirc;ng ty.</p> <p>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date]</p> <p>- Địa điểm: [Address]</p> <p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p> <p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p> <p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p> <p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 'role_VisitorStatus'=>0),
            4  => array('id' => 4, 'status'  => 'Loại', 'allow_sendmail'                      => '0', 'prev_status' => '1,2,3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30', 'infor'=>'', 'email_template' => '', 'role_VisitorStatus'=>1),
            5  => array('id' => 5, 'status'  => 'Testing', 'allow_sendmail'                   => '0', 'prev_status' => '11', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            6  => array('id' => 6, 'status'  => 'Đã qua test', 'allow_sendmail'               => '1', 'prev_status' => '5,10', 'infor'=>'Date,Time,Address,Attach', 'email_template'                      => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn đ&atilde; vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i! Ch&uacute;ng t&ocirc;i muốn mời bạn tới c&ocirc;ng ty tham gia buổi phỏng vấn.</p> <p><strong>- Thời gian: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p> <p><strong>- Địa điểm: [Address]</strong></p> <p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p> <p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p> <p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p> <p>Tr&acirc;n trọng!</p>', 'role_VisitorStatus'=>0),
            7  => array('id' => 7, 'status'  => 'Không qua test', 'allow_sendmail'            => '1', 'prev_status' => '5,10', 'infor'=>'', 'email_template'                      => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i th&ocirc;ng b&aacute;o rằng bạn chưa vượt qua b&agrave;i test của ch&uacute;ng t&ocirc;i! Cảm ơn bạn đ&atilde; quan t&acirc;m đến th&ocirc;ng tin tuyển dụng của ch&uacute;ng t&ocirc;i!</p> <p>Tr&acirc;n trọng!</p> ', 'role_VisitorStatus'=>0),
            8  => array('id' => 8, 'status'  => 'Đã phỏng vấn', 'allow_sendmail'              => '0', 'prev_status' => '3', 'infor'=>'', 'email_template'                         => '', 'role_VisitorStatus'=>0),
            9  => array('id' => 9, 'status'  => 'Đã đồng ý làm bài test', 'allow_sendmail'    => '0', 'prev_status' => '2,23', 'infor'=>'', 'email_template'                      => ' &nbsp; &nbsp; ','role_VisitorStatus'=>0),
            10 => array('id' => 10,  'status' => 'Đã làm bài Test', 'allow_sendmail'           => '0', 'prev_status' => '13', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            11 => array('id' => 11,  'status' => 'Đã gửi bài test', 'allow_sendmail'           => '0', 'prev_status' => '22', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            12 => array('id' => 12,  'status' => 'Từ chối làm bài Test', 'allow_sendmail'      => '1', 'prev_status' => '2,23', 'infor'=>'', 'email_template'                      => '', 'role_VisitorStatus'=>0),
            13 => array('id' => 13,  'status' => 'Đã nhận bài Test gửi về', 'allow_sendmail'   => '0', 'prev_status' => '11', 'infor'=>'', 'email_template'                         => '', 'role_VisitorStatus'=>0),
            14 => array('id' => 14,  'status' => 'Nhận', 'allow_sendmail'                      => '1', 'prev_status' => '8,30', 'infor'=>'Date,Time,Address,Attach', 'email_template'                      => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i thực sự đ&aacute;nh gi&aacute; cao tr&igrave;nh độ cũng như sự hiểu biết của bạn đối với vị tr&iacute; c&ocirc;ng ty đang tuyển dụng, c&ocirc;ng ty ch&uacute;ng t&ocirc;i muốn mời bạn đến l&agrave;m việc&nbsp;tại c&ocirc;ng ty với vị tr&iacute; <strong>[Positions]</strong>.</p> <p><strong>- Thời gian bắt đầu: [Time] ph&uacute;t Ng&agrave;y [Date]</strong></p> <p><strong>- Địa điểm: [Address]</strong></p> <p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p> <p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại <a href="tel:04.3795.5299">04.3795.5299</a> để th&ocirc;ng b&aacute;o.</p> <p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p> <p>Tr&acirc;n trọng, k&iacute;nh mời!</p>', 'role_VisitorStatus'=>0),
            15 => array('id' => 15,  'status' => 'Đã gửi mail offer', 'allow_sendmail'         => '0', 'prev_status' => '14', 'infor'=>'','email_template'                        => '', 'role_VisitorStatus'=>0),
            16 => array('id' => 16,  'status' => 'Đã checkin', 'allow_sendmail'                => '0', 'prev_status' => '19', 'infor'=>'','email_template'                        => '', 'role_VisitorStatus'=>0),
            17 => array('id' => 17,  'status' => 'Đã checkout', 'allow_sendmail'               => '0', 'prev_status' => '18,26', 'infor'=>'', 'email_template'                     => '', 'role_VisitorStatus'=>0),
            18 => array('id' => 18,  'status' => 'Đã từ chối offer', 'allow_sendmail'          => '0', 'prev_status' => '15', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            19 => array('id' => 19,  'status' => 'Đã xác nhận offer', 'allow_sendmail'         => '0', 'prev_status' => '15', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            20 => array('id' => 20,  'status' => 'Lưu Hồ Sơ', 'allow_sendmail'                 => '0', 'prev_status' => '16', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            21 => array('id' => 21,  'status' => 'Từ chối phỏng vấn', 'allow_sendmail'         => '0', 'prev_status' => '6', 'infor'=>'','email_template'                         => '', 'role_VisitorStatus'=>0),
            22 => array('id' => 22,  'status' => 'Đã đặt lịch làm Test', 'allow_sendmail'      => '0', 'prev_status' => '9', 'infor'=>'', 'email_template'                         => '', 'role_VisitorStatus'=>0),
            23 => array('id' => 23,  'status' => 'Đã gửi mail từ chối', 'allow_sendmail'       => '0', 'prev_status' => '7', 'infor'=>'', 'email_template'                      => '', 'role_VisitorStatus'=>0),
            24 => array('id' => 24,  'status' => 'Không tới phỏng vấn', 'allow_sendmail'       => '0', 'prev_status' => '3', 'infor'=>'', 'email_template'                         => '', 'role_VisitorStatus'=>0),
            25 => array('id' => 25,  'status' => 'Không check in', 'allow_sendmail'            => '1', 'prev_status' => '19', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            26 => array('id' => 26,  'status' => 'Đã đặt lịch PV lại lần 2', 'allow_sendmail'  => '0', 'prev_status' => '29', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            27 => array('id' => 27,  'status' => 'Từ chối pv lần 2', 'allow_sendmail'          => '0', 'prev_status' => '27', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
            28 => array('id' => 28,  'status' => 'Phỏng vấn lại', 'allow_sendmail'             => '1', 'prev_status' => '3', 'infor'=>'Date,Time,Address,Attach', 'email_template'                         => ' <p>Ch&agrave;o bạn [First_name]!</p> <p>C&ocirc;ng ty cổ phần Ominext ch&uacute;ng t&ocirc;i mời bạn đến tham dự <strong>phỏng vấn lần 2</strong> tại c&ocirc;ng ty.</p> <p>- Thời gian: [Time] ph&uacute;t, Ng&agrave;y&nbsp;[Date]</p> <p>- Địa điểm: [Address]</p> <p>Bạn vui l&ograve;ng phản hồi lại email n&agrave;y để x&aacute;c nhận tham gia buổi phỏng vấn.</p> <p>Trong trường hợp bạn kh&ocirc;ng thể thu xếp được thời gian, xin vui l&ograve;ng li&ecirc;n hệ lại theo địa chỉ email n&agrave;y hoặc số điện thoại&nbsp;<a href="tel:04.3795.5299">04.3795.5299</a>&nbsp;để th&ocirc;ng b&aacute;o.</p> <p>Rất mong bạn c&oacute; thể thu xếp thời gian tham gia phỏng vấn.</p> <p>Tr&acirc;n trọng, k&iacute;nh mời!</p> ','role_VisitorStatus'=>0),
            29 => array('id' => 29,  'status' => 'Đã phỏng vấn lần 2', 'allow_sendmail'        => '0', 'prev_status' => '27', 'infor'=>'',  'email_template'                        => '', 'role_VisitorStatus'=>0),
            30 => array('id' => 30,  'status' => 'Không tới phỏng vấn lần 2', 'allow_sendmail' => '0', 'prev_status' => '27', 'infor'=>'', 'email_template'                        => '', 'role_VisitorStatus'=>0),
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
        DB::table('positions')->insert([
            'name' => 'game development',
            'icon' => 'fa-gamepad',
            'active' => 1,
            'description' => 'GAME DEVELOPMENT',
        ]);
        DB::table('positions')->insert([
            'name' => 'smartphone applications',
            'icon' => 'fa-mobile-phone',
            'active' => 1,
            'description' => 'SMARTPHONE APPLICATIONS',
        ]);
        DB::table('positions')->insert([
            'name' => 'web applications',
            'icon' => 'fa-cogs',
            'active' => 1,
            'description' => 'WEB APPLICATIONS',
        ]);
        DB::table('positions')->insert([
            'name' => 'maintenance',
            'icon' => 'fa-cog',
            'active' => 1,
            'description' => 'MAINTENANCE',
        ]);
        DB::table('positions')->insert([
            'name' => 'dedicated team',
            'icon' => 'fa-user',
            'active' => 1,
            'description' => 'DEDICATED TEAM',
        ]);
        DB::table('positions')->insert([
            'name' => 'portfolio',
            'icon' => 'fa-trophy',
            'active' => 1,
            'description' => 'PORTFOLIO',
        ]);
    }
}
class companies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'nameCompany'=>'Ominext Jsc',
            'map'=>'<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.019121431853!2d105.79697321450045!3d21.031920893047246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab46d1dce439%3A0xd2d8d609d84ffde!2sCTM+Complex!5e0!3m2!1svi!2s!4v1471244909747" width="700" height="390" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'phones'=>'+84 43 795 5299',
            'about'=>'1234567',
            'link'=>'Ominext Jsc',
            'subdomain'=>'http://www.ominext.com/',
            'address'=>'Tầng 8, CTM Building 139 Cầu Giấy, Cầu Giấy, Hà Nội, Việt Nam',
            ]);
    }
}
class f_general extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('f_general')->insert([
            'key'=>'ominext',
            'value'=>'<h2>Giới thiệu về c&ocirc;ng ty</h2>
                        <h4>Đi đầu trong lĩnh vực sản xuất v&agrave; gia c&ocirc;ng phần mềm</h4>
                        <p>Ominext l&agrave; một c&ocirc;ng ty c&ocirc;ng nghệ th&ocirc;ng tin hoạt động trong lĩnh vực sản xuất v&agrave; gia c&ocirc;ng phần mềm cho thị trường Nhật Bản. Với mong muốn vươn l&ecirc;n trở th&agrave;nh một đối t&aacute;c tin cậy với c&aacute;c c&ocirc;ng ty Nhật Bản v&agrave; l&agrave; đơn vị đi đầu trong việc sản xuất c&aacute;c sản phẩm c&ocirc;ng nghệ, đem sự s&aacute;ng tạo của tuối trẻ Việt Nam giới thiệu đến với kh&aacute;ch h&agrave;ng Nhật Bản, Ominext đang từng bước ho&agrave;n thiện 3 mũi nhọn: tổ chức quản l&yacute; trong c&ocirc;ng ty - Operation (O), am hiểu nắm bắt thị trường - Market (M) v&agrave; thực h&agrave;nh s&aacute;ng tạo - Innovation (I), để tạo ra những gi&aacute; trị mới trong c&aacute;c sản phẩm c&ocirc;ng nghệ theo đ&uacute;ng ti&ecirc;u ch&iacute; m&agrave; c&aacute;i t&ecirc;n Ominext được tạo ra.&nbsp;Ch&uacute;ng t&ocirc;i x&acirc;y dựng c&ocirc;ng ty dựa tr&ecirc;n những gi&aacute; trị l&otilde;i sau:</p>
                        <p>- Customer First (Kh&aacute;ch h&agrave;ng l&agrave; ưu ti&ecirc;n số 1)</p>
                        <p>- Responsibility (Tinh thần tr&aacute;ch nhiệm của từng th&agrave;nh vi&ecirc;n)</p>
                        <p>- Trust (Niềm tin cậy lẫn nhau trong c&ocirc;ng ty)</p>
                        <p>- Open Communication (Giao tiếp mở)</p>
                        <p>- Result Driven (Phong c&aacute;ch l&agrave;m việc hướng kết quả)</p>
                        <p>To&agrave;n bộ c&aacute;n bộ nh&acirc;n vi&ecirc;n ch&uacute;ng t&ocirc;i mong muốn Ominext sẽ:</p>
                        <p>- Trở th&agrave;nh c&ocirc;ng ty gia c&ocirc;ng phần mềm h&agrave;ng đầu tại Việt Nam</p>
                        <p>- Trở th&agrave;nh đơn vị h&agrave;ng đầu trong việc sản xuất c&aacute;c phần mềm, giải ph&aacute;p CNTT v&agrave; cung cấp nội dung số cho thị trường Nhật Bản v&agrave; quốc tế</p>
                        <p>Mission của tất cả ch&uacute;ng t&ocirc;i l&agrave;: "Make Ominext become a great place to work, the most reliable destination for customer to choose and the source of Innovation"</p>
                        <p>H&atilde;y đến với ch&uacute;ng t&ocirc;i để c&ugrave;ng nhau x&acirc;y dựng một tập thể đo&agrave;n kết, chuy&ecirc;n nghiệp, biết chinh phục thử th&aacute;ch v&agrave; thắng lợi.</p>',
            ]);
            DB::table('f_general')->insert([
            'key'=>'email',
            'value'=>'phamthituoi1112@gmail.com',
            ]);
    }
}
class f_slide extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('f_slide')->insert([
            'name'=>'Slider 1',
            'image'=>'public/upload/img/home-slider-1.jpg',
            'text'=>'we create the next values',
            'order'=>'1',
            ]);
        DB::table('f_slide')->insert([
            'name'=>'Slider 2',
            'image'=>'public/upload/img/slide2.jpg',
            'text'=>'we create the next values',
            'order'=>'2',
            ]);
    }
}

class group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('group')->insert([
            'name'=>'Super Admin',
            'parent' => 'NULL'
            ]);
        DB::table('group')->insert([
            'name'=>'Admin',
            'parent' => '1'
            ]);
        DB::table('group')->insert([
            'name'=>'Visitor',
            'parent' => '2'
            ]);
        DB::table('group')->insert([
            'name'=>'Applicant',
            'parent' => '3'
            ]);
    }
}