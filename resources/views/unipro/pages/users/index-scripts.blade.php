<script type="text/javascript">
  const indexModule = {
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
        responsive: true,
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
    events: function() {
      this.table.on('click', '.role-edit', function(e) {
        const options = {
          url: `/settings/users/${e.currentTarget.id}`,
          method: 'GET'
        }
        this.http(options)
          .then(function(res) {
            updateModule.user_id = res.id
            updateModule.firstname.val(res.first_name)
            updateModule.middlename.val(res.middle_name)
            updateModule.lastname.val(res.last_name)
            updateModule.phone.val(res.contact_no)
            updateModule.email.val(res.email)
            updateModule.username.val(res.username)
            updateModule.active[0].checked = res.is_active > 0
            updateModule.modal.modal('show')
          })
      }.bind(this))
      this.table.on('click', '.role-delete', function(e) {
        const options = {
          url: `/settings/users/${e.currentTarget.id}`,
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
    }
  }
  indexModule.init()
</script>