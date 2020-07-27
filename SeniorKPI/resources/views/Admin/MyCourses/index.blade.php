@extends('Layouts.adminkpi',['ActiveRounds'=>$ActiveRounds])
@section('content')
<div class="row">
                  <div class="col-xl-3 col-md-6">
                  <div class="ms-card card-gradient-success ms-widget ms-infographics-widget">
                      <div class="ms-card-body media">
                          <div class="media-body">
                              <h6>Total Subscriptions</h6>
                              <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> 4567</p>
                              <p class="fs-12">48% From Last 24 Hours</p>
                          </div>
                      </div>
                      <i class="flaticon-statistics"></i>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6">
                  <div class="ms-card card-gradient-secondary ms-widget ms-infographics-widget">
                      <div class="ms-card-body media">
                          <div class="media-body">
                              <h6>Budgets</h6>
                              <p class="ms-card-change"> $80,950</p>
                              <p class="fs-12">2% Decreased from last budget</p>
                          </div>
                      </div>
                      <i class="flaticon-stats"></i>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6">
                  <div class="ms-card card-gradient-warning ms-widget ms-infographics-widget">
                      <div class="ms-card-body media">
                          <div class="media-body">
                              <h6>Total Users</h6>
                              <p class="ms-card-change"> <i class="material-icons">arrow_upward</i> 4567</p>
                              <p class="fs-12">48% From Last 24 Hours</p>
                          </div>
                      </div>
                      <i class="flaticon-user"></i>
                  </div>
              </div>

              <div class="col-xl-3 col-md-6">
                  <div class="ms-card card-gradient-info ms-widget ms-infographics-widget">
                      <div class="ms-card-body media">
                          <div class="media-body">
                              <h6>Conversions</h6>
                              <p class="ms-card-change"> $80,950</p>
                              <p class="fs-12">2% Decreased from last budget</p>
                          </div>
                      </div>
                      <i class="flaticon-reuse"></i>
                  </div>
              </div>

              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Recent Buyers</h6>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="table-responsive">
                              <table class="table table-hover thead-light">
                                  <thead>
                                      <tr>
                                          <th scope="col">User</th>
                                          <th scope="col">Service</th>
                                          <th scope="col">Product ID</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Chihoo Hwang </td>
                                          <td>Wordpress Template</td>
                                          <td>67384917</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Ajay Suryavanash </td>
                                          <td>Business Card</td>
                                          <td>789393819</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> John Doe </td>
                                          <td>App Customization</td>
                                          <td>137893137</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Alesdro Guitto </td>
                                          <td>Dashboard Design</td>
                                          <td>235193138</td>
                                      </tr>
                                      <tr>
                                          <td class="ms-table-f-w"> <img src="https://via.placeholder.com/270x270" alt="people"> Manbir Sahwny </td>
                                          <td>Theme Development</td>
                                          <td>19938917</td>
                                      </tr>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-xl-6 col-md-12">
                  <div class="ms-panel ms-panel-fh">
                      <div class="ms-panel-header">
                          <h6>Project Timeline</h6>
                      </div>
                      <div class="ms-panel-body">
                          <ul class="ms-activity-log">
                              <li>
                                  <div class="ms-btn-icon btn-pill icon btn-success">
                                      <i class="flaticon-tick-inside-circle"></i>
                                  </div>
                                  <h6>Lorem ipsum dolor sit</h6>
                                  <span> <i class="material-icons">event</i>1 January, 2018</span>
                                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                              </li>
                              <li>
                                  <div class="ms-btn-icon btn-pill icon btn-danger">
                                      <i class="flaticon-alert-1"></i>
                                  </div>
                                  <h6>Lorem ipsum dolor sit</h6>
                                  <span> <i class="material-icons">event</i>1 March, 2020</span>
                                  <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>

              <div class="col-xl-7 col-md-12">
                <div class="ms-panel">
                    <div class="ms-panel-header">
                        <h6>most sellings projects</h6>
                    </div>
                    <div class="ms-panel-body">
                        <span class="progress-label">HTML & CSS Projects</span><span class="progress-status">83%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 83%" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">Wordpress Projects</span><span class="progress-status">50%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-secondary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">PSD Projects</span><span class="progress-status">75%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="progress-label">Code Snippets</span><span class="progress-status">92%</span>
                        <div class="progress progress-tiny">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-xl-5 col-md-12">
                 

                  <div class="ms-panel">
                      <div class="ms-panel-header">
                          <h6>Top Sales</h6>
                          <p>Your highest selling projects</p>
                      </div>
                      <div class="ms-panel-body p-0">
                          <div class="ms-quick-stats">
                              <div class="ms-stats-grid">
                                  <p class="ms-text-success">+47.18%</p>
                                  <p class="ms-text-dark">8,033</p>
                                  <span>Admin Dashboard</span>
                              </div>
                              <div class="ms-stats-grid">
                                  <p class="ms-text-success">+17.24%</p>
                                  <p class="ms-text-dark">6,039</p>
                                  <span>Wordpress Theme</span>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>

            </div>

             @endsection
