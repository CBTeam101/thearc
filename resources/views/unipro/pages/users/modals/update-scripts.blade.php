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
      this.firstname = this.container.find('[name=update-first_name]')
      this.middlename= this.container.find('[name=update-middle_name]')
      this.lastname  = this.container.find('[name=update-last_name]')
      this.phone = this.container.find('[name=update-contact_no]')
      this.email = this.container.find('[name=update-email]')
      this.username = this.container.find('[name=update-username]')
      this.password = this.container.find('[name=update-password]')
      this.password_confirmation = this.container.find('[name=update-password_confirmation]')
      this.active = this.container.find('[name=update-is_active]')
      this.profile = this.container.find('[name=update-upload-profile]')
      this.userForm = this.container.find('#user-update-form')
      this.modal = this.container.find('#user-update-modal')
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
      this.userForm.on('submit', function(e) {
        e.preventDefault()
        const isValid = this.validate(e.currentTarget, e)
        if(!isValid) return
        const form = new FormData()
        form.append('first_name', this.firstname.val())
        form.append('middle_name', this.middlename.val())
        form.append('last_name', this.lastname.val())
        form.append('contact_no', this.phone.val())
        form.append('username', this.username.val())
        form.append('email', this.email.val())
        form.append('password', this.password.val())
        form.append('password_confirmation', this.password_confirmation.val())
        form.append('is_active', this.active[0].checked ? 1 : 0)
        form.append('profile', this.profile[0].files.length > 0 ? this.profile[0].files[0] : '')
        const options = {
          url: `/settings/users/${this.user_id}`,
          method: 'POST',
          processData: false,
          contentType: false,
          data: form
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