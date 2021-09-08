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
        ajax: '/operations/transfer-tokens/datatable',
        "lengthMenu": [
          [5, 10, 25, 50],
          [5, 10, 25, 50, "All"]
        ],
        "language": {
          "lengthMenu": "Display _MENU_ Records Per Page",
          "info": "Showing Page _PAGE_ of _PAGES_",
        },
        columns: [{
            data: 'owner',
            name: 'owner'
          },
          {
            data: 'recipient',
            name: 'recipient'
          },
          {
            data: 'token_type',
            name: 'token_type'
          },
          {
            data: 'status',
            name: 'status'
          },
          {
            data: 'current_price',
            name: 'current_price'
          },
          {
            data: 'token',
            name: 'token'
          },
          {
            data: 'date_created',
            name: 'date_created'
          },
          {
            data: 'options',
            name: 'options'
          }
        ],
      });
    },
    cache: function() {
      this.table = this.container.find('#transfer-tokens-table')
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
      this.table.on('click', '.transfer-token-delete', function(e) {
        const options = {
          url: `/operations/transfer-tokens/${e.currentTarget.id}`,
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