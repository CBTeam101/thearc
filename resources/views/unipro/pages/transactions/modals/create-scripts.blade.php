<script type="text/javascript">
  const createModule = {
    init: function() {
      this.variables()
      this.cache()
      this.events()
      this.plugin()
    },
    container: $('.content-wrapper'),
    variables: function() {
      this.timeout = null
    },
    plugin: function() {
      this.useraccount.select2({
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
      this.useraccount = this.container.find('[name=user-account]')
      this.tokentype = this.container.find('[name=token-type]')
      this.trno = this.container.find('[name=tr-no]')
      this.amount = this.container.find('[name=amount]')
      this.tokens = this.container.find('[name=tokens]')
      this.approve = this.container.find('[name=approve]')
      this.photo = this.container.find('[name=photo]')
      this.modal = this.container.find('#transaction-create-modal')
      this.transactionForm = this.container.find('#transaction-create-form')
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
      this.useraccount.val('')
      this.tokentype.val('')
      this.trno.val('')
      this.amount.val('')
      this.username.val('')
      this.email.val('')
      this.password.val('')
      this.password_confirmation.val('')
      this.profile.val('')
    },
    events: function() {
      this.amount.on('keyup', function(e) {
        const options = {
          url: `/operations/transactions/get-tokens?token_id=${this.tokentype.val()}&amount=${e.target.value}`,
          method: 'GET'
        }

        if(this.timeout) clearTimeout(this.timeout)

        this.timeout = setTimeout(function() {
          this.http(options)
            .done(function(res) {
              this.tokens.val(res)
            }.bind(this))
        }.bind(this), 800)
      }.bind(this))
      
      this.transactionForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return

        const form = new FormData();
        form.append('account_id', this.useraccount.val())
        form.append('token_id', this.tokentype.val())
        form.append('trno', this.trno.val())
        form.append('amount', this.amount.val())
        form.append('tokens', this.tokens.val())
        form.append('approve', this.approve.val())
        form.append('photo', this.photo[0].files[0])

        const options = {
          url: '/operations/transactions/buy',
          method: 'POST',
          processData: false,
          contentType: false,
          data: form
        }
        this.http(options)
          .done(function(res) {
            swal('Success', res.message, 'success')
              .then(function() {
                // indexModule.datatable.ajax.reload()
                this.modal.modal('hide')
                window.location.reload()
              }.bind(this))
          }.bind(this))
      }.bind(this))
    }
  }
  createModule.init()
</script>