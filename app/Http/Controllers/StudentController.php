<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\StudentRounds;
use Illuminate\Support\Facades\DB;
use App\Rounds;
use App\Sessions;
use App\Attendance;
use App\Branches;
use App\CenterEvaluations;
use App\Courses;
use App\Grades;
use App\Labs;
use App\Notifications;
use App\RoundEvaluations;
use App\SeniorstepsEvaluations;
use App\StudentEvaluations;
use App\Students;
use Illuminate\Support\Facades\Redirect;
use App\Tasks;
use App\TrainerEvaluations;
use App\TrainerRounds;
use App\Trainers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
        $this->middleware('AvoidTrainersAndAdmins');
    }

    // static methods for blade layout
    public static function StudentRounds()
    {
        return DB::table('studentrounds')
        ->join('rounds','rounds.RoundId','=','studentrounds.RoundId')
        ->join('courses','rounds.CourseId','=','courses.CourseId')
        ->where('StudentId','=',session()->get('Id'))->get();
    }

    public function Notifications()
    {
        return Notifications::where([
            // ['IsRead','=',0],
            ['ForType','=','Student'],
            ['ForId','=',session('Id')]
        ])
        ->OrderBy('NotificationDate','Desc')
        ->get();
    }

    public function CountNotifications()
    {
        return Notifications::where([
            ['IsRead','=',0],
            ['ForType','=','Student'],
            ['ForId','=',session('Id')]
        ])
        ->OrderBy('NotificationDate','Desc')
        ->count();
    }

    public function NotificationSeen(Request $request)
    {
        if(request()->ajax()){
            // return 'yes';
            $Notifications = Notifications::where([['ForType','=','Student'],['ForId','=',$request->id]])->get();
            foreach ($Notifications as $key => $Notification) {
                $Notification->IsRead = 1;
                $Notification->save();
            }
        }
    }
    //
    //Student home page
    //
    public function Index()
    {
        $StudentRounds = StudentController::StudentRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Rounds = Rounds::all()->count();
        $RunningRounds = Rounds::where('Done','=',1)->count();
        $Courses = Courses::all()->count();
        $Students = Students::all()->count();
        $Trainers = Trainers::all()->count();
        $Branches = Branches::all()->count();
        $Labs = Labs::all()->count();
        $RecentStudents = DB::table('students')->orderBy('StudentId','Desc')->take(5)->get();
        return View('Student.index',[
            'Rounds'=>$Rounds,'Running'=>$RunningRounds,'Courses'=>$Courses,'Students'=>$Students,'Trainers'=>$Trainers,
            'Branches'=>$Branches,'Labs'=>$Labs,'RecentStudents'=>$RecentStudents,
            'Notifications'=>StudentController::Notifications(),'CountNotifications'=>StudentController::CountNotifications(),'StudentRounds'=>$StudentRounds]);
    }

    //
    // Course Progress
    //
    public function CourseProgress(int $id)
    {
        //Layout requirements
        $StudentRounds = StudentController::StudentRounds();
        //--

        $round = $id;

        // return $StudentRound;
 $StudentRoundId = DB::table('studentrounds')
        ->where([
            ['StudentId','=',session('Id')],
            ['RoundId','=',$id]
        ])->get();
        // return $StudentRoundId;

        $Round = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->join('trainerrounds','trainerrounds.RoundId','=','rounds.RoundId')
        ->join('trainers','trainerrounds.TrainerId','=','trainers.TrainerId')
        ->join('trainercourses','trainercourses.TrainerId','=','trainers.TrainerId')
        ->join('labs','labs.LabId','=','rounds.LabId')
        ->join('branches','branches.BranchId','=','labs.BranchId')
        ->where('rounds.RoundId','=',$id)
        ->first();

        $RoundDays = DB::table('rounddays')
        ->join('days','days.DayId','=','rounddays.DayId')
        ->where('RoundId','=',$id)
        ->get();

        // $Sessions = Sessions::where('RoundId','=',$id)->get();
        $Sessions = DB::table('attendance')
        ->join('sessions','sessions.sessionId','=','attendance.sessionId')
        ->join('tasks','tasks.sessionId','=','sessions.sessionId')
        ->where([['RoundId','=',$id],['StudentRoundsId','=',$StudentRoundId[0]->StudentRoundsId],['StudentRoundId','=',$StudentRoundId[0]->StudentRoundsId]])->get();

        // $Tasks = DB::table('tasks')
        // ->where('StudentRoundsId','=',$StudentRoundId[0]->StudentRoundsId)->get();

        $RoundContent  = DB::table('roundcontent')
        ->where([
            ['RoundId','=',$id]
        ])
        ->get();

        $SubContents = DB::table('roundsubcontents')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundsubcontents.RoundContentId')
        ->where('RoundId','=',$id)->get();

        // $StudentRoundId = DB::table('studentrounds')
        // ->where([
        //     ['StudentId','=',session('Id')],
        //     ['RoundId','=',$id]
        // ])->get();

        //return $StudentRoundId;
        return View('Student.Course',[
            'StudentRounds'=>$StudentRounds,
            'Round'=>$Round,
            'RoundDays'=>$RoundDays,
            'Sessions'=>$Sessions,
            'RoundContent'=>$RoundContent,
            'SubContents'=>$SubContents,
            'StudentRoundId'=>$StudentRoundId,
            'round'=>$round,
            'Notifications'=>StudentController::Notifications(),
            'CountNotifications'=>StudentController::CountNotifications(),
            ]);
    }

    //
    // Attendance Evaluation of Student
    //
    public function AttendanceEvaluation(int $id)
    {
        //Layout Objects
        $StudentRounds = StudentController::StudentRounds();
        //---

        //$StudentRoundId = $id;

        $Attendance = DB::table('attendance')
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where('StudentRoundsId','=',$id)
        ->get();

        $AllAttend = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([['StudentRoundsId','=',$id],['IsCancelled','=',null]])->count();
        $Run = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([['StudentRoundsId','=',$id],['IsCancelled','=',null],['IsDone','=',1]])->count();
        $Cancelled = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([['StudentRoundsId','=',$id],['IsCancelled','=',1]])->count();
        $IsAttend = Attendance::where([
            ['StudentRoundsId','=',$id],
            ['IsAttend','=','1'],
        ])->count();

        $Grades = DB::table("grades")
        ->join('tasks','tasks.TaskId','=','grades.TaskId')
        ->join('sessions','sessions.SessionId','=','tasks.SessionId')
        ->where([
            ['tasks.StudentRoundId','=',$id]
        ])->get();

        $ExamGrades = DB::table('examgrades')
        ->join('exams','exams.ExamId','=','examgrades.ExamId')
        ->where([['StudentRoundId','=',$id],['IsDone','=',1]])->get();

        $StudentEvaluations = DB::table('studentevaluation')
        ->join('roundcontent','roundcontent.RoundContentId','=','studentevaluation.RoundContentId')
        ->where('StudentRoundId','=',$id)->get();

        return View('Student.Attendence-Evaluations',[
            'StudentRounds'=>$StudentRounds,
            'Attendance'=>$Attendance,
            'AllAttend'=>$AllAttend,
            'IsAttend'=>$IsAttend,
            'Grades'=>$Grades,
            'ExamGrades'=>$ExamGrades,
            'StudentEvaluations'=>$StudentEvaluations,
            'Notifications'=>StudentController::Notifications(),
            'CountNotifications'=>StudentController::CountNotifications(), 
            'Run'=>$Run,
            'Cancelled'=>$Cancelled,
            ]);
    }

    //
    // Student > Profile
    //
    public function Profile()
    {
        //Layout Objects
        $StudentRounds = StudentController::StudentRounds();
        //---
        $ExternalCourses = session()->get('ExternalCourses');
        $ExternalCoursesArr = explode(",",$ExternalCourses);

        return View('Student.profile',[
            'StudentRounds'=>$StudentRounds,
            'ExternalCourses'=>$ExternalCoursesArr,
            'Notifications'=>StudentController::Notifications(),
            'CountNotifications'=>StudentController::CountNotifications()
            ]);
    }

    //
    // Student > Profile > Edit Profile
    //
    public function EditProfile()
    {
        //Layout Objects
        $StudentRounds = StudentController::StudentRounds();
        //---
        $Student = Students::where('StudentId','=',session()->get('Id'))->first();

        return View('Student.edit-profile',['Notifications'=>StudentController::Notifications(),'CountNotifications'=>StudentController::CountNotifications(),'Student'=>$Student,'StudentRounds'=>$StudentRounds]);
    }

    //
    // Student > Edit Profile method(post)
    //
    public function EditProfileContent(Request $request)
    {
        $Student = Students::find(session('Id'));
        $Student->FullnameEn = $request->FullnameEn;
        $Student->FullnameAr = $request->FullnameEn;
        $Student->Email = $request->Email;
        $Student->Password = $request->Password;
        $Student->Birthdate = Carbon::parse($request->Birthdate)->format('Y-m-d h:m:i');
        $Student->Phone = $request->Phone;
        $Student->JoinDate = Carbon::parse($request->JoinDate)->format('Y-m-d h:m:i');
        $Student->Job = $request->Job;
        $Student->Company = $request->Company;
        // $Student->ExternalCourses = $request->ExternalCourses;
        // $Student->AdditionalNotes = $request->AdditionalNotes;
        if($request->hasFile('ImagePath')){
            if($request->ImagePath){
                $filename = $request->ImagePath->store('/Students/Profiles',['disk' => 'public']);
                $Student->ImagePath = $filename;
            }
        }
        $Student->save();

        return Redirect::to("/Student/Profile");

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

            $Session = $request->session;
            
            $Task = Tasks::where([
                ['StudentRoundId','=',$StudentRoundId],
                ['SessionId','=',$Session]
            ])->first();
            
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
            $Task->TaskDate = date("Y-m-d");
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

                return Redirect::to("/Student/Course/$Round->RoundId");
           
        }
        
    }

    //trainer center evaluations
    public function trainerCenterEvaluations(int $id)
    {
        //Layout Objects
        $StudentRounds = StudentController::StudentRounds();
        //---
        $Student = Students::where('StudentId','=',session()->get('Id'))->first();

        $TrainerEvaluations = DB::table('trainerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','trainerevaluations.RoundContentId')
        ->where('StudentRoundsId','=',$id)->get();
        $SeniorEvaluations = DB::table('seniorstepsevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','seniorstepsevaluations.RoundContentId')
        ->where('StudentRoundId','=',$id)->get();
        $RoundEvaluations = DB::table('roundevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundevaluations.RoundContentId')
        ->where('StudentRoundId','=',$id)->get();
        $CenterEvaluations = DB::table('centerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','centerevaluations.RoundContentId')
        ->where([['PersonId','=',$id],['PersonType','=','Student']])->get();

        return View('Student.trainer-center',[
            'Student'=>$Student,
            'SeniorEvaluations'=>$SeniorEvaluations,
            'StudentRounds'=>$StudentRounds,
            'TrainerEvaluations'=>$TrainerEvaluations,
            'RoundEvaluations'=>$RoundEvaluations,
            'CenterEvaluations'=>$CenterEvaluations,
            'Notifications'=>StudentController::Notifications(),'CountNotifications'=>StudentController::CountNotifications(),
        ]);
        
    }
    public function TrainerTopic(Request $request)
    {
        if(request()->ajax()){
            
            if(
                $request->Knowledge_Experience !== null 
                // $request->Training_Qualified !== null &&
                // $request->Topics_Preparation !== null &&
                // $request->Trainer_Attitude !== null &&
                // $request->Time_Respect !== null &&
                // $request->Student_Interaction !== null &&
                // $request->Overall_Evaluation !== null &&
                // $request->Notes !== null
            ){
                $TrainerEvaluation = TrainerEvaluations::find($request->TrainerEvaluationsId);
            $TrainerEvaluation->Knowledge_Experience = $request->Knowledge_Experience;
            $TrainerEvaluation->Training_Qualified = $request->Training_Qualified;
            $TrainerEvaluation->Topics_Preparation = $request->Topics_Preparation;
            $TrainerEvaluation->Trainer_Attitude = $request->Trainer_Attitude;
            $TrainerEvaluation->Time_Respect = $request->Time_Respect;
            $TrainerEvaluation->Student_Interaction = $request->Student_Interaction;
            $TrainerEvaluation->Overall_Evaluation = $request->Overall_Evaluation;
            $TrainerEvaluation->Notes = $request->Notes;
                $TrainerEvaluation->IsDone = 1;
                $TrainerEvaluation->save();
            }

            

            return "success";
        }
    }
    public function RoundEval(Request $request)
    {
        if(request()->ajax()){
            
            if(
                $request->Course_Wealthy !== null 
            // $request->Enough_Hours !== null &&
            // $request->Enough_Practice !== null &&
            // $request->Materials_Evaluation !== null &&
            // $request->Suitable_Price !== null &&
            // $request->Overall_Education !== null 
            // // $request->Notes !== null 
            ){
                $RoundEvaluation = RoundEvaluations::find($request->RoundEvaluationId);
            $RoundEvaluation->Course_Wealthy = $request->Course_Wealthy;
            $RoundEvaluation->Enough_Hours = $request->Enough_Hours;
            $RoundEvaluation->Enough_Practice = $request->Enough_Practice;
            $RoundEvaluation->Materials_Evaluation = $request->Materials_Evaluation;
            $RoundEvaluation->Suitable_Price = $request->Suitable_Price;
            $RoundEvaluation->Overall_Education = $request->Overall_Education;
                $RoundEvaluation->IsDone = 1;
                $RoundEvaluation->Notes = $request->Notes;
                $RoundEvaluation->save();
                return "success";
            }
            
            

           
        }
    }
    public function CenterEval(Request $request)
    {
        if (request()->ajax()) {
            

            if(
                $request->PCs_Quality !== null ||
                $request->Projectors_Quality !== null ||
                $request->Air_Conditioners !== null ||
                $request->Seats_Quality !== null ||
                $request->Lab_Cleaning !== null ||
                $request->Lab_Capacity !== null ||
                $request->Overall_Evaluation !== null ||
                $request->Notes !== null
            ){
                $CenterEvaluation = CenterEvaluations::find($request->CenterEvaluationId);
                $CenterEvaluation->PCs_Quality = $request->PCs_Quality;
                $CenterEvaluation->Projectors_Quality = $request->Projectors_Quality;
                $CenterEvaluation->Air_Conditioners = $request->Air_Conditioners;
                $CenterEvaluation->Seats_Quality = $request->Seats_Quality;
                $CenterEvaluation->Lab_Cleaning = $request->Lab_Cleaning;
                $CenterEvaluation->Lab_Capacity = $request->Lab_Capacity;
                $CenterEvaluation->Overall_Evaluation = $request->Overall_Evaluation;
                $CenterEvaluation->IsDone = 1;
                $CenterEvaluation->Notes = $request->Notes;
                $CenterEvaluation->save();
            }

            return "success";
        }
    }

    public function SeniorEval(Request $request)
    {
        if (request()->ajax()) {
            
            if(
                $request->Students_Deal !== null ||
                $request->Solving_Problems !== null ||
                $request->Buffet_Quality !== null ||
                $request->General_Cleanliness !== null ||
                $request->Recepitionist_Quality !== null ||
                $request->Answering_Calls_Quality !== null ||
                $request->Social_Media_Quality !== null ||
                $request->Overall_Evaluation !== null ||
                $request->Notes !== null
            ){
                $SeniorEvaluations = SeniorstepsEvaluations::find($request->SeniorstepsEvaluationsId);
                $SeniorEvaluations->Students_Deal = $request->Students_Deal;
                $SeniorEvaluations->Solving_Problems = $request->Solving_Problems;
                $SeniorEvaluations->Buffet_Quality = $request->Buffet_Quality;
                $SeniorEvaluations->General_Cleanliness = $request->General_Cleanliness;
                $SeniorEvaluations->Recepitionist_Quality = $request->Recepitionist_Quality;
                $SeniorEvaluations->Answering_Calls_Quality = $request->Answering_Calls_Quality;
                $SeniorEvaluations->Social_Media_Quality = $request->Social_Media_Quality;
                $SeniorEvaluations->Overall_Evaluation = $request->Overall_Evaluation;
                $SeniorEvaluations->IsDone = 1;
                $SeniorEvaluations->Notes = $request->Notes;
                $SeniorEvaluations->save();
                return "done";
            }
        }
    }
}
