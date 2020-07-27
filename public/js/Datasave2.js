$(document).ready(function() {
    //Center  Evaluation table mapping
$('#saveTPer').click(function(){
    $('#trainerper > tbody  > tr').each(function() {
            var TrainerEvaluationsId = $(this).find('.content').attr('data-eval');
    var Knowledge_Experience = $(this).find('ul.Knowledge_Experience li.value').attr('data-value');
    var Training_Qualified = $(this).find('ul.Training_Qualified li.value').attr('data-value');
    var Topics_Preparation = $(this).find('ul.Topics_Preparation li.value').attr('data-value');
    var Trainer_Attitude = $(this).find('ul.Trainer_Attitude li.value').attr('data-value');
    var Time_Respect = $(this).find('ul.Time_Respect li.value').attr('data-value');
    var Student_Interaction = $(this).find('ul.Student_Interaction li.value').attr('data-value');
    var Overall_Evaluation = $(this).find('ul.Overall_Evaluation li.value').attr('data-value');
    var Notes = $(this).find('.notes').val();
    $.ajax({
        type:'GET',
        url:'/Trainer/Topic',
        data:{
            TrainerEvaluationsId:TrainerEvaluationsId,
            Knowledge_Experience:Knowledge_Experience,
            Training_Qualified:Training_Qualified,
            Topics_Preparation:Topics_Preparation,
            Trainer_Attitude:Trainer_Attitude,
            Time_Respect:Time_Respect,
            Student_Interaction:Student_Interaction,
            Overall_Evaluation:Overall_Evaluation,
            Notes:Notes,
        },
        success:function(data) {
           //alert(data);
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

$('#savesenior').click(function(){
    $('#seniortb > tbody  > tr').each(function() {
            var SeniorstepsEvaluationsId = $(this).find('.content').attr('data-eval');
    var Students_Deal = $(this).find('ul.Students_Deal li.value').attr('data-value');
    var Solving_Problems = $(this).find('ul.Solving_Problems li.value').attr('data-value');
    var Buffet_Quality = $(this).find('ul.Buffet_Quality li.value').attr('data-value');
    var General_Cleanliness = $(this).find('ul.General_Cleanliness li.value').attr('data-value');
    var Recepitionist_Quality = $(this).find('ul.Recepitionist_Quality li.value').attr('data-value');
    var Answering_Calls_Quality = $(this).find('ul.Answering_Calls_Quality li.value').attr('data-value');
    var Social_Media_Quality = $(this).find('ul.Social_Media_Quality li.value').attr('data-value');
    var Overall_Evaluation = $(this).find('ul.Overall_Evaluation li.value').attr('data-value');
    var Notes = $(this).find('.notes').val();
    $.ajax({
        type:'GET',
        url:'/SeniorEval',
        data:{
            SeniorstepsEvaluationsId:SeniorstepsEvaluationsId,
            Students_Deal:Students_Deal,
            Solving_Problems:Solving_Problems,
            Buffet_Quality:Buffet_Quality,
            General_Cleanliness:General_Cleanliness,
            Recepitionist_Quality:Recepitionist_Quality,
            Answering_Calls_Quality:Answering_Calls_Quality,
            Social_Media_Quality:Social_Media_Quality,
            Overall_Evaluation:Overall_Evaluation,
            Notes:Notes,
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

    //Round Evaluation table mapping
    $('#saveRoundEval').click(function(){
        $('#RoundEval > tbody  > tr').each(function() {
                var RoundEvaluationId = $(this).find('.content').attr('data-eval');
        var Course_Wealthy = $(this).find('ul.Course_Wealthy li.value').attr('data-value');
        var Enough_Hours = $(this).find('ul.Enough_Hours li.value').attr('data-value');
        var Enough_Practice = $(this).find('ul.Enough_Practice li.value').attr('data-value');
        var Materials_Evaluation = $(this).find('ul.Materials_Evaluation li.value').attr('data-value');
        var Suitable_Price = $(this).find('ul.Suitable_Price li.value').attr('data-value');
        var Overall_Education = $(this).find('ul.Overall_Education li.value').attr('data-value');
        var Notes = $(this).find('.notes').val();
        $.ajax({
            type:'GET',
            url:'/Student/Round/Evaluation',
            data:{
                RoundEvaluationId:RoundEvaluationId,
                Course_Wealthy:Course_Wealthy,
                Enough_Hours:Enough_Hours,
                Enough_Practice:Enough_Practice,
                Materials_Evaluation:Materials_Evaluation,
                Suitable_Price:Suitable_Price,
                Overall_Education:Overall_Education,
                Notes:Notes,
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


     //Center Evaluation table mapping
     $('#saveCenterEval').click(function(){
        $('#CenterEval > tbody  > tr').each(function() {
                var CenterEvaluationId = $(this).find('.content').attr('data-eval');
        var PCs_Quality = $(this).find('ul.PCs_Quality li.value').attr('data-value');
        var Projectors_Quality = $(this).find('ul.Projectors_Quality li.value').attr('data-value');
        var Air_Conditioners = $(this).find('ul.Air_Conditioners li.value').attr('data-value');
        var Seats_Quality = $(this).find('ul.Seats_Quality li.value').attr('data-value');
        var Lab_Cleaning = $(this).find('ul.Lab_Cleaning li.value').attr('data-value');
        var Lab_Capacity = $(this).find('ul.Lab_Capacity li.value').attr('data-value');
        var Overall_Evaluation = $(this).find('ul.Overall_Evaluation li.value').attr('data-value');
        var Notes = $(this).find('.notes').val();
        $.ajax({
            type:'GET',
            url:'/Student/Center/Evaluation',
            data:{
                CenterEvaluationId:CenterEvaluationId,
                PCs_Quality:PCs_Quality,
                Projectors_Quality:Projectors_Quality,
                Air_Conditioners:Air_Conditioners,
                Seats_Quality:Seats_Quality,
                Lab_Cleaning:Lab_Cleaning,
                Lab_Capacity:Lab_Capacity,
                Overall_Evaluation:Overall_Evaluation,
                Notes:Notes,
            },
            success:function(data) {
               //alert(data);
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



})



