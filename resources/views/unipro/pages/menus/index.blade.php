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
          <div class="card-title">Menu</div>
        </div>
        <div class="card-body mt-4">

          <form class="needs-validation" novalidate id="menu-form">
            <!-- Row start -->
            <div class="row gutters">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">

                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <input type="text" class="form-control" value="" required name="name">
                  <div class="field-placeholder">Name</div>
                </div>
                <!-- Field wrapper end -->

              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">

                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <input type="text" class="form-control" value="" required name="icon">
                  <div class="field-placeholder">Icon</div>
                </div>
                <!-- Field wrapper end -->

              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">

                <!-- Field wrapper start -->
                <div class="field-wrapper">
                  <select class="single-select" name="sub_menus" multiple="">
                    <!-- Select 2 -->
                  </select>
                  <div class="field-placeholder">Sub Menus</div>
                </div>
                <!-- Field wrapper end -->

              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">

                <!-- Field wrapper start -->
                <div class="noti-container">
                  <div class="noti-block">
                    <div>Has Submenu</div>
                    <div class="form-switch">
                      <input class="form-check-input" type="checkbox" id="showAlertss" name="is_parent">
                      <label class="form-check-label" for="showAlertss"></label>
                    </div>
                  </div>
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
          <div class="card-title">Menus</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="menus-table" class="table custom-table">
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
@include('unipro.pages.menus.index-scripts')
@endsection