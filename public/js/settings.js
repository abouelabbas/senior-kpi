let note_txt, target;

(function($) {

  'use strict';

  let dist;

  $(window).on('scroll', function(){

    dist = $(window).scrollTop();

    if(dist > 60){

      $('.navbar').addClass('fixed');

      console.log("fixed")

    }else{

      $('.navbar').removeClass('fixed')

    }

  })



  

//note modal





$("table").on("focus", "textarea[placeholder = 'note']",function(){

  $("#NoteModal").modal("show");

  target = $(this);

  

});

$("#NoteModal").on("click", "input[type='submit']",function(e){

  e.preventDefault();

  note_txt = $("#NoteModal textarea");

  $(target).val(note_txt.val());

  note_txt.val(""); 

  $("#NoteModal").modal("hide");



});





//tooltip

$('[data-toggle="tooltip"]').tooltip()

//circular bar

  $('.progress-circle').circleProgress();

  $(".ms-settings-toggle").on('click', function(e){

    $('body').toggleClass('ms-settings-open');

  });

  $("#dark-mode").on('click', function(){

    $('body').toggleClass('ms-dark-theme');

  });

  $("#remove-quickbar").on('click', function(){

    $('body').toggleClass('ms-has-quickbar');

  });

  $("#hide-aside-left").on('click', function(){

    $('body').toggleClass('ms-aside-left-open');

  });



  $('[data-toggle="datepicker"]').datepicker();



  /* 1. Visualizing things on Hover - See next part for action on click */

  $('table').on('mouseover','.stars li', function(){

    let onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

   

    // Now highlight all the stars that's not after the current hovered star

    $(this).parent().children('li.star').each(function(e){

      if (e < onStar) {

        $(this).addClass('hover');

      }

      else {

        $(this).removeClass('hover');

      }

    });

    

  }).on('mouseout','.stars li', function(){

    $(this).parent().children('li.star').each(function(e){

      $(this).removeClass('hover');

    });

  });

  

  

  /* 2. Action to perform on click */

  $('table').on('click',".stars li", function(){

    let onStar = parseInt($(this).data('value'), 10); // The star currently selected

    let stars = $(this).parent().children('li.star');

    for (let i = 0; i < stars.length; i++) {

      $(stars[i]).removeClass('selected');

    }

    

    for (let i = 0; i < onStar; i++) {

      $(stars[i]).addClass('selected');

      if(i+1 == onStar){

        $(stars[i]).addClass('value');

        $(stars[i]).siblings().removeClass('value');



      }

    }

    

    // JUST RESPONSE (Not needed)

    let ratingValue = parseInt($('.stars li.selected').last().data('value'), 10);

  

    console.log(ratingValue)

  });

  



})(jQuery);

$(window).on('load', function(){

  $('#LoaderWrapper .spinner').fadeOut(2000).parent().fadeOut(2500)

})



$('#active').on('change', function(){

  this.value = this.checked ? 1 : 0;

  // alert(this.value);

}).change();



$('#agenda').change(function(){

  var agenda = $('#agenda').val();

  $.ajax({

    type:'GET',

    url:'/Admin/Courses/Topics/FetchSubAgenda',

    data:{

      agenda : agenda,

    },

    success:function(data) {

      //console.table(JSON.parse(data));

      $('#subagenda').empty();

      $.each(JSON.parse(data),function(index,elem){

        // var elem = JSON.stringify(elem);

        var option = '<option value="' + JSON.stringify(elem.TrainerSubAgendaId) + '">' + JSON.stringify(elem.SubAgendaNameEn) + '</option>'

        $('#subagenda').append(option);

      })

    },

    error: function (request, status, error) {

        alert(request.responseText);

    }

 });

})



$('#agenda2').change(function(){

  var agenda = $('#agenda2').val();

  $.ajax({

    type:'GET',

    url:'/Admin/Courses/Topics/FetchSubAgenda',

    data:{

      agenda : agenda,

    },

    success:function(data) {

      //console.table(JSON.parse(data));

      $('#subagenda2').empty();

      $.each(JSON.parse(data),function(index,elem){

        // var elem = JSON.stringify(elem);

        var option = '<option value="' + JSON.stringify(elem.TrainerSubAgendaId) + '">' + JSON.stringify(elem.SubAgendaNameEn) + '</option>'

        $('#subagenda2').append(option);

      })

    },

    error: function (request, status, error) {

        alert(request.responseText);

    }

 });

})

var RoundDays = [];

var Days = [];

function addRoundDay() {



  var time = $('#Daytime').val();

  var to = $('#to').val();

  var Day = $('#Days').val();

  var DayText = $("#Days option:selected").text();

  var RoundDay = {

    Day : Day,

    Time : time,

    DayText : DayText,

    To : to

  }

  RoundDays.push(RoundDay);

  Days.push(Day);

  

  $('#selecteddays').empty();

  $.each(RoundDays,function(index,elem){

    // var elem = JSON.stringify(elem);

    var option = '<option value="" ondblclick="removeOpt('+ index + ')">Day : (' + elem.DayText  + '), At : (' + elem.Time + ')</option>'

    $('#selecteddays').append(option);

  })

  console.table(RoundDays);

  console.table(Days);

}



function removeOpt(index) {

  // alert(index);

  $('#selecteddays option')[index].remove();

  RoundDays.splice(index,1);

  $('#selecteddays').empty();

  $.each(RoundDays,function(index,elem){

    // var elem = JSON.stringify(elem);

    var option = '<option value="" ondblclick="removeOpt('+ index + ')">Day : (' + elem.DayText  + '), At : (' + elem.Time + ')</option>'

    $('#selecteddays').append(option);

  })

  console.table(RoundDays);

}



function SaveRound() {

  var CourseId = $('#CourseId').val();

  var RoundNumber = $('#round_Number').val();

  var StartDate = $('#round_ST_Date').val();

  var EndDate = $('#round_ED_Date').val();

  var Trainers = [];

  $.each($('#round_trainers_assigned option:selected'),function(index,elem){

    // var elem = JSON.stringify(elem);

    var value = elem.value;

    // alert(value);

    Trainers.push(value);

  })

  var BranchId = $('#BranchId').val();

  var LabId = $('#LabId').val();

  var active = $('#active').val();

  var notes = $('#note').val();

  



  $.ajax({

    type:'GET',

    url:'/Admin/Rounds/Add',

    data:{

      RoundDays : RoundDays,

      CourseId:CourseId,

      RoundNumber:RoundNumber,

      StartDate:StartDate,

      EndDate:EndDate,

      Trainers:Trainers,

      BranchId:BranchId,

      LabId:LabId,

      active:active,

      notes:notes,

      Days:Days

      

    },

    success:function(data) {

    window.location.href = '/Admin/Rounds';

      // console.log(data);
      // alert(RoundDays);

    },

    error: function (request, status, error) {

        alert(request.responseText);

    }

 });

// console.table($('#round_trainers_Assigned option:selected'));

}

function EditRound() {

  var RoundId = $('#RoundId').val();

  var StartDate = $('#round_ST_Date').val();

  var EndDate = $('#round_ED_Date').val();

  var BranchId = $('#BranchId').val();

  var LabId = $('#LabId').val();

  var active = $('#active').val();

  var notes = $('#note').val();

  

  



  $.ajax({

    type:'GET',

    url:'/Admin/Rounds/Edit',

    data:{

      RoundDays : RoundDays,

      RoundId : RoundId,

      StartDate:StartDate,

      EndDate:EndDate,

      BranchId:BranchId,

      LabId:LabId,

      active:active,

      notes:notes,

      Days:Days

      

    },

    success:function(data) {

    window.location.href = data;

    // console.log(data);

    },

    error: function (request, status, error) {

        alert(request.responseText);

    }

 });

// console.table($('#round_trainers_Assigned option:selected'));

}

$('#CourseId').change(function(){

  var CourseId = $('#CourseId').val();

  $.ajax({

    type:'GET',

    url:'/Admin/Rounds/FetchTrainers',

    data:{

      CourseId : CourseId,

    },

    success:function(data) {

      console.table(data);

      $('#round_trainers_assigned').empty();

      $.each(data,function(index,elem){

        // var elem = JSON.stringify(elem);

        var option = '<option value=' + JSON.stringify(elem.TrainerId) + '>' + JSON.stringify(elem.FullnameEn) + '</option>';

        $('#round_trainers_assigned').append(option);

      })

    },

    error: function (request, status, error) {

        alert(request.responseText);

    }

 });

})



$('#SearchStudentBTN').click(function(){

  var q = $('#SearchStudentField').val();

  var RoundId = $('#RoundId').val();

  if(q.length){

    $.ajax({

      type:'GET',

      url:'/Admin/Rounds/FetchStudents',

      data:{

        q : q,

        RoundId : RoundId,

      },

      success:function(data) {

        console.table(data);

        $('#filtered_Students').empty();

        

          if(data == ""){

             result = `

          <li class="text-center p-3">

              <div class="">

                  <h2> no such student data </h3>

                  </div>

                  <div>

                <a href="#" class="btn btn-success m-0 mb-2"  data-toggle="modal" data-target="#addStudent"> <i class="fas fa-plus"></i> Add Student</a>

                

              </div>

          </li>

                      `;

                      $('#filtered_Students').html(result)

            

          }else{

            $.each(data,function(index,elem){

            var li = '<li class="ms-list-item media"><div class="media-body mt-1"><h4> '+ elem.FullnameEn+' </h4></div><a href="/Admin/Rounds/' +RoundId+ '/AddStudent/'+ elem.StudentId +'" class="ms-btn-icon btn-success">Add </a></button></li>';

          // var elem = JSON.stringify(elem);

          // var option = '<option value="' + JSON.stringify(elem.TrainerId) + '">' + JSON.stringify(elem.FullnameEn) + '</option>'

          $('#filtered_Students').append(li);

        })

        

          }









         

        

      },

      error: function (request, status, error) {

          alert(request.responseText);

      }

   });

  }else{

    alert('Please insert search data (letters or words)!');

  }

})









// ------  DEFAULT STATIC STUDENT ADD ------





// let stutents_arr = [

//   {

//       name: "mohammad gamal",

//       position: "front_end Developer"

//   },

//   {

//       name: "mohammad gamal",

//       position: "ui Developer"

//   },

//   {

//       name: "Yahia momtaz",

//       position: "front_end Developer"

//   }

// // ]

// $("#SearchStudentBTN").on("click", function(e){

//   e.preventDefault();

//   let student_name = $("#SearchStudentField").val();

//   let target_students = [], result = "";

//   if(student_name){

//       for(let student of stutents_arr){

//           if(student.name.toLowerCase().indexOf(student_name.toLowerCase()) > -1 ){

//               target_students.push(student);

//               console.log(target_students)

//           }else{

//               console.log("no such student data")

//           }

//       }

//   }

//   if(target_students.length){

//       for(let student of target_students){

//       result +=`

//           <li class="ms-list-item media">

//               <div class="media-body mt-1">

//                   <h4> ${student.name} </h4>

//               </div>

//               <button type="button" class="ms-btn-icon btn-success">

//                   Add

//               </button>

//           </li>

// `

//       }

//   }else{

//       result = `

//       <li class="text-center p-3">

//           <div class="">

//               <h2> no such student data </h3>

//               </div>

//               <div>

//                   <a href="#" class="btn btn-primary" id="add_new_student"> Add Student </a>

//           </div>

//       </li>

//                   `

//   }

              

//   $('#filtered_Students').html(result)

// })





// $(document).on("click", "#add_new_student",function(e){

//   e.preventDefault();

//   $("#addNewStudentWrapper").fadeIn();

// })





$('#notificationDropdown').click(function(){

  var id = $(this).attr('data-id');

  var type = $(this).attr('data-type');



  // alert(id + "  " + type);

  if(type === "Student"){

    $.ajax({

      type:'GET',

      url:'/Student/NotificationSeen',

      data:{

          type : type,

          id : id,

      },

      success:function(data) {

         

      },

      error: function (request, status, error) {

          alert(request.responseText);

      }

   });

  }

  else if(type === "Trainer"){

    $.ajax({

      type:'GET',

      url:'/Trainer/NotificationSeen',

      data:{

        type : type,

        id : id,

      },

      success:function(data) {

        //  alert('yeeeesss');

      },

      error: function (request, status, error) {

          alert(request.responseText);

      }

   });

  }

  else if(type === 'Admin'){

    $.ajax({

      type:'GET',

      url:'/Admin/NotificationSeen',

      data:{

        type : type,

        id : id,

      },

      success:function(data) {

        //  alert(data);

      },

      error: function (request, status, error) {

          alert(request.responseText);

      }

   });

  }

})





// $('#inputGroupFile02').on('change',function(){

//   //get the file name

//   var fileName = $(this).val();

//   //replace the "Choose a file" label

//   $(this).next('.custom-file-label').html(fileName);

// })

$('input[type="file"]').change(function(e){

  var fileName = e.target.files[0].name;

  $(this).siblings('.custom-file-label').html(fileName);

});