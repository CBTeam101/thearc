{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">
  <div class="page-titles form-head d-flex flex-wrap justify-content-between align-items-center mb-4">
    <h2 class="text-black font-w600 mb-0 mr-auto mb-2 pr-3">Users List</h2>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive table-hover fs-14 card-table">
        <table class="table display mb-4 dataTablesCard " id="users" style="width: 100%;">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Users</th>
              <th>Tokens</th>
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