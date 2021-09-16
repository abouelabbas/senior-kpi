<?php

namespace App\Http\Controllers;

use App\Admins;
use App\Attendance;
use App\Branches;
use App\CenterEvaluations;
use App\Contents;
use App\Courses;
use App\ExamGrades;
use App\Exams;
use App\Grades;
use App\Labs;
use App\Notifications;
use App\RoundContents;
use App\RoundDays;
use App\RoundEvaluations;
use App\Rounds;
use App\RoundSubContents;
use App\SeniorstepsEvaluations;
use App\Sessions;
use App\StudentEvaluations;
use App\StudentRounds;
use App\Students;
use App\Tasks;
use App\TrainerAgenda;
use App\TrainerCourses;
use App\TrainerEvaluations;
use App\TrainerRounds;
use App\Trainers;
use App\TrainerSubAgenda;
use Carbon\Carbon;
use DateTime;
use File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PHPUnit\Framework\Constraint\Count;
use ZipArchive;

class AdminController extends Controller
{


    public function __construct()
    {

        $this->middleware('login');
        $this->middleware('AvoidStudentsAndTrainers');
        
    }

    //Controller methods
    //Admin main page

    public static function ActiveRounds()
    {
        // return DB::table('rounds')
        // ->join('courses','rounds.CourseId','=','courses.CourseId')
        // ->where('Done','=','1')->get();
        return DB::table('rounds')
        ->join('courses','rounds.CourseId','=','courses.CourseId')->get();
    }
    
    public static function Notifications()
    {
        return Notifications::where([
            // ['IsRead','=',0],
            ['ForType','=','Admin']
        ])
        ->OrderBy('NotificationDate','Desc')
        ->get();
        // ->take(6)
    }
    public static function CountNotifications()
    {
        return Notifications::where([
            ['IsRead','=',0],
            ['ForType','=','Admin']
        ])
        ->OrderBy('NotificationDate','Desc')
        ->count();
        // ->take(6)
    }

    public function NotificationSeen(Request $request)
    {
        if(request()->ajax()){
            // return 'yes';
            $Notifications = Notifications::where('ForType','=','Admin')->get();
            foreach ($Notifications as $key => $Notification) {
                $Notification->IsRead = 1;
                $Notification->save();
            }
        }
    }

    public function index()
    {
        $Rounds = Rounds::all()->count();
        $RunningRounds = Rounds::where('Done','=',1)->count();
        $Courses = Courses::all()->count();
        $Students = Students::all()->count();
        $Trainers = Trainers::all()->count();
        $Branches = Branches::all()->count();
        $Labs = Labs::all()->count();
        $RecentStudents = DB::table('students')->orderBy('StudentId','Desc')->take(5)->get();

        return View('Admin.index',[
            'Recent'=>$RecentStudents,
            'Labs'=>$Labs,'Branches'=>$Branches,
            'Trainers'=>$Trainers,'Rounds'=>$Rounds,'Courses'=>$Courses,'Students'=>$Students,'Running'=>$RunningRounds,
            'ActiveRounds'=>AdminController::ActiveRounds(),'Notifications'=>AdminController::Notifications(),'CountNotifications'=>AdminController::CountNotifications()]);
    }

    //Admin courses handling
    public function Courses()
    {
        $Courses = Courses::all();
        return View('Admin.course',['Courses'=>$Courses,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Notifications'=>AdminController::Notifications()]);
    }
    public function AddCourse(Request $request)
    {
        Courses::create($request->toArray());
        return Redirect::to('/Admin/Courses')->with('status', 'Course has been created successfully!');
    }
    public function EditCourse(int $id)
    {
        $Course = Courses::find($id);
        $Rounds = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->join('labs','labs.LabId','=','rounds.LabId')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->where('rounds.CourseId','=',$id)->get();
        $Trainers = DB::table('trainercourses')
        ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
        ->where('CourseId','=',$id)
        ->get();
        $TrainerRounds = DB::table('trainers')
        ->join('trainerrounds','trainerrounds.TrainerId','=','trainers.TrainerId')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->get();
        $TrainersList = Trainers::all();
        return View('Admin.course-edit',['Course'=>$Course,'Notifications'=>AdminController::Notifications(),'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Rounds'=>$Rounds,'Trainers'=>$Trainers,'TrainersList'=>$TrainersList,'TrainerRounds'=>$TrainerRounds]);
        //return $TrainerRounds;
    }
    public function AddCourseTrainers(Request $request)
    {
        $TrainerId = $request->TrainerId;
        $CourseId = $request->CourseId;
        $TrainerCourse = new TrainerCourses();
        $TrainerCourse->TrainerId = $TrainerId;
        $TrainerCourse->CourseId = $CourseId;
        $TrainerCourse->save();

        //Fetch Trainer and Course for flash message
        $Trainer = Trainers::find($TrainerId);
        $Course = Courses::find($CourseId);

        return Redirect::to("/Admin/Courses/Edit/$CourseId")->with('add', "$Trainer->FullnameEn has been added successfully to $Course->CourseNameEn course!");
    }
    public function CoursePostEdit(Request $request)
    {
        $id = $request->Id;
        $Course = Courses::find($id);
        $Course->update($request->toArray());

        return Redirect::to('/Admin/Courses')->with('statusupdate', 'Course has been updated successfully!');
    }
    public function CourseDetails(int $id)
    {
        $Course = Courses::find($id);
        $Rounds = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->join('trainerrounds','trainerrounds.RoundId','=','rounds.RoundId')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')
        ->join('labs','labs.LabId','=','rounds.LabId')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->where('rounds.CourseId','=',$id)->get();
        $Trainers = DB::table('trainercourses')
        ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
        ->where('CourseId','=',$id)
        ->get();
        return View('Admin.course-details',['Notifications'=>AdminController::Notifications(),'Course'=>$Course,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Rounds'=>$Rounds,'Trainers'=>$Trainers]);
    }
    public function DeleteCourse(Request $request)
    {
        $id = $request->id;
        $Course = Courses::find($id);
        try{
            $Course->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Courses")->with('danger',"$Course->CourseNameEn can't be deleted (It may be connected to another courses,rounds,...etc)");

        }
        

        return Redirect::to('/Admin/Courses')->with('statusDel',"Course $Course->CourseNameEn has been deleted!");
    }
    public function CourseTopics(int $cid, int $id)
    {
        // $Course = Courses::find($cid);
        $TrainerCourse = TrainerCourses::where([['TrainerId','=',$id],['CourseId','=',$cid]])->first();
        $Trainer = Trainers::find($id);
        $Course = Courses::find($cid);
        $Agenda = DB::table('traineragenda')
        ->join('contents','contents.ContentId','=','traineragenda.ContentId')
        ->where('TrainerCoursesId','=',$TrainerCourse->TrainerCoursesId)
        ->get();
        $SubAgenda = DB::table('trainersubagenda')
        ->join('traineragenda','traineragenda.TrainerAgendaId','=','trainersubagenda.TrainerAgendaId')
        ->where('TrainerCoursesId','=',$TrainerCourse->TrainerCoursesId)
        ->get();

        return View('Admin.edit-trainer-topics',['Notifications'=>AdminController::Notifications(),'Trainer'=>$Trainer,'Course'=>$Course,'Agenda'=>$Agenda,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'SubAgenda'=>$SubAgenda,'TrainerCoursesId'=>$Trainer->TrainerCoursesId,'TrainerId'=>$Trainer->TrainerId,'CourseId'=>$Course->CourseId]);
    }
    public function AddTrack(Request $request)
    {
            //Add Content
        $Content = new Contents();
        $Content->ContentNameEn = $request->content;
        $Content->ContentNameAr = $request->content;
        $Content->save();

        //
        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$request->id],['CourseId','=',$request->cid]])->first();

        //Add TrainerAgenda by fetching Content Id from ($Content)
        $ContentId = $Content->ContentId;
        $TrainerAgenda = new TrainerAgenda();
        $TrainerAgenda->TrainerCoursesId = $TrainerCourses->TrainerCoursesId;
        $TrainerAgenda->ContentId = $ContentId;
        $TrainerAgenda->save();

        //fetch course from trainer courses
        $Trainer = DB::table('trainercourses')
        ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
        ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();
        
        return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('content',"Content ($request->content) has been Added to $Trainer->FullnameEn!");
        
    }
    public function AddTopic(Request $request)
    {
        $SubAgendaName = $request->subcontent;
        $TrainerAgendaId = $request->TrainerAgendaId;

        $TrainerSubAgenda = new TrainerSubAgenda();
        $TrainerSubAgenda->TrainerAgendaId = $TrainerAgendaId;
        $TrainerSubAgenda->SubAgendaNameEn = $SubAgendaName;
        $TrainerSubAgenda->SubAgendaNameAr = $SubAgendaName;
        $TrainerSubAgenda->save();

        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$request->id],['CourseId','=',$request->cid]])->first();
//fetch course from trainer courses
        $Trainer = DB::table('trainercourses')
        ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
        ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();

        return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('content',"Topic ($request->subcontent) has been Added to $Trainer->FullnameEn!");

    }
    public function FetchSubAgenda(Request $request)
    {
        if(request()->ajax()){
            $TrainerSubAgenda = TrainerSubAgenda::where('TrainerAgendaId','=',$request->agenda)->get();
            return json_encode($TrainerSubAgenda);
        }
    }
    public function AddExample(Request $request)
    {
        $TrainerAgendaId = $request->TrainerAgendaId;
        $TrainerSubAgendaId = $request->TrainerSubAgendaId;
        $Example = $request->Example;

        $TrainerSubAgenda = TrainerSubAgenda::find($TrainerSubAgendaId);
        $TrainerSubAgenda->Example = $Example;
        $TrainerSubAgenda->save();

        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$request->id],['CourseId','=',$request->cid]])->first();
        //fetch course from trainer courses
                $Trainer = DB::table('trainercourses')
                ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
                ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();


        return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('content',"Example ($request->Example) has been Added to $Trainer->FullnameEn!");
    }
    public function AddTask(Request $request)
    {
        $TrainerAgendaId = $request->TrainerAgendaId;
        $TrainerSubAgendaId = $request->TrainerSubAgendaId;
        $Task = $request->Task;

        $TrainerSubAgenda = TrainerSubAgenda::find($TrainerSubAgendaId);
        $TrainerSubAgenda->Task = $Task;
        $TrainerSubAgenda->save();

        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$request->id],['CourseId','=',$request->cid]])->first();
        //fetch course from trainer courses
                $Trainer = DB::table('trainercourses')
                ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
                ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();


        return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('content',"Task ($request->Task) has been Added to $Trainer->FullnameEn!");
    }
    public function EditTopic(Request $request)
    {
        $TrainerSubAgendaId = $request->TrainerSubAgendaId;
        $Topic = $request->Topic;
        $Example = $request->Example;
        $Task = $request->Task;

        $TrainerSubAgenda = TrainerSubAgenda::find($TrainerSubAgendaId);
        $TrainerSubAgenda->SubAgendaNameEn = $Topic;
        $TrainerSubAgenda->SubAgendaNameAr = $Topic;
        $TrainerSubAgenda->Example = $Example;
        $TrainerSubAgenda->Task = $Task;
        $TrainerSubAgenda->save();

        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$request->id],['CourseId','=',$request->cid]])->first();
//fetch course from trainer courses
        $Trainer = DB::table('trainercourses')
        ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
        ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();


 return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('content',"Topic ($Topic) has been Edited for trainer :- $Trainer->FullnameEn!");
    }
    public function deleteSubAgenda(int $sid, int $cid ,int $id)
    {
        $TrainerSubAgenda = TrainerSubAgenda::find($sid);

        $TrainerAgenda = DB::table('traineragenda')
        ->join('contents','contents.ContentId','=','traineragenda.ContentId')
        ->where('TrainerAgendaId','=',$TrainerSubAgenda->TrainerAgendaId)->first();
        $TrainerCourses = TrainerCourses::where([['TrainerId','=',$id],['CourseId','=',$cid]])->first();
        //fetch course from trainer courses
                $Trainer = DB::table('trainercourses')
                ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
                ->where('TrainerCoursesId','=',$TrainerCourses->TrainerCoursesId)->first();
        try{
            $TrainerSubAgenda->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('danger',"$TrainerSubAgenda->SubAgendaNameEn can't be deleted (It may be connected to another courses,rounds,...etc)");

        }
        
         return Redirect::to("/Admin/Courses/$TrainerCourses->CourseId/Topics/$TrainerCourses->TrainerId")->with('delete',"($TrainerSubAgenda->SubAgendaNameEn) has been deleted from '$TrainerAgenda->ContentNameEn' out of trainer :- $Trainer->FullnameEn!");
    }


    //Trainers handling
    public function TrainerProfile(int $id)
    {
        $Trainer = Trainers::find($id);
        $Rounds = DB::table('trainerrounds')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('TrainerId','=',$id)->get();
        return View('Admin.instructor-profile',['Notifications'=>AdminController::Notifications(),'Trainer'=>$Trainer,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Rounds'=>$Rounds]);
    }
    public function EditTrainerProfile(int $id)
    {
        $Trainer = Trainers::find($id);
        $Courses = DB::table('trainercourses')
        ->join('courses','courses.CourseId','=','trainercourses.CourseId')
        ->where('TrainerId','=',$id)->get();
        $Rounds = DB::table('trainerrounds')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->join('labs','labs.LabId','=','rounds.LabId')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('TrainerId','=',$id)->get();
        $CoursesList = Courses::all();
        // $TrainerRounds = DB::table('TrainerRounds')
        // ->join('Trainers','Trainers.TrainerId','=','TrainerRounds.TrainerId')
        // ->get();
        return View('Admin.trainer-edit',['Notifications'=>AdminController::Notifications(),'Trainer'=>$Trainer,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Courses'=>$Courses,'Rounds'=>$Rounds,'CoursesList'=>$CoursesList]);
    }
    public function SubmitTrainerProfileEdit(Request $request)
    {
        $id = $request->id;
        $Trainer = Trainers::find($id);
        // $Trainer->update($request->toArray());
        $Trainer->FullnameEn = $request->FullnameEn;
        $Trainer->FullnameAr = $request->FullnameAr;
        $Trainer->Phone = $request->Phone;
        $Trainer->SecondPhone = $request->SecondPhone;
        $Trainer->Address = $request->Address;
        $Trainer->Email = $request->Email;

        if($request->hasFile('resumeLink')){
            if($request->resumeLink){
                $filename = $request->resumeLink->store('/Trainers/Resumes',['disk' => 'public']);
            $Trainer->resumeLink = '/storage/' . $filename;
            }
        }
        if($request->hasFile('ImagePath')){
            
            if($request->ImagePath){
                // $Imagename = $request->file('ImagePath')->move('public/Trainers/Images', uniqid() . $request->file('ImagePath')->getClientOriginalName());
                
                $Imagename = $request->ImagePath->store('/Trainers/Images',['disk' => 'public']);
            $Trainer->ImagePath = $Imagename;
            
            }
        }
        $Trainer->Facebook = $request->Facebook;
        $Trainer->Youtube = $request->Youtube;
        $Trainer->Linkedin = $request->Linkedin;
        $Trainer->AdditionalNotes = $request->AdditionalNotes;
        $Trainer->save();
        // return $Trainer->ImagePath;
        return redirect()->back()->with('edited',"$request->FullnameEn's profile has been edited!");

    }
    public function Trainers()
    {
        $Trainers = Trainers::all();
        return View('Admin.trainer',['Notifications'=>AdminController::Notifications(),'Trainers'=>$Trainers,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function AddTrainer(Request $request)
    {
        $Trainer = new Trainers();
        // $Trainer->update($request->toArray());
        $Trainer->FullnameEn = $request->FullnameEn;
        $Trainer->FullnameAr = $request->FullnameAr;
        $Trainer->Phone = $request->Phone;
        $Trainer->SecondPhone = $request->SecondPhone;
        $Trainer->Job = $request->Job;
        $Trainer->Birthdate = $request->Birthdate;
        $Trainer->Password = uniqid();
        $Trainer->Company = $request->Company;
        $Trainer->Address = $request->Address;
        $Trainer->Email = $request->Email;

        if($request->hasFile('resumeLink')){
            $filename = $request->resumeLink->store('/Trainers/Resumes',['disk' => 'public']);
            $Trainer->resumeLink = '/storage/' . $filename;
        }
        // if($request->hasFile('ImagePath')){
        //     $Imagename = $request->ImagePath->store('/Trainers/Images',['disk' => 'public']);
        //     $Trainer->ImagePath = '/storage/' . $Imagename;
        // }
        if($request->hasFile('ImagePath')){
            
            if($request->ImagePath){
                // $Imagename = $request->file('ImagePath')->move('public/Trainers/Images', uniqid() . $request->file('ImagePath')->getClientOriginalName());
                
                $Imagename = $request->ImagePath->store('/Trainers/Images',['disk' => 'public']);
            $Trainer->ImagePath = $Imagename;
            
            }
        }
        $Trainer->Facebook = $request->Facebook;
        $Trainer->Youtube = $request->Youtube;
        $Trainer->Linkedin = $request->Linkedin;
        $Trainer->AdditionalNotes = $request->AdditionalNotes;
        $Trainer->save();

        return redirect()->back()->with('added',"$request->FullnameEn's profile has been added successfully! First Password('$Trainer->Password')");
    }
    public function DeleteTrainer(Request $request)
    {
        $id = $request->TrainerId;
        $Trainer = Trainers::find($id);
        
        try{
            $Trainer->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Trainers")->with('danger',"$Trainer->FullnameEn can't be deleted (It may be connected to another courses,rounds,...etc)");

        }



        return Redirect::to("/Admin/Trainers")->with('deleted',"$Trainer->FullnameEn's profile has been deleted!");

    }
    public function TrainerDetails(int $id)
    {
        $Trainer = Trainers::find($id);
        $Courses = DB::table('trainercourses')
        ->join('courses','courses.CourseId','=','trainercourses.CourseId')
        ->where('TrainerId','=',$id)->get();
        $Rounds = DB::table('trainerrounds')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->join('labs','labs.LabId','=','rounds.LabId')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('TrainerId','=',$id)->get();
        $CoursesList = Courses::all();
        return View('Admin.trainer-details',['Notifications'=>AdminController::Notifications(),'Trainer'=>$Trainer,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Courses'=>$Courses,'Rounds'=>$Rounds,'CoursesList'=>$CoursesList]);
    }
    public function AddTrainerToCourse(Request $request)
    {
        $TrainerCourses = TrainerCourses::where([
            ['TrainerId','=',$request->TrainerId],
            ['CourseId','=',$request->CourseId]
        ])->count();
        if($TrainerCourses > 0){
        return Redirect::to("/Admin/Trainers/EditProfile/$request->TrainerId")->with('failed',"You've already added this trainer to that course");
        }else{
            TrainerCourses::create($request->toArray());
            $Course = Courses::find($request->CourseId);
            $Trainer = Trainers::find($request->TrainerId);
        return Redirect::to("/Admin/Trainers/EditProfile/$request->TrainerId")->with('success',"You have added $Course->CourseNameEn to trainer : $Trainer->FullnameEn");

        }
        
    }
    public function AddExam(Request $request)
    {
        $TrainerCourse = TrainerCourses::where([
            ['TrainerId','=',$request->TrainerId],
            ['CourseId','=',$request->CourseId]
        ])->first();

        $Exam = new Exams();
        $Exam->TrainerCoursesId = $TrainerCourse->TrainerCoursesId;
        $Exam->ExamNameEn = $request->ExamNameEn;
        $Exam->ExamNameAr = $request->ExamNameAr;
        $Exam->save();


        $StudentRounds = StudentRounds::whereIn('RoundId',function($q) use($request){
            $q->select('rounds.RoundId')->from('rounds')
            ->join('trainerrounds','trainerrounds.RoundId','=','rounds.RoundId')
            ->where('TrainerId','=',$request->TrainerId);
        })->get();

        foreach ($StudentRounds as $key => $StudentRound) {
            $ExamGrade = new ExamGrades();
            $ExamGrade->StudentRoundId = $StudentRound->StudentRoundsId;
            $ExamGrade->ExamId = $Exam->ExamId;
            $ExamGrade->save();
        }

        //return $StudentRounds;
        return Redirect::to("/Admin/Trainers/EditProfile/$request->TrainerId")->with('success',"Exam : $request->ExamNameEn has been added successfully!");

    }



    //Admin Branches handling
    public function Branches()
    {
        $Branches = DB::table('branches')->get();
        return View('Admin.branch',['Notifications'=>AdminController::Notifications(),'Branches'=>$Branches,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function AddBranch(Request $request)
    {
        Branches::create($request->toArray());

        return Redirect::to("/Admin/Branches")->with('success',"You have added $request->BranchNameEn successfully!");

    }
    public function EditBranch(int $id)
    {
        $Branch = Branches::find($id);

        return View('Admin.branch-edit',['Notifications'=>AdminController::Notifications(),'Branch'=>$Branch,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function EdtBranchData(Request $request)
    {
        $Branch = Branches::find($request->BranchId);
        $Branch->update($request->toArray());

        return Redirect::to("/Admin/Branches")->with('success',"You have update $request->BranchNameEn successfully!");
    }
    public function BranchDetails(int $id)
    {
        $Branch = Branches::find($id);
        
        return View('Admin.branch-details',['Notifications'=>AdminController::Notifications(),'Branch'=>$Branch,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
        
    }
    public function DeleteBranch(Request $request)
    {
        $id = $request->BranchId;
        $Branch = Branches::find($id);
        try{
            $Branch->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Branches")->with('danger',"$Branch->BranchNameEn can't be deleted (It may be connected to another courses,rounds,...etc)");

        }


        return Redirect::to("/Admin/Branches")->with('success',"You have deleted $Branch->BranchNameEn successfully!");
    }


    //Admin Labs handling
    public function Labs()
    {
        $Labs = DB::table('labs')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->get();
        $Branches = DB::table('branches')->get();
        return View('Admin.labs',['Labs'=>$Labs,'Notifications'=>AdminController::Notifications(),'Branches'=>$Branches,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function AddLab(Request $request)
    {
        Labs::create($request->toArray());

        return Redirect::to("/Admin/Labs")->with('success',"You have added Lab $request->LabNumber successfully!");

    }
    public function EditLab(int $id)
    {
        $Lab = Labs::find($id);
        $Branches = DB::table('branches')->get();

        return View('Admin.lab-edit',['Notifications'=>AdminController::Notifications(),'Lab'=>$Lab,'Branches'=>$Branches,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function EdtLabData(Request $request)
    {
        $Lab = Labs::find($request->LabId);
        $Lab->update($request->toArray());

        return Redirect::to("/Admin/Labs")->with('success',"You have update Lab $request->LabNumber successfully!");
    }
    public function LabDetails(int $id)
    {
        $Lab = DB::table('labs')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->where('LabId','=',$id)->first();
        
        return View('Admin.lab-details',['Notifications'=>AdminController::Notifications(),'Lab'=>$Lab,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
        
    }
    public function DeleteLab(Request $request)
    {
        $id = $request->LabId;
        $Lab = Labs::find($id);
        try{
            $Lab->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Labs")->with('danger',"Lab $Lab->LabNumber can't be deleted (It may be connected to another courses,rounds,...etc)");

        }


        return Redirect::to("/Admin/Labs")->with('success',"You have deleted Lab $Lab->LabNumber successfully!");
    }

    //Admin Rounds handling
    public function Rounds()
    {
        $Rounds = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->get();
        $Courses = Courses::all();
        $Days = DB::table('days')->get();
        $Labs = DB::table('labs')
        ->join('branches','branches.BranchId','=','labs.BranchId')->get();
        // $Branches = Branches::all();

        return View('Admin.round',['Notifications'=>AdminController::Notifications(),'Rounds'=>$Rounds,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'Courses'=>$Courses,'Days'=>$Days,'Labs'=>$Labs]);
    }
    public function AddRound(Request $request)
    {
        if(request()->ajax()){
            $Round = new Rounds();
            $Round->CourseId = $request->CourseId;
            $Round->GroupNo = $request->RoundNumber;
            $Round->LabId = $request->LabId;
            $Round->StartDate = $request->StartDate;
            $Round->EndDate = $request->EndDate;
            $Round->Done = $request->active;
            $Round->Notes = $request->notes;
            $Round->save();
            $RoundId = $Round->RoundId;
            
            if($request->RoundDays){
                foreach ($request->RoundDays as $key => $Day) {
                    $RoundDay = new RoundDays();
                    $RoundDay->DayId = $Day['Day'];
                    $RoundDay->RoundId = $RoundId;
                    $RoundDay->From = $Day['Time'];
                    $RoundDay->To = $Day['To'];
                    $RoundDay->save();
                    
                }
            }
            // $DaySelected = DB::table('Days')->where('DayId','=',$Day['Day'])->first();
                    $begin = new DateTime($request->StartDate );
                    $end   = new DateTime( $request->EndDate );
                    $Counter = 1;
                    for($i = $begin; $i <= $end; $i->modify('+1 day')){
                        
                        for ($x=0; $x < Count($request->Days); $x++) { 
                            $DaySelected = DB::table('days')->where('DayId','=',$request->Days[$x])->first();
                            if($i->format("D") == $DaySelected->DayCode){
                            $Session = new Sessions();
                            $Session->RoundId = $RoundId;
                            $Session->SessionNumber = $Counter;
                            $Session->SessionDate = $i->format("y-m-d");
                            $Session->save();
                            echo $i->format("D");
                            echo " --- ";
                            echo $i->format("y-m-d");
                            echo " --- ";
                            $Counter++;
                        }
                        }
                        
                    }
            if($request->Trainers){
                $Trainers = $request->Trainers;
                // return $Trainers;
                foreach ($Trainers as $key => $value) {
                    $TrainerRound = new TrainerRounds();
                    $TrainerRound->TrainerId = $value;
                    $TrainerRound->RoundId = $RoundId;
                    $TrainerRound->save();
                    $Course = Courses::find($request->CourseId);
                    
                    $TrainerAgenda = DB::table('traineragenda')
                    ->join('trainercourses','trainercourses.TrainerCoursesId','=','traineragenda.TrainerCoursesId')
                    ->join('contents','contents.ContentId','=','traineragenda.ContentId')
                    ->where([
                        ['TrainerId','=',$value],['CourseId','=',$Course->CourseId]
                    ])->get();
                    foreach ($TrainerAgenda as $key => $Agenda) {
                        
                        $RoundContent = new RoundContents();
                        $RoundContent->RoundId = $RoundId;
                        $RoundContent->Done = 0;
                        $RoundContent->ContentNameEn = $Agenda->ContentNameEn;
                        $RoundContent->ContentNameAr = $Agenda->ContentNameAr;
                        $RoundContent->TrainerRoundsId = $TrainerRound->TrainerRoundsId;
                        $RoundContent->save();
                        
                        $CenterEvaluation = new CenterEvaluations();
                        $CenterEvaluation->RoundContentId = $RoundContent->RoundContentId;
                        $CenterEvaluation->PersonId = $TrainerRound->TrainerRoundsId;
                        $CenterEvaluation->PersonType = 'Trainer';
                        $CenterEvaluation->save();
                        $TrainerSub = TrainerSubAgenda::where('TrainerAgendaId','=',$Agenda->TrainerAgendaId)->get();
                        foreach ($TrainerSub as $key => $subAgenda) {
                            $RoundSub = new RoundSubContents();
                        $RoundSub->RoundContentId = $RoundContent->RoundContentId;
                        $RoundSub->SubContentNameEn = $subAgenda->SubAgendaNameEn;
                        $RoundSub->SubContentNameAr = $subAgenda->SubAgendaNameAr;
                        $RoundSub->PointDone = 0;
                        $RoundSub->Example = $subAgenda->Example;
                        $RoundSub->Task = $subAgenda->Task;
                        $RoundSub->DoneTask = 0;
                        $RoundSub->DoneExample = 0;
                        $RoundSub->save();

                        }
                    }

                }
            }

            

            // $Course = Courses::find($request->CourseId);

            // // $RoundDays = $request->RoundDays;
            
            // // foreach ($RoundDays as $key => $value) {
            // //     $x = $value['Day'];
            // //     return $x;
            // // }
            
        }
        
    }
    public function FetchTrainers(Request $request)
    {
        if(request()->ajax()){
            $CourseId = $request->CourseId;
            $Trainers = DB::table('trainercourses')
            ->join('trainers','trainers.TrainerId','=','trainercourses.TrainerId')
            ->where('courseId','=',$CourseId)->get();
            return $Trainers;
        }
    }
    public function EditRound(int $id)
    {
        $Rounds = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->get();
        $Courses = Courses::all();
        $Days = DB::table('days')->get();
        $Labs = DB::table('labs')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);
        $Trainers = DB::table('trainers')
        ->whereNotIn('TrainerId',function($query) use ($Round) {
            
            $query->select('TrainerId')->from('trainerrounds')->where('RoundId','=',$Round->RoundId);
         
         })->get();
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')
        ->where('RoundId','=',$id)->get();
        $Students = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();

        return View('Admin.round-edit',[
                    'Rounds'=>$Rounds,
                    'Courses'=>$Courses,
                    'Course'=>$Course,
                    'Days'=>$Days,
                    'Labs'=>$Labs,
                    'RoundSelected'=>$Round,
                    'TrainerRounds'=>$TrainerRounds,
                    'Students' => $Students,
                    'CourseSelected'=>$Course,
                    'Trainers'=>$Trainers,
                    'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
                    'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function EditRoundData(Request $request)
    {
        if(request()->ajax()){
            $Round = Rounds::find($request->RoundId);
            // $Round->BranchId = $request->BranchId;
            $Round->LabId = $request->LabId;
            if($request->StartDate){
                $Round->StartDate = $request->StartDate;
            }
            if($request->EndDate){
                $Round->EndDate = $request->EndDate;
            }
            $Sessions = Sessions::where('RoundId','=',$request->RoundId)->count();
            $Round->Done = $request->active;
            $Round->Notes = $request->notes;
            $Round->save();
            if($request->RoundDays){
                foreach ($request->RoundDays as $key => $Day) {
                    $RoundDay = new RoundDays();
                    $RoundDay->DayId = $Day['Day'];
                    $RoundDay->RoundId = $request->RoundId;
                    $RoundDay->From = $Day['Time'];
                    $RoundDay->To = $Day['To'];
                    $RoundDay->save();
                    $RoundId = $RoundDay->RoundId;

                    
                }
                
            }

            $begin = new DateTime( $Round->StartDate);
            $end   = new DateTime( $Round->EndDate );
            $Counter = $Sessions+1;
            for($i = $begin; $i <= $end; $i->modify('+1 day')){
                
                for ($x=0; $x < Count($request->Days); $x++) { 
                    $DaySelected = DB::table('days')->where('DayId','=',$request->Days[$x])->first();
                    if($i->format("D") == $DaySelected->DayCode){
                    $Session = new Sessions();
                    $Session->RoundId = $RoundId;
                    $Session->SessionNumber = $Counter;
                    $Session->SessionDate = $i->format("y-m-d");
                    $Session->save();
                    echo $i->format("D");
                    echo " --- ";
                    echo $i->format("y-m-d");
                    echo " --- ";
                    $Counter++;
                    
                }
                
                }
            }
            // return "/Admin/Rounds/Edit/$RoundId";
            return Count($request->Days);
        }
    }
    public function FetchStudents(Request $request)
    {
        if(request()->ajax()){
            $q = $request->q;
            $RoundId = $request->RoundId;
            
            $Students = DB::table('students')
            ->whereNotIn('StudentId',function($query) use ($RoundId,$q) {
                
                $query->select('StudentId')->from('studentrounds')->where('RoundId','=',$RoundId);
             
             })
             ->where(function($query) use ($q){
                 $query->where('FullnameEn','like',"%$q%")
                 ->orWhere('Phone','like',"%$q%")
                 ->orWhere('FullnameEn','like',"%$q%");
             })
            //  ->orWhere('FullnameEn','like',"%$q%")
            //  ->orWhere('Phone','like',"%$q%")
             ->get();

             return $Students;
        }
    }
    public function AddStudentToRound(int $rid,int $sid)
    {
        $StudentRound = new StudentRounds();
        $StudentRound->StudentId = $sid;
        $StudentRound->RoundId = $rid;
        $StudentRound->save();
        $Student = Students::find($sid);
// return date('Y-m-d h:m:i',strtotime("-1 days"));
        $Sessions = Sessions::where([['RoundId','=',$rid]])->get();
        // return $Sessions;
        foreach ($Sessions as $key => $Session) {
            $Attendance = new Attendance();
            $Attendance->SessionId = $Session->SessionId;
            $Attendance->StudentRoundsId = $StudentRound->StudentRoundsId;
            $Attendance->save();

            $Task = new Tasks();
            $Task->StudentRoundId = $StudentRound->StudentRoundsId;
            $Task->SessionId = $Session->SessionId;
            $Task->save();

            //storing grades to be filled
            $Grade = new Grades();
            $Grade->TaskId = $Task->TaskId;
            $Grade->save();
        }
        $RoundContent = RoundContents::where('RoundId','=',$rid)->get();
        foreach ($RoundContent as $key => $Content) {
            $RoundEvaluation = new RoundEvaluations();
            $RoundEvaluation->RoundContentId = $Content->RoundContentId;
            $RoundEvaluation->StudentRoundId = $StudentRound->StudentRoundsId;
            $RoundEvaluation->save();

            $SeniorEvaluation = new SeniorstepsEvaluations();
            $SeniorEvaluation->RoundContentId = $Content->RoundContentId;
            $SeniorEvaluation->StudentRoundId = $StudentRound->StudentRoundsId;
            $SeniorEvaluation->save();

            $CenterEvaluation = new CenterEvaluations();
            $CenterEvaluation->RoundContentId = $Content->RoundContentId;
            $CenterEvaluation->PersonId = $StudentRound->StudentRoundsId;
            $CenterEvaluation->PersonType = 'Student';
            $CenterEvaluation->save();

            $StudentEval = new StudentEvaluations();
            $StudentEval->StudentRoundId = $StudentRound->StudentRoundsId;
            $StudentEval->RoundContentId = $Content->RoundContentId;
            $StudentEval->save();

            
        }
        $TrainerRounds = TrainerRounds::where('RoundId','=',$rid)->get();
        $Round = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->first();
        $Course = Rounds::find($rid);

        
        foreach ($TrainerRounds as $key => $TrainerRound) {
            $TrainerCourse = TrainerCourses::where([
                ['CourseId','=',$Course->CourseId],
                ['TrainerId','=',$TrainerRound->TrainerId]
            ])->first();
            $Exams = Exams::where('TrainerCoursesId','=',$TrainerCourse->TrainerCoursesId)->get();
            foreach ($Exams as $key => $Exam) {
                $ExamGrade = new ExamGrades();
                $ExamGrade->StudentRoundId = $StudentRound->StudentRoundsId;
                $ExamGrade->ExamId = $Exam->ExamId;
                $ExamGrade->save();
            }
            $RoundContentofTrainer = RoundContents::where('RoundId','=',$rid)->get();

                     foreach ($RoundContentofTrainer as $key => $ContentVal) {
                        $TrainerEval = new TrainerEvaluations();
                        $TrainerEval->StudentRoundsId = $StudentRound->StudentRoundsId;
                        $TrainerEval->TrainerRoundId = $TrainerRound->TrainerRoundsId;
                        $TrainerEval->RoundContentId = $ContentVal->RoundContentId;
                        $TrainerEval->save();
                     }
        }
        return Redirect::to("/Admin/Rounds/Edit/$rid")->with('success',"$Student->FullnameEn has been added to this round successfully!");
    }
    public function RoundDetails(int $id)
    {
        $Rounds = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->get();
        $Courses = Courses::all();
        $Days = DB::table('days')->get();
        $Round = Rounds::find($id);
        $Labs = DB::table('labs')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->where('LabId','=',$Round->LabId)->first();
        //Labs::find($Round->LabId);
        //$Branches = Branches::find($Round->BranchId);
        $Course = Courses::find($Round->CourseId);
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')
        ->where('RoundId','=',$id)->get();
        $Students = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();
        $RoundDays = DB::table('rounddays')
        ->join('days','days.DayId','=','rounddays.DayId')
        ->where('RoundId','=',$id)->get();

        return View('Admin.round-details',[
                    'Rounds'=>$Rounds,
                    'Courses'=>$Courses,
                    'Course'=>$Course,
                    'Days'=>$Days,
                    'Labs'=>$Labs,
                    'RoundSelected'=>$Round,
                    'TrainerRounds'=>$TrainerRounds,
                    'Students' => $Students,
                    'CourseSelected'=>$Course,
                    'RoundDays'=>$RoundDays,
                    'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
                    'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function AddTrainerToRound(Request $request)
    {
        $RoundId = $request->RoundId;
        $TrainerId = $request->TrainerId;

        $Round = Rounds::find($RoundId);
        $Course = Courses::find($Round->CourseId);
        $Trainer = Trainers::find($TrainerId);
        $TrainerCourses = TrainerCourses::where([
            ['CourseId','=',$Course->CourseId],
            ['TrainerId','=',$TrainerId]
        ])->count();
        if($TrainerCourses > 0){
            $TrainerRound = new TrainerRounds();
        $TrainerRound->TrainerId = $TrainerId;
        $TrainerRound->RoundId = $RoundId;
        $TrainerRound->save();

                    $TrainerAgenda = DB::table('traineragenda')
                    ->join('trainercourses','trainercourses.TrainerCoursesId','=','traineragenda.TrainerCoursesId')
                    ->join('contents','contents.ContentId','=','traineragenda.ContentId')
                    ->where([
                        ['TrainerId','=',$TrainerId],['CourseId','=',$Course->CourseId]
                    ])->get();
                    foreach ($TrainerAgenda as $key => $Agenda) {
                        
                        $RoundContent = new RoundContents();
                        $RoundContent->RoundId = $RoundId;
                        $RoundContent->Done = 0;
                        $RoundContent->ContentNameEn = $Agenda->ContentNameEn;
                        $RoundContent->ContentNameAr = $Agenda->ContentNameAr;
                        $RoundContent->TrainerRoundsId = $TrainerRound->TrainerRoundsId;
                        $RoundContent->save();
                        $CenterEvaluation = new CenterEvaluations();
                    $CenterEvaluation->RoundContentId = $RoundContent->RoundContentId;
                    $CenterEvaluation->PersonId = $TrainerRound->TrainerRoundsId;
                    $CenterEvaluation->PersonType = 'Trainer';
                    $CenterEvaluation->save();

                        $TrainerSub = TrainerSubAgenda::where('TrainerAgendaId','=',$Agenda->TrainerAgendaId)->get();
                        foreach ($TrainerSub as $key => $subAgenda) {
                            $RoundSub = new RoundSubContents();
                        $RoundSub->RoundContentId = $RoundContent->RoundContentId;
                        $RoundSub->SubContentNameEn = $subAgenda->SubAgendaNameEn;
                        $RoundSub->SubContentNameAr = $subAgenda->SubAgendaNameAr;
                        $RoundSub->PointDone = 0;
                        $RoundSub->Example = $subAgenda->Example;
                        $RoundSub->Task = $subAgenda->Task;
                        $RoundSub->DoneTask = 0;
                        $RoundSub->DoneExample = 0;
                        $RoundSub->save();

                        }
                    }
                    

                    $AllRoundContent = RoundContents::where('RoundId','=',$RoundId)->get();
                    $StudentRounds = StudentRounds::where('RoundId','=',$RoundId)->get();
                    foreach ($StudentRounds as $key => $Student) {
                        foreach ($AllRoundContent as $key => $ContentVal) {
                            $RoundEvaluation = new RoundEvaluations();
            $RoundEvaluation->RoundContentId = $ContentVal->RoundContentId;
            $RoundEvaluation->StudentRoundId = $Student->StudentRoundsId;
            $RoundEvaluation->save();

            $SeniorEvaluation = new SeniorstepsEvaluations();
            $SeniorEvaluation->RoundContentId = $ContentVal->RoundContentId;
            $SeniorEvaluation->StudentRoundId = $Student->StudentRoundsId;
            $SeniorEvaluation->save();

            
            $StudentEval = new StudentEvaluations();
            $StudentEval->StudentRoundId = $Student->StudentRoundsId;
            $StudentEval->RoundContentId = $ContentVal->RoundContentId;
            $StudentEval->save();

            $TrainerEval = new TrainerEvaluations();
            $TrainerEval->StudentRoundsId = $Student->StudentRoundsId;
            $TrainerEval->TrainerRoundId = $TrainerRound->TrainerRoundsId;
            $TrainerEval->RoundContentId = $ContentVal->RoundContentId;
            $TrainerEval->save();

            $CenterEvaluation = new CenterEvaluations();
            $CenterEvaluation->RoundContentId = $ContentVal->RoundContentId;
            $CenterEvaluation->PersonId = $Student->StudentRoundsId;
            $CenterEvaluation->PersonType = 'Student';
            $CenterEvaluation->save();
                        }
                    }



        }else{
$TrainerCourse = new TrainerCourses();
$TrainerCourse->CourseId = $Course->CourseId;
$TrainerCourse->TrainerId = $TrainerId;
$TrainerCourse->save();

$TrainerRound = new TrainerRounds();
$TrainerRound->TrainerId = $TrainerId;
$TrainerRound->RoundId = $RoundId;
$TrainerRound->save();

            $TrainerAgenda = DB::table('traineragenda')
            ->join('trainercourses','trainercourses.TrainerCoursesId','=','traineragenda.TrainerCoursesId')
            ->join('contents','contents.ContentId','=','traineragenda.ContentId')
            ->where([
                ['TrainerId','=',$TrainerId],['CourseId','=',$Course->CourseId]
            ])->get();
            foreach ($TrainerAgenda as $key => $Agenda) {
                
                $RoundContent = new RoundContents();
                $RoundContent->RoundId = $RoundId;
                $RoundContent->Done = 0;
                $RoundContent->ContentNameEn = $Agenda->ContentNameEn;
                $RoundContent->ContentNameAr = $Agenda->ContentNameAr;
                $RoundContent->save();
                $CenterEvaluation = new CenterEvaluations();
            $CenterEvaluation->RoundContentId = $RoundContent->RoundContentId;
            $CenterEvaluation->PersonId = $TrainerRound->TrainerRoundsId;
            $CenterEvaluation->PersonType = 'Trainer';
            $CenterEvaluation->save();

                $TrainerSub = TrainerSubAgenda::where('TrainerAgendaId','=',$Agenda->TrainerAgendaId)->get();
                foreach ($TrainerSub as $key => $subAgenda) {
                    $RoundSub = new RoundSubContents();
                $RoundSub->RoundContentId = $RoundContent->RoundContentId;
                $RoundSub->SubContentNameEn = $subAgenda->SubAgendaNameEn;
                $RoundSub->SubContentNameAr = $subAgenda->SubAgendaNameAr;
                $RoundSub->PointDone = 0;
                $RoundSub->Example = $subAgenda->Example;
                $RoundSub->Task = $subAgenda->Task;
                $RoundSub->DoneTask = 0;
                $RoundSub->DoneExample = 0;
                $RoundSub->save();

                }
            }
            

            $AllRoundContent = RoundContents::where('RoundId','=',$RoundId)->get();
            $StudentRounds = StudentRounds::where('RoundId','=',$RoundId)->get();
            foreach ($StudentRounds as $key => $Student) {
                foreach ($AllRoundContent as $key => $ContentVal) {
                    $RoundEvaluation = new RoundEvaluations();
    $RoundEvaluation->RoundContentId = $ContentVal->RoundContentId;
    $RoundEvaluation->StudentRoundId = $Student->StudentRoundsId;
    $RoundEvaluation->save();

    $SeniorEvaluation = new SeniorstepsEvaluations();
    $SeniorEvaluation->RoundContentId = $ContentVal->RoundContentId;
    $SeniorEvaluation->StudentRoundId = $Student->StudentRoundsId;
    $SeniorEvaluation->save();

    
    $StudentEval = new StudentEvaluations();
    $StudentEval->StudentRoundId = $Student->StudentRoundsId;
    $StudentEval->RoundContentId = $ContentVal->RoundContentId;
    $StudentEval->save();

    $TrainerEval = new TrainerEvaluations();
    $TrainerEval->StudentRoundsId = $Student->StudentRoundsId;
    $TrainerEval->TrainerRoundId = $TrainerRound->TrainerRoundsId;
    $TrainerEval->RoundContentId = $ContentVal->RoundContentId;
    $TrainerEval->save();

    $CenterEvaluation = new CenterEvaluations();
    $CenterEvaluation->RoundContentId = $ContentVal->RoundContentId;
    $CenterEvaluation->PersonId = $Student->StudentRoundsId;
    $CenterEvaluation->PersonType = 'Student';
    $CenterEvaluation->save();
                }
            }

        }
       return Redirect::to("/Admin/Rounds/Edit/$RoundId")->with('success',"$Trainer->FullnameEn has been assigned to this round successfully!");
    }
    //Rounds -> Sessions
    public function Attendance(int $id)
    {
        $Sessions = Sessions::where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);

        return View('Admin.attendence',['Notifications'=>AdminController::Notifications(),'Course'=>$Course,'Round'=>$Round,'Sessions'=>$Sessions,'RoundId'=>$id,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function StopRound(int $id)
    {
        $Round = Rounds::find($id);
        $Round->Done = 0;
        $Round->save();

        return Redirect::to("/Admin/Rounds/$id/Attendance")->with('success',"This round has stopped successfully!");

    }
    public function AddSession(Request $request)
    {
        $Session = Sessions::create($request->toArray());
        $StudentRounds = StudentRounds::where('RoundId','=',$request->RoundId)->get();
        $Round = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('RoundId','=',$Session->RoundId)->first();
        foreach ($StudentRounds as $key => $StudentRound) {
            $Attendance = new Attendance();
            $Attendance->StudentRoundsId = $StudentRound->StudentRoundsId;
            $Attendance->SessionId = $Session->SessionId;
            $Attendance->save();

            $Notification = new Notifications();
            $Notification->Notification = "New session (Number $Session->SessionNumber) has been added to $Round->CourseNameEn - GR $Round->GroupNo ";
            $Notification->NotificationLink = "/Student/Course/$Session->RoundId";
            $Notification->ForId = $StudentRound->StudentRoundsId;
            $Notification->ForType = "Student";
            $Notification->save();

            $Task = new Tasks();
            $Task->StudentRoundId = $StudentRound->StudentRoundsId;
            $Task->SessionId = $Session->SessionId;
            $Task->save();

        }

        return Redirect::to("/Admin/Rounds/$request->RoundId/Attendance")->with('success',"Session $request->SessionNumber has been added to this round successfully!");
    }
    public function SessionAttendance(int $id)
    {
        $Session = Sessions::find($id);
        $Round = Rounds::find($Session->RoundId);
        $Course = Courses::find($Round->CourseId);
        // $Rounds = Rounds::find($Session->RoundId);
        $Attendance = DB::table('attendance')
        ->join('studentrounds','studentrounds.StudentRoundsId','=','attendance.StudentRoundsId')
         ->join('students','students.StudentId','=','studentrounds.StudentId')
         ->where('SessionId','=',$id)->get();
        return View('Admin.session-attendence',['Notifications'=>AdminController::Notifications(),'Course'=>$Course,'Round'=>$Round,'Session'=>$Session,'Attendance'=>$Attendance,'SessionId'=>$id,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
        //return $Attendance;
    }
    public function SubmitAttendance(Request $request)
    {
        if(request()->ajax()){
            $Attendance = Attendance::where(
                [
                    ['SessionId','=',$request->SessionId],
                    ['StudentRoundsId','=',$request->StudentRoundsId]
                ]
            )->first();
            $Attendance->IsAttend = $request->IsAttend;
            $Attendance->Notes = $request->Notes;
            $Attendance->save();


            $Session = Sessions::find($request->SessionId);
            $Session->IsDone = 1;
            $Session->save();

            $Student = DB::table('studentrounds')
            ->join('students','studentrounds.StudentId','=','students.StudentId')
            ->where('StudentRoundsId','=',$request->StudentRoundsId)->first();

            $Notification = new Notifications();
            $Notification->Notification = "Your attendance in session $Session->SessionNumber has been recorded";
            $Notification->NotificationLink = "/Student/Attendance/$request->StudentRoundsId";
            $Notification->ForId = $Student->StudentId;
            $Notification->ForType = "Student";
            $Notification->save();
        }
    }


    //handle students
    public function Students()
    {
        $Students = Students::all();

        return View('Admin.StudentsL',
        [
            'Students'=>$Students,
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function StudentProfile(int $id)
    {
        $Student = Students::find($id);
        $Rounds = DB::table('studentrounds')
        ->join('rounds','rounds.RoundId','=','studentrounds.RoundId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('StudentId','=',$id)->get();
        return View('Admin.student-profile',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Student'=>$Student,
            'Rounds'=>$Rounds,
            'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function AddStudent(Request $request)
    {
        $Student = new Students();
        $Student->FullnameEn = $request->FullnameEn;
        $Student->FullnameAr = $request->FullnameAr;
        $Student->Password = uniqid();
        $Student->Email = $request->Email;
        $Student->Address = $request->Address;
        $Student->Education = $request->Education;
        $Student->University = $request->University;
        $Student->Faculty = $request->Faculty;
        $Student->Nationality = $request->Nationality;
        $Student->Phone = $request->Phone;
        $Student->Whatsapp = $request->Whatsapp;
        $Student->Birthdate = $request->Birthdate;
        $Student->Job = $request->Job;
        $Student->Company = $request->Company;
        $Student->Facebook = $request->Facebook;
        $Student->AdditionalNotes = $request->AdditionalNotes;
        if($request->hasFile('ImagePath')){
            if($request->ImagePath){
                $filename = $request->ImagePath->store('/Students/Profiles',['disk' => 'public']);
                $Student->ImagePath = $filename;
            }
        }
        $Student->save();

        return redirect()->back()->with('success',"Student $request->FullnameEn has been added successfully! First Password : ('$Student->Password')");
    }
    public function EditStudent(int $id)
    {
        $Student = Students::find($id);
        $Rounds = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->join('rounds','rounds.RoundId','=','studentrounds.RoundId')
        ->join('labs','rounds.LabId','=','labs.LabId')
        ->join('branches','labs.BranchId','=','branches.BranchId')
        ->join('courses','rounds.CourseId','=','courses.CourseId')
        ->where('students.StudentId','=',$id)->get();
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')->get();

        return View('Admin.Student-edit',
        [
            'Student'=>$Student,
            'Rounds'=>$Rounds,
            'TrainerRounds'=>$TrainerRounds,
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function EditStudentData(Request $request)
    {
        $Student = Students::find($request->StudentId);
        $Student->FullnameEn = $request->FullnameEn;
        $Student->FullnameAr = $request->FullnameAr;
        $Student->Password = $request->Password;
        $Student->Address = $request->Address;
        $Student->Education = $request->Education;
        $Student->University = $request->University;
        $Student->Faculty = $request->Faculty;
        $Student->Nationality = $request->Nationality;
        $Student->Phone = $request->Phone;
        $Student->Whatsapp = $request->Whatsapp;
        if($request->Birthdate){
            $Student->Birthdate = $request->Birthdate;
        }
        $Student->Job = $request->Job;
        $Student->Company = $request->Company;
        $Student->Facebook = $request->Facebook;
        $Student->AdditionalNotes = $request->AdditionalNotes;
        if($request->hasFile('ImagePath')){
            if($request->ImagePath){
                $filename = $request->ImagePath->store('/Students/Profiles',['disk' => 'public']);
                $Student->ImagePath =  $filename;
            }
        }
        $Student->save();

        return Redirect::to("/Admin/Students")->with('success',"Student $request->FullnameEn has been Edited successfully");
    }
    public function StudentData(int $id)
    {
        $Student = Students::find($id);
        $Rounds = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->join('rounds','rounds.RoundId','=','studentrounds.RoundId')
        ->join('labs','rounds.LabId','=','labs.LabId')
        ->join('branches','labs.BranchId','=','branches.BranchId')
        ->join('courses','rounds.CourseId','=','courses.CourseId')
        ->where('students.StudentId','=',$id)->get();
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')->get();

        return View('Admin.student-details',
        [
            'Student'=>$Student,
            'Rounds'=>$Rounds,
            'TrainerRounds'=>$TrainerRounds,
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Notifications'=>AdminController::Notifications(),
        ]);
    }
public function CancelStudentRegisteration(int $id)
{
    $StudentRound = DB::table('studentrounds')
    ->join('students','students.studentId','=','studentrounds.studentId')
    ->where('StudentRoundsId','=',$id)
    ->first();
    return View('Admin.MyCourses.Confirm-cancel',
        [
            'Student'=>$StudentRound,
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Notifications'=>AdminController::Notifications(),
        ]);
}
public function ConfirmCancelStudentRegisteration(int $id)
{
    $StudentRound = StudentRounds::find($id);
    $StudentRound->delete();

    return Redirect::to("/Admin/Course/$StudentRound->RoundId/Students")->with('cancel',"Student registeration has been deleted successfully");


}

    public function DeleteStudent(int $id)
    {
        $Student = Students::find($id);
        try{
            $Student->delete();
        }catch(QueryException $q){
            return Redirect::to("/Admin/Students")->with('danger',"Student $Student->FullnameEn can't be deleted (It may be connected to another courses,rounds,...etc)");

        }
        

        return Redirect::to("/Admin/Students")->with('success',"Student $Student->FullnameEn has been deleted successfully");

    }




    //handle my courses
    public function CourseProgress(int $id)
    {
        $RoundId = $id;
        $Round = DB::table('rounds')->join('courses','courses.CourseId','=','rounds.CourseId')->where('RoundId','=',$id)->first();
        return View('Admin.MyCourses.my-Courses',['Round'=>$Round,'Notifications'=>AdminController::Notifications(),'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),'RoundId'=>$RoundId,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications()]);
    }
    public function CourseStudents(int $id)
    {
        $RoundStudents = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)
        ->get();
        $Round = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('rounds.RoundId','=',$id)
        ->first();

        return View('Admin.MyCourses.students',['Notifications'=>AdminController::Notifications(),'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'RoundStudents'=>$RoundStudents,'Round'=>$Round]);
    }
    public function StudentDetails(int $id)
    {
        $StudentRound = StudentRounds::find($id);
        $Student = Students::find($StudentRound->StudentId);
        $AttendanceStatement = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([
            ['StudentRoundsId','=',$id],
            ['RoundId','=',$StudentRound->RoundId],
            

        ]);
        $Attendance = $AttendanceStatement->get();
        //$IsAttend = $
        $Run = $AttendanceStatement->where([['IsDone','=',1],['IsCancelled','=',null]])->count();
        $NotAttend = $AttendanceStatement->where([['IsAttend','=',0],['IsCancelled','=',null]])->count();
        $IsAttend = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([
            ['StudentRoundsId','=',$id],
            ['RoundId','=',$StudentRound->RoundId],
            ['IsCancelled','=',null]
        ])
        ->where('IsAttend','=',1)->count();
        $Count = $Attendance->count();
        $Course = Rounds::where('RoundId','=',$StudentRound->RoundId)->first();
        $CourseId = $Course->CourseId;
        $CourseS = Courses::find($CourseId);
        $Grades = DB::table("grades")
        ->join('tasks','tasks.TaskId','=','grades.TaskId')
        ->join('sessions','sessions.SessionId','=','tasks.SessionId')
        ->where([
            ['tasks.StudentRoundId','=',$id],
            ['RoundId','=',$StudentRound->RoundId]
        ])->get();
        //
        //--Exams
        // $Exams = Exams::where([
        //     ['CourseId','=',$CourseId]
        // ])->get();
        $ExamGrades = DB::table('examgrades')
        ->join('exams','exams.ExamId','=','examgrades.ExamId')
        ->where('StudentRoundId','=',$id)->get();

        $StudentEvaluations = DB::table('studentevaluation')
        ->join('roundcontent','roundcontent.RoundContentId','=','studentevaluation.RoundContentId')
        ->where('StudentRoundId','=',$id)->get();
        return View('Admin.MyCourses.student-details',[
            'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),
            'Attendance'=>$Attendance,
            'IsAttend'=>$IsAttend,
            'NotAttend'=>$NotAttend,
            'Count'=>$Count,
            'Run'=>$Run,
            'Grades'=>$Grades,
            'CourseS'=>$CourseS,
            'RoundId'=>$StudentRound->RoundId,
            'Course'=>$Course,
            'Student'=>$Student,
            // 'Exams'=>$Exams,
            'ExamGrades'=>$ExamGrades,
            'StudentRound'=>$StudentRound,
            'StudentEvaluations'=>$StudentEvaluations,
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'Notifications'=>AdminController::Notifications(),
            ]);
    }
    public function CourseSessions(int $id)
    {
        $Sessions = Sessions::where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);

        return View('Admin.MyCourses.sessions',
            ['Notifications'=>AdminController::Notifications(),
             'Round'=>$Round,
             'Course'=>$Course,
             'ActiveRounds'=>AdminController::ActiveRounds(),
             'CountNotifications'=>AdminController::CountNotifications(),
             'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),
             'Sessions'=>$Sessions]);
    }
    public function CourseDoneTopic(int $id)
    {
        $Topics = DB::table('roundcontent')
        ->where('RoundId','=',$id)
        ->get();
        $SubTopics = DB::table('roundsubcontents')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundsubcontents.RoundContentId')
        ->where('RoundId','=',$id)
        ->get();
        $RoundId = $id;
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);
        return View('Admin.MyCourses.doneTopics',['Notifications'=>AdminController::Notifications(),'Course'=>$Course,'Round'=>$Round,'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),'RoundId'=>$RoundId,'Topics'=>$Topics,'SubTopics'=>$SubTopics]);
    }
    public function AddTopicTrainer(Request $request,int $id)
    {
        $TopicName = $request->TrainerSubAgendaName;
        // $TrainerAgendaId = $request->TrainerAgendaId;
        $RoundContentId = $request->RoundContentId;
        //-- sub agenda
        // $TrainerSubAgenda = new TrainerSubAgenda;
        // $TrainerSubAgenda->TrainerAgendaId = $TrainerAgendaId;
        // $TrainerSubAgenda->SubAgendaNameEn = $TopicName;
        // $TrainerSubAgenda->SubAgendaNameAr = $TopicName;
        // $TrainerSubAgenda->save();
        //-- Round sub content
        $SubContent = new RoundSubContents;
        $SubContent->RoundContentId = $RoundContentId;
        $SubContent->SubContentNameEn = $TopicName;
        $SubContent->SubContentNameAr = $TopicName;
        $SubContent->save();

        return Redirect::to("/Admin/Course/$id/DoneTopics");
    }

    //
    // Append example
    //
    public function AddExampleTrainer(Request $request ,int $id)
    {
        $SubContent = RoundSubContents::find($request->SubContentId);
        $SubContent->Example = $request->Example;
        $SubContent->save();
        // $SubAgenda = TrainerSubAgenda::find($SubContent->TrainerSubAgendaId);
        // $SubAgenda->Example = $request->Example;
        // $SubAgenda->save();

        return Redirect::to("/Admin/Course/$id/DoneTopics");
    }
    
    //
    // Append Task
    //
    public function AddTaskTrainer(Request $request ,int $id)
    {
        $SubContent = RoundSubContents::find($request->SubContentId);
        $SubContent->Task = $request->Task;
        $SubContent->save();
        // $SubAgenda = TrainerSubAgenda::find($SubContent->TrainerSubAgendaId);
        // $SubAgenda->Task = $request->Task;
        // $SubAgenda->save();

        return Redirect::to("/Admin/Course/$id/DoneTopics");
    }

    //
    // Edit Sub Content
    //
    public function EditSubContent(Request $request ,int $id)
    {
        $SubContent = RoundSubContents::find($request->RoundSubContentsId);
        $SubContent->Example = $request->Example;
        $SubContent->Task = $request->Task;
        if($request->PointDone == 'on'){
            $SubContent->PointDone = 1;
        }else{
            $SubContent->PointDone = 0;

        }
        if($request->DoneExample == 'on'){
            $SubContent->DoneExample = 1;
        }else{
            $SubContent->DoneExample = 0;

        }
        if($request->DoneTask == 'on'){
            $SubContent->DoneTask = 1;
        }else{
            $SubContent->DoneTask = 0;

        }
        $SubContent->save();
        // $SubAgenda = TrainerSubAgenda::find($request->TrainerSubAgendaId);
        // $SubAgenda->SubAgendaNameEn = $request->SubAgendaName;
        // $SubAgenda->SubAgendaNameAr = $request->SubAgendaName;
        // $SubAgenda->Example = $request->Example;
        // $SubAgenda->Task = $request->Task;
        // $SubAgenda->save();

        return Redirect::to("/Admin/Course/$id/DoneTopics");
    }

    //
    //
    //
    public function DeleteSubContent(int $RoundSubContentsId,int $TrainerSubAgendaId,int $RoundId)
    {
        $SubContent = RoundSubContents::find($RoundSubContentsId);
        // $SubAgenda = TrainerSubAgenda::find($TrainerSubAgendaId);
        $SubContent->delete();
        // $SubAgenda->delete();

        return Redirect::to("/Admin/Course/$RoundId/DoneTopics");
    }
    public function AttendanceEvaluations(int $id)
    {
        $TrainerEvaluations = DB::table('trainerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','trainerevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1]])
        ->groupBy('ContentNameEn')
        ->selectRaw('count(TrainerEvaluationsId) as EvalCount, sum(Knowledge_Experience) as Knowledge_Experience, sum(Training_Qualified) as Training_Qualified,sum(Topics_Preparation) as Topics_Preparation,sum(Trainer_Attitude) as Trainer_Attitude,sum(Time_Respect) as Time_Respect,sum(Student_Interaction) as Student_Interaction,sum(Overall_Evaluation) as Overall_Evaluation,ContentNameEn')
        ->get();

        $TrainerEvalCount = $TrainerEvaluations->count();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);

        $RoundEvaluations = DB::table('roundevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1]])
        ->groupBy('ContentNameEn')
        ->selectRaw(' ContentNameEn, count(RoundEvaluationId) as EvalCount, max(Course_Wealthy) as Course_Wealthy , max(Enough_Hours) as Enough_Hours, max(Enough_Practice) as Enough_Practice , max(Materials_Evaluation) as Materials_Evaluation ,max(Suitable_Price) as Suitable_Price , max(Overall_Education) as Overall_Education')
        ->get();
        $RoundEvalCount = $RoundEvaluations->count();
        // return $RoundEvaluations[0]->Enough_Hours/$RoundEvalCount;

        // return $RoundEvaluations;
        return View('Admin.Attendence-Evaluations',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'TrainerEvaluations'=>$TrainerEvaluations,
            'RoundEvaluations'=>$RoundEvaluations,
            'TrainerEvalCount'=>$TrainerEvalCount,
            'RoundEvalCount'=>$RoundEvalCount,
            'RoundId'=>$id,
            'Round'=>$Round,
            'Course'=>$Course,
            'Notifications'=>AdminController::Notifications(),
        ]);
    }
    public function CenterEvaluationMain(int $id)
    {
        // $StudentRounds = DB::table('StudentRounds')
        // ->join('Students','Students.StudentId','=','StudentRounds.StudentId')
        // ->where('RoundId','=',$id)->get();
        // $TrainerRounds = DB::table('TrainerRounds')
        // ->join('Trainers','Trainers.TrainerId','=','TrainerRounds.TrainerId')
        // ->where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);

        $CenterEvaluations = DB::table('centerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','centerevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1]])
        ->groupBy('ContentNameEn')
        ->selectRaw('count(CenterEvaluationId) as EvalCount, sum(PCs_Quality) as PCs_Quality, sum(Projectors_Quality) as Projectors_Quality,sum(Air_Conditioners) as Air_Conditioners,sum(Seats_Quality) as Seats_Quality,sum(Lab_Cleaning) as Lab_Cleaning,sum(Lab_Capacity) as Lab_Capacity,sum(Overall_Evaluation) as Overall_Evaluation,ContentNameEn')
        ->get();
        $SeniorEvaluations = DB::table('seniorstepsevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','seniorstepsevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1]])
        ->groupBy('ContentNameEn')
        ->selectRaw('count(SeniorStepsEvaluationsId) as EvalCount, sum(Students_Deal) as Students_Deal, sum(Solving_Problems) as Solving_Problems,sum(Buffet_Quality) as Buffet_Quality,sum(General_Cleanliness) as General_Cleanliness,sum(Recepitionist_Quality) as Recepitionist_Quality,sum(Answering_Calls_Quality) as Answering_Calls_Quality,sum(Social_Media_Quality) as Social_Media_Quality,sum(Overall_Evaluation) as Overall_Evaluation,ContentNameEn')
        ->get();

        $CenterEvalCount = count($CenterEvaluations);
        $SeniorEvalCount = count($SeniorEvaluations);
       
        // $TrainerEvaluations = DB::table('CenterEvaluations')
        // ->join('RoundContent','RoundContent.RoundContentId','=','CenterEvaluations.RoundContentId')
        // ->where('RoundId','=',$id)
        // ->get();
        // return $CenterEvaluations;
        return View('Admin.trainer-center',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            // 'StudentRounds'=>$StudentRounds,
            'CenterEvalCount'=>$CenterEvalCount,
            'SeniorEvalCount'=>$SeniorEvalCount,
            'CenterEvaluations'=>$CenterEvaluations,
            'SeniorEvaluations'=>$SeniorEvaluations,
            'Round'=>$Round,
            'Course'=>$Course,
            'Notifications'=>AdminController::Notifications()
        ]);
    }   
    public function CenterEvaluation(int $id)
    {
        $StudentRounds = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')
        ->where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);
       
        $TrainerEvaluations = DB::table('centerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','centerevaluations.RoundContentId')
        ->where('RoundId','=',$id)
        ->get();

        return View('Admin.tracks-evaluations-details',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'StudentRounds'=>$StudentRounds,
            'TrainerRounds'=>$TrainerRounds,
            'TrainerEvaluations'=>$TrainerEvaluations,
            'Round'=>$Round,
            'Course'=>$Course,
            'Notifications'=>AdminController::Notifications()
        ]);
    }

public function SeniorEvaluation(int $id)
    {
        $StudentRounds = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();
        $TrainerRounds = DB::table('trainerrounds')
        ->join('trainers','trainers.TrainerId','=','trainerrounds.TrainerId')
        ->where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);
       
        $SeniorEvaluations = DB::table('seniorstepsevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','seniorstepsevaluations.RoundContentId')
        ->where('RoundId','=',$id)
        ->get();

        return View('Admin.senior-evaluations-details',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'StudentRounds'=>$StudentRounds,
            'TrainerRounds'=>$TrainerRounds,
            'SeniorEvaluations'=>$SeniorEvaluations,
            'Round'=>$Round,
            'Course'=>$Course,
            'Notifications'=>AdminController::Notifications()
        ]);
    }


    public function TrainerEvaluation(int $id)
    {
        $StudentRounds = DB::table('studentrounds')
        ->join('students','students.studentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();
        // $TrainerRounds = DB::table('TrainerRounds')
        // ->join('Trainers','Trainers.TrainerId','=','TrainerRounds.TrainerId')
        // ->where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);
       
        $TrainerEvaluations = DB::table('trainerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','trainerevaluations.RoundContentId')
        ->where('RoundId','=',$id)
        ->get();

        // return $StudentRounds;
        return View('Admin.trainer-evaluations-details',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'StudentRounds'=>$StudentRounds,
            // 'TrainerRounds'=>$TrainerRounds,
            'TrainerEvaluations'=>$TrainerEvaluations,
            'Round'=>$Round,
            'Course'=>$Course,
            'Notifications'=>AdminController::Notifications()
        ]);
    }
    public function CourseEvaluation(int $id)
    {
        $StudentRounds = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $RoundEvaluations = DB::table('roundevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundevaluations.RoundContentId')
        ->where('RoundId','=',$id)
        ->get();

        return View('Admin.course-evaluations-details',[
            'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),
            'StudentRounds'=>$StudentRounds,
            'RoundEvaluations'=>$RoundEvaluations,
            'Notifications'=>AdminController::Notifications(),
            'Round'=>$Round
        ]);
    }
    public function SessionFileUpload(Request $request)
    {
        if($request->SessionRole == 'Material'){
            $Session = Sessions::find($request->SessionId);
            $Session->MaterialText = $request->MaterialText;
            $Course = DB::table('rounds')
            ->join('courses','courses.CourseId','=','rounds.CourseId')
            ->where('RoundId','=',$Session->RoundId)->first();
            if($request->hasFile('MaterialFile')){
                $filename = $request->MaterialFile->store('/public/uploads',['disk' => 'public']);

                $Session->SessionMaterial = $filename;
                }
            $Session->save();
            $StudentRounds = StudentRounds::where('RoundId','=',$Session->RoundId)->get();
            
            foreach ($StudentRounds as $StudentRound) {
                $Notification = new Notifications();
            $Notification->Notification = "Material of session $Session->SessionNumber in $Course->CourseNameEn - GR$Course->GroupNo has been uploaded, check it";
            $Notification->NotificationLink = "/Student/Course/$Session->RoundId";
            $Notification->ForId = $StudentRound->StudentId;
            $Notification->ForType = "Student";
            $Notification->save();
            }
            
        }elseif($request->SessionRole == 'Video'){
            $Session = Sessions::find($request->SessionId);
            $Session->VideoText = $request->VideoText;
            $Course = DB::table('rounds')
            ->join('courses','courses.CourseId','=','rounds.CourseId')
            ->where('RoundId','=',$Session->RoundId)->first();
            // if($request->hasFile('VideoFile')){
            //     $filename = $request->VideoFile->store('/public/uploads',['disk' => 'public']);
                
            //     $Session->SessionVideo = $filename;
            //     }
            $Session->save();
            $StudentRounds = StudentRounds::where('RoundId','=',$Session->RoundId)->get();
            foreach ($StudentRounds as $StudentRound) {
                $Notification = new Notifications();
            $Notification->Notification = "Video of session $Session->SessionNumber in $Course->CourseNameEn - GR$Course->GroupNo has been uploaded, check it";
            $Notification->NotificationLink = "/Student/Course/$Session->RoundId";
            $Notification->ForId = $StudentRound->StudentId;
            $Notification->ForType = "Student";
            $Notification->save();
            }
        }elseif($request->SessionRole == 'Quiz'){
            $Session = Sessions::find($request->SessionId);
            $Session->QuizText = $request->QuizText;
            $Course = DB::table('rounds')
            ->join('courses','courses.CourseId','=','rounds.CourseId')
            ->where('RoundId','=',$Session->RoundId)->first();
            if($request->hasFile('QuizFile')){
                $filename = $request->QuizFile->store('/public/uploads',['disk' => 'public']);

                $Session->SessionQuiz = $filename;
                }
            $Session->save();
            $StudentRounds = StudentRounds::where('RoundId','=',$Session->RoundId)->get();
            foreach ($StudentRounds as $StudentRound) {
                $Notification = new Notifications();
            $Notification->Notification = "Quiz of session $Session->SessionNumber in $Course->CourseNameEn - GR$Course->GroupNo has been uploaded, check it";
            $Notification->NotificationLink = "/Student/Course/$Session->RoundId";
            $Notification->ForId = $StudentRound->StudentId;
            $Notification->ForType = "Student";
            $Notification->save();
            }
        }else{
            $Session = Sessions::find($request->SessionId);
            $Session->TaskText = $request->TaskText;
            $Course = DB::table('rounds')
            ->join('courses','courses.CourseId','=','rounds.CourseId')
            ->where('RoundId','=',$Session->RoundId)->first();
            if($request->hasFile('TaskFile')){
                $filename = $request->TaskFile->store('/public/uploads',['disk' => 'public']);

                $Session->SessionTask = $filename;
                }
            $Session->save();
            $StudentRounds = StudentRounds::where('RoundId','=',$Session->RoundId)->get();
            foreach ($StudentRounds as $StudentRound) {
                $Notification = new Notifications();
            $Notification->Notification = "Task of session $Session->SessionNumber in $Course->CourseNameEn - GR$Course->GroupNo has been uploaded, check it";
            $Notification->NotificationLink = "/Student/Course/$Session->RoundId";
            $Notification->ForId = $StudentRound->StudentId;
            $Notification->ForType = "Student";
            $Notification->save();
            }
        }
        
        return Redirect::to("/Admin/Course/$Session->RoundId/Sessions");
    }
    public function CourseAttendance(int $id)
    {
        $Sessions = Sessions::where('RoundId','=',$id)->get();

        return View('Admin.MyCourses.attendence',['Notifications'=>AdminController::Notifications(),'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'TrainerRounds'=>TrainerController::TrainerRounds(),'HistoryRounds'=>TrainerController::HistoryRounds(),'Sessions'=>$Sessions]);
    }
    public function CourseAttendanceDetails(int $id)
    {
        $Attendance = DB::table('attendance')
        ->join('studentrounds','studentrounds.StudentRoundsId','=','attendance.StudentRoundsId')
        ->join('students','studentrounds.StudentId','=','students.StudentId')
        ->where('SessionId','=',$id)->get();
        $countAllStudents = $Attendance->count();
        $countAttendedStudents = Attendance::where([
            ['IsAttend','=',1],
            ['SessionId','=',$id]
        ])->count();
        
        if($countAllStudents > 0){
            $AttendanceKPI = ($countAttendedStudents/$countAllStudents)*100;
        }else{
            $AttendanceKPI = 0;
        }

        return View('Admin.MyCourses.session-attendence',['Notifications'=>AdminController::Notifications(),'ActiveRounds'=>AdminController::ActiveRounds(),'CountNotifications'=>AdminController::CountNotifications(),'TrainerRounds'=>$this->TrainerRounds,'HistoryRounds'=>$this->HistoryRounds,'Attendance'=>$Attendance,'KPI'=>$AttendanceKPI]);
    }
    public function test(Request $request)
    {
        if($request->ajax()){
            if($request->Status == 'update'){
                $grade = Grades::find($request->GradeId);
                $grade->TaskId=$request->id;
                $grade->QuizGrade=$request->QuizVal;
                
                $Task = Tasks::find($grade->TaskId);
                $Task->TaskComment = $request->comment;
                $Task->save();
                $grade->TaskGrade=$request->TaskGrade;
                $grade->save();
            }
            
            
            
            return $request->TaskGrade;
        }
    }

    public function ResetPassword(Request $request)
    {
        $id = $request->TrainerId;
        $Trainer = Trainers::find($id);
        $Trainer->Password = uniqid();
        $Trainer->save();

        return redirect()->back()->with('added',"$Trainer->FullnameEn's password has been reset successfully! Password('$Trainer->Password')");
    }
public function StudentResetPassword(Request $request)
    {
        $id = $request->id;
        $Student = Students::find($id);
        $Student->Password = uniqid();
        $Student->save();

        return redirect()->back()->with('added',"$Student->FullnameEn's password has been reset successfully! Password('$Student->Password')");
    }


    public function AdminProfile(int $id)
    {
        $Admin = Admins::find($id);


        return View('Admin.profile',
        ['ActiveRounds'=>AdminController::ActiveRounds(),
        'CountNotifications'=>AdminController::CountNotifications(),
        'Notifications'=>AdminController::Notifications(),
        'Admin'=>$Admin,
        ]);


    }
    
    public function AdminProfileEdit(int $id)
    {
        $Admin = Admins::find($id);

        return View('Admin.edit-profie',
        ['ActiveRounds'=>AdminController::ActiveRounds(),
        'CountNotifications'=>AdminController::CountNotifications(),
        'Notifications'=>AdminController::Notifications(),
        'Admin'=>$Admin
        ]);

    }
    
    public function AdminProfileEditSubmit(Request $request)
    {
        $Admin = Admins::find($request->id);
        $Admin->update($request->toArray());

        return redirect("/Admin/Profile/$request->id");

    }

    
    //
    // Student > Upload task per session
    //
    public function UploadTask(Request $request)
    {
        if($request->hasFile('task')){
            //$request->ImagePath->storeAs('/public/uploads',$filename);
            $TaskId = $request->TaskId;
            // $round = $request->round;
            $StudentRoundId = $request->id;

            $StudentRound = StudentRounds::find($StudentRoundId);
            $Round = Rounds::find($StudentRound->RoundId);
            $Student = Students::find($StudentRound->StudentId);

            
            $Task = Tasks::find($TaskId);
            
            if($Task->TaskURL){
                if(file_exists(storage_path("app/public/".$Task->TaskURL))){
                    unlink(storage_path("app/public/" . $Task->TaskURL));
                }
            }

            $filename = $request->task->storeAs('/public/uploads/round'. $StudentRound->RoundId .'/session'.$Task->SessionId ,"$Student->FullnameEn" . time() .$request->file('task')->getClientOriginalName() ,['disk' => 'public']);

            //storing task
            // $Task = Tasks::where([
            //     ['StudentRoundId','=',$StudentRoundId],
            //     ['SessionId','=',$Session]
            // ])->first();
            $Task->TaskURL = $filename;
            $Task->IsGrade = 1;
            $Task->save();
            // return $Task;
            
            

            $Course = Courses::find($Round->CourseId);
            $ThisSession = Sessions::find($Task->SessionId);
                $TrainerRounds = TrainerRounds::where('RoundId','=',$StudentRound->RoundId)->get();
                foreach ($TrainerRounds as $key => $TrainerRound) {
                    $Notification = new Notifications();
                    $Notification->Notification = "$Student->FullnameEn has added his task in $Course->CourseNameEn GR$Round->GroupNo Session $ThisSession->SessionNumber";
                    $Notification->ForId = $TrainerRound->TrainerId;
                    $Notification->ForType = "Trainer";
                    $Notification->save();
                }
                $Notification = new Notifications();
                $Notification->Notification = "$Student->FullnameEn has added his task in $Course->CourseNameEn GR$Round->GroupNo Session $ThisSession->SessionNumber";
                $Notification->ForType = "Admin";
                $Notification->save();
           return Redirect::to("/Admin/Course/Student/Details/$StudentRoundId");
           
        }
    }

    public function CancelSession(int $id)
    {
        $Session = Sessions::find($id);
        $Session->IsCancelled = 1;
        $Session->save();
        
        return redirect()->back()->with('cancelsession',"Session $Session->SessionNumber is cancelled successfully");
    }
public function UndoCancelSession(int $id)
    {
        $Session = Sessions::find($id);
        $Session->IsCancelled = null;
        $Session->save();
        
        return redirect()->back()->with('cancelsession',"Session $Session->SessionNumber is reactivated successfully");
    }
    public function TaskProgress(int $id)
    {
        $Session = Sessions::find($id);
        $Round = Rounds::find($Session->RoundId);
        $Course = Courses::find($Round->CourseId);
        $tasks = DB::table('tasks')
        ->join('studentrounds','studentrounds.StudentRoundsId','=','tasks.StudentRoundId')
        ->join('students','studentrounds.StudentId','=','students.StudentId')
        ->join('grades','grades.TaskId','=','tasks.TaskId')
        ->where('SessionId','=',$id)->get();
        
        return View('Admin.MyCourses.session-prog',
        ['ActiveRounds'=>AdminController::ActiveRounds(),
        'CountNotifications'=>AdminController::CountNotifications(),
        'Notifications'=>AdminController::Notifications(),
        'SessionId'=>$id,
        'Tasks'=>$tasks,
        'Round'=>$Round,
        'Course'=>$Course,
        'Session'=>$Session
        ]);
    }

    public function sessionProg(Request $request)
    {
        if($request->ajax()){
            
            if($request->Status == 'update'){
                $grade = Grades::find($request->id);
                $Task = Tasks::find($grade->TaskId);
                $Task->TaskComment = $request->comment;
                $Task->save();
                $grade->TaskGrade = $request->TaskGrade;
                $grade->save();
            }
            return "$request->TaskGrade - $request->id";
            
        }

    }
    public function SessionProgressZip(int $id)
    {
        $Session = $Session = Sessions::find($id);

        $zip = new \ZipArchive();
        $filename = "Round".$Session->RoundId."-Session".$Session->SessionId."-".time().".zip";
        if ($zip->open(storage_path($filename), \ZipArchive::CREATE)== TRUE)
        {
            $files = File::files(storage_path("app/public/public/uploads/round".$Session->RoundId."/session".$Session->SessionId));
            foreach ($files as $key => $value){
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }
            $zip->close();
        }

        return response()->download(storage_path($filename));
    }
}
