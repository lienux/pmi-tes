<div class="modal fade" id="modal_input" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="alert text-light collapse" id="alert_input"></div>
            <div class="collapse" id="loader_input">
                <div class="d-flex justify-content-center mt-2">
                    <div class="spinner-border text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
            <form id="form_input">
                <div class="modal-body">
                    <div class="form-row row">
                        <div class="col-lg-12">
                            <div class="form-form-check">
                                <input class="form-check-input big-checkbox" type="checkbox" name="check_active" id="check_active">
                                <div id="active_element"></div>
                                <label class="small mb-1" >
                                    Active 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    iButton No
                                </label>
                                <input class="form-control" type="text" name="ibutton_no" id="ibutton_no" />
                                <label class="small text-secondary" >ex: 0128C514000D0A1B</label>
                            </div>
                        </div>                        
                        <?php if(session()->get('level_id')==1 || session()->get('level_id')==2) { ?>
                        <div class="col-md-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >User <!-- <span class="text-danger">*</span> --></label>
                                <select class="form-select" multiple name="user[]" id="user">
                                    <option value="" selected>--- Select user ---</option>
                                    <?php foreach ($users as $key => $value) { ?>
                                        <option value="<?=$value['id']?>"><?=$value['email']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php } ?>                       
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
            <div class="collapse" id="loader_delete">
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