<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrainerRounds;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\TrainerCourses;
use App\Sessions;
use App\Attendance;
use App\Branches;
use App\RoundContents;
use App\TrainerSubAgenda;
use App\RoundSubContents;
use App\Students;
use App\StudentRounds;
use App\Grades;
use App\Tasks;
use App\Exams;
use App\Courses;
use App\Rounds;
use App\ExamGrades;
use App\CenterEvaluations;
use App\Trainers;
use App\Messages;
use App\Events\ChatEvent;
use App\Labs;
use App\Notifications;
use App\StudentEvaluations;
use Illuminate\Support\Facades\Session;

class TrainerController extends Controller
{
    public function __construct()
    {
        $this->middleware('login');
        $this->middleware('AvoidStudentsAndAdmins');
    }
    //
    // Layout Data
    // Trainer Rounds
    //
    public static function TrainerRounds()
    {
        $TrainerRounds = DB::table('trainerrounds')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where([
            ['TrainerId','=',session()->get('Id')],
            ['Done','=',1]
        ])
        ->orderBy('StartDate','DESC')
        ->get();

        return $TrainerRounds;
    }

    public function Notifications(Type $var = null)
    {
        return Notifications::where([
            // ['IsRead','=',0],
            ['ForType','=','Trainer'],
            ['ForId','=',session('Id')]
        ])
        ->OrderBy('NotificationDate','Desc')
        ->get();
    }
    public function CountNotifications(Type $var = null)
    {
        return Notifications::where([
            ['IsRead','=',0],
            ['ForType','=','Trainer'],
            ['ForId','=',session('Id')]
        ])
        ->OrderBy('NotificationDate','Desc')
        ->count();
    }

    public function NotificationSeen(Request $request)
    {
        if(request()->ajax()){
            // return 'yes';
            $Notifications = Notifications::where([['ForType','=','Trainer'],['ForId','=',$request->id]])->get();
            foreach ($Notifications as $key => $Notification) {
                $Notification->IsRead = 1;
                $Notification->save();
            }
        }
    }
    //
    // History Rounds
    //
    public static function HistoryRounds()
    {
        $HistoryRounds = DB::table('trainerrounds')
        ->join('rounds','rounds.RoundId','=','trainerrounds.RoundId')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where([
            ['TrainerId','=',session()->get('Id')],
            ['Done','=',0]
        ])
        ->get();

        return $HistoryRounds;
    }
    //-----
    //
    //Student home page
    //
    public function Index()
    {
        $TrainerRounds = TrainerController::TrainerRounds();

        $HistoryRounds = TrainerController::HistoryRounds();
        $Rounds = Rounds::all()->count();
        $RunningRounds = Rounds::where('Done','=',1)->count();
        $Courses = Courses::all()->count();
        $Students = Students::all()->count();
        $Trainers = Trainers::all()->count();
        $Branches = Branches::all()->count();
        $Labs = Labs::all()->count();
        $RecentStudents = DB::table('students')->orderBy('StudentId','Desc')->take(5)->get();

        return View('Trainer.index',[
            'Rounds'=>$Rounds,'Running'=>$RunningRounds,'Courses'=>$Courses,'Students'=>$Students,'Trainers'=>$Trainers,
            'Branches'=>$Branches,'Labs'=>$Labs,'RecentStudents'=>$RecentStudents,
            'Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds]);
    }

    //
    // Profile page
    //
    public function profile()
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        // $ExternalCourses = session()->get('ExternalCourses');
        // $ExternalCoursesArr = explode(",",$ExternalCourses);

        return View('Trainer.profile',
        [
            'Notifications'=>TrainerController::Notifications(),
            'CountNotifications'=>TrainerController::CountNotifications(),
            'TrainerRounds'=>$TrainerRounds,
            'HistoryRounds'=>$HistoryRounds,
            // 'ExternalCourses'=>$ExternalCoursesArr
            ]);
    }

    //
    // Trainer course progress
    //
    public function CourseProgress(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $RoundId = $id;
        return View('Trainer.my-Courses',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'RoundId'=>$RoundId]);
    }

    //
    // Trainer > course > students
    //
    public function CourseStudents($id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $RoundStudents = DB::table('studentrounds')
        ->join('students','students.StudentId','=','studentrounds.StudentId')
        ->where('RoundId','=',$id)
        ->get();
        $Round = DB::table('rounds')
        ->join('courses','courses.CourseId','=','rounds.CourseId')
        ->where('rounds.RoundId','=',$id)
        ->first();

        return View('Trainer.students',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'RoundStudents'=>$RoundStudents,'Round'=>$Round]);
    }

    //
    // Trainer > Course > Attendance
    //
    public function CourseAttendance(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Sessions = Sessions::where('RoundId','=',$id)->get();

        return View('Trainer.attendence',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'Sessions'=>$Sessions,'RoundId'=>$id]);
    }

    //
    // Trainer > Course > Attedence Sessions > Details
    //
    public function CourseAttendanceDetails(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Attendance = DB::table('attendance')
        ->join('studentrounds','studentrounds.StudentRoundsId','=','attendance.StudentRoundsId')
        ->join('students','studentrounds.StudentId','=','students.StudentId')
        ->where('SessionId','=',$id)->get();
        $countAllStudents = $Attendance->count();
        $countAttendedStudents = Attendance::where([
            ['IsAttend','=',1],
            ['SessionId','=',$id]
        ])->count();

        $Session = Sessions::find($id);

        if($countAllStudents > 0){
            $AttendanceKPI = ($countAttendedStudents/$countAllStudents)*100;
        }else{
            $AttendanceKPI = 0;
        }

        return View('Trainer.session-attendence',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'Attendance'=>$Attendance,'KPI'=>$AttendanceKPI,'RoundId'=>$Session->RoundId]);
    }

    //
    // Trainer > Course > Sessions
    //
    public function CourseSessions(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Sessions = Sessions::where('RoundId','=',$id)->get();
        $Round = Rounds::find($id);
        $Course = Courses::find($Round->CourseId);

        return View('Trainer.sessions',['Round'=>$Round,'Course'=>$Course,'Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'Sessions'=>$Sessions]);
    }

    //
    // Trainer > Course > session > content
    // Upload files
    //
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
            if($request->hasFile('VideoFile')){
                $filename = $request->VideoFile->store('/public/uploads',['disk' => 'public']);

                $Session->SessionVideo = $filename;
                }
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

        return Redirect::to("/Trainer/Course/$Session->RoundId/Sessions");
    }

    //
    // Trainer > Course > Done topic
    //
    public function CourseDoneTopic(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Topics = DB::table('roundcontent')
        ->where('RoundId','=',$id)
        ->get();
        $SubTopics = DB::table('roundsubcontents')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundsubcontents.RoundContentId')
        ->get();
        $RoundId = $id;
        return View('Trainer.doneTopics',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'RoundId'=>$RoundId,'Topics'=>$Topics,'SubTopics'=>$SubTopics]);
    }

    //
    // Trainer > Course > DoneTopics > create sub
    //
    public function AddTopic(Request $request,int $id)
    {
        $TopicName = $request->TrainerSubAgendaName;
        $TrainerAgendaId = $request->TrainerAgendaId;
        $RoundContentId = $request->RoundContentId;
        //-- sub agenda
        // $TrainerSubAgenda = new TrainerSubAgenda;
        // $TrainerSubAgenda->TrainerAgendaId = $TrainerAgendaId;
        // $TrainerSubAgenda->SubAgendaNameEn = $TopicName;
        // $TrainerSubAgenda->SubAgendaNameAr = $TopicName;
        // $TrainerSubAgenda->save();
        //-- Round sub content
        $SubContent = new \App\RoundSubContents;
        $SubContent->RoundContentId = $RoundContentId;
        $SubContent->SubContentNameEn = $TopicName;
        // $SubContent->TrainerSubAgendaId = $TrainerSubAgenda->TrainerSubAgendaId;
        $SubContent->save();

        return Redirect::to("/Trainer/Course/$id/DoneTopics");
    }

    //
    // Append example
    //
    public function AddExample(Request $request ,int $id)
    {
        $SubContent = RoundSubContents::find($request->SubContentId);
        $SubContent->Example = $request->Example;
        $SubContent->save();
        // $SubAgenda = TrainerSubAgenda::find($SubContent->TrainerSubAgendaId);
        // $SubAgenda->Example = $request->Example;
        // $SubAgenda->save();

        return Redirect::to("/Trainer/Course/$id/DoneTopics");
    }

    //
    // Append Task
    //
    public function AddTask(Request $request ,int $id)
    {
        $SubContent = RoundSubContents::find($request->SubContentId);
        $SubContent->Task = $request->Task;
        $SubContent->save();
        // $SubAgenda = TrainerSubAgenda::find($SubContent->TrainerSubAgendaId);
        // $SubAgenda->Task = $request->Task;
        // $SubAgenda->save();

        return Redirect::to("/Trainer/Course/$id/DoneTopics");
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

        return Redirect::to("/Trainer/Course/$id/DoneTopics");
    }

    //
    //
    //
    public function DeleteSubContent(int $RoundSubContentsId,int $RoundId)
    {
        $SubContent = RoundSubContents::find($RoundSubContentsId);
        // $SubAgenda = TrainerSubAgenda::find($TrainerSubAgendaId);
        $SubContent->delete();
        // $SubAgenda->delete();

        return Redirect::to("/Trainer/Course/$RoundId/DoneTopics");
    }

    //
    // Course > Student details
    //
    public function StudentDetails(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $StudentRound = StudentRounds::find($id);
        $Student = Students::find($StudentRound->StudentId);
        $AttendanceStatement = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([
            ['StudentRoundsId','=',$id],
            ['RoundId','=',$StudentRound->RoundId]
        ])->orderBy('sessions.SessionId');
        $Attendance = $AttendanceStatement->get();
        //$IsAttend = $
        $Run = $AttendanceStatement->where([['IsDone','=',1],
        ['IsCancelled','=',null]])->count();

        $NotAttend = $AttendanceStatement->where([['IsAttend','=',0],
        ['IsCancelled','=',null]])->count();
        $IsAttend = DB::table("attendance")
        ->join('sessions','sessions.SessionId','=','attendance.SessionId')
        ->where([
            ['StudentRoundsId','=',$id],
            ['RoundId','=',$StudentRound->RoundId],
            ['IsCancelled','=',null]
        ])
        ->where('IsAttend','=',1)->count();
        $Count = $Attendance
        ->count();
        $CountCancelled = $Attendance
        ->where('IsCancelled','=',1)
        ->count();
        $Course = Rounds::where('RoundId','=',$StudentRound->RoundId)->first();
        $CourseId = $Course->CourseId;
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


        return View('Trainer.student-details',[
            'TrainerRounds'=>$TrainerRounds,
            'HistoryRounds'=>$HistoryRounds,
            'Attendance'=>$Attendance,
            'IsAttend'=>$IsAttend,
            'NotAttend'=>$NotAttend,
            'Count'=>$Count,
            'Run'=>$Run,
            'Student'=>$Student,
            'Grades'=>$Grades,
            'RoundId'=>$StudentRound->RoundId,
            // 'Exams'=>$Exams,
            'ExamGrades'=>$ExamGrades,
            'StudentRound'=>$StudentRound,
            'StudentEvaluations'=>$StudentEvaluations,
            'ActiveRounds'=>AdminController::ActiveRounds(),
            'Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),
            'CountCancelled'=>$CountCancelled,
            ]);
    }

    //
    //  test
    //
    public function test(Request $request)
    {
        if($request->ajax()){
            if($request->Status == 'update'){
                $grade = Grades::find($request->GradeId);
                
                

                $task = DB::table('grades')
                ->join('tasks','tasks.TaskId','=','grades.TaskId')
                ->join('studentrounds','studentrounds.StudentRoundsId','=','tasks.StudentRoundId')
                ->join('students','students.StudentId','=','studentrounds.StudentId')
                ->where('GradeId','=',$request->GradeId)->first();
if($grade->QuizGrade == $request->QuizVal && $grade->TaskGrade == $request->TaskGrade){

    
}else{
    if($request->QuizVal !== null || $request->TaskGrade !== null){
        $Notification = new Notifications();
       $Notification->Notification = "Your result in your task has been released";
$Notification->NotificationLink = "/Student/Attendance/$task->StudentRoundId";
$Notification->ForId = $task->StudentId;
$Notification->ForType = "Student";
$Notification->save();
    
}
}

               $grade->TaskId = $request->id;
               $grade->QuizGrade=$request->QuizVal;
               $grade->TaskGrade=$request->TaskGrade;
                $grade->save();
                
            }
            // else{
            //     $grade = new Grades();
            // $grade->StudentRoundId=$request->StudentRound;
            // $grade->SessionId=$request->Session;
            // $grade->QuizGrade=$request->QuizVal;
            // $grade->TaskGrade=$request->TaskGrade;
            // $grade->save();

            // $task = Tasks::find($request->GradeId);
            // $task->IsGrade =1;
            // $task->save();

            // }


            return $request->TaskGrade;
        }
    }

    //
    // ajax percentage attendance
    //
    public function PercentageAttendance(Request $request)
    {
        if(request()->ajax()){
            $StudentRoundId = $request->StudentRoundsId;
            $all = DB::table('attendance')
            ->join('sessions','sessions.sessionId','=','attendance.sessionId')
            ->where([['StudentRoundsId','=',$StudentRoundId],['IsAttend','<>',null]
            ,['IsCancelled','=',null]
            ])->count();
            $attend = DB::table('attendance')
            ->join('sessions','sessions.sessionId','=','attendance.sessionId')->where([
                ['StudentRoundsId','=',$StudentRoundId],
                ['IsAttend','=',1],['IsCancelled','=',null]
            ])->count();
            if($all !== 0){
$percentage = ($attend/$all)*100;
            }else{
                $percentage = 0;
            }

            $dataPercentage = StudentEvaluations::where('StudentRoundId','=',$StudentRoundId)
            ->selectRaw('count(TimeRespect) as RowCount,sum(TimeRespect) as TimeRespect, sum(Lecture_Practice) as Lecture_Practice,sum(Solve_Home_Tasks) as Solve_Home_Tasks, sum(Student_Interaction) as Student_Interaction, sum(Student_Attitude) as Student_Attitude, sum(Student_Focus) as Student_Focus , sum(Understand_Speed) as Understand_Speed')
            ->first();
            // return "abdalla";
            // return count($dataPercentage);

if($dataPercentage){

               if($dataPercentage->RowCount > 0){
                $TimeRespect = ($dataPercentage->TimeRespect/$dataPercentage->RowCount);
                $Lecture_Practice = ($dataPercentage->Lecture_Practice/$dataPercentage->RowCount);
                $Solve_Home_Tasks = ($dataPercentage->Solve_Home_Tasks/$dataPercentage->RowCount);
                $Student_Interaction = ($dataPercentage->Student_Interaction/$dataPercentage->RowCount);
                $Student_Attitude = ($dataPercentage->Student_Attitude/$dataPercentage->RowCount);
                $Student_Focus = ($dataPercentage->Student_Focus/$dataPercentage->RowCount);
                $Understand_Speed = ($dataPercentage->Understand_Speed/$dataPercentage->RowCount);
    
                if (!$TimeRespect) {
                    $TimeRespect = 0;
                }
                if (!$Lecture_Practice) {
                    $Lecture_Practice = 0;
                }
                if (!$Solve_Home_Tasks) {
                    $Solve_Home_Tasks = 0;
                }
                if (!$Student_Interaction) {
                    $Student_Interaction = 0;
                }
                if (!$Student_Attitude) {
                    $Student_Attitude = 0;
                }
                if (!$Student_Focus) {
                    $Student_Focus = 0;
                }
                if (!$Understand_Speed) {
                    $Understand_Speed = 0;
                }
    
                $TimeRespect = ($dataPercentage->TimeRespect/$dataPercentage->RowCount);
                $Lecture_Practice = ($dataPercentage->Lecture_Practice/$dataPercentage->RowCount);
                $Solve_Home_Tasks = ($dataPercentage->Solve_Home_Tasks/$dataPercentage->RowCount);
                $Student_Interaction = ($dataPercentage->Student_Interaction/$dataPercentage->RowCount);
                $Student_Attitude = ($dataPercentage->Student_Attitude/$dataPercentage->RowCount);
                $Student_Focus = ($dataPercentage->Student_Focus/$dataPercentage->RowCount);
                $Understand_Speed = ($dataPercentage->Understand_Speed/$dataPercentage->RowCount);
             
            }else{
                $dataPercentage->TimeRespect = 0;
                $dataPercentage->Lecture_Practice = 0;
                 $dataPercentage->Solve_Home_Tasks = 0;
                $dataPercentage->Student_Interaction = 0;
                 $dataPercentage->Student_Attitude = 0;
                $dataPercentage->Student_Focus = 0;
                $dataPercentage->Understand_Speed = 0;
                $TimeRespect = ($dataPercentage->TimeRespect);
                $Lecture_Practice = ($dataPercentage->Lecture_Practice);
                $Solve_Home_Tasks = ($dataPercentage->Solve_Home_Tasks);
                $Student_Interaction = ($dataPercentage->Student_Interaction);
                $Student_Attitude = ($dataPercentage->Student_Attitude);
                $Student_Focus = ($dataPercentage->Student_Focus);
                $Understand_Speed = ($dataPercentage->Understand_Speed);


            }

            // return $dataPercentage;
        }
               $data = [
                    'percentage'=>$percentage,
                    'TimeRespect'=>$TimeRespect,
                    'Lecture_Practice'=>$Lecture_Practice,
                    'Solve_Home_Tasks'=>$Solve_Home_Tasks,
                    'Student_Interaction'=>$Student_Interaction,
                    'Student_Attitude'=>$Student_Attitude,
                    'Student_Focus'=>$Student_Focus,
                    'Understand_Speed'=>$Understand_Speed,
                    
                ];
    
                return $data;
            
        }
    }

    //
    // student details > exam grade table mapping with (ajax)
    //
    public function ExamGrade(Request $request)
    {
        if(request()->ajax()){

            $ExamGradesId = $request->ExamGradesId;
            $Evaluation = $request->Evaluation;
            $ExamGrade = ExamGrades::find($ExamGradesId);
            $GradeSt = DB::table('examgrades')
            ->join('studentrounds','studentrounds.StudentRoundsId','=','examgrades.StudentRoundId')
            ->join('students','students.StudentId','=','studentrounds.StudentId')
            ->join('exams','exams.ExamId','=','examgrades.ExamId')
            ->where('ExamGradesId','=',$request->ExamGradesId)->first();

        if($ExamGrade->Grade == $request->Grade && $ExamGrade->Evaluation == $request->Evaluation){

    
        }else{
            if($request->Grade !== null || $request->Evaluation !== null){
                $Notification = new Notifications();
                $Notification->Notification = "Your result in ($GradeSt->ExamNameEn) exam has been released";
                $Notification->NotificationLink = "/Student/Attendance/$GradeSt->StudentRoundId";
                $Notification->ForId = $GradeSt->StudentId;
                $Notification->ForType = "Student";
                $Notification->save();
            
        }
        }
            $ExamGrade->Grade = $request->Grade;
            $ExamGrade->Evaluation = $Evaluation;
            $ExamGrade->IsDone = 1;
            $ExamGrade->save();



        }
    }

    //
    // Trainer >  center evaluation
    //
    public function CenterEvaluation(int $id)
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $TrainerRound= TrainerRounds::where([
            ['RoundId','=',$id],['TrainerId','=',session('Id')]
        ])->first();
        $CenterEvaluations = DB::table('centerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','centerevaluations.RoundContentId')
        ->where([
            ['RoundId','=',$id],
            ['PersonType','=',session('role')],
            ['PersonId','=',$TrainerRound->TrainerRoundsId]
        ])->get();

        // return $CenterEvaluations;

        return View('Trainer.trainer-center',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'RoundContent'=>$CenterEvaluations]);
    }

    //
    // Trainer > Profile > Edit Profile
    //
    public function EditProfile()
    {
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        $Trainer = Trainers::where('TrainerId','=',session()->get('Id'))->first();

        return View('Trainer.edit-profile',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,'Trainer'=>$Trainer]);
    }

    //
    // Trainer > Edit Profile method(post)
    //
    public function EditProfileContent(Request $request)
    {
        $Trainer = Trainers::find(session('Id'));
        $Trainer->FullnameEn = $request->FullnameEn;
        $Trainer->FullnameAr = $request->FullnameEn;
        $Trainer->Email = $request->Email;
        $Trainer->Password = $request->Password;
        $Trainer->Birthdate = $request->Birthdate;
        $Trainer->Phone = $request->Phone;
        $Trainer->JoinDate = $request->JoinDate;
        $Trainer->Job = $request->Job;
        $Trainer->Company = $request->Company;
        $Trainer->ExternalCourses = $request->ExternalCourses;
        $Trainer->AdditionalNotes = $request->AdditionalNotes;
        $Trainer->save();

        return Redirect::to("/Trainer/Profile");

    }

    //
    // Center Eval
    //
    public function CenterEval(Request $request)
    {
        if(request()->ajax()){
            $content = $request->content;
            $center = $request->center;
            $pcValue = $request->pcValue;
            $projValue = $request->projValue;
            $airValue = $request->airValue;
            $seatsValue = $request->seatsValue;
            $cleanValue = $request->cleanValue;
            $capacityValue = $request->capacityValue;
            $overallValue = $request->overallValue;
            if($pcValue !== null || 
            $projValue !== null || 
            $airValue !== null ||
            $seatsValue !== null ||
            $cleanValue !== null ||
            $capacityValue !== null){
                            $CenterEvaluation = CenterEvaluations::find($center);
            $CenterEvaluation->PCs_Quality = $pcValue;
            $CenterEvaluation->Projectors_Quality = $projValue;
            $CenterEvaluation->Air_Conditioners = $airValue;
            $CenterEvaluation->Seats_Quality = $seatsValue;
            $CenterEvaluation->Lab_Cleaning = $cleanValue;
            $CenterEvaluation->Lab_Capacity = $capacityValue;
            $CenterEvaluation->Overall_Evaluation = $overallValue;
            $CenterEvaluation->Notes = $request->notes;
            $CenterEvaluation->IsDone = 1;
            $CenterEvaluation->save();
            }


            // return 'Success';

        }
    }

    //
    // Attendance and Evaluations
    //
    public function AttendanceEvaluations(int $id)
    {
        $TrainerRounds = TrainerRounds::where([
            ['TrainerId','=',session('Id')],
            ['RoundId','=',$id]
        ])->first();
        $TrainerEvaluations = DB::table('trainerevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','trainerevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1],['TrainerRoundsId','=',$TrainerRounds->TrainerRoundsId]])
        ->groupBy('ContentNameEn')
        ->selectRaw('count(TrainerEvaluationsId) as EvalCount, sum(Knowledge_Experience) as Knowledge_Experience, sum(Training_Qualified) as Training_Qualified,sum(Topics_Preparation) as Topics_Preparation,sum(Trainer_Attitude) as Trainer_Attitude,sum(Time_Respect) as Time_Respect,sum(Student_Interaction) as Student_Interaction,sum(Overall_Evaluation) as Overall_Evaluation,ContentNameEn')
        ->get();

        $TrainerEvalCount = $TrainerEvaluations->count();


        $RoundEvaluations = DB::table('roundevaluations')
        ->join('roundcontent','roundcontent.RoundContentId','=','roundevaluations.RoundContentId')
        ->where([['RoundId','=',$id],['IsDone','=',1],['TrainerRoundsId','=',$TrainerRounds->TrainerRoundsId]])
        ->groupBy('ContentNameEn')
        ->selectRaw(' ContentNameEn, count(RoundEvaluationId) as EvalCount, max(Course_Wealthy) as Course_Wealthy , max(Enough_Hours) as Enough_Hours, max(Enough_Practice) as Enough_Practice , max(Materials_Evaluation) as Materials_Evaluation ,max(Suitable_Price) as Suitable_Price , max(Overall_Education) as Overall_Education')
        ->get();
        $RoundEvalCount = $RoundEvaluations->count();
        // return $RoundEvaluations[0]->Enough_Hours/$RoundEvalCount;
        $TrainerRounds = TrainerController::TrainerRounds();
        $HistoryRounds = TrainerController::HistoryRounds();
        return View('Trainer.Attendence-Evaluations',[
            'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds,
            'TrainerEvaluations'=>$TrainerEvaluations,
            'RoundEvaluations'=>$RoundEvaluations,
            'TrainerEvalCount'=>$TrainerEvalCount,
            'RoundEvalCount'=>$RoundEvalCount,
            'RoundId'=>$id,
            'Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications()
        ]);
    }

    //
    //
    //
    //------- chatting (Vue) -------
    //
    //
    //

    //
    // chatting function
    //
    public function chat()
    {
        $TrainerRounds = TrainerController::TrainerRounds();

        $HistoryRounds = TrainerController::HistoryRounds();

        return View('Trainer.chat',['Notifications'=>TrainerController::Notifications(),'CountNotifications'=>TrainerController::CountNotifications(),'TrainerRounds'=>$TrainerRounds,'HistoryRounds'=>$HistoryRounds]);
    }

    //
    // chat users
    //
    public function chatusers()
    {
        $Trainers1 = DB::table('trainers')
        ->join('conversations','conversations.User_one','=','trainers.TrainerId')
        ->where([
            ['conversations.User_two','=',session('Id')],
            ['conversations.Role_one','=',session('role')],
            ['conversations.Role_two','=',session('role')]
        ])
        ->get();

        $Trainers2 = DB::table('trainers')
        ->join('conversations','conversations.User_two','=','trainers.TrainerId')
        ->where([
            ['conversations.User_one','=',session('Id')],
            ['conversations.Role_one','=',session('role')],
            ['conversations.Role_two','=',session('role')]
        ])
        ->get();

        return array_merge($Trainers1->toArray(),$Trainers2->toArray());
    }

    //
    // chat user (specific)
    //
    public function chatuser(int $id)
    {
        $Messages1 =  DB::table('messages')
        ->join('trainers','trainers.TrainerId','=','messages.User_from')
        ->where([['messages.User_from','=',$id],
        ['messages.User_to','=',session('Id')]
        ])->get();
        $Messages2 =  DB::table('Messages')
        ->join('trainers','trainers.TrainerId','=','messages.User_from')
        ->where([['messages.User_to','=',$id],
        ['messages.User_from','=',session('Id')]])->get();
        $Messages = array_merge($Messages1->toArray(),$Messages2->toArray());

        return $Messages;
    }

    //
    // Send Message
    //
    public function sendMessage(Request $request)
    {
        $Receiver = $request->Receiver;
        $Sender = session('Id');
        $Message = $request->Message;

        //check for any conversations
        $Checkfrom = DB::table('conversations')
        ->where([['User_one','=',$Receiver],
        ['User_two','=',$Sender]
        ])->get();
        $Checkto = DB::table('conversations')
        ->where([['User_two','=',$Receiver],
        ['User_one','=',$Sender]])->get();
        $CheckCon = array_merge($Checkfrom->toArray(),$Checkto->toArray());

        if(count($CheckCon)!=0){
            $ConId = $CheckCon[0]->ConversationId;

            //Send Message
        $Msg = new Messages();
        $Msg->User_to = $Receiver;
        $Msg->User_from = session('Id');
        $Msg->ConversationId = $ConId;
        $Msg->Message = $Message;
        $Msg->status = 1;
        $sendMessage = $Msg->save();
        if($sendMessage){
            $Messages =  DB::table('messages')
        ->join('trainers','trainers.TrainerId','=','messages.User_from')
        ->where('messages.ConversationId','=',$ConId)->get();
        $Trainer = Trainers::find(session('Id'));
        event(new ChatEvent($request->Message,$Trainer,$Receiver));
        return $Messages;
        }

        }else{
            //create conversation
            $ConId = DB::table('conversations')->insertGetId([
                'User_one' => $Sender,
                'User_two' => $Receiver,
                'Role_one' => session('role')
            ]);

            //return $ConId;

            //Send Message
        $Msg = new Messages();
        $Msg->User_to = $Receiver;
        $Msg->User_from = session('Id');
        $Msg->ConversationId = $ConId;
        $Msg->Message = $Message;
        $Msg->status = 1;
        $sendMessage = $Msg->save();
        if($sendMessage){
            $Messages =  DB::table('messages')
        ->join('trainers','trainers.TrainerId','=','messages.User_from')
        ->where('messages.ConversationId','=',$ConId)->get();
        return $Messages;
        }

        }

    }

    //
    // All users
    //
    public function AllUsers()
    {
        $Trainers = Trainers::where('TrainerId','!=',session('Id'))->get();
        return $Trainers;
    }


    //
    // get messages
    //
    public function getMsg(Request $request)
    {
        $Receiver = $request->Receiver;
        $Sender = session('Id');
        //check for any conversations
        $Checkfrom = DB::table('conversations')
        ->where([['User_one','=',$Receiver],
        ['User_two','=',$Sender]
        ])->get();
        $Checkto = DB::table('conversations')
        ->where([['User_two','=',$Receiver],
        ['User_one','=',$Sender]])->get();
        $CheckCon = array_merge($Checkfrom->toArray(),$Checkto->toArray());


            //$ConId = $CheckCon[0]->ConversationId;

            $Messages =  DB::table('messages')
        ->join('trainers','trainers.TrainerId','=','messages.User_from')
        ->where('messages.ConversationId','=',1)->get();
        return $Messages;
    }
    public function StudentEvaluation(Request $request)
    {
        if(request()->ajax()){
            $StudentEvaluation = StudentEvaluations::find($request->StudentEvaluationId);
            
            
            $Student = DB::table('studentrounds')
            ->join('students','students.StudentId','=','studentrounds.StudentId')
            ->where('StudentRoundsId','=',$StudentEvaluation->StudentRoundId)->first();
            if($request->Overall == null || $StudentEvaluation->Overall == $request->Overall){
            }else{
                $Notification = new Notifications();
                
                if($StudentEvaluation->Overall > 75){
                        $Notification->Notification = "Your effort were Stunning, New evaluation has been added check it";
                }elseif($StudentEvaluation->Overall > 50){
                        $Notification->Notification = "Nice effort, New evaluation has been added check it";
                }else{
                        $Notification->Notification = "New evaluation has been added check it";
                }
              
            
                    $Notification->NotificationLink = "/Student/Attendance/$StudentEvaluation->StudentRoundId";
                    $Notification->ForId = $Student->StudentId;
                    $Notification->ForType = "Student";
                    $Notification->save();

            }
            $StudentEvaluation->TimeRespect = $request->TimeRespect;
            $StudentEvaluation->Lecture_Practice = $request->LecturePractise;
            $StudentEvaluation->Solve_Home_Tasks = $request->SolveHomeTasks;
            $StudentEvaluation->Student_Interaction = $request->StudentInteractions;
            $StudentEvaluation->Student_Attitude = $request->StudentAttitude;
            $StudentEvaluation->Student_Focus = $request->StudentFocus;
            $StudentEvaluation->Understand_Speed = $request->UnderstandSpeed;
            $StudentEvaluation->Exam_Marks = $request->ExtraMarks;
            $StudentEvaluation->Overall = $request->Overall;
            $StudentEvaluation->IsDone = 1;
            //$StudentEvaluation->EvaluationDate = date('m-d-Y');
            $StudentEvaluation->Notes = $request->Notes;
        $StudentEvaluation->save();

            return 'success';
        }
    }


    public function UploadTask(Request $request)
    {
        if($request->hasFile('task')){
            $filename = $request->task->store('/public/uploads',['disk' => 'public']);
            //$request->ImagePath->storeAs('/public/uploads',$filename);
            $TaskId = $request->TaskId;
            // $round = $request->round;
            $StudentRoundId = $request->id;

            //storing task
            // $Task = Tasks::where([
            //     ['StudentRoundId','=',$StudentRoundId],
            //     ['SessionId','=',$Session]
            // ])->first();
            $Task = Tasks::find($TaskId);
            $Task->TaskURL = $filename;
            $Task->IsGrade = 1;
            $Task->save();
            // return $Task;
            
            


            $StudentRound = StudentRounds::find($StudentRoundId);
            $Student = Students::find($StudentRound->StudentId);
            $Round = Rounds::find($StudentRound->RoundId);
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
           return Redirect::to("/Course/Student/Details/$StudentRoundId");
           
        }
    }

}
