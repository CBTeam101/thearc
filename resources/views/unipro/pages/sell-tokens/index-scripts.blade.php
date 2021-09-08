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
        ajax: '/operations/sell-tokens/datatable',
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
            data: 'ask_price',
            name: 'ask_price'
          },
          {
            data: 'token',
            name: 'token'
          },
          {
            data: 'payment_method',
            name: 'payment_method'
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
      this.table = this.container.find('#sell-tokens-table')
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
      this.table.on('click', '.sell-token-edit', function(e) {
        const options = {
          url: `/operations/sell-tokens/${e.currentTarget.id}`,
          method: 'GET'
        }
        this.http(options)
          .then(function(res) {
            updateModule.sell_token_id = res.id
            updateModule.owner.val(res.owner.full_name)
            updateModule.recipient.val(res.recipient.full_name)
            updateModule.ask.val(res.ask_price)
            updateModule.currentPrice.val(res.current_price)
            updateModule.token.val(res.token)
            updateModule.status.val(res.status.name)
            updateModule.tokentype.val(res.token_type.name)
            updateModule.description.val(res.description)
            updateModule.modal.modal('show')
          })
      }.bind(this))
      this.table.on('click', '.sell-token-delete', function(e) {
        const options = {
          url: `/operations/sell-tokens/${e.currentTarget.id}`,
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
      this.table.on('click', '.sell-token-cancel', function(e) {
        const options = {
          url: `/operations/sell-tokens/sell-cancel/${e.currentTarget.id}`,
          method: 'POST'
        }

        swal({
            title: "Are you sure?",
            text: "Once cancelled, you will not be able to undo this action!",
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
      this.table.on('click', '.sell-token-accept', function(e) {
        const options = {
          url: `/operations/sell-tokens/sell-approve/${e.currentTarget.id}`,
          method: 'POST'
        }

        swal({
            title: "Are you sure?",
            text: "Once approved, you will not be able to undo this action!",
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