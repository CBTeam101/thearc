@extends('unipro.layouts.app')
@section('content')
<!-- Content wrapper start -->
<div class="content-wrapper">

  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
      <!-- Card start -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Transaction Type</div>
        </div>
        <div class="card-body mt-4">

          <form class="needs-validation" novalidate id="transaction-type-form">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <input type="text" class="form-control" value="" required name="name">
                  <div class="field-placeholder">Name</div>
                </div>
                <!-- Field wrapper end -->

              </div>
              <div class="col-12">
                <button class="btn-submit btn btn-primary" type="submit">Save</button>
                <button class="btn-update d-none btn btn-primary" type="submit">Update</button>
                <button class="btn-cancel d-none btn btn-danger" type="button">Cancel</button>
              </div>
            </div>
            <!-- Row end -->
          </form>

        </div>
      </div>
      <!-- Card end -->

      <!-- Card start -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Transaction Types</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="transaction-types-table" class="table custom-table">
              <thead>
                <tr>
                  <th>Name</th>
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

</div>
<!-- Content wrapper end -->
@endsection

@section('scripts')
@include('unipro.pages.transaction-types.index-scripts')
@endsection