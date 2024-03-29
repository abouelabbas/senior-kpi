<?php

namespace App\Http\Controllers;
use App\ExtraContent;
use App\ExtraTasks;
use App\ExtraTaskSubmissions;
use App\StudentVideos;
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

    public static function Notifications()
    {
        return Notifications::where([
            // ['IsRead','=',0],
            ['ForType','=','Student'],
            ['ForId','=',session('Id')]
        ])
        ->OrderBy('NotificationDate','Desc')
        ->get();
    }

    public static function CountNotifications()
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
        $StudentVideos = StudentVideos::all();
        $Rounds = Rounds::all()->count();
        $RunningRounds = Rounds::where('Done','=',1)->count();
        $Courses = Courses::all()->count();
        $Students = Students::all()->count();
        $Trainers = Trainers::all()->count();
        $Branches = Branches::all()->count();
        $Labs = Labs::all()->count();
        $RecentStudents = DB::table('students')->orderBy('StudentId','Desc')->take(5)->get();
        return View('Student.index',[
            'StudentVideos'=>$StudentVideos,
            'Rounds'=>$Rounds,'Running'=>$RunningRounds,'Courses'=>$Courses,'Students'=>$Students,'Trainers'=>$Trainers,
            'Branches'=>$Branches,'Labs'=>$Labs,'RecentStudents'=>$RecentStudents,
            'Notifications'=>StudentController::Notifications(),'CountNotifications'=>StudentController::CountNotifications(),'StudentRounds'=>$StudentRounds]);
    }

    public function ExtraContent(int $id) {
        $StudentRounds = StudentController::StudentRounds();

        $StudentRound = StudentRounds::find($id);
        $Round = Rounds::find($StudentRound->RoundId);
        $Content = ExtraContent::where('RoundId', '=', $Round->RoundId)->get();
        $Course = Courses::find($Round->CourseId);


        return View('Student.extracontent', [
            'Content' => $Content,
            'Round' => $Round,
            'Course' => $Course,
            'Notifications'=>StudentController::Notifications(),'CountNotifications'=>StudentController::CountNotifications()
            ,'StudentRounds'=>$StudentRounds

        ]);
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

    public function CourseExtraTasks(int $sid, int $id){
        $Session = Sessions::find($id);
        $ExtraTasks = DB::table('extratasks')
        ->select([
            'extratasks.ExtraTaskId',
            'SessionId', 'ExtraTaskLink','ExtraTaskDesc','ExtraTaskType',
            'ExtraTaskLevel','ExtraTaskDate','SubmissionId','SubmissionLink','SubmissionNotes','SubmissionComment',
            'SubmissionGrade','StudentRoundId'  
        ])
        ->leftJoin('extratasksubmissions', 'extratasksubmissions.ExtraTaskId', '=', 'extratasks.ExtraTaskId')
        ->where('SessionId','=',$id)->get();
        // $ExtraTasks = ExtraTasks::where('SessionId','=',$id)->get();
        $Round = Rounds::find($Session->RoundId);
        $Course = Courses::find($Round->CourseId);
        
        // return $ExtraTasks;
        return View('Student.extratasks',[
            'Session'=>$Session,
            'Tasks'=>$ExtraTasks,
            'Round'=>$Round,
            'Course'=>$Course,
            'StudentRoundId'=>$sid,
            'Notifications'=>StudentController::Notifications(),
            'CountNotifications'=>StudentController::CountNotifications(),
            'StudentRounds'=>StudentController::StudentRounds()
        ]);
    }

    public function ExtraTaskSubmission(Request $request){
        $ExtraTaskSub = new ExtraTaskSubmissions();
        if(ExtraTaskSubmissions::where([['ExtraTaskId', '=', $request->ExtraTaskId], ['StudentRoundId','=',$request->StudentRoundId]])->exists()){
            $ExtraTaskSub = ExtraTaskSubmissions::where([['ExtraTaskId', '=', $request->ExtraTaskId], ['StudentRoundId','=',$request->StudentRoundId]])->first();
        }
        $ExtraTaskSub->ExtraTaskId = $request->ExtraTaskId;
        $ExtraTaskSub->SubmissionLink = $request->SubmissionLink;
        $ExtraTaskSub->SubmissionNotes = $request->SubmissionNotes;
        $ExtraTaskSub->StudentRoundId = $request->StudentRoundId;

        if($request->SubmissionGrade){
            $ExtraTaskSub->SubmissionGrade = $request->SubmissionGrade;
            $ExtraTaskSub->SubmissionComment = $request->SubmissionComment;
        }

        $ExtraTaskSub->save();

        return redirect()->back()->with('success','Task Submitted Successfully');
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
        $StudentRound = StudentRounds::find($id);
        $Student = Students::find($StudentRound->StudentId);
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
            ['IsAttend','!=','0'],
            ['IsAttend','!=','4'],
        ])->count();
        $IsOnline = Attendance::where([
            ['StudentRoundsId', '=', $id],
            ['IsAttend', '=', '2'],
        ])->count();
        $IsSkipped = Attendance::where([
            ['StudentRoundsId', '=', $id],
            ['IsAttend', '=', '4'],
        ])->count();
        $preJoin = Attendance::where([
            ['StudentRoundsId','=',$id],
            ['IsAttend','=','3'],
        ])->count();
        $SessionWithoutTask = Sessions::where([
            ['RoundId','=',$StudentRound->RoundId],
            ['HasTask','=',0]
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
            'IsAttend' => $IsAttend,
            'preJoin'=>$preJoin,
            'IsOnline'=>$IsOnline,
            'IsSkipped'=>$IsSkipped,
            'SessionWithoutTask'=>$SessionWithoutTask,
            'Grades'=>$Grades,
            'ExamGrades'=>$ExamGrades,
            'StudentEvaluations'=>$StudentEvaluations,
            'Notifications'=>StudentController::Notifications(),
            'CountNotifications'=>StudentController::CountNotifications(), 
            'Run'=>$Run,
            'Cancelled'=>$Cancelled,
            'StudentRound'=>$StudentRound,
            'Student'=>$Student
            
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
        $Student = Students::find(session('Id'));
        $ExternalCourses = session()->get('ExternalCourses');
        $ExternalCoursesArr = explode(",",$ExternalCourses);

        return View('Student.profile',[
            'StudentRounds'=>$StudentRounds,
            'Student'=>$Student,
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
        $Student->Wuzzuf = $request->Wuzzuf;
        $Student->Linkedin = $request->Linkedin;
        $Student->PersonalEmail = $request->PersonalEmail;
        $Student->CertificateName = $request->CertificateName;
        $Student->GithubLink = $request->GithubLink;
        $Student->Facebook = $request->Facebook;
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
        // if($request->hasFile('task')){
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
            
            // if($Task->TaskURL){
            //     if(file_exists(storage_path("app/public/".$Task->TaskURL))){
            //         unlink(storage_path("app/public/" . $Task->TaskURL));
            //     }
            // }
            $Session = Sessions::find($Task->SessionId);
            // $filename = $request->task->storeAs('/public/uploads/round'. $StudentRound->RoundId .'/session'.$Task->SessionId ,"$Student->FullnameEn"."_round_"."$Round->GroupNo"."_session_"."$Session->SessionNumber"."_" .$request->file('task')->getClientOriginalName() ,['disk' => 'public']);



            //storing task
            // $Task = Tasks::where([
            //     ['StudentRoundId','=',$StudentRoundId],
            //     ['SessionId','=',$Session]
            // ])->first();
            $Task->TaskURL = $request->task_link;
            $Task->TaskNotes = $request->notes;
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
           
        // }
        
    }
    public function UploadPractice(Request $request)
    {
        // if($request->hasFile('task')){
        //$request->ImagePath->storeAs('/public/uploads',$filename);
        $TaskId = $request->TaskId;
        // $round = $request->round;
        $StudentRoundId = $request->id;

        $StudentRound = StudentRounds::find($StudentRoundId);
        $Round = Rounds::find($StudentRound->RoundId);
        $Student = Students::find($StudentRound->StudentId);

        $Session = $request->session;

        $Task = Tasks::where([
            ['StudentRoundId', '=', $StudentRoundId],
            ['SessionId', '=', $Session]
        ])->first();

        // if($Task->TaskURL){
        //     if(file_exists(storage_path("app/public/".$Task->TaskURL))){
        //         unlink(storage_path("app/public/" . $Task->TaskURL));
        //     }
        // }
        $Session = Sessions::find($Task->SessionId);
        // $filename = $request->task->storeAs('/public/uploads/round'. $StudentRound->RoundId .'/session'.$Task->SessionId ,"$Student->FullnameEn"."_round_"."$Round->GroupNo"."_session_"."$Session->SessionNumber"."_" .$request->file('task')->getClientOriginalName() ,['disk' => 'public']);



        //storing task
        // $Task = Tasks::where([
        //     ['StudentRoundId','=',$StudentRoundId],
        //     ['SessionId','=',$Session]
        // ])->first();
        $Task->PracticeURL = $request->practice_link;
        $Task->PracticeNotes = $request->notes;
        // $Task->TaskDate = date("Y-m-d");
        // $Task->IsGrade = 1;
        $Task->save();
        // return $Task;



        return Redirect::to("/Student/Course/$Round->RoundId");

        // }

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
