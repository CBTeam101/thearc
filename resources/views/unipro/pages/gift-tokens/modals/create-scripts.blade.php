<script type="text/javascript">
  const createModule = {
    init: function() {
      this.cache()
      this.events()
      this.plugin()
      this.variables()
    },
    container: $('.content-wrapper'),
    variables: function() {},
    plugin: function() {
      this.recipient.select2({
        ajax: {
        url: '/select2/user-accounts',
          data: function (params) {
            var query = {
              search: params.term
            }
            // Query parameters will be ?search=[term]&type=public
            return query;
          },
          processResults: function (data) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
              results: data.map(function(item) {
                return {
                  id: item.id,
                  text: item.full_name
                }
              })
            }
          }
        }
      })
      this.tokentype.select2({
        ajax: {
        url: '/select2/tokens',
          data: function (params) {
            var query = {
              search: params.term
            }
            // Query parameters will be ?search=[term]&type=public
            return query;
          },
          processResults: function (data) {
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
              results: data.map(function(item) {
                return {
                  id: item.id,
                  text: item.name
                }
              })
            }
          }
        }
      })
    },
    cache: function() {
      this.owner = this.container.find('[name=create-owner]')
      this.currentPrice =this.container.find('[name=create-current_price]')
      this.token = this.container.find('[name=create-token]')
      this.recipient = this.container.find('[name=create-gift-token-user-account]')
      this.tokentype = this.container.find('[name=create-gift-token-token-type]')
      this.description = this.container.find('[name=create-gift-token-description]')
      this.giftForm = this.container.find('#gift-token-create-form')
      this.modal = this.container.find('#gift-token-create-modal')
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
    clear: function() {},
    events: function() {
      this.giftForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return
        const options = {
          url: '/operations/gift-tokens',
          method: 'POST',
          data: {
            recipient_id: this.recipient.val(),
            current_price: this.currentPrice.val(),
            token: this.token.val(),
            token_id: this.tokentype.val(),
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

      this.tokentype.on('change', function(e) {
        const options = {
          url: `/current-price/${e.currentTarget.value}`,
          method: 'GET'
        }

        this.http(options)
          .done(function(res) {
            this.currentPrice.val(res)
          }.bind(this))
      }.bind(this))
    }
  }
  createModule.init()
</script>