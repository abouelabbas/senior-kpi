<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Courses;
use App\Rounds;
use App\Sessions;
use App\StudentRounds;
use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function Report(int $id)
    {
        $StudentRound = StudentRounds::find($id);
        $Student = Students::find($StudentRound->StudentId);
        $Round = Rounds::find($StudentRound->RoundId);
        $Course = Courses::find($Round->CourseId);
        $AttendanceState = DB::table("attendance")
        ->join("sessions", 'sessions.SessionId', '=', 'attendance.SessionId')
        ->where([["StudentRoundsId", '=' , $id]]);
        $Attendance = $AttendanceState->get();
        $Attended = $AttendanceState->where([["IsAttend",'!=',0], ["IsAttend", '!=', null]])->count();
        // $Attendance = $Attendance->get();
        $Tasks = DB::table("tasks")
        ->leftJoin("grades", "grades.TaskId", "=", "tasks.TaskId")
        ->leftJoin("sessions", "sessions.SessionId", "=", "tasks.SessionId")
        ->where("tasks.StudentRoundId", "=", $id);
        $SubmittedTasks = $Tasks->where("TaskURL", "!=", null)->count();
        $Tasks = $Tasks->where('SessionTask','!=', null)
        ->get();
        $FirstName = explode(" ",$Student->FullnameEn)[0];
        $SessionsCount = Sessions::where([["RoundId", "=", $Round->RoundId],["IsDone",'=', 1],["IsCancelled",'=',null]])->count();

        $SessionWithoutTask = Sessions::where([
            ['RoundId', '=', $StudentRound->RoundId],
            ['HasTask', '=', 0]
        ])->count();

        $Grades = DB::table("grades")
            ->join('tasks', 'tasks.TaskId', '=', 'grades.TaskId')
            ->join('sessions', 'sessions.SessionId', '=', 'tasks.SessionId')
            ->where([
                ['tasks.StudentRoundId', '=', $id],
                ['RoundId', '=', $StudentRound->RoundId],
                ['HasTask', '=', 1]
                // ['SessionTask', '!=', null]
            ])->get();

        $ExamGrades = DB::table('examgrades')
            ->join('exams', 'exams.ExamId', '=', 'examgrades.ExamId')
            ->where('StudentRoundId', '=', $id)->get();

        return view('General.report',
    [
        'StudentRound' => $StudentRound,
        'Student' => $Student,
        'Round' => $Round,
        'Course' => $Course,
        'Attendance' => $Attendance,
        'Tasks' => $Tasks,
        'FirstName' => $FirstName,
        'SessionsCount' => $SessionsCount,
        'SubmittedTasks' => $SubmittedTasks,
        'SessionWithoutTask' => $SessionWithoutTask,
        'Attended' => $Attended,
        'Grades' => $Grades,
        'ExamGrades' => $ExamGrades
    ]);
    }
}
