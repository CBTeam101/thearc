@extends('unipro.layouts.app')
@section('content')
<!-- Content wrapper start -->
<div class="content-wrapper">

  <!-- Row start -->
  <div class="row gutters">
    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
      <button class="btn btn-primary btn-sm mt-1 mb-3" data-bs-toggle="modal" data-bs-target="#user-create-modal"><i class="icon-user-plus"></i> Add</button>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">

      <!-- Card start -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Fixed Header</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="users-table" class="table custom-table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Total Tokens</th>
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

  @include('unipro.pages.users.modals.update')
  @include('unipro.pages.users.modals.create')

</div>
<!-- Content wrapper end -->
@endsection

@section('scripts')
<script type="text/javascript">
  const module = {
    init: function() {
      this.cache()
      this.events()
      this.plugin()
      this.variables()
    },
    container: $('.content-wrapper'),
    variables: function() {},
    plugin: function() {
      this.datatable = this.table.DataTable({
        processing: true,
        serverSide: true,
        fixedHeader: true,
        ajax: '/settings/users/datatable',
        "lengthMenu": [
          [5, 10, 25, 50],
          [5, 10, 25, 50, "All"]
        ],
        "language": {
          "lengthMenu": "Display _MENU_ Records Per Page",
          "info": "Showing Page _PAGE_ of _PAGES_",
        },
        columns: [{
            data: 'name',
            name: 'name'
          },
          {
            data: 'phone',
            name: 'phone'
          },
          {
            data: 'email',
            name: 'email'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'total_tokens',
            name: 'total_tokens'
          },
          {
            data: 'options',
            name: 'options'
          }
        ],
      });
    },
    cache: function() {
      this.table = this.container.find('#users-table')
    },
    http: function(options) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })

      return $.ajax(options)
        .fail(function(err) {
          swal('Errored!', JSON.stringify(err.responseJSON.message), 'error');
        })
    },
    events: function() {},
    add: function() {
      swal('Alert!', 'Sample', 'info')
    }
  }
  module.init()
</script>
@include('unipro.pages.users.modals.create-scripts')
@include('unipro.pages.users.modals.update-scripts')
@endsection