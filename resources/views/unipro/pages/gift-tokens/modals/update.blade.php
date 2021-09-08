<!-- Modal start -->
<div class="modal fade" id="sell-token-update-modal" tabindex="-1" aria-labelledby="user-update-modal" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFullScreenTitle">Update Sell Token</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="needs-validation was-validated" novalidate="" id="sell-token-update-form">
          <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
              <!-- Card start -->
              <div class="card">
                <div class="card-header">
                  <div class="card-title">Users Info</div>
                </div>
                <div class="card-body">

                  <!-- Row start -->
                  <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" required="" name="update-owner" readonly>
                        <div class="field-placeholder">Owner</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" name="update-recipient" readonly>
                        <div class="field-placeholder">Recipient</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" class="form-control" name="update-token-type" readonly>
                        <div class="field-placeholder">Token Type</div>
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
                  <div class="card-title"></div>
                </div>
                <div class="card-body">
                  <!-- Row start -->
                  <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="number" step="any" class="form-control" name="update-current_price" readonly>
                        <div class="field-placeholder">Current Price</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="number" step="any" class="form-control" name="update-ask_price">
                        <div class="field-placeholder">Ask Price(Total)</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="number" step="any" class="form-control" name="update-token">
                        <div class="field-placeholder">Token</div>
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

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <input type="text" step="any" class="form-control" name="update-status" readonly>
                        <div class="field-placeholder">Status</div>
                      </div>
                      <!-- Field wrapper end -->

                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                      <!-- Field wrapper start -->
                      <div class="field-wrapper">
                        <textarea name="update-sell-token-description" cols="" rows="7" placeholder="Fill in the fields with details depending on the payment method."></textarea>
                        <div class="field-placeholder">Description</div>
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