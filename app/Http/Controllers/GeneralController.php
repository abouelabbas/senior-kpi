<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Courses;
use App\Rounds;
use App\Sessions;
use App\StudentRounds;
use App\Students;
use App\Tasks;
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
        $Attendance = $AttendanceState
        ->where([
            ["IsDone", '=', 1],
            ["IsCancelled", '=', null]
        ])
        ->get();
        $Run = $AttendanceState->where([['IsDone', '=', 1], ['IsCancelled', '=', null]])->count();

        $Attended = $AttendanceState->where([
            ["IsAttend",'!=',0], 
            ["IsAttend", '!=', null],
        ])->count();
        // $Attendance = $Attendance->get();
        $TasksState = DB::table("tasks")
        ->leftJoin("grades", "grades.TaskId", "=", "tasks.TaskId")
        ->leftJoin("sessions", "sessions.SessionId", "=", "tasks.SessionId")
        ->where("tasks.StudentRoundId", "=", $id);
        $Tasks = $TasksState->where([['SessionTask','!=', null],
            ["IsDone", '=', 1],
            ["IsCancelled", '=', null]])
        ->get();
        $SubmittedTasks = $Tasks->where("TaskURL", "!=", null)->count();
        $FirstName = explode(" ",$Student->FullnameEn)[0];
        $SessionsCount = Sessions::where([["RoundId", "=", $Round->RoundId],["IsDone",'=', 1],["IsCancelled",'=',null]])->count();

        $SessionWithoutTask = Sessions::where([
            ['RoundId', '=', $StudentRound->RoundId],
            ['HasTask', '=', 0]
        ])->count();

        $Grades = DB::table("tasks")
            ->leftJoin('grades', 'tasks.TaskId', '=', 'grades.TaskId')
            ->leftJoin('sessions', 'sessions.SessionId', '=', 'tasks.SessionId')
            ->where([
                ['StudentRoundId', '=', $id],
                // ['RoundId', '=', $StudentRound->RoundId],
                ['HasTask', '=', 1],
                ['IsDone', '=', 1],
                ['IsCancelled', '=', null],
                ['SessionTask', '!=', null]
            ])->get();

        $ExamGrades = DB::table('examgrades')
            ->join('exams', 'exams.ExamId', '=', 'examgrades.ExamId')
            ->where('StudentRoundId', '=', $id)->get();
        $SolvedTasks = Tasks::where([
            ['StudentRoundId', '=', $id],
            ['TaskURL', '!=', null]
        ])->count();

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
        'ExamGrades' => $ExamGrades,
        'Run' => $Run,
        'SolvedTasks' => $SolvedTasks
    ]);
    }
}
