<div class="modal fade" id="modal_input" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Geofence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="map" class="position-relative"></div>
                <div class="card position-absolute col-md-2" id="card_input">
                    <div class="card-header">
                        <h5>Input Data Geofence</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php if(session()->get('level_id')!=3) { ?>
                            <div class="col-md-12">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >User <span class="text-danger">*</span></label>
                                    <select class="form-select" multiple name="user[]" id="user">
                                        <option value="" selected>--- Select user ---</option>
                                        <?php foreach ($users as $key => $value) { ?>
                                            <option value="<?=$value['id']?>"><?=$value['email']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="col-lg-12">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >
                                        Nama
                                    </label>
                                    <input class="form-control" type="text" name="name" id="name" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >
                                        Latitude
                                    </label>
                                    <input class="form-control" type="text" name="lat" id="lat" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >
                                        Longitude
                                    </label>
                                    <input class="form-control" type="text" name="lng" id="lng" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >
                                        Radius
                                    </label>
                                    <input class="form-control" type="text" name="radius" id="radius" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group input-group-sm">
                                    <label class="small mb-1" >
                                        Status 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="status" id="status">
                                        <option value="" selected>--- Status ---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Non Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-success btn-sm" id="createCircle" onclick="createCircle()">Create</a>
                        <a href="#" class="btn btn-success btn-sm collapse" id="clearCircle" onclick="clearCircle()">Clear</a>
                    </div>
                </div>                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
            </div>
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