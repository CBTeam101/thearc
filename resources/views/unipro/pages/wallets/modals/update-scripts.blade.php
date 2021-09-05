<script type="text/javascript">
  const updateModule = {
    init: function() {
      this.cache()
      this.events()
      this.plugin()
      this.variables()
    },
    container: $('.content-wrapper'),
    variables: function() {},
    plugin: function() {},
    cache: function() {
      this.holder = this.container.find('[name=update-holder]')
      this.token = this.container.find('[name=update-token]')
      this.uuid = this.container.find('[name=update-uuid]')
      this.address = this.container.find('[name=update-address]')
      this.no = this.container.find('[name=update-no]')
      this.balance = this.container.find('[name=update-balance]')
      this.locked = this.container.find('[name=update-is_locked]')
      this.walletForm = this.container.find('#wallet-update-form')
      this.modal = this.container.find('#wallet-update-modal')
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
      this.holder.val('')
      this.token.val('')
      this.uuid.val('')
      this.address.val('')
      this.no.val('')
      this.balance.val('')
    },
    events: function() {
      this.walletForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return
        const options = {
          url: `/settings/wallets/${this.wallet_id}`,
          method: 'PUT',
          data: { balance: this.balance.val() }
        }
        this.http(options)
          .done(function(res) {
            swal('Success', res.message, 'success')
              .then(function() {
                indexModule.datatable.ajax.reload()
                this.modal.modal('hide')
                this.clear()
              }.bind(this))
          }.bind(this))
      }.bind(this))
    }
  }
  updateModule.init()
</script>