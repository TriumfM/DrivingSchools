<?php

use Illuminate\Database\Seeder;
use App\Entities\Country;
use App\Entities\City;
use App\User;
use App\Entities\Student;
use App\Entities\Instructor;
use App\Entities\Vehicle;
use App\Entities\Calendar;
use App\Entities\DrivingCategory;
use App\Entities\TrainingTest;
use App\Entities\TrainingQuestion;
use App\Entities\TrainingAnswer;
use App\Entities\Video;
use App\Entities\VideoNote;
use App\Entities\UserToken;

class ProductionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $literature = new \App\Entities\Literature();

        $literature->title = 'Literature Title 1';
        $literature->description = 'Literature Description 1';
        $literature->photo_url = null;
        $literature->type = 'Type1';
        $literature->save();

        /*
        * User
        */

        $user_1 = new User();
        $user_1->full_name = "Admin Sylejmani";
        $user_1->number = "045900638";
        $user_1->email = "admin@admin.com";
        $user_1->password = bcrypt('admin');
        $user_1->role = "admin";
        $user_1->expire = null;

        $user_1->save();

        $user_2 = new User();
        $user_2->full_name = "Student Llapashtica";
        $user_2->number = "049191801";
        $user_2->email = "student@student.com";
        $user_2->password = bcrypt('student');
        $user_2->role = "student";
        $user_2->expire = "2020-07-01";

        $user_2->save();


        // Video
        $videos = array(
            array('title'=>'Rasti 1', 'description' => 'Rasti 1', 'path' => 'sqd0OOKP_fg'),
            array('title'=>'Rasti 2', 'description' => 'Rasti 2', 'path' => 'zkl_3Okhpd0'),
            array('title'=>'Rasti 3', 'description' => 'Rasti 3', 'path' => 'yeUfM60OUHw'),
            array('title'=>'Rasti 4', 'description' => 'Rasti 4', 'path' => 'bU01w6FZbkc'),
            array('title'=>'Rasti 5', 'description' => 'Rasti 5', 'path' => 'YmTOOeBW0RU'),
            array('title'=>'Rasti 6', 'description' => 'Rasti 6', 'path' => 'XcPI3AkWFJU'),
            array('title'=>'Rasti 7', 'description' => 'Rasti 7', 'path' => 'lxf1p-qqy_g'),
            array('title'=>'Rasti 8', 'description' => 'Rasti 8', 'path' => 'yfI3-ZgHhE0'),
            array('title'=>'Ushtrimet e poligonit', 'description' => 'Ushtrimet e poligonit', 'path' => 'wtbGwAkx7uY'),
        );

        \DB::table('vid_video')->insert($videos);
    }
}