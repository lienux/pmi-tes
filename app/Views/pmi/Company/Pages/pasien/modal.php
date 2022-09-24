<div class="modal fade" id="modal_input" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input <?=$breadcrumb[0];?></h5>
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
                    <div class="form-row row px-3">
                        <!-- <div class="col-lg-12 mb-2">
                            <div class="form-form-check">
                                <input class="form-check-input big-checkbox" type="checkbox" name="check_active" id="check_active" onclick="element_active();">
                                <label class="small mb-1" >
                                    Active 
                                </label>
                                <div id="active_element"></div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Kode Pasien <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="kode_pasien" id="kode_pasien"/>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Nama Pasien
                                </label>
                                <input class="form-control small" type="text" name="nama" id="nama" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Alamat
                                </label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Golongan Darah
                                </label>
                                <select class="form-select" id="golongan_darah" name="golongan_darah">
                                    <option value="" selected>Choose...</option>
                                    <?php foreach ($golongan_darah as $key => $value) { ?>
                                    <option value="<?=$value['name'];?>"><?=$value['name'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Rhesus
                                </label>
                                <select class="form-select" id="rhesus" name="rhesus">
                                    <option value="+" selected>Positif (+)</option>
                                    <option value="-">Negativ (-)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Jenis Kelamin
                                </label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="1" selected>Laki-laki</option>
                                    <option value="0">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Keluarga
                                </label>
                                <input class="form-control small" type="text" name="keluarga" id="keluarga" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Tanggal Lahir
                                </label>
                                <input type="text" class="form-control tgl_lahir search_input date-pick" data-date-format="yyyy-M-d" name="tgl_lahir" id="tgl_lahir" onfocus="datePick(this)">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Umur
                                </label>
                                <input class="form-control small" type="text" name="umur" id="umur" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group input-group-sm">
                                <label class="small mb-1" >
                                    Telp Pasien
                                </label>
                                <input class="form-control small" type="text" name="telp" id="telp" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" id="btn_submit" class="btn btn-primary">Submit</a>
                    <!-- <button type="submit" class="btn btn-primary" id="btn_submit">Submit</button> -->
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