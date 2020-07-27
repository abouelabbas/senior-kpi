//Center  Evaluation table mapping

$('#saveTPer').click(function(){

    debugger;

    $('#trainerper > tbody  > tr').each(function() {

    $.ajax({

        type:'GET',

        url:'/Trainer/TrainerTopic',

        dataType:'json',

        data:{

        },

        success:function(data) {

           alert(JSON.stringify(data));

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

    // alert(notes);

});

// alert("تم حفظ البيانات");

// window.location.reload();

})







//Grades table mapping

$('#save').click(function(){

    $('#grades > tbody  > tr').each(function() {    

    var QuizVal = $(this).find('input.quiz').val();

    var id = $(this).find('input.quiz').attr('data-id')

    // var StudentRound = $(this).find('input.quiz').attr('data-studentround');

    var TaskGrade = $(this).find('input.task').val();

    var Status = $(this).find('input.task').attr('data-status');

    var GradeId = $(this).find('input.task').attr('data-grade');

    $.ajax({

        type:'GET',

        url:'/test',

        data:{

            QuizVal:QuizVal,

            id:id,

            // StudentRound:StudentRound,

            TaskGrade:TaskGrade,

            Status:Status,

            GradeId:GradeId

        },

        success:function(data) {

           //alert("Success");

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

});

alert("تم حفظ البيانات");

window.location.reload();

})



//Exam table mapping

$('#saveExam').click(function(){

    $('#Exams > tbody  > tr').each(function() {    

    var Grade = $(this).find('input.grade-value').val();

    var Evaluation = $(this).find('li.value').attr('data-value');

    var ExamGradesId = $(this).find('input.grade-value').attr('data-exam');

    $.ajax({

        type:'GET',

        url:'/ExamGrade',

        data:{

            Grade:Grade,

            Evaluation:Evaluation,

            ExamGradesId:ExamGradesId,

        },

        success:function(data) {

           //alert(data);

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

});

alert("تم حفظ البيانات");

window.location.reload();

});







//Student Eval table mapping

$('#saveStudentEval').click(function(){

    $('#studenteval > tbody  > tr').each(function() {    

    var StudentEvaluationId = $(this).find('input.TimeRespect').attr('data-eval');

    var TimeRespect = $(this).find('input.TimeRespect').val();

    var LecturePractise = $(this).find('input.LecturePractise').val();

    var SolveHomeTasks = $(this).find('input.SolveHomeTasks').val();

    var StudentInteractions = $(this).find('input.StudentInteractions').val();

    var StudentAttitude = $(this).find('input.StudentAttitude').val();

    var StudentFocus = $(this).find('input.StudentFocus').val();

    var UnderstandSpeed = $(this).find('input.UnderstandSpeed').val();

    var ExtraMarks = $(this).find('input.ExtraMarks').val();

    var Overall = $(this).find('input.Overall').val();

    var Notes = $(this).find('.notes').val();

    $.ajax({

        type:'GET',

        url:'/StudentEvaluation',

        data:{

            StudentEvaluationId:StudentEvaluationId,

            TimeRespect:TimeRespect,

            LecturePractise:LecturePractise,

            SolveHomeTasks:SolveHomeTasks,

            StudentInteractions:StudentInteractions,

            StudentAttitude:StudentAttitude,

            StudentFocus:StudentFocus,

            UnderstandSpeed:UnderstandSpeed,

            ExtraMarks:ExtraMarks,

            Overall:Overall,

            Notes:Notes,

        },

        success:function(data) {

           //alert(data);

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

});

alert("تم حفظ البيانات");

window.location.reload();

})





//Center  Evaluation table mapping

$('#saveCenter').click(function(){

    $('#courseEval > tbody  > tr').each(function() {    

        // var content = $(this).find('.content').attr('data-content');

    var notes = $(this).find('#notes').val();

    var center = $(this).find('.content').attr('data-center');

    var pc = $(this).find('ul#pc');

    var pcValue = $(pc).find('li.value').attr('data-value');

    var proj = $(this).find('ul#proj');

    var projValue = $(proj).find('li.value').attr('data-value');

    var air = $(this).find('ul#air');

    var airValue = $(air).find('li.value').attr('data-value');

    var seats = $(this).find('ul#seats');

    var seatsValue = $(seats).find('li.value').attr('data-value');

    var clean = $(this).find('ul#clean');

    var cleanValue = $(clean).find('li.value').attr('data-value');

    var capacity = $(this).find('ul#capacity');

    var capacityValue = $(capacity).find('li.value').attr('data-value');

    var overall = $(this).find('ul#overall');

    var overallValue = $(overall).find('li.value').attr('data-value');

    // alert(centerEval);

    // alert(pcValue);

    // alert(projValue);

    // alert(airValue);

    // alert(seatsValue);

    // alert(cleanValue);

    // alert(capacityValue);

    // alert(overallValue);

    $.ajax({

        type:'GET',

        url:'/CenterEvaluations',

        data:{

            center : center,

            notes : notes,

            pcValue : pcValue,

            projValue : projValue,

            airValue : airValue,

            seatsValue : seatsValue,

            cleanValue : cleanValue,

            capacityValue : capacityValue,

            overallValue : overallValue

        },

        success:function(data) {

        //    alert(data);

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

    // alert(notes);

});

alert("تم حفظ البيانات");

window.location.reload();

})





















$('#save-student').click(function(){

    var i = 1;

    $('#StudentTable > tbody  > tr').each(function() {

        var IsAttend = $(this).find("input[name=attendence" + i + "]").filter(":checked").val();

        var SessionId = $(this).find(".student").attr('data-session');

        var StudentRoundsId = $(this).find(".student").val();

        var Notes = $(this).find(".notes").val();

        // alert(IsAttend);

        // alert(SessionId);

        // alert(StudentRoundsId);

        // alert(Notes); 

        i= i + 1; 





    $.ajax({

        type:'GET',

        url:'/Admin/Session/Submit/Attendance',

        data:{

            IsAttend : IsAttend,

            SessionId : SessionId,

            StudentRoundsId : StudentRoundsId,

            Notes : Notes,

        },

        success:function(data) {
// alert(data)
           

        },

        error: function (request, status, error) {

            alert(request.responseText);

        }

     });

});

// alert("تم حفظ البيانات");

// window.location.reload();

alert('Attendance has been submitted successfully!');

           window.location.reload();

})

