<div class="modal fade" id="modal_input" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert text-light collapse" id="alert_input"></div>
            <div class="collapse" id="modal_loader_input">
                <div class="d-flex justify-content-center mt-2">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <form class="needs-validation" id="form_input">
                <div class="modal-body">
                    <div class="form-row row">
                        <div class="col-lg-12">
                            <div class="form-form-check">
                                <input class="form-check-input big-checkbox" type="checkbox" name="check_active" id="check_active" onclick="element_active();">
                                <label class="small mb-1" >
                                    Active 
                                </label>
                                <div id="active_element"></div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Waktu keberangkatan <span class="text-danger">*</span>
                                </label><br>
                                <input class="time_start form-control small" type="text" name="time_start" id="time_start" required /><br>
                                <label class="small text-secondary" >ex: 08:15</label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Waktu kedatangan <span class="text-danger">*</span>
                                </label><br>
                                <input class="time_end form-control small" type="text" name="time_end" id="time_end" required /><br>
                                <label class="small text-secondary" >ex: 09:00</label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Boat <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="boat" name="boat" required>
                                    <option value="" selected>Choose...</option>
                                    <?php foreach ($boat as $key => $value) { ?>
                                    <option value="<?=$value['id'];?>"><?=$value['kode_boat'];?></option>
                                    <?php } ?>
                                </select>
                                <label class="small text-secondary" >ex: ANGKAL 001 </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Route <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="route" name="route" required>
                                    <option value="" selected>Choose...</option>
                                    <?php foreach ($route as $key => $value) { ?>
                                    <option value="<?=$value['id'];?>"><?=$value['name'];?></option>
                                    <?php } ?>
                                </select>
                                <label class="small text-secondary" >ex: Sanur - Banjar Nyuh </label>
                            </div>
                        </div>                      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="btn_submit" class="btn btn-primary">Submit</a>
                </div> 
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_confirmation" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="collapse" id="modal_loader_delete">
                <div class="d-flex justify-content-center mt-2">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                Are you sure to delete this data?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" id="btn_delete" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>