<script type="text/javascript">
  const updateModule = {
    init: function() {
      this.variables()
      this.cache()
      this.events()
      this.plugin()
    },
    container: $('.content-wrapper'),
    variables: function() {},
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
      .change()
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
      .change()
    },
    cache: function() {
      this.useraccount = this.container.find('[name=update-user-account]')
      this.tokentype = this.container.find('[name=update-token-type]')
      this.trno = this.container.find('[name=update-tr-no]')
      this.amount = this.container.find('[name=update-amount]')
      this.tokens = this.container.find('[name=update-tokens]')
      this.approve = this.container.find('[name=update-approve]')
      this.photo = this.container.find('[name=update-photo]')
      this.modal = this.container.find('#transaction-update-modal')
      this.transactionForm = this.container.find('#transaction-update-form')
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
      this.firstname.val('')
      this.middlename.val('')
      this.lastname.val('')
      this.phone.val('')
      this.username.val('')
      this.email.val('')
      this.password.val('')
      this.password_confirmation.val('')
      this.profile.val('')
    },
    events: function() {
      this.transactionForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return
        const form = new FormData()
        form.append('account_id', this.useraccount.val())
        form.append('token_id', this.tokentype.val())
        form.append('trno', this.trno.val())
        form.append('amount', this.amount.val())
        form.append('tokens', this.tokens.val())
        form.append('approve', this.approve.val())
        form.append('photo', this.photo[0].files[0])
        const options = {
          url: `/operations/transactions/buy/${this.user_id}`,
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
  updateModule.init()
</script>