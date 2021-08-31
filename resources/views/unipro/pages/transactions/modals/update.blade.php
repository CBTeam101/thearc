<!-- Modal start -->
<div class="modal fade" id="transaction-update-modal" tabindex="-1" aria-labelledby="user-update-modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFullScreenTitle">New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation was-validated" novalidate="" id="user-update-form">
          <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <!-- Card start -->
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Personal Info</div>
                </div>
                <div class="card-body">

                  <!-- Row start -->
                  <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" required="" name="update-first_name" autofocus>
                        <div class="field-placeholder">First Name</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" name="update-middle_name">
                        <div class="field-placeholder">Middle Name</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" required="" name="update-last_name">
                        <div class="field-placeholder">Last Name</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" id="inputPwd" required="" name="update-contact_no">
                        <div class="field-placeholder">Phone</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                  </div>
                  <!-- Row end -->

                </div>
              </div>
              <!-- Card end -->
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

              <!-- Card start -->
              <div class="card">
                <div class="card-header">
                  <div class="card-title">User Acount</div>
                </div>
                <div class="card-body">
                  <!-- Row start -->
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="email" class="form-control" name="update-email">
                        <div class="field-placeholder">Email</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" name="update-username" required="">
                        <div class="field-placeholder">Username</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="password" class="form-control" name="update-password">
                        <div class="field-placeholder">Password</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="password" class="form-control" name="update-password_confirmation">
                        <div class="field-placeholder">Confirm Password</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>
                  </div>
                  <!-- Row end -->

                </div>
              </div>
              <!-- Card end -->

            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

              <!-- Card start -->
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Others</div>
                </div>
                <div class="card-body">
                  <!-- Row start -->
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <div class="noti-container">
                        <div class="noti-block">
                          <div>Active</div>
                          <div class="form-switch">
                            <input class="form-check-input" type="checkbox" id="showAlertss" checked name="update-is_active">
                            <label class="form-check-label" for="showAlertss"></label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <div class="field-wrapper mt-4">
                        <input type="file" class="" name="update-upload-profile">
                        <div class="field-placeholder">Profile</div>
                      </div>

                    </div>
                  </div>
                  <!-- Row end -->

                </div>
              </div>
              <!-- Card end -->

            </div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal end -->