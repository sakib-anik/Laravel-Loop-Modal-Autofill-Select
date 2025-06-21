  <div class="modal fade" id="exampleModal{{ $qardHasana->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Refund</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <div class="card">
                <!-- <div class="card-body"> -->
                <form method="POST" action="" id="editUserForm" class="row g-3 ">
                  @csrf
                  <div class="col-12">
                    <div class="card">
                        <div class="collapse show" id="collapseExample">
                          <div class="d-grid d-sm-flex border p-3">
                              <div class="card-body">
                                    <div class="row mb-3">
                                      <div class="col-md-4">
                                        <h5>
                                          Qard Hasana Amount: £{{ $qardHasana->total_offc_pound }}.{{ str_pad($qardHasana->total_offc_pence, 2, '0', STR_PAD_LEFT) }}
                                        </h5>
                                      </div>

                                      <div class="col-md-4">
                                        <h5>
                                          Refunded Amount: £{{ $qardHasana->total_offc_pound - $qardHasana->due_pound }}.{{ str_pad($qardHasana->total_offc_pence - $qardHasana->due_pence, 2, '0', STR_PAD_LEFT) }}
                                        </h5>
                                      </div>

                                      <div class="col-md-4">
                                        <h5>
                                          Due Amount: £{{ $qardHasana->due_pound }}.{{ str_pad($qardHasana->due_pence, 2, '0', STR_PAD_LEFT) }}
                                        </h5>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-company">Refund Date</label>
                                      <div class="col-sm-3">
                                        <input required="" name="refund_date" type="text" class="form-control datepicker" id="basic-default-company" placeholder="Refund Date" />
                                      </div>
                                      <label class="col-form-label col-sm-2" for="basic-default-company">Refund Time</label>
                                      <div class="col-sm-3">
                                        <input name="refund_time" type="time" class="form-control" id="basic-default-company" value="00:00" />
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-company">Refund Method</label>
                                      <div class="col-sm-8">
                                       <select required="" name="refund_method" id="alignment-country" class="select2 form-select" data-allow-clear="true">
                                         <option value="cash">Cash</option>
                                         <option value="cheque">Cheque</option>
                                         <option value="BACS">BACS</option>
                                       </select>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-company">Refund Type</label>
                                      <div class="col-sm-8">
                                       <select required="" name="refund_type" class="select2 form-select refundType">
                                         <option value="full">Full</option>
                                         <option value="partial">Partial</option>
                                       </select>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-company">Refund Amount</label>
                                      <div class="col-sm-8">
                                        <div class="input-group">
                                            <span class="input-group-text">£</span>
                                            <input type="text" name="refund_pound" placeholder="0" aria-label="First name" class="office_use form-control refundPound">
                                            <input type="text" name="refund_pence" placeholder="00" aria-label="Last name" class="office_use form-control refundPence">
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-name">Refund By</label>
                                      <div class="col-sm-8">
                                        <input required="" name="refund_by" type="text" class="form-control" id="basic-default-name" placeholder="Refund By" />
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2" for="basic-default-name">Comment</label>
                                      <div class="col-sm-8">
                                        <input required="" name="comments" type="text" class="form-control" id="basic-default-name" placeholder="Comment" />
                                      </div>
                                    </div>
                                    <div class="row mb-3">
                                      <label class="col-form-label col-sm-2">Documents</label>
                                      <div class="col-sm-8">
                                        <div class="custom-file-container" data-upload-id="uploadId{{ $qardHasana->id }}">
                                            <label><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"> </a></label>
                                            <label class="custom-file-container__custom-file">
                                                <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="*" multiple aria-label="Choose File">
                                                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                <span class="custom-file-container__custom-file__custom-file-control"></span>
                                            </label>
                                            <div class="custom-file-container__image-preview"></div>
                                        </div>
                                      </div>
                                    </div>
                        <div class="col-12 text-left">
                          <button name="submit" type="submit" class="btn btn-success me-1 me-sm-3">Refund</button>
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                         
                      </div>
               </form>
             </div>
          </div>
       </div>
    </div>
  </div>








