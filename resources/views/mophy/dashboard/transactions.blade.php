{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">
  <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
    <h2 class="text-black font-w600 mb-0 mr-auto mb-2 pr-3">Transactions History</h2>
    <!-- <div class="dropdown custom-dropdown mr-3 mb-2">
      <div class="btn bg-white btn-rounded" role="button" data-toggle="dropdown" aria-expanded="false">
        <svg class="mr-2" width="53" height="35" viewBox="0 0 53 35" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="0.757812" y="0.120972" width="52.2424" height="34.7581" rx="16" fill="#FF7426" />
          <mask id="mask0" maskUnits="userSpaceOnUse" x="0" y="0" width="54" height="35">
            <rect x="0.757812" y="0.120972" width="52.2424" height="34.7581" rx="16" fill="#6418C3" />
          </mask>
          <g mask="url(#mask0)">
            <path d="M15.3428 -0.19458C18.6035 0.533213 25.5793 4.70863 27.3962 15.5879C29.6674 29.1871 49.8711 32.353 59.8841 31.0428" stroke="#FF9900" />
            <path d="M16.624 -0.537781C19.8848 0.190012 26.8605 4.36543 28.6775 15.2447C30.9486 28.8439 51.1523 32.0098 61.1653 30.6996" stroke="#FF9900" />
            <path d="M17.9043 -0.880981C21.1651 -0.153188 28.1408 4.02223 29.9577 14.9015C32.2289 28.5007 52.4326 31.6666 62.4456 30.3564" stroke="#FF9900" />
            <path d="M19.1855 -1.22412C22.4463 -0.496328 29.4221 3.67909 31.239 14.5584C33.5101 28.1575 53.7139 31.3235 63.7269 30.0132" stroke="#FF9900" />
            <path d="M20.4658 -1.56732C23.7266 -0.839529 30.7023 3.33589 32.5193 14.2152C34.7904 27.8143 54.9941 30.9803 65.0071 29.67" stroke="#FF9900" />
            <circle cx="-6.99918" cy="33.8755" r="11.9998" fill="#FF8F50" />
            <circle cx="51.0804" cy="9.08316" r="9.345" fill="#FB6A19" />
            <circle cx="51.0804" cy="9.08319" r="7.0697" fill="#FF823C" />
            <circle cx="51.0805" cy="9.08315" r="4.79439" fill="#FF9E67" />
          </g>
        </svg>
        Orange Card <i class="fa fa-caret-down text-primary ml-3" aria-hidden="true"></i>
      </div>
      <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="javascript:void(0);">Details</a> <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a> </div>
    </div> -->
    <!-- <a href="javascript:void(0)" class="btn btn-primary btn-rounded mr-3  mb-2" data-toggle="modal" data-target="#exampledownload"> <i class="las la-download scale5 mr-3"></i> Download Report</a> -->
    <!-- <div class="dropdown custom-dropdown  mb-2">
      <div class="btn btn-light btn-rounded" role="button" data-toggle="dropdown" aria-expanded="false"> <i class="las la-calendar-alt scale5 mr-3"></i> Filter Date <i class="fa fa-caret-down text-primary ml-3" aria-hidden="true"></i> </div>
      <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="javascript:void(0);">Details</a> <a class="dropdown-item text-danger" href="javascript:void(0);">Cancel</a> </div>
    </div> -->
    <!-- Modal -->
    <div class="modal fade" id="exampledownload">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span> </button>
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
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive table-hover fs-14 card-table">
        <table class="table display mb-4 dataTablesCard " id="transactions" style="width: 100%;">
          <thead>
            <tr>
              <th>Check</th>
              <th>Name</th>
              <th>Tr No</th>
              <th>Tokens</th>
              <th>Description</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection