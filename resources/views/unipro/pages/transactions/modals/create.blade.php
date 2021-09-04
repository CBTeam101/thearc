<!-- Modal start -->
<div class="modal fade" id="transaction-create-modal" aria-labelledby="user-create-modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFullScreenTitle">New Transaction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation was-validated" novalidate="" id="transaction-create-form">
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
                        <select class="select-single" name="create-user-account" required data-live-search="true">
                          <!-- Select2 -->
                        </select>
                        <!-- <input type="text" class="form-control" required="" name="create-user-account" autofocus> -->
                        <div class="field-placeholder">User Account</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <select name="create-token-type" class="single-select" required>
                          <!-- Select 2 -->
                        </select>
                        <div class="field-placeholder">Token Type</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" value="{{\Carbon\Carbon::now()->format('YHis')}} - {{strtoupper(\Illuminate\Support\Str::random(16))}}"name="create-tr-no" required readonly />
                        <div class="field-placeholder">Tr. No.</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="number" class="form-control" required name="create-amount">
                        <div class="field-placeholder">Amount</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" required name="create-tokens">
                        <div class="field-placeholder">Tokens</div>
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
                  <div class="card-title">Others</div>
                </div>
                <div class="card-body">
                  <!-- Row start -->
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <div class="noti-container">
                        <div class="noti-block">
                          <div>Approve</div>
                          <div class="form-switch">
                            <input class="form-check-input" type="checkbox" id="approve" value="1" checked name="create-approve">
                            <label class="form-check-label" for="approve"></label>
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="file" class="" required name="create-photo">
                        <div class="field-placeholder">Proof Of Payment</div>
                      </div>
                      <!-- Field wrapper end -->

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