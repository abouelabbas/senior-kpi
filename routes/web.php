<?php
use Illuminate\Support\Facades\Route;
use Pusher\Pusher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/Admin');
});


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});
// Route::post('/broadcast',function(Request $request){
//     $pusher = new Pusher(env('PUSHER_APP_KEY'),env('PUSHER_APP_SECRET'),env('PUSHER_APP_ID'));
//     return $pusher->socket_auth($request->request->get('channel_name'),$request->request->get('socket_id'));
// });
// GET Routes
//--------
//Login Routes
Route::get('/login','AuthenticationController@Login');
Route::get('/Login','AuthenticationController@Login');
Route::get('/Logout','AuthenticationController@logout');


Route::get('/Student/Report/{id}','GeneralController@Report');
//--------
//Admin Routes
Route::get('/Admin','AdminController@Index');
Route::get('/Admin/Rounds/Session/{id}/Ignore', 'AdminController@ignoreSessionAlert');
Route::get('/Admin/Rounds/Session/{id}/IgnoreMaterial', 'AdminController@ignoreMaterialSessionAlert');
Route::get('/Admin/Rounds/Session/{id}/IgnoreTask', 'AdminController@ignoreTaskSessionAlert');
Route::get('/Admin/Rounds/Session/{id}/IgnoreQuiz', 'AdminController@ignoreQuizSessionAlert');
Route::get('/Admin/Rounds/Session/{id}/IgnoreVideo', 'AdminController@ignoreVideoSessionAlert');
Route::get('/Admin/Rounds/Session/{id}/IgnoreAttendance','AdminController@ignoreAttendanceSessionAlert');
Route::get('/Admin/Profile/{id}','AdminController@AdminProfile');
Route::get('/Admin/Profile/Edit/{id}','AdminController@AdminProfileEdit');
Route::get('/Admin/Courses','AdminController@Courses');
Route::get('/Admin/Courses/Edit/{id}','AdminController@EditCourse');
Route::get('/Admin/Courses/CourseDetails/{id}','AdminController@CourseDetails');
Route::get('/Admin/Courses/{cid}/Topics/{id}', 'AdminController@CourseTopics');
Route::get('/Admin/Courses/{cid}/Exams/{id}', 'AdminController@CourseExams');
Route::get('/Admin/Course/{id}/Round/Exams', 'AdminController@RoundExams');
Route::get('/Trainer/Course/{id}/Round/Exams', 'TrainerController@RoundExams');
Route::get('/Admin/{rid}/Exams/{id}/Grades', 'AdminController@StudentRoundExams');
Route::get('/Trainer/{rid}/Exams/{id}/Grades', 'TrainerController@StudentRoundExams');
Route::post('/Admin/Courses/{cid}/Topics/Sheet/{id}','AdminController@CourseTopicsFromSheet');
Route::get('/Admin/Courses/Topic/Sub/{sid}/{cid}/{id}','AdminController@deleteSubAgenda');
Route::get('/Admin/Courses/Topics/FetchSubAgenda','AdminController@FetchSubAgenda');
Route::get('/Admin/Trainers','AdminController@Trainers');
Route::get('/Admin/Trainers/Profile/{id}','AdminController@TrainerProfile');
Route::get('/Admin/Trainers/Details/{id}','AdminController@TrainerDetails');
Route::get('/Admin/Trainers/EditProfile/{id}','AdminController@EditTrainerProfile');
Route::get('/Admin/Labs','AdminController@Labs');
Route::get('/Admin/Labs/Edit/{id}','AdminController@EditLab');
Route::get('/Admin/Labs/Details/{id}','AdminController@LabDetails');
Route::get('/Admin/Branches','AdminController@Branches');
Route::get('/Admin/Branches/Edit/{id}','AdminController@EditBranch');
Route::get('/Admin/Branches/Details/{id}','AdminController@BranchDetails');
Route::get('/Admin/Rounds','AdminController@Rounds');
Route::get('/Admin/Rounds/Add','AdminController@AddRound');
Route::get('/Admin/Rounds/Edit','AdminController@EditRoundData');
Route::get('/Admin/Rounds/Edit/{id}','AdminController@EditRound');
Route::get('/Admin/Exams/{id}/Delete','AdminController@DeleteExam');
Route::post('/Admin/Rounds/{id}/Upload','AdminController@UploadStudents');
Route::get('/Admin/Rounds/Details/{id}','AdminController@RoundDetails');
Route::get('/Admin/Rounds/FetchTrainers','AdminController@FetchTrainers');
Route::get('/Admin/Rounds/FetchStudents','AdminController@FetchStudents');
Route::get('/Admin/Rounds/{rid}/AddStudent/{sid}','AdminController@AddStudentToRound');
Route::get('/Admin/Rounds/{id}/Attendance','AdminController@Attendance');
Route::get('/Admin/Rounds/{id}/StopRound','AdminController@StopRound');
Route::get('/Admin/Rounds/Session/{id}/Attendance','AdminController@SessionAttendance');
Route::get('/Admin/Students','AdminController@Students');
Route::get('/Admin/Students/Edit/{id}','AdminController@EditStudent');
Route::get('/Admin/Students/Details/{id}','AdminController@StudentData');
Route::get('/Admin/Students/Delete/{id}','AdminController@DeleteStudent');
Route::get('/Admin/Students/Profile/{id}','AdminController@StudentProfile');
Route::get('/Admin/Session/Submit/Attendance','AdminController@SubmitAttendance');
Route::get('/Admin/Session/Cancel/{id}','AdminController@CancelSession');
Route::get('/Admin/Session/{id}/AllAttend','AdminController@AttendAll');
Route::get('/Admin/Session/{id}/Attendance/Reset', 'AdminController@ResetAttendance');
Route::get('/Admin/Session/{id}/Attendance/Skip','AdminController@SkipAttendance');
Route::get('/Admin/Session/Cancel/{id}/Undo','AdminController@UndoCancelSession');
Route::get('/Admin/Course/Student/CancelRegisteration/{id}','AdminController@CancelStudentRegisteration');
Route::get('/Admin/Course/Student/CancelRegisteration/Confirm/{id}','AdminController@ConfirmCancelStudentRegisteration');
Route::get('/session/task/students/{id}','AdminController@TaskProgress');
Route::get('Admin/Session/Practice/Students/{id}','AdminController@PracticeProgress');
Route::get('Trainer/Session/Practice/Students/{id}', 'TrainerController@PracticeProgress');


//Admin-POST Routes
Route::post('/Admin/Profile/Edit','AdminController@AdminProfileEditSubmit');
Route::post('/Admin/AddCourse','AdminController@AddCourse');
Route::post('/Admin/Exams/Grade/Submit','AdminController@ExamMarks');
Route::post('/Trainer/Exams/Grade/Submit', 'TrainerController@ExamMarks');
Route::post('/Admin/CoursePostEdit','AdminController@CoursePostEdit');
Route::post('/Admin/Courses/Add/Trainer','AdminController@AddCourseTrainers');
Route::post('/Admin/DeleteCourse','AdminController@DeleteCourse');
Route::post('/Admin/Courses/Topics/Track/Add','AdminController@AddTrack');
Route::post('/Admin/Courses/Topics/Topic/Add','AdminController@AddTopic');
Route::post('/Admin/Courses/Topics/Example/Add','AdminController@AddExample');
Route::post('/Admin/Courses/Topics/Task/Add','AdminController@AddTask');
Route::post('/Admin/Courses/Topics/Edit','AdminController@EditTopic');
Route::post('/Admin/Trainers/EditProfile','AdminController@SubmitTrainerProfileEdit');
Route::post('/Admin/Trainers/Add','AdminController@AddTrainer');
Route::post('/Admin/Trainers/Delete','AdminController@DeleteTrainer');
Route::post('/Admin/Trainers/ResetPassword','AdminController@ResetPassword');
Route::post('/Admin/Trainer/AddTrainerToCourse','AdminController@AddTrainerToCourse');
Route::post('/Admin/Trainer/AddExam','AdminController@AddExam');
Route::post('/Admin/Trainer/EditExam','AdminController@EditExam');
Route::post('/Admin/Labs/Add','AdminController@AddLab');
Route::post('/Admin/Labs/Edit','AdminController@EdtLabData');
Route::post('/Admin/Labs/Delete','AdminController@DeleteLab');
Route::post('/Admin/Branches/Add','AdminController@AddBranch');
Route::post('/Admin/Branches/Edit','AdminController@EdtBranchData');
Route::post('/Admin/Branches/Delete','AdminController@DeleteBranch');
Route::post('/Admin/Rounds/AddTrainer','AdminController@AddTrainerToRound');
Route::post('/Admin/Rounds/Sessions/Add','AdminController@AddSession');
Route::post('/Admin/Students/Add','AdminController@AddStudent');
Route::post('/Admin/Students/Edit','AdminController@EditStudentData');
Route::post('/Admin/Students/ResetPassword','AdminController@StudentResetPassword');



//Student Routes
Route::get('/Student','StudentController@Index');
Route::get('/Student/Course/{id}', 'StudentController@CourseProgress');
Route::post('/Student/ExtraTask/Submission', 'StudentController@ExtraTaskSubmission');
Route::get('/Student/Course/{sid}/ExtraTasks/{id}', 'StudentController@CourseExtraTasks');
Route::get('/Student/Extra/{id}','StudentController@ExtraContent');
Route::get('/Student/Attendance/{id}','StudentController@AttendanceEvaluation');
Route::get('/Student/Profile','StudentController@Profile');
Route::get('/Student/Profile/Edit','StudentController@EditProfile');
Route::get('/Student/TrainerCenter/{id}','StudentController@trainerCenterEvaluations');
Route::get('/Student/Round/Evaluation','StudentController@RoundEval');
Route::get('/Student/Center/Evaluation','StudentController@CenterEval');
Route::get('/SeniorEval','StudentController@SeniorEval');
//-Post Routes
Route::post('/Student/Profile/Edit','StudentController@EditProfileContent');
Route::post('/Student/UploadTask', 'StudentController@UploadTask');
Route::post('/Student/UploadPractice','StudentController@UploadPractice');

//Trainer Routes
Route::get('/Trainer','TrainerController@Index');
Route::get('/Trainer/Profile','TrainerController@profile');
Route::get('/Trainer/Profile/Edit','TrainerController@EditProfile');
Route::get('/Trainer/Courses/{id}','TrainerController@CourseProgress');
Route::get('/Trainer/sessionProg','TrainerController@sessionProg');
Route::get('/Trainer/Session/{id}/Progress/File','TrainerController@SessionProgressZip');
Route::get('/Trainer/session/task/students/{id}','TrainerController@TaskProgress');

//other face
Route::get('/Admin/Courses/{id}','AdminController@CourseProgress');
Route::get('/Admin/Student/{srid}/ExtraTasks/{sid}','AdminController@StudentExtraTasks');
Route::get('/Admin/Done/Track/{id}','AdminController@DoneTrack');
Route::get('/Admin/Done/Track/{id}/Undo','AdminController@UndoDoneTrack');
Route::get('/Trainer/Course/{id}/Students','TrainerController@CourseStudents');
Route::get('/Admin/Course/{id}/Students','AdminController@CourseStudents');
Route::get('/Admin/Course/{id}/Students/Report', 'AdminController@DownloadStudentsReport');
Route::get('/Admin/Round/{rid}/Exam/Report/{id}', 'AdminController@DownloadExamsReport');
Route::get('/Admin/{id}/IgnoreTast', 'AdminController@ClrSessionHasTask');
Route::get('/Admin/{id}/SetTask', 'AdminController@SetSessionHasTask');
Route::get('/Trainer/Course/{id}/Attendance','TrainerController@CourseAttendance');
Route::get('/Admin/Course/{id}/Attendance','AdminController@CourseAttendance');
Route::get('/Trainer/Course/{id}/Sessions','TrainerController@CourseSessions');
Route::get('/Admin/Course/{id}/Sessions','AdminController@CourseSessions');
Route::get('/Trainer/Course/{id}/DoneTopics','TrainerController@CourseDoneTopic');
Route::get('/Admin/Course/{id}/DoneTopics','AdminController@CourseDoneTopic');
Route::get('/Trainer/Course/Attendence/Details/{id}','TrainerController@CourseAttendanceDetails');
Route::get('/Admin/Course/Attendence/Details/{id}','AdminController@CourseAttendanceDetails');
Route::get('/Course/Student/Details/{id}','TrainerController@StudentDetails');
Route::get('/Admin/Course/Student/Details/{id}','AdminController@StudentDetails');
Route::get('/Trainer/Course/DoneTopics/Delete/{RoundSubContentsId}/{RoundId}','TrainerController@DeleteSubContent');
Route::get('/Admin/Course/DoneTopics/Delete/{RoundSubContentsId}/{RoundId}','AdminController@DeleteSubContent');
Route::get('/test','TrainerController@test');
Route::get('/sessionProg','TrainerController@sessionProg');
Route::get('/sessionPracticeProg', 'TrainerController@sessionPracticeProg');
Route::get('/Session/{id}/Progress/File', 'AdminController@SessionProgressZip');
Route::get('/Admin/Round/{id}/Extra', 'AdminController@ExtraContentIndex');
Route::get('/Admin/Videos', 'AdminController@StudentVideosIndex');
Route::get('/Admin/Videos/Add', 'AdminController@StudentVideosAdd');
Route::post('/Admin/Videos/Create', 'AdminController@StudentVideosCreate');
Route::get('/Admin/Videos/Edit/{id}', 'AdminController@StudentVideosEdit');
Route::post('/Admin/Videos/Edit', 'AdminController@StudentVideosUpdate');
Route::get('/Admin/Videos/Delete/{id}', 'AdminController@StudentVideosDelete');
Route::get('/Admin/Round/{id}/ExtraTasks/{sid}', 'AdminController@ExtraTaskIndex');
Route::get('/Trainer/Round/{id}/ExtraTasks/{sid}', 'TrainerController@ExtraTaskIndex');
Route::get('/Admin/Content/{id}/Add', 'AdminController@AddExtraContent');
Route::get('/Trainer/ExtraTask/{id}/Add/{sid}', 'TrainerController@AddExtraTask');
Route::get('/Admin/ExtraTask/{id}/Add/{sid}', 'AdminController@AddExtraTask');
Route::get('/Trainer/ExtraTask/{id}/Edit', 'TrainerController@EditExtraTask');
Route::get('/Admin/ExtraTask/{id}/Edit', 'AdminController@EditExtraTask');
Route::get('/Admin/Content/{id}/Edit', 'AdminController@EditExtraContent');
Route::get('/Admin/Content/{id}/Delete', 'AdminController@DeleteExtraContent');
Route::get('/Admin/ExtraTask/{id}/Delete', 'AdminController@DeleteExtraTask');
Route::get('/Trainer/ExtraTask/{id}/Delete', 'TrainerController@DeleteExtraTask');
Route::post('/Admin/ExtraContent/Create', 'AdminController@CreateExtraContent');
Route::post('/Admin/ExtraTask/Create', 'AdminController@CreateExtraTask');
Route::post('/Trainer/ExtraTask/Create', 'TrainerController@CreateExtraTask');
Route::post('/Admin/ExtraContent/Edit', 'AdminController@UpdateExtraContent');
Route::post('/Admin/ExtraTask/Edit', 'AdminController@UpdateExtraTask');
Route::post('/Trainer/ExtraTask/Edit', 'TrainerController@UpdateExtraTask');
Route::get('/Admin/Session/{id}/Practice/File', 'AdminController@SessionPracticeProgressZip');

Route::get('/Trainer/Session/{id}/Practice/File','TrainerController@SessionPracticeProgressZip');
// Route::post('/Admin/ExamFile','AdminController@ExamFile');
// Route::post('/Trainer/ExamFile','TrainerController@ExamFile');
Route::post('/Admin/TaskUpload','AdminController@UploadTask');
Route::post('/Trainer/TaskUpload','TrainerController@UploadTask');
Route::get('/ExamGrade','TrainerController@ExamGrade');
Route::get('/Trainer/Topic','StudentController@TrainerTopic');
Route::get('/StudentEvaluation','TrainerController@StudentEvaluation');
Route::get('/CenterEvaluations','TrainerController@CenterEval');
Route::get('/PercentageAttendance','TrainerController@PercentageAttendance');
Route::get('/Trainer/CenterEvaluation/{id}','TrainerController@CenterEvaluation');
Route::get('/Admin/Submission/History/{id}', 'AdminController@TaskHistory');
Route::get('/Admin/Exceptions/{id}', 'AdminController@Exceptions');
Route::post('/Admin/Exceptions/Submission/{id}', 'AdminController@ReadExceptions');
Route::get('/Trainer/Submission/History/{id}', 'TrainerController@TaskHistory');
Route::get('/Admin/CenterEvaluation/{id}','AdminController@CenterEvaluationMain');
Route::get('/Admin/CenterEvaluation/Details/{id}','AdminController@CenterEvaluation');
Route::get('/Admin/SeniorEvaluation/Details/{id}','AdminController@SeniorEvaluation');
Route::get('/Admin/TrainerEvaluation/Details/{id}','AdminController@TrainerEvaluation');
Route::get('/Admin/CourseEvaluation/{id}','AdminController@CourseEvaluation');
Route::get('/Admin/Exceptions/Report/{id}','AdminController@DownloadStudentsExceptionReport');
Route::get('/Trainer/Evaluations/{id}','TrainerController@AttendanceEvaluations');
Route::get('/Admin/Evaluations/{id}','AdminController@AttendanceEvaluations');

// //chat routes
// Route::get('/chat','TrainerController@chat');
// Route::get('/chat/users','TrainerController@chatusers');
// Route::get('/chat/AllUsers','TrainerController@AllUsers');
// Route::get('/chat/users/{id}','TrainerController@chatuser');
// Route::post('/send','ChatController@send');
// Route::post('/getMsg','TrainerController@getMsg');
// Route::post('/chat/send','TrainerController@sendMessage');

// POST Routes
Route::post('/Proceed','AuthenticationController@LoginProceed');
//Trainer
Route::post('/Trainer/Session/ContentUpload','TrainerController@SessionFileUpload');
Route::post('/Admin/Session/ContentUpload','AdminController@SessionFileUpload');
Route::post('/Trainer/DoneTopics/Add/{id}','TrainerController@AddTopic');
Route::post('/Trainer/DoneTopics/Example/{id}','TrainerController@AddExample');
Route::post('/Trainer/DoneTopics/Task/{id}','TrainerController@AddTask');
Route::post('/Trainer/DoneTopics/Edit/{id}','TrainerController@EditSubContent');
Route::post('/Admin/DoneTopics/Add/{id}','AdminController@AddTopicTrainer');
Route::post('/Admin/DoneTopics/Example/{id}','AdminController@AddExampleTrainer');
Route::post('/Admin/DoneTopics/Task/{id}','AdminController@AddTaskTrainer');
Route::post('/Admin/DoneTopics/Edit/{id}','AdminController@EditSubContent');
Route::post('/Trainer/Profile/Edit','TrainerController@EditProfileContent');
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


///Notification
Route::get('/Admin/NotificationSeen','AdminController@NotificationSeen');
Route::get('/Trainer/NotificationSeen','TrainerController@NotificationSeen');
Route::get('/Student/NotificationSeen','StudentController@NotificationSeen');