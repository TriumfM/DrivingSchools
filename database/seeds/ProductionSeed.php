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
        /*
         * User
         */

        $user_1 = new User();
        $user_1->full_name = "Admin Sylejmani";
        $user_1->number = "045900638";
        $user_1->password = bcrypt('123123');
        $user_1->role = "admin";

        $user_1->save();

        $user_2 = new User();
        $user_2->full_name = "Student Llapashtica";
        $user_2->number = "049191801";
        $user_2->password = bcrypt('123123');
        $user_2->role = "student";

        $user_2->save();

        $expire = new UserToken();
        $expire->user_id = $user_2->id;
        $expire->expire = "2020-07-01";

        $expire->save();

        /*
         * Country
         */

        $country = new Country();
        $country->name = "Kosova";

        $country->save();

        /*
         * City
         */

        $city  = new City();
        $city->name = "Prishtina";
        $city->country_id = $country->id;

        $city->save();

        /*
        * Students
        */

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Blin";
        $student->parent_name = "Blin";
        $student->last_name = "Zeka";
        $student->email = "blin@gmail.com";
        $student->id_number = "1283476";
        $student->birthday = "1990-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "male";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345do";
        $student->first_name = "Dorina";
        $student->parent_name = "Afrim";
        $student->last_name = "Osmani";
        $student->email = "dorina@gmail.com";
        $student->id_number = "1283474";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Shirley";
        $student->parent_name = "J";
        $student->last_name = "Furlow";
        $student->email = "shirley@gmail.com";
        $student->id_number = "1283475";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Barbara";
        $student->parent_name = "P";
        $student->last_name = "Cooper";
        $student->email = "barbara@gmail.com";
        $student->id_number = "1283479";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Judy";
        $student->parent_name = "R";
        $student->last_name = "Burnette";
        $student->email = "judy@gmail.com";
        $student->id_number = "1283488";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Rodney";
        $student->parent_name = "D";
        $student->last_name = "Pouliot";
        $student->email = "rodney@gmail.com";
        $student->id_number = "1283987";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "male";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Paul";
        $student->parent_name = "P";
        $student->last_name = "Morales";
        $student->email = "paul@gmail.com";
        $student->id_number = "1283654";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "male";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "William";
        $student->parent_name = "B";
        $student->last_name = "Montgomery";
        $student->email = "william@gmail.com";
        $student->id_number = "1283321";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "male";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Allison";
        $student->parent_name = "A";
        $student->last_name = "Reece";
        $student->email = "allison@gmail.com";
        $student->id_number = "1281234";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Mary";
        $student->parent_name = "L";
        $student->last_name = "Ruiz";
        $student->email = "mary@gmail.com";
        $student->id_number = "1283456";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Caroline";
        $student->parent_name = "M";
        $student->last_name = "Lyle";
        $student->email = "caroline@gmail.com";
        $student->id_number = "1287895";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "female";
        $student->city_id = $city->id;

        $student->save();

        $student = new Student();
        $student->registration_date = "2017-07-03";
        $student->registration_number = "12345b";
        $student->first_name = "Marcel";
        $student->parent_name = "M";
        $student->last_name = "Price";
        $student->email = "marcel@gmail.com";
        $student->id_number = "1286321";
        $student->birthday = "1997-04-26";
        $student->profession = "Software Developer";
        $student->phone = "044876958";
        $student->address = "Haki Taha";
        $student->gender = "male";
        $student->city_id = $city->id;

        $student->save();

        /*
         * Instructors
         */

        $instructor = new Instructor();
        $instructor->first_name = "Eriona";
        $instructor->last_name = "Osmani";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "eriona@gmail.com";
        $instructor->id_number = "987655";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "female";
        $instructor->city_id = $city->id;

        $instructor->save();

        $instructor = new Instructor();
        $instructor->first_name = "Albi";
        $instructor->last_name = "Zeka";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "albi@gmail.com";
        $instructor->id_number = "98798655";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "male";
        $instructor->city_id = $city->id;

        $instructor->save();

        $instructor = new Instructor();
        $instructor->first_name = "Gordon";
        $instructor->last_name = "Pryor";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "gordon@gmail.com";
        $instructor->id_number = "98797895";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "male";
        $instructor->city_id = $city->id;

        $instructor->save();

        $instructor = new Instructor();
        $instructor->first_name = "Eddie";
        $instructor->last_name = "Whigham";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "eddie@gmail.com";
        $instructor->id_number = "98794562";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "male";
        $instructor->city_id = $city->id;

        $instructor->save();

        $instructor = new Instructor();
        $instructor->first_name = "Joyce";
        $instructor->last_name = "James";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "joyce@gmail.com";
        $instructor->id_number = "98796985";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "female";
        $instructor->city_id = $city->id;

        $instructor->save();

        $instructor = new Instructor();
        $instructor->first_name = "Lisa";
        $instructor->last_name = "McShane";
        $instructor->birthday = "1994-11-23";
        $instructor->email = "lisa@gmail.com";
        $instructor->id_number = "98799654";
        $instructor->address = "Bregu i Diellit";
        $instructor->mobile = "049123123";
        $instructor->phone = "1234456";
        $instructor->gender = "female";
        $instructor->city_id = $city->id;

        $instructor->save();

        /*
         * Vehicles
         */

        $vehicle = new Vehicle();
        $vehicle->name = "Audi";
        $vehicle->registration = "01-KS-697";

        $vehicle->save();

        /*
         * CalendarEvents
         */

        $event = new Calendar();

        $event->title = "Driving Hours";
        $event->start = "2017-07-03 12:45";
        $event->end = "2017-07-03 13:45";
        $event->instructor_id = $instructor->id;
        $event->student_id = $student->id;

        $event->save();

        $event = new Calendar();

        $event->title = "Training Hours";
        $event->start = "2017-07-03 12:00";
        $event->end = "2017-07-03 12:45";
        $event->instructor_id = $instructor->id;
        $event->student_id = $student->id;

        $event->save();

        /*
         * DrivingCategory
         */

        $category = new DrivingCategory();
        $category->name = "A";
        $category->save();

        // Video

        $video = new Video();

        $video->title = "O sa mire";
        $video->description  = "Seriali me i shikuar";
        $video->path = "sedi";

        $video->save();

        // VideoNote

        $note = new VideoNote();

        $note->hour = "12:00";
        $note->language = "Shqip";
        $note->note = "Pune praktike";

        $note->save();

    }
}