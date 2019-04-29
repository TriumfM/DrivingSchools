<?php

use Illuminate\Database\Seeder;
use App\Entities\TrainingQuestion;
use App\Entities\TrainingAnswer;
use App\Entities\TrainingTest;

class TrainingSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testi1 = new TrainingTest();
        $testi1->name = "Test 1";
        $testi1->save();



        $question1 = array(
            array('name'=>'Çka duhet të keni parasysh në këtë situatë?', 'points' => '4', 'photo' => 'foto1.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çfarë domethënie kanë dritat në semafor?', 'points' => '4',  'photo' => 'Foto2.png', 'test_id' =>  $testi1->id),
            array('name'=>'Si duhet të veproni në këtë situatë?', 'points' => '4',  'photo' => 'Foto3.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çka duhet të keni parasysh në këtë situatë?', 'points' => '4',  'photo' => 'Foto4.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilat mjete përfshihen në kategorinë B?', 'points' => '3',  'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilat mjete mund t’i drejtojë shoferi i cili posedon patentë shoferin e kategorisë ”B”?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png',  'test_id' =>  $testi1->id),
            array('name'=>'Cilat kushte duhet plotësuar shoferi i cili drejton mjetin në rrugë?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilat kushte duhet plotësuar shoferi i cili drejton mjetin në rrugë?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çka duhet të keni parasysh që të zhvillohet rrjedha normale e trafikut?', 'points' => '3',  'photo' => 'AutoshkllaBlendiLOGO.png','test_id' =>  $testi1->id),
            array('name'=>'Çka mundësojnë njohuritë dhe përvoja në trafik?', 'points' => '3',  'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Ndaj cilëve pjesëmarrës në trafik nuk vlenë parimi i besueshmërisë?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çka konsiderohet sjellje e gabuar në trafikun rrugor?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Si quhet, kalimi me mjet pranë një mjeti tjetër të ndalur a të parkuar, ose pranë një objekti që gjendet në shiritin e trafikut nëpër të cilin lëviz mjeti rrugor?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çka paralajmëron kjo shenjë e trafikut?', 'points' => '3', 'photo' => 'foto14.png', 'test_id' =>  $testi1->id),
            array('name'=>'Çka paralajmëron kjo shenjë e trafikut?', 'points' => '3',  'photo' => 'foto15.png','test_id' =>  $testi1->id),
            array('name'=>'Çka tregon kjo shenjë e trafikut?', 'points' => '3',  'photo' => 'foto16.png','test_id' =>  $testi1->id),
            array('name'=>'Çka tregon kjo shenjë e trafikut?', 'points' => '4',  'photo' => 'foto17.png','test_id' =>  $testi1->id),
            array('name'=>'Cila shenjë tregon afërsinë e vendkalimit për këmbësorë?', 'points' => '4',  'photo' => 'foto18origjinali.png','test_id' =>  $testi1->id),
            array('name'=>'Si duhet të jetë radhitja e kalimit në kryqëzim?', 'points' => '4',  'photo' => 'foto19.png','test_id' =>  $testi1->id),
            array('name'=>'Si duhet të jetë rradhitja e kalimit nëpër kryqëzim?', 'points' => '4',  'photo' => 'foto20.png','test_id' =>  $testi1->id),
            array('name'=>'Si do të veproni kur i afroheni kryqëzimit dhe në semafor ndriçon drita e kuqe?', 'points' => '4', 'photo' => 'foto21.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilët faktorë ndikojnë negativisht në gjendjen psiko fizike të shoferit?', 'points' => '4',  'photo' => 'AutoshkllaBlendiLOGO.png','test_id' =>  $testi1->id),
            array('name'=>'Si ndikon alkooli te aftësia e shoferit gjatë ngasjes?', 'points' => '4', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilët faktorë ndikojnë negativisht në gjendjen psiko-fizike të shoferit?',  'points' => '4', 'photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Cilët faktorë shkaktojnë lodhjen e shoferit?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png','test_id' =>  $testi1->id),
            array('name'=>'Sa mjete bashkangjitëse mund të tërhiqen në rrugë nacionale?', 'points' => '3','photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'A lejohet tërheqja e mjetit bashkangjitës?', 'points' => '3', 'photo' => 'AutoshkllaBlendiLOGO.png','test_id' =>  $testi1->id),
            array('name'=>'Sa mjete bashkangjitëse mund të tërhiqen në autoudhë?', 'points' => '3','photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id),
            array('name'=>'Si duhet të vendoset ngarkesa në mjet?', 'points' => '2', 'photo' => 'AutoshkllaBlendiLOGO.png','test_id' =>  $testi1->id),
            array('name'=>'Çfarë rreziku paraqet pirja e duhanit gjatë ngasjes?', 'points' => '2','photo' => 'AutoshkllaBlendiLOGO.png', 'test_id' =>  $testi1->id)
        );

        \DB::table('tng_question')->insert($question1);

        $answer1 = array(
            array('name' => 'Anashkalimin e obliguar nga ana e majtë.', 'solution' => 'Po', 'question_id' => 1),
            array('name' => 'Në përshtatje të shpejtësisë.', 'solution' => 'Po', 'question_id' => 1),
            array('name' => 'Vendkalimin e shënuar për këmbësorë.', 'solution' => 'Po', 'question_id' => 1),
            array('name' => 'Kalimi i lirë, por me kujdes të shtuar.', 'solution' => 'Jo', 'question_id' => 2),
            array('name' => 'Përgatitje për nisje.', 'solution' => 'Po', 'question_id' => 2),
            array('name' => 'Së shpejti do të ndizet drita e gjelbër.', 'solution' => 'Po', 'question_id' => 2),
            array('name' => 'Duhet të ndalem për t’i dhënë përparësi kalimi këmbësorit.', 'solution' => 'Jo', 'question_id' => 3),
            array('name' => 'Do të vazhdoj lëvizjen djathtas pa u ndalur, por me kujdes të shtuar.', 'solution' => 'Po', 'question_id' => 3),
            array('name' => 'Do të sinjalizoj me tregues të drejtimit kthimin djathtas.', 'solution' => 'Po', 'question_id' => 3),
            array('name' => 'Në vendkalim të këmbësorve.', 'solution' => 'Po', 'question_id' => 4),
            array('name' => 'Këmbësorët mund të hyjnë në vendkalim që të kalojn rrugën.', 'solution' => 'Po', 'question_id' => 4),
            array('name' => 'Sipas nevojës, do ta zvogëloj shpejtësinë dhe do të jam i gatshëm për frenim.', 'solution' => 'Po', 'question_id' => 4),
            array('name' => 'Mjetet e udhëtarëve të cilat kanë më së shumti 8 ulëse pa përfshirë ulësen e shoferit.', 'solution' => 'Po', 'question_id' => 5),
            array('name' => 'Motokulvitatorët.', 'solution' => 'Po', 'question_id' => 5),
            array('name' => 'Vetëm mjetet e udhëtarëve (veturat) që kanë më së shumti 5 ulëse, duke përfshirë edhe ulësen e shoferit.', 'solution' => 'Jo', 'question_id' => 5),
            array('name' => 'Mjetin e udhëtarëve (veturën) deri 8 ulëse pa përfshirë ulësen e shoferit.', 'solution' => 'Po', 'question_id' => 6),
            array('name' => 'Mjetin e transportit deri 7.5 tonë.', 'solution' => 'Jo', 'question_id' => 6),
            array('name' => 'Traktorin.', 'solution' => 'Po', 'question_id' => 6),
            array('name' => 'T’i bartë pajisjet ndihmëse të cilat janë të shënuar në patentë shofer (syza, protezë, etj).', 'solution' => 'Po', 'question_id' => 7),
            array('name' => 'Të mos jetë nën ndikim të narkotikëve.', 'solution' => 'Po', 'question_id' => 7),
            array('name' => 'Automjeti duhet të jetë me ndërrues automatik.', 'solution' => 'Jo', 'question_id' => 7),
            array('name' => 'Të mos jetë i lodhur dhe i sëmurë.', 'solution' => 'Po', 'question_id' => 8),
            array('name' => 'Të ketë patentë shoferin për të gjitha kategoritë.', 'solution' => 'Jo', 'question_id' => 8),
            array('name' => 'Të mos jetë nën ndikimin e alkoolit.', 'solution' => 'Po', 'question_id' => 8),
            array('name' => 'Të kuptoj qëllimet e pjesëmarrësve tjerë në trafik.', 'solution' => 'Po', 'question_id' => 9),
            array('name' => 'Të veproj sipas rregullave dhe shenjave të trafikut.', 'solution' => 'Po', 'question_id' => 9),
            array('name' => 'Të paralajmroj me kohë veprimet në trafik.', 'solution' => 'Po', 'question_id' => 9),
            array('name' => 'Zbatimin e normave pozitive të mirësjelljes.', 'solution' => 'Po', 'question_id' => 10),
            array('name' => 'Respektimin e pjesëmarrësve tjerë në trafik.', 'solution' => 'Po', 'question_id' => 10),
            array('name' => 'Tolerancën ndaj pjesëmarrësve tjerë në trafik.', 'solution' => 'Po', 'question_id' => 10),
            array('name' => 'Fëmijëve.', 'solution' => 'Po', 'question_id' => 11),
            array('name' => 'Personave të moshuar.', 'solution' => 'Po', 'question_id' => 11),
            array('name' => 'Personave me aftësi të kufizuara.', 'solution' => 'Po', 'question_id' => 11),
            array('name' => 'Çdo sjellje e gabuar e cila është në kundërshtim me rregullat e trafikut dhe sigurisë.', 'solution' => 'Po', 'question_id' => 12),
            array('name' => 'Vetëm sjelljet të cilat shkaktojnë aksident trafiku.', 'solution' => 'Jo', 'question_id' => 12),
            array('name' => 'Nëse shoferi aplikon ngasjen defanzive.', 'solution' => 'Jo', 'question_id' => 12),
            array('name' => 'Anashkalim.', 'solution' => 'Po', 'question_id' => 13),
            array('name' => 'Tejkalim.', 'solution' => 'Jo', 'question_id' => 13),
            array('name' => 'Përballëkalim.', 'solution' => 'Jo', 'question_id' => 13),
            array('name' => 'Rrezikun e pergjithëshëm në rrugë.', 'solution' => 'Po', 'question_id' => 14),
            array('name' => 'Komunikacioni zhvillohet në një kah.', 'solution' => 'Jo', 'question_id' => 14),
            array('name' => 'Ndalon komunikacionin në një kah.', 'solution' => 'Jo', 'question_id' => 14),
            array('name' => 'Vendkalimin hekurudhor me një palë binarë.', 'solution' => 'Jo', 'question_id' => 15),
            array('name' => 'Vendkalimin hekurudhor me dy palë binarë.', 'solution' => 'Jo', 'question_id' => 15),
            array('name' => 'Vendkalimin hekurudhor me mbrojtëse ose gjysmëmbrojtëse.', 'solution' => 'Po', 'question_id' => 15),
            array('name' => 'Pjesën e rrugës ku lejohet përdorimi i shenjave akustike.', 'solution' => 'Jo', 'question_id' => 16),
            array('name' => 'Pjesën e rrugës ku ndalohet parkimi i mjeteve.', 'solution' => 'Jo', 'question_id' => 16),
            array('name' => 'Ndalon dhënien e shenjave akustike-zërit.', 'solution' => 'Po', 'question_id' => 16),
            array('name' => 'Vendin ku mbarojnë të gjitha ndalesat në atë rrugë.', 'solution' => 'Po', 'question_id' => 17),
            array('name' => 'Ndalim trafiku në dy kahje.', 'solution' => 'Jo', 'question_id' => 17),
            array('name' => 'Ndalim parkimi.', 'solution' => 'Jo', 'question_id' => 17),
            array('name' => 'A.', 'solution' => 'Po', 'question_id' => 18),
            array('name' => 'B.', 'solution' => 'Jo', 'question_id' => 18),
            array('name' => 'C.', 'solution' => 'Jo', 'question_id' => 18),
            array('name' => 'Biçiklisti, unë, automjeti i kuq.', 'solution' => 'Po', 'question_id' => 19),
            array('name' => 'Biçiklisti, automjeti i kuq , unë.', 'solution' => 'Jo', 'question_id' => 19),
            array('name' => 'Automjet i kuq, unë, biçiklisti.', 'solution' => 'Jo', 'question_id' => 19),
            array('name' => 'Unë, tramvaji, mopedi.', 'solution' => 'Jo', 'question_id' => 20),
            array('name' => 'Mopedi, tramvaji, unë.', 'solution' => 'Po', 'question_id' => 20),
            array('name' => 'Tramvaji, mopedi, unë.', 'solution' => 'Jo', 'question_id' => 20),
            array('name' => 'Do ti respektoj dritat e semaforit.', 'solution' => 'Po', 'question_id' => 21),
            array('name' => 'Do të ndalem.', 'solution' => 'Po', 'question_id' => 21),
            array('name' => 'Do të vazhdoj lëvizjen pa u ndalur fare.', 'solution' => 'Jo', 'question_id' => 21),
            array('name' => 'Sëmundjet akute dhe kronike.', 'solution' => 'Po', 'question_id' => 22),
            array('name' => 'Pushimi i rregullt.', 'solution' => 'Jo', 'question_id' => 22),
            array('name' => 'Të ushqyerit jo në rregull.', 'solution' => 'Po', 'question_id' => 22),
            array('name' => 'Zgjat kohën e reagimit.', 'solution' => 'Po', 'question_id' => 23),
            array('name' => 'Zvogëlon fushën e dukshmërisë.', 'solution' => 'Po', 'question_id' => 23),
            array('name' => 'Rrit aftësinë e ngasjes.', 'solution' => 'Jo', 'question_id' => 23),
            array('name' => 'Alkooli.', 'solution' => 'Po', 'question_id' => 24),
            array('name' => 'Lodhja.', 'solution' => 'Po', 'question_id' => 24),
            array('name' => 'Pushimi i gjatë.', 'solution' => 'Jo', 'question_id' => 24),
            array('name' => 'Pushimet e shpeshta.', 'solution' => 'Jo', 'question_id' => 25),
            array('name' => 'Temperatura e lartë.', 'solution' => 'Po', 'question_id' => 25),
            array('name' => 'Zhurma e madhe në mjet.', 'solution' => 'Po', 'question_id' => 25),
            array('name' => 'Dy për transport të ngarkesës.', 'solution' => 'Po', 'question_id' => 26),
            array('name' => 'Një për transport të personave.', 'solution' => 'Po', 'question_id' => 26),
            array('name' => 'Varësisht nga fuqia e motorit.', 'solution' => 'Jo', 'question_id' => 26),
            array('name' => 'Jo, në asnjë rast.', 'solution' => 'Jo', 'question_id' => 27),
            array('name' => 'Po, nëse nuk zvogëlohet stabiliteti i tij.', 'solution' => 'Po', 'question_id' => 27),
            array('name' => 'Po, nëse pajisjet sinjalizuese të mjetit bashkangjitës janë në rregull.', 'solution' => 'Po', 'question_id' => 27),
            array('name' => 'Dy për transport të ngarkeses.', 'solution' => 'Jo', 'question_id' => 28),
            array('name' => 'Dy për transport të personave.', 'solution' => 'Jo', 'question_id' => 28),
            array('name' => 'Një për transport të ngarkesës.', 'solution' => 'Po', 'question_id' => 28),
            array('name' => 'Të mos ia zvogëlojë shoferit pamjen e rrugës.', 'solution' => 'Po', 'question_id' => 29),
            array('name' => 'Të mos zvogëlojë stabilitetin e mjetit.', 'solution' => 'Po', 'question_id' => 29),
            array('name' => 'Të mos e vështirësojë drejtimin e mjetit.', 'solution' => 'Po', 'question_id' => 29),
            array('name' => 'Krijohet monoksid karboni, dobësohet koncentrimi.', 'solution' => 'Po', 'question_id' => 30),
            array('name' => 'Gjatë ndezjes së cigarës mund të shkaktohen gabime.', 'solution' => 'Po', 'question_id' => 30),
            array('name' => 'Zvogëlon përqëndrimin në ngasje.', 'solution' => 'Po', 'question_id' => 30)

        );

        \DB::table('tng_answer')->insert($answer1);
    }


}