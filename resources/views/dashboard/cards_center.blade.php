{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">

  <div class="d-sm-flex d-block justify-content-between align-items-center mb-4">
    <h2 class="text-black font-w600 mb-sm-0 mb-2">Wallets Center</h2>
    @unlessrole('Bank')
    <button type="button" class="btn btn-rounded btn-success" data-toggle="modal" data-target="#buymodal"><span class="btn-icon-left text-success"><i class="fa fa-plus"></i> </span>Buy Token</button>
    <button type="button" class="btn btn-rounded btn-warning text-white" data-toggle="modal" data-target="#sellmodal"><span class="btn-icon-left text-warning"><i class="fa fa-share"></i> </span>Sell Token</button>
    <button type="button" class="btn btn-rounded btn-danger" data-toggle="modal" data-target="#giftmodal"><span class="btn-icon-left text-danger"><i class="fa fa-gift"></i> </span>Gift Token</button>
    @endunlessrole
    <!-- Buy Token -->
    <div class="modal fade" id="buymodal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="buy-token">
          <div class="modal-header">
            <h5 class="modal-title">Request Form</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span> </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-info alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
              </svg>
              Send us photo of your payment we recommend GCash +63 906 602 8287.
            </div>
            <div class="form-group">
              <label for="">Token Type<span class="text-danger">*</span></label>
              <select name="token_type" class="form-control rounded">
                @foreach($tokens as $t)
                <option value="{{$t->id}}">{{$t->av}} ({{$t->name}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Transaction #</label>
              <input type="text" class="form-control input-rounded" value="{{\Carbon\Carbon::now()->format('YHis')}} - {{strtoupper(\Illuminate\Support\Str::random(16))}}" name="tr_no" readonly>
            </div>
            <div class="form-group">
              <label for="">Amount<span class="text-danger">*</span></label>
              <input type="number" class="form-control input-rounded" placeholder="100" name="amount">
            </div>
            <div class="form-group">
              <label for="">Tokens</label>
              <input type="text" class="form-control input-rounded" placeholder="" name="token" readonly>
            </div>
            <div class="form-group">
              <label for="">Photo/Screenshot (Proof of Payment)<span class="text-danger">*</span></label>
              <input type="file" class="form-control input-rounded" name="file" multiple required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Sell Token -->
    <div class="modal fade" id="sellmodal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="buy-token">
          <div class="modal-header">
            <h5 class="modal-title">Selling Form</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span> </button>
          </div>
          <div class="modal-body">
            <!-- <div class="alert alert-info alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
              </svg>
              Send us photo of your payment we recommend GCash +63 906 602 8287.
            </div> -->
            <div class="form-group">
              <label for="">Token Type<span class="text-danger">*</span></label>
              <select name="token_type" class="form-control rounded">
                @foreach($tokens as $t)
                <option value="{{$t->id}}">{{$t->av}} ({{$t->name}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Transaction #</label>
              <input type="text" class="form-control input-rounded" value="{{\Carbon\Carbon::now()->format('YHis')}} - {{strtoupper(\Illuminate\Support\Str::random(16))}}" name="tr_no" readonly>
            </div>
            <div class="form-group">
              <label for="">Tokens</label>
              <input type="text" class="form-control input-rounded" placeholder="" name="token">
            </div>
            <div class="form-group">
              <label for="">Amount<span class="text-danger">*</span></label>
              <input type="number" class="form-control input-rounded" placeholder="" name="amount" readonly>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Gift Token -->
    <div class="modal fade" id="giftmodal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="buy-token">
          <div class="modal-header">
            <h5 class="modal-title">Gift Form</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span> </button>
          </div>
          <div class="modal-body">
            <!-- <div class="alert alert-info alert-dismissible fade show">
              <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
              </svg>
              Send us photo of your payment we recommend GCash +63 906 602 8287.
            </div> -->
            <div class="form-group">
              <label for="">Token Type<span class="text-danger">*</span></label>
              <select name="token_type" class="form-control rounded">
                @foreach($tokens as $t)
                <option value="{{$t->id}}">{{$t->av}} ({{$t->name}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Transaction #</label>
              <input type="text" class="form-control input-rounded" value="{{\Carbon\Carbon::now()->format('YHis')}} - {{strtoupper(\Illuminate\Support\Str::random(16))}}" name="tr_no" readonly>
            </div>
            <div class="form-group">
              <label for="">Tokens</label>
              <input type="text" class="form-control input-rounded" placeholder="" name="token">
            </div>
            <div class="form-group">
              <label for="">Wallet No</label>
              <input type="text" class="form-control input-rounded" placeholder="" name="token">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Put In -->
    <div class="modal fade" id="putinmodal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" id="put-in-token">
          <div class="modal-header">
            <h5 class="modal-title">Put In Token</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span> </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Token Type<span class="text-danger">*</span></label>
              <select name="put_in_token_type" class="form-control rounded">
                @foreach($tokens as $t)
                <option value="{{$t->id}}">{{$t->av}} ({{$t->name}})</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="">Tr #</label>
              <input type="text" class="form-control input-rounded" value="{{\Carbon\Carbon::now()->format('His')}} - {{strtoupper(\Illuminate\Support\Str::random(4))}}" name="ref" readonly>
            </div>
            <div class="form-group">
              <label for="">Tokens<span class="text-danger">*</span></label>
              <input type="number" class="form-control input-rounded" placeholder="0" name="put_in_tokens">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-xl-12">
      <div class="cards owl-carousel mb-sm-5 mb-3">
        @foreach(auth()->user()->wallets as $wallet)
        <a href="{!! url('/transactions-details'); !!}" class="fs-14 btn-link mr-3 pb-3">
          <div class="items">
            <div class="card-bx mb-0">
              <img src="{{asset($wallet->token->img)}}" alt="">
              <div class="card-info text-white">
                <p class="mb-1">{{$wallet->token->av}}</p>
                <h2 class="fs-36 text-white mb-sm-4 mb-3">{{number_format($wallet->balance, 2)}} <small class="d-inline" style="font-size: 12px;">(₱{{number_format($wallet->balance*$wallet->token->price, 2)}})</small></h2>
                <div class="d-flex align-items-center justify-content-between mb-sm-5 mb-3">
                  <img src="images/dual-dot.png" alt="" class="dot-img">
                  <h4 class="fs-20 text-white mb-0">{{$wallet->wallet_no}}</h4>
                </div>
                <div class="d-flex">
                  <div class="mr-5">
                    <p class="fs-14 mb-1 op6">VALID THRU</p>
                    <span>N/A</span>
                  </div>
                  <div>
                    <p class="fs-14 mb-1 op6">WALLET HOLDER</p>
                    <span>{{$wallet->user->full_name}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
        @endforeach
      </div>
    </div>

    <div class="col-xl-9">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header d-sm-flex d-block border-0 pb-0">
              <div>
                <h4 class="fs-20 text-black">Put In Tokens</h4>
                <span class="fs-12">List of all tokens that is earning daily.</span>
              </div>
              <div class="dropdown custom-dropdown mb-0 mt-3 mt-sm-0">
                <button type="button" class="btn btn-rounded btn-primary" data-toggle="modal" data-target="#putinmodal">
                  Put In
                </button>
                <!-- <div class="btn btn-light btn-rounded" role="button" data-toggle="dropdown" aria-expanded="false"> Newest <i class="fa fa-caret-down text-primary ml-3" aria-hidden="true"></i> </div>
                <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="javascript:void(0);">Details</a> <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a> </div> -->
              </div>
            </div>
            <div class="card-body pb-0">
              @foreach($putins as $in)
              <div class="d-flex mb-3 border-bottom justify-content-between flex-wrap align-items-center">
                <div class="d-flex pb-3 align-items-center"> <img src="{{ asset($in->token->img) }}" alt="" class="rounded mr-3" width="130">
                  <div class="mr-3">
                    <p class="fs-14 mb-1">Token Type</p>
                    <span class="text-black font-w500">{{$in->token->av}}</span>
                  </div>
                </div>
                <div class="mr-3 pb-3">
                  <p class="fs-14 mb-1">Tokens</p>
                  <span class="text-black font-w500">{{$in->tokens}} <small style="font-size:12px;">(₱{{ number_format($in->tokens*1000) }})</small>  </span>
                </div>
                <div class="mr-3 pb-3">
                  <p class="fs-14 mb-1">Daily Earning</p>
                  <span class="text-black font-w500">{{round((float)$in->token->share/100/30, 2)}}% (₱{{round((float)$in->token->share/100/30, 2)*($in->tokens*1000)}})</span>
                </div>
                <div class="mr-3 pb-3">
                  <p class="fs-14 mb-1">Monthly Gross Income</p>
                  <span class="text-black font-w500 text-center">{{round($in->token->share)}}%</span>
                </div>
                <a href="{!! url('/transactions-details'); !!}" class="fs-14 btn-link mr-3 pb-3">See Number</a>
                <div class="dropdown pb-3">
                  <div class="btn-link" role="button" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M10 11.9999C10 13.1045 10.8954 13.9999 12 13.9999C13.1046 13.9999 14 13.1045 14 11.9999C14 10.8954 13.1046 9.99994 12 9.99994C10.8954 9.99994 10 10.8954 10 11.9999Z" fill="black"></path>
                      <path d="M10 4.00006C10 5.10463 10.8954 6.00006 12 6.00006C13.1046 6.00006 14 5.10463 14 4.00006C14 2.89549 13.1046 2.00006 12 2.00006C10.8954 2.00006 10 2.89549 10 4.00006Z" fill="black"></path>
                      <path d="M10 20C10 21.1046 10.8954 22 12 22C13.1046 22 14 21.1046 14 20C14 18.8954 13.1046 18 12 18C10.8954 18 10 18.8954 10 20Z" fill="black"></path>
                    </svg>
                  </div>
                  <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="javascript:void()">Delete</a> <a class="dropdown-item" href="javascript:void()">Edit</a> </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0 pb-0">
              <div>
                <h4 class="fs-20 text-black">Wallets Statistic</h4>
                <span class="fs-12">Represents wallet activity and balance.</span>
              </div>
            </div>
            <div class="card-body">
              <!-- <div class="row">
                <div class="col-xl-12 col-sm-6">
                  <div id="pieChart"></div>
                </div>
                <div class=" col-xl-12 col-sm-6">
                  <div class="d-flex flex-wrap text-black fs-12 mt-4"> <span class="mr-4 mb-3">
                      <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="19" height="19" rx="9.5" fill="#1EAAE7" />
                      </svg>
                      Main Card </span> <span class="mr-4 mb-3">
                      <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="19" height="19" rx="9.5" fill="#FF7A30" />
                      </svg>
                      Orange Card </span> <span class="mr-4 mb-3">
                      <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="19" height="19" rx="9.5" fill="#6418C3" />
                      </svg>
                      Purple Card </span> <span class="mr-4 mb-3">
                      <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="19" height="19" rx="9.5" fill="#FFEF5F" />
                      </svg>
                      Yellow Card </span> <span class="mr-4 mb-3">
                      <svg class="mr-2" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="19" height="19" rx="9.5" fill="#2BC155" />
                      </svg>
                      Green Card </span> </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection