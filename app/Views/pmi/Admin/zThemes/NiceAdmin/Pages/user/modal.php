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
                                <input class="form-check-input big-checkbox mb-1" type="checkbox" name="check_active" id="check_active" checked="checked">
                                <div id="active_element"></div>
                                <label class="small mb-1" >
                                    Active 
                                </label>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Name
                                </label>
                                <input class="form-control" type="text" name="name" id="name" required>
                                <div class="invalid-feedback">Please enter Name!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Email
                                </label>
                                <input class="form-control" type="text" name="email" id="email" required>
                                <div class="invalid-feedback">Please enter Email!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Password
                                </label>
                                <input class="form-control" type="text" name="password" id="password" required>
                                <div class="invalid-feedback">Please enter Password!</div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Password confirmation
                                </label>
                                <input class="form-control" type="text" name="password_confirmation" id="password_confirmation" required>
                                <div class="invalid-feedback">Please enter Password Confirmation!</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >Level</label>
                                <select class="form-select" name="level" id="level" aria-label="" onclick="sh_parent()" required>
                                    <option value="" selected>-- Select Level --</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">User</option>
                                </select>
                                <div class="invalid-feedback">Please enter Level!</div>
                            </div>
                        </div>
                        <div class="col-md-12" id="row_parent">
                            <div class="form-group input-group-sm">
                                <label class="mall mb-1">Parent</label>
                                <select class="form-select" name="parent" id="parent" aria-label="">
                                    <option value="" selected>-- Parent --</option>
                                    <?php foreach ($user as $key => $value) { ?>
                                    <option value="<?=$value['id']?>"><?=$value['name'].' | '.$value['email']?></option>
                                    <?php } ?>
                                </select>
                                <div class="invalid-feedback">Please enter parent!</div>
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