<script type="text/javascript">
  const module = {
    init: function() {
      this.cache()
      this.events()
      this.plugin()
      this.variables()
    },
    container: $('.content-wrapper'),
    variables: function() {
      this.current_id = null
      this.current_url = '/settings/menus'
      this.saveUrl = `/settings/menus`
      this.updateUrl = null
      this.method = 'POST'
    },
    plugin: function() {
      this.datatable = this.table.DataTable({
        processing: true,
        serverSide: true,
        fixedHeader: true,
        responsive: true,
        ajax: '/settings/menus/datatable',
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
            data: 'options',
            name: 'options'
          }
        ]
      })
      this.submenus.select2({
        ajax: {
        url: '/select2/menus',
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
      this.form = this.container.find('#menu-form')
      this.name = this.container.find('[name=name]')
      this.submenus = this.container.find('[name=sub_menus]')
      this.is_parent = this.container.find('[name=is_parent]')
      this.table = this.container.find('#menus-table')
      this.btnSubmit = this.container.find('.btn-submit')
      this.btnUpdate = this.container.find('.btn-update')
      this.btnCancel = this.container.find('.btn-cancel')
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
      this.name.val('')
      this.icon.val('')
    },
    events: function() {
      this.form.on('submit', function(e) {
        e.preventDefault()
        const valid = this.validate(e.currentTarget, e)
        if (!valid) return
        return console.log(this.submenus.val())
        const options = {
          url: this.current_url,
          method: this.method,
          data: {
            name: this.name.val(),
            icon: this.icon.val(),
            is_parent: this.is_parent.checked?1:0,
            sub_menus: this.submenus.val()
          }
        }
        this.http(options)
          .done(function(res) {
            swal('Success!', res.message, 'success')
              .then(function() {
                this.clear()
                this.current_id = null
                this.method = 'POST'
                this.current_url = this.saveUrl
                this.btnSubmit.removeClass('d-none')
                this.btnUpdate.addClass('d-none')
                this.btnCancel.addClass('d-none')
                this.datatable.ajax.reload() // reload datatable
              }.bind(this))
          }.bind(this))
      }.bind(this))

      this.container.on('click', '.role-edit', function(e) {
        this.btnSubmit.addClass('d-none')
        this.current_id = e.currentTarget.id
        this.updateUrl = `/settings/menus/${this.current_id}`;
        this.current_url = this.updateUrl
        this.method = 'PUT'
        const options = {
          url: `/settings/menus/${this.current_id}`,
          method: 'GET'
        }
        this.http(options)
          .done(function(res) {
            this.name.val(res.name)
            this.btnUpdate.removeClass('d-none')
            this.btnCancel.removeClass('d-none')
          }.bind(this))
      }.bind(this))

      this.container.on('click', '.role-delete', function(e) {
        const options = {
          url: `/settings/menus/${e.currentTarget.id}`,
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

      this.btnCancel.on('click', function(e) {
        this.current_id = null
        this.method = 'POST'
        this.current_url = this.saveUrl
        this.btnSubmit.removeClass('d-none')
        this.btnUpdate.addClass('d-none')
        this.btnCancel.addClass('d-none')
        this.clear()
      }.bind(this))
    }
  }
  module.init()
</script>