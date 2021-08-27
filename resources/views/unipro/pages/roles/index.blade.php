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
          <div class="card-title">Role</div>
        </div>
        <div class="card-body mt-4">

          <form class="needs-validation" novalidate id="role-form">
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
          <div class="card-title">Fixed Header</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="roles-table" class="table custom-table">
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
<script type="text/javascript">
  const module = {
    init: function() {
      this.cache()
      this.events()
      this.plugin()
      this.variables()
    },
    container: $('.content-wrapper'),
    variables: function() {
      this.current_id = null
      this.current_url = '/settings/roles'
      this.saveUrl = `/settings/roles`
      this.updateUrl = null
      this.method = 'POST'
    },
    plugin: function() {
      this.datatable = this.table.DataTable({
        processing: true,
        serverSide: true,
        fixedHeader: true,
        responsive: true,
        ajax: '/settings/roles/datatable',
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
            data: 'options',
            name: 'options'
          }
        ]
      });
    },
    cache: function() {
      this.form = this.container.find('#role-form')
      this.name = this.container.find('[name=name]')
      this.table = this.container.find('#roles-table')
      this.btnSubmit = this.container.find('.btn-submit')
      this.btnUpdate = this.container.find('.btn-update')
      this.btnCancel = this.container.find('.btn-cancel')
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
    validate: function(element, e) {
      if (!element.checkValidity()) {
        event.stopPropagation()
      }
      element.classList.add('was-validated')

      return element.checkValidity()
    },
    clear: function() {
      this.name.val('')
    },
    events: function() {
      this.form.on('submit', function(e) {
        e.preventDefault()
        const valid = this.validate(e.currentTarget, e)
        if (!valid) return
        const options = {
          url: this.current_url,
          method: this.method,
          data: {
            name: this.name.val()
          }
        }
        this.http(options)
          .done(function(res) {
            swal('Success!', res.message, 'success')
              .then(function() {
                this.clear()
                this.current_id = null
                this.method = 'POST'
                this.current_url = this.saveUrl
                this.btnSubmit.removeClass('d-none')
                this.btnUpdate.addClass('d-none')
                this.btnCancel.addClass('d-none')
                this.datatable.ajax.reload() // reload datatable
              }.bind(this))
          }.bind(this))
      }.bind(this))

      this.container.on('click', '.role-edit', function(e) {
        this.btnSubmit.addClass('d-none')
        this.current_id = e.currentTarget.id
        this.updateUrl = `/settings/roles/${this.current_id}`;
        this.current_url = this.updateUrl
        this.method = 'PUT'
        const options = {
          url: `/settings/roles/${this.current_id}`,
          method: 'GET'
        }
        this.http(options)
          .done(function(res) {
            this.name.val(res.name)
            this.btnUpdate.removeClass('d-none')
            this.btnCancel.removeClass('d-none')
          }.bind(this))
      }.bind(this))

      this.container.on('click', '.role-delete', function(e) {
        const options = {
          url: `/settings/roles/${e.currentTarget.id}`,
          method: 'DELETE'
        }

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this record!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              this.http(options)
                .done(function(res) {
                  swal('Success!', res.message, 'success')
                    .then(function() {
                      this.datatable.ajax.reload()
                    }.bind(this))
                }.bind(this))
            } else {
              swal("Operation cancelled!");
            }
          });
      }.bind(this))

      this.btnCancel.on('click', function(e) {
        this.current_id = null
        this.method = 'POST'
        this.current_url = this.saveUrl
        this.btnSubmit.removeClass('d-none')
        this.btnUpdate.addClass('d-none')
        this.btnCancel.addClass('d-none')
        this.clear()
      }.bind(this))
    }
  }
  module.init()
</script>
@endsection