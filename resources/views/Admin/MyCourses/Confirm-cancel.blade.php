@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
<div class="row">
 <div class="col-xl-6 col-md-12">
                  <div class="ms-panel">
                      <div class="ms-panel-header">
                      <h2>Confirm Cancellation</h2>
                      <h4>Student fullname : {{$Student->FullnameEn}}</h4>
                      </div>
                      <div class="alert alert-warning" style="margin:10px;" role="alert">
  <h4 class="alert-heading">Warning!</h4>
  <p class="bg-danger text-white p-3 mb-2" >re-check the registeration data on the table provided before proceed this action.</p>
  <hr>
  <p class="mb-0">You're going to delete this registeration and any data belogns to him such as (Attendance,Tasks,Evaluation,...etc).</p>
</div>
                      <div class="ms-panel-body p-0" style="text-align:center;">
                      <div class="p-3 mb-2 bg-white text-dark">
                      <p>I'm sure I want to delete this registeration.</p>
                      <a href="/Admin/Course/Student/CancelRegisteration/Confirm/{{$Student->StudentRoundsId}}" class="btn btn-dark">Delete</a>
                      <a href="/Admin/Course/Student/Details/{{$Student->StudentRoundsId}}" class="btn btn-light">Cancel</a>
                      </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Registeration data table</h6>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="table-responsive">
                              <table class="table table-hover thead-light">
                                  
                                  <tbody>
                                      <tr>
                                      <td>Round Id</td>
                                      <td>{{$Student->RoundId}}</td>
                                      </tr>
                                      <tr>
                                      <td>Student's Id</td>
                                      <td>{{$Student->StudentId}}</td>
                                      </tr>
                                      <tr>
                                      <td>Student's registeration id </td>
                                      <td>{{$Student->StudentRoundsId}} </td>
                                      </tr>
                                      <tr>
                                          <td>Student's fullname</td>
                                          <td>{{$Student->FullnameEn}}</td>
                                          </tr>
                                      <tr>
                                          <td>Phone Number</td>
                                          <td>{{$Student->Phone}}</td>
                                          </tr>
                                      <tr>
                                          <td>Whatsapp</td>
                                          <td>{{$Student->Whatsapp}}</td>
                                          </tr>
                                      <tr>
                                          <td>Email address</td>
                                          <td>{{$Student->Email}}</td>
                                      </tr>
                                      <tr>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

             

            </div>

             @endsection
