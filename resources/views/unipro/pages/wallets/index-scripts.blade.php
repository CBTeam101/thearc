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
        ajax: '/settings/wallets/datatable',
        "lengthMenu": [
          [5, 10, 25, 50],
          [5, 10, 25, 50, "All"]
        ],
        "language": {
          "lengthMenu": "Display _MENU_ Records Per Page",
          "info": "Showing Page _PAGE_ of _PAGES_",
        },
        columns: [{
            data: 'holder',
            name: 'holder'
          },
          {
            data: 'token',
            name: 'token'
          },
          {
            data: 'uuid',
            name: 'uuid'
          },
          {
            data: 'wallet_address',
            name: 'wallet_address'
          },
          {
            data: 'wallet_no',
            name: 'wallet_no'
          },
          {
            data: 'balance',
            name: 'balance'
          },
          {
            data: 'options',
            name: 'options'
          }
        ],
      });
    },
    cache: function() {
      this.table = this.container.find('#wallets-table')
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
      this.table.on('click', '.wallet-edit', function(e) {
        const options = {
          url: `/settings/wallets/${e.currentTarget.id}`,
          method: 'GET'
        }
        this.http(options)
          .then(function(res) {
            updateModule.wallet_id = res.id
            updateModule.holder.val(res.holder)
            updateModule.token.val(res.token_type)
            updateModule.uuid.val(res.uuid)
            updateModule.address.val(res.wallet_address)
            updateModule.no.val(res.wallet_no)
            updateModule.balance.val(parseFloat(res.balance))
            updateModule.modal.modal('show')
          })
      }.bind(this))
      this.table.on('click', '.role-delete', function(e) {
        const options = {
          url: `/settings/wallets/${e.currentTarget.id}`,
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