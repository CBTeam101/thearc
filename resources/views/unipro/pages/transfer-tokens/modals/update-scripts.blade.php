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
      this.owner = this.container.find('[name=update-owner]')
      this.recipient= this.container.find('[name=update-recipient]')
      this.ask = this.container.find('[name=update-ask_price]')
      this.currentPrice =this.container.find('[name=update-current_price]')
      this.token = this.container.find('[name=update-token]')
      this.status = this.container.find('[name=update-status]')
      this.tokentype = this.container.find('[name=update-token-type]')
      this.description = this.container.find('[name=update-sell-token-description]')
      this.userForm = this.container.find('#sell-token-update-form')
      this.modal = this.container.find('#sell-token-update-modal')
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
      this.ask.val('')
      this.token.val('')
    },
    events: function() {
      this.userForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return
        const options = {
          url: `/operations/sell-tokens/${this.sell_token_id}`,
          method: 'PUT',
          data: {
            ask_price: this.ask.val(),
            token: this.token.val(),
            description: this.description.val()
          }
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