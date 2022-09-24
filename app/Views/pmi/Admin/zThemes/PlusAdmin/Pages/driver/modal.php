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
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Nama Lengkap
                                </label>
                                <input class="form-control" type="text" name="name" id="name" />
                                <label class="small text-secondary" >Contoh : Sis Anwar</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Nomor Telpon/HP
                                </label>
                                <input class="form-control" type="text" name="telp" id="telp" />
                                <label class="small text-secondary" >Contoh : </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Tempat Lahir
                                <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" />
                                <label class="small text-secondary" >Contoh : Bogor</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Tanggal Lahir
                                </label>
                                <input class="form-control" type="text" name="tanggal_lahir" id="tanggal_lahir" />
                                <label class="small text-secondary" >Contoh : 1990-04-18</label>
                            </div>
                        </div>                                                      
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Nomor SIM
                                </label>
                                <input class="form-control" type="text" name="no_sim" id="no_sim" />
                                <label class="small text-secondary" >Contoh : 811014360978</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Masa Berlaku SIM
                                </label>
                                <input class="form-control" type="text" name="masa_sim" id="masa_sim" />
                                <label class="small text-secondary" >Contoh : </label>
                            </div>
                        </div>  
                        <div class="col-md-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    iButton 
                                </label>
                                <select class="form-select" name="ibutton" id="ibutton">
                                    <option value="" selected>--- iBuuton ---</option>
                                </select>
                            </div>
                        </div>
                        <?php if(session()->get('level_id')==1 || session()->get('level_id')==2) { ?>
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
                        <div class="col-md-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Foto Pengemudi
                                </label>
                                <input class="form-control" type="file" name="foto_pengemudi" />
                                <!-- <img src="" width="100px" id="foto_pengemudi" class="mt-1 rounded shadow-sm"> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Foto SIM
                                </label>
                                <input class="form-control" type="file" name="foto_sim" />
                                <!-- <img src="" width="100px" id="foto_sim" class="mt-1 rounded shadow-sm"> -->
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1">
                                    Foto KTP
                                </label>
                                <input class="form-control" type="file" name="foto_ktp" />
                                <!-- <img src="" width="100px" id="foto_ktp" class="mt-1 rounded shadow-sm"> -->
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