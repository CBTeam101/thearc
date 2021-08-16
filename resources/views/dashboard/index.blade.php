{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
            <!-- row -->
<div class="container-fluid">
  <div class="form-head mb-4">
    <h2 class="text-black font-w600 mb-0">Dashboard</h2>
  </div>
  <div class="row">
    <div class="col-xl-6">
      <div class="row">
        <!-- <div class="col-xl-8 col-lg-6 col-md-7 col-sm-8">
          <div class="card-bx stacked">
            <img src="images/card/card.png" alt="" class="mw-100">
            <div class="card-info text-white">
              <p class="mb-1">Main Balance</p>
              <h2 class="fs-36 text-white mb-sm-4 mb-3">$673,412.66</h2>
              <div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                <img src="images/dual-dot.png" alt="" class="dot-img">
                <h4 class="fs-20 text-white mb-0">**** **** **** 1234</h4>
              </div>
              <div class="d-flex">
                <div class="mr-5">
                  <p class="fs-14 mb-1 op6">VALID THRU</p>
                  <span>08/21</span>
                </div>
                <div>
                  <p class="fs-14 mb-1 op6">CARD HOLDER</p>
                  <span>Franklin Jr.</span>
                </div>
              </div>
            </div>
            <a href="cards-center.html"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
          </div>
        </div> -->
        <!-- <div class="col-xl-4 col-lg-6 col-md-5 col-sm-4">
          <div class="card bgl-primary card-body overflow-hidden p-0 d-flex rounded">
            <div class="p-0 text-center mt-3">
              <span class="text-black">Limit</span>
              <h3 class="text-black fs-20 mb-0 font-w600">$4,000</h3>
              <small>/$10,000</small>
            </div>
            <canvas id="lineChart" height="300" class="mt-auto line-chart-demo"></canvas>
          </div>	
        </div> -->
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header d-sm-flex d-block border-0 pb-0">
              <div class="pr-3 mr-auto mb-sm-0 mb-3">
                <h4 class="fs-20 text-black mb-1">Transaction Overview</h4>
                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
              </div>
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="btn btn-rounded btn-light mr-3" data-toggle="modal" data-target="#DownloadReport"><i class="las la-download text-primary scale5 mr-3"></i>Download Report</a>
                <!-- Modal -->
                <div class="modal fade" id="DownloadReport">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dropdown">
                  <div class="btn-link" data-toggle="dropdown">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                  </div>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                    <a class="dropdown-item" href="javascript:void(0)">Edit</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="chartBar"></div>
              <div class="d-flex">
                <div class="custom-control custom-switch toggle-switch text-right mr-4 mb-2">
                  <input type="checkbox" class="custom-control-input" id="customSwitch11">
                  <label class="custom-control-label fs-14 text-black pr-2" for="customSwitch11">Number</label>
                </div>
                <div class="custom-control custom-switch toggle-switch text-right mr-4 mb-2">
                  <input type="checkbox" class="custom-control-input" id="customSwitch12">
                  <label class="custom-control-label fs-14 text-black pr-2" for="customSwitch12">Analytics</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header d-sm-flex d-block border-0 pb-0">
              <div class="pr-3 mb-sm-0 mb-3 mr-auto">
                <h4 class="fs-20 text-black mb-1">Quick Transfer</h4>
                <span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>
              </div>
              <span class="fs-24 text-black font-w600">$56,772.38</span>
            </div>
            <div class="card-body">
              <div class="owl-carousel testimonial-one mb-5">
                <div class="item">
                  <div class="image-bx mb-3">
                    <img src="{{ asset('images/avatar/1.jpg') }}" alt="">
                    <i class="las la-check-circle"></i>
                  </div>
                  <h6 class="fs-16 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">David</a></h6>
                  <span class="fs-12">@davidxc</span>
                </div>
                <div class="item">
                  <div class="image-bx mb-3">
                    <img src="{{ asset('images/avatar/2.jpg') }}" alt="">
                    <i class="las la-check-circle"></i>
                  </div>
                  <h6 class="fs-16 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Cindy</a></h6>
                  <span class="fs-12">@cindyss</span>
                </div>
                <div class="item">
                  <div class="image-bx mb-3">
                    <img src="{{ asset('images/avatar/3.jpg') }}" alt="">
                    <i class="las la-check-circle"></i>
                  </div>
                  <h6 class="fs-16 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Samuel</a></h6>
                  <span class="fs-12">@sam224</span>
                </div>
                <div class="item">
                  <div class="image-bx mb-3">
                    <img src="{{ asset('images/avatar/4.jpg') }}" alt="">
                    <i class="las la-check-circle"></i>
                  </div>
                  <h6 class="fs-16 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Olivia</a></h6>
                  <span class="fs-12">@oliv62</span>
                </div>
                <div class="item">
                  <div class="image-bx mb-3">
                    <img src="{{ asset('images/avatar/5.jpg') }}" alt="">
                    <i class="las la-check-circle"></i>
                  </div>
                  <h6 class="fs-16 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Martha</a></h6>
                  <span class="fs-12">@marthaa</span>
                </div>
              </div>
              <form>
                <div class="form-group row style-1 align-items-center">
                  <label class="fs-18 col-sm-3 text-black font-w500">Amount</label>
                  <div class="input-group col-sm-9">
                    <input type="number" class="form-control">
                    <div class="input-group-append">
                      <button class="btn btn-primary rounded" type="button">TRANSFER NOW</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="row">
        @foreach($banks as $bank)
        <div class="col-xl-6 col-sm-6">
          <div class="card-bx mb-3 text-white">
            <img src="{{asset($bank->token->img)}}" alt="" class="mw-100">
            <div class="card-header flex-wrap border-0 pb-0">
              <div class="mr-3 mb-2">
                <p class="fs-14 mb-1">{{$bank->token->av}} | 1 = ₱{{number_format($bank->token->price, 2)}}</p>
                <span class="fs-16 font-w600">Tokens Available</span><br/>
                <span class="fs-24 font-w600">{{number_format($bank->balance, 2)}} <small class="d-inline" style="font-size: 12px;">(₱{{number_format($bank->balance*$bank->token->price, 2)}})</small></span>
              </div>
              <!-- <span class="fs-12 mb-2">
              <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5" stroke="#ecf0f1" stroke-width="2"/>
                <path d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z" fill="url(#paint0_linear)"/>
                <defs>
                <linearGradient id="paint0_linear" x1="10.2499" y1="3" x2="10.9999" y2="13.5" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#ecf0f1" stop-opacity="0.73"/>
                <stop offset="1" stop-color="#ecf0f1" stop-opacity="0"/>
                </linearGradient>
                </defs>
              </svg>
              {{$bank->token->share}}% (30 days)</span> -->
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-xl-12">
          <div class="card overflow-hidden">
            <div class="card-header d-sm-flex d-block border-0 pb-0">
              <div class="mb-sm-0 mb-2">
                <p class="fs-14 mb-1">Weekly Wallet Usage</p>
                <span class="mb-0">
                <svg width="12" height="6" viewBox="0 0 12 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.9999 6L5.99994 -2.62268e-07L-6.10352e-05 6" fill="#2BC155"/>
                </svg>
                <strong class="fs-24 text-black ml-2 mr-3">43%</strong>Than last week</span>
              </div>
              <span class="fs-12">
              <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.999939 13.5C1.91791 12.4157 4.89722 9.22772 6.49994 7.5L12.4999 10.5L19.4999 1.5" stroke="#2BC155" stroke-width="2"/>
                <path d="M6.49994 7.5C4.89722 9.22772 1.91791 12.4157 0.999939 13.5H19.4999V1.5L12.4999 10.5L6.49994 7.5Z" fill="url(#paint0_linear2)"/>
                <defs>
                <linearGradient id="paint0_linear2" x1="10.2499" y1="3" x2="10.9999" y2="13.5" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#2BC155" stop-opacity="0.73"/>
                <stop offset="1" stop-color="#2BC155" stop-opacity="0"/>
                </linearGradient>
                </defs>
              </svg>
              4% (30 days)</span>
            </div>
            <div class="card-body p-0">
              <canvas id="widgetChart3" height="80"></canvas>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-5 col-xxl-12 col-md-5">
                  <h4 class="fs-20 text-black mb-4">Spendings</h4>
                  <div class="row">
                    <div class="d-flex col-xl-12 col-xxl-6  col-md-12 col-sm-6 mb-4">
                      <svg class="mr-3" width="14" height="54" viewBox="0 0 14 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-6.10352e-05" width="14" height="54" rx="7" fill="#AC39D4"/>
                      </svg>
                      <div>
                        <p class="fs-14 mb-2">Put In ABT / Total</p>
                        <span class="fs-18 font-w500"><span class="text-black mr-2">0.00</span></span>
                      </div>
                    </div>
                    <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                      <svg class="mr-3" width="14" height="54" viewBox="0 0 14 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-6.10352e-05" width="14" height="54" rx="7" fill="#40D4A8"/>
                      </svg>
                      <div>
                        <p class="fs-14 mb-2">ABIT / Total</p>
                        <span class="fs-18 font-w500"><span class="text-black mr-2">0.00</span></span>
                      </div>
                    </div>
                    <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                      <svg class="mr-3" width="14" height="54" viewBox="0 0 14 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-6.10352e-05" width="14" height="54" rx="7" fill="#1EB6E7"/>
                      </svg>
                      <div>
                        <p class="fs-14 mb-2">Restaurant Spend / Total </p>
                        <span class="fs-18 font-w500"><span class="text-black mr-2">0.00</span></span>
                      </div>
                    </div>
                    <div class="d-flex col-xl-12 col-xxl-6 col-md-12 col-sm-6 mb-4">
                      <svg class="mr-3" width="14" height="54" viewBox="0 0 14 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="-6.10352e-05" width="14" height="54" rx="7" fill="#461EE7"/>
                      </svg>
                      <div>
                        <p class="fs-14 mb-2">Gass Station Spend / Total</p>
                        <span class="fs-18 font-w500"><span class="text-black mr-2">0.00</span></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-7  col-xxl-12 col-md-7">
                  <div class="row">
                    <div class="col-sm-6 mb-4">
                      <div class="bg-secondary rounded text-center p-3">
                        <div class="d-inline-block position-relative donut-chart-sale mb-3">
                          <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0.2)"],   "innerRadius": 33, "radius": 10}'>5/8</span>
                          <small class="text-white">71%</small>
                        </div>
                        <span class="fs-14 text-white d-block">Put In ABT</span>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-4">
                      <div class="bg-success rounded text-center p-3">
                        <div class="d-inline-block position-relative donut-chart-sale mb-3">
                          <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0.2)"],   "innerRadius": 33, "radius": 10}'>3/8</span>
                          <small class="text-white">30%</small>
                        </div>
                        <span class="fs-14 text-white d-block">ABIT</span>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-sm-0 mb-4">
                      <div class="border border-2 border-primary rounded text-center p-3">
                        <div class="d-inline-block position-relative donut-chart-sale mb-3">
                          <span class="donut1" data-peity='{ "fill": ["rgb(30, 170, 231)", "rgba(234, 234, 234, 1)"],   "innerRadius": 33, "radius": 10}'>1/8</span>
                          <small class="text-black">5%</small>
                        </div>
                        <span class="fs-14 text-black d-block">Restaurant Spend</span>
                      </div>
                    </div>
                    <div class="col-sm-6 mb-sm-0 mb-4">
                      <div class="bg-info rounded text-center p-3">
                        <div class="d-inline-block position-relative donut-chart-sale mb-3">
                          <span class="donut1" data-peity='{ "fill": ["rgb(255, 255, 255)", "rgba(255, 255, 255, 0.2)"],   "innerRadius": 33, "radius": 10}'>9/10</span>
                          <small class="text-white">96%</small>
                        </div>
                        <span class="fs-14 text-white d-block">Gass S. Spend</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header d-block d-sm-flex border-0">
              <div class="mr-3">
                <h4 class="fs-20 text-black">Previous Transactions</h4>
                <p class="mb-0 fs-13">Lorem ipsum dolor sit amet, consectetur</p>
              </div>
              <div class="card-action card-tabs mt-3 mt-sm-0">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">Monthly</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Weekly" role="tab">Weekly</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#Today" role="tab">Today</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body tab-content p-0">
              <div class="tab-pane active show fade" id="monthly" role="tabpanel">
                <div class="table-responsive">
                  <table class="table table-responsive-md card-table previous-transactions">
                    <tbody>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip0)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip0">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">XYZ Store ID</a></h6>
                          <span class="fs-14">Cashback</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 4, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-success fs-16 font-w500 text-right d-block">Completed</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="61" height="61" rx="29" stroke="#FF2E2E" stroke-width="2"/>
                            <g clip-path="url(#clip1)">
                            <path d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z" fill="#FF2E2E"/>
                            <path d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z" fill="#FF2E2E"/>
                            </g>
                            <defs>
                            <clipPath id="clip1">
                            <rect width="28" height="28" fill="white" transform="translate(17 45) rotate(-90)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Chef Renata</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">-$167</span></td>
                        <td><span class="text-warning fs-16 font-w500 text-right d-block">Pending</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip2)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip2">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Cindy Alexandro</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-dark fs-16 font-w500 text-right d-block">Canceled</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip7)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip7">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Paipal</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-success fs-16 font-w500 text-right d-block">Completed</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="1" y="1" width="61" height="61" rx="29" stroke="#FF2E2E" stroke-width="2"/>
                          <g clip-path="url(#clip3)">
                          <path d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z" fill="#FF2E2E"/>
                          <path d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z" fill="#FF2E2E"/>
                          </g>
                          <defs>
                          <clipPath id="clip3">
                          <rect width="28" height="28" fill="white" transform="translate(17 45) rotate(-90)"/>
                          </clipPath>
                          </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Hawkins Jr.</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 4, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">-$167</span></td>
                        <td><span class="text-dark fs-16 font-w500 text-right d-block">Canceled</span></td>
                      </tr>
                    <tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="Weekly" role="tabpanel">
                <div class="table-responsive">
                  <table class="table card-table previous-transactions">
                    <tbody>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip9)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip9">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">XYZ Store ID</a></h6>
                          <span class="fs-14">Cashback</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 4, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-success fs-16 font-w500 text-right d-block">Completed</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="61" height="61" rx="29" stroke="#FF2E2E" stroke-width="2"/>
                            <g clip-path="url(#clip10)">
                            <path d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z" fill="#FF2E2E"/>
                            <path d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z" fill="#FF2E2E"/>
                            </g>
                            <defs>
                            <clipPath id="clip10">
                            <rect width="28" height="28" fill="white" transform="translate(17 45) rotate(-90)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Chef Renata</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">-$167</span></td>
                        <td><span class="text-warning fs-16 font-w500 text-right d-block">Pending</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip4)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip4">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Cindy Alexandro</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-dark fs-16 font-w500 text-right d-block">Canceled</span></td>
                      </tr>
                    <tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane" id="Today" role="tabpanel">
                <div class="table-responsive">
                  <table class="table card-table previous-transactions">
                    <tbody>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="1.00002" y="1" width="61" height="61" rx="29" stroke="#2BC155" stroke-width="2"/>
                            <g clip-path="url(#clip5)">
                            <path d="M35.2219 42.9875C34.8938 42.3094 35.1836 41.4891 35.8617 41.1609C37.7484 40.2531 39.3453 38.8422 40.4828 37.0758C41.6477 35.2656 42.2656 33.1656 42.2656 31C42.2656 24.7875 37.2125 19.7344 31 19.7344C24.7875 19.7344 19.7344 24.7875 19.7344 31C19.7344 33.1656 20.3523 35.2656 21.5117 37.0813C22.6437 38.8477 24.2461 40.2586 26.1328 41.1664C26.8109 41.4945 27.1008 42.3094 26.7727 42.993C26.4445 43.6711 25.6297 43.9609 24.9461 43.6328C22.6 42.5063 20.6148 40.7563 19.2094 38.5578C17.7656 36.3047 17 33.6906 17 31C17 27.2594 18.4547 23.743 21.1016 21.1016C23.743 18.4547 27.2594 17 31 17C34.7406 17 38.257 18.4547 40.8984 21.1016C43.5453 23.7484 45 27.2594 45 31C45 33.6906 44.2344 36.3047 42.7852 38.5578C41.3742 40.7508 39.3891 42.5063 37.0484 43.6328C36.3648 43.9555 35.55 43.6711 35.2219 42.9875Z" fill="#2BC155"/>
                            <path d="M36.3211 31.7274C36.5891 31.9953 36.7203 32.3453 36.7203 32.6953C36.7203 33.0453 36.5891 33.3953 36.3211 33.6633L32.8812 37.1031C32.3781 37.6063 31.7109 37.8797 31.0055 37.8797C30.3 37.8797 29.6273 37.6008 29.1297 37.1031L25.6898 33.6633C25.1539 33.1274 25.1539 32.2633 25.6898 31.7274C26.2258 31.1914 27.0898 31.1914 27.6258 31.7274L29.6437 33.7453L29.6437 25.9742C29.6437 25.2196 30.2562 24.6071 31.0109 24.6071C31.7656 24.6071 32.3781 25.2196 32.3781 25.9742L32.3781 33.7508L34.3961 31.7328C34.9211 31.1969 35.7852 31.1969 36.3211 31.7274Z" fill="#2BC155"/>
                            </g>
                            <defs>
                            <clipPath id="clip5">
                            <rect width="28" height="28" fill="white" transform="matrix(-4.37114e-08 1 1 4.37114e-08 17 17)"/>
                            </clipPath>
                            </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Paipal</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 5, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">+$5,553</span></td>
                        <td><span class="text-success fs-16 font-w500 text-right d-block">Completed</span></td>
                      </tr>
                      <tr>
                        <td>
                          <svg width="63" height="63" viewBox="0 0 63 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="1" y="1" width="61" height="61" rx="29" stroke="#FF2E2E" stroke-width="2"/>
                          <g clip-path="url(#clip6)">
                          <path d="M35.2219 19.0125C34.8937 19.6906 35.1836 20.5109 35.8617 20.8391C37.7484 21.7469 39.3453 23.1578 40.4828 24.9242C41.6476 26.7344 42.2656 28.8344 42.2656 31C42.2656 37.2125 37.2125 42.2656 31 42.2656C24.7875 42.2656 19.7344 37.2125 19.7344 31C19.7344 28.8344 20.3523 26.7344 21.5117 24.9187C22.6437 23.1523 24.2461 21.7414 26.1328 20.8336C26.8109 20.5055 27.1008 19.6906 26.7726 19.007C26.4445 18.3289 25.6297 18.0391 24.9461 18.3672C22.6 19.4937 20.6148 21.2437 19.2094 23.4422C17.7656 25.6953 17 28.3094 17 31C17 34.7406 18.4547 38.257 21.1015 40.8984C23.743 43.5453 27.2594 45 31 45C34.7406 45 38.257 43.5453 40.8984 40.8984C43.5453 38.2516 45 34.7406 45 31C45 28.3094 44.2344 25.6953 42.7851 23.4422C41.3742 21.2492 39.389 19.4937 37.0484 18.3672C36.3648 18.0445 35.55 18.3289 35.2219 19.0125Z" fill="#FF2E2E"/>
                          <path d="M36.3211 30.2726C36.589 30.0047 36.7203 29.6547 36.7203 29.3047C36.7203 28.9547 36.589 28.6047 36.3211 28.3367L32.8812 24.8969C32.3781 24.3937 31.7109 24.1203 31.0055 24.1203C30.3 24.1203 29.6273 24.3992 29.1297 24.8969L25.6898 28.3367C25.1539 28.8726 25.1539 29.7367 25.6898 30.2726C26.2258 30.8086 27.0898 30.8086 27.6258 30.2726L29.6437 28.2547L29.6437 36.0258C29.6437 36.7804 30.2562 37.3929 31.0109 37.3929C31.7656 37.3929 32.3781 36.7804 32.3781 36.0258L32.3781 28.2492L34.3961 30.2672C34.9211 30.8031 35.7851 30.8031 36.3211 30.2726Z" fill="#FF2E2E"/>
                          </g>
                          <defs>
                          <clipPath id="clip6">
                          <rect width="28" height="28" fill="white" transform="translate(17 45) rotate(-90)"/>
                          </clipPath>
                          </defs>
                          </svg>
                        </td>
                        <td>
                          <h6 class="fs-16 font-w600 mb-0"><a href="{!! url('/transactions-details'); !!}" class="text-black">Hawkins Jr.</a></h6>
                          <span class="fs-14">Transfer</span>
                        </td>
                        <td>
                          <h6 class="fs-16 text-black font-w400 mb-0">June 4, 2020</h6>
                          <span class="fs-14">05:34</span>
                        </td>
                        <td><span class="fs-16 text-black font-w500">-$167</span></td>
                        <td><span class="text-dark fs-16 font-w500 text-right d-block">Canceled</span></td>
                      </tr>
                    <tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
			
@endsection			