@extends('unipro.layouts.app')
@section('content')
<!-- Content wrapper start -->
<div class="content-wrapper">

  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
      <button class="btn btn-primary btn-sm mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#transaction-create-modal"><i class="icon-user-plus"></i> Add</button>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">

      <!-- Card start -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Transactions</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="transactions-table" class="table custom-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Tr. No.</th>
                  <th>Token</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Time/Date Created</th>
                  <th class="td-actions">Options</th>
                </tr>
              </thead>
              <tbody>
                <!-- DataTable -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Card end -->
    </div>
  </div>
  <!-- Row end -->

  @include('unipro.pages.transactions.modals.update')
  @include('unipro.pages.transactions.modals.create')

</div>
<!-- Content wrapper end -->
@endsection

@section('scripts')
@include('unipro.pages.transactions.index-scripts')
@include('unipro.pages.transactions.modals.create-scripts')
@include('unipro.pages.transactions.modals.update-scripts')
@endsection