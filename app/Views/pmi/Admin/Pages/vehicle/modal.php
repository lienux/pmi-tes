<div class="modal fade" id="modal_input" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Vehicle</h5>
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
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <div class="card">
                                <div class="card-body">
                                    <div class="nav flex-column nav-pills me-3 mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link active" id="v-pills-identity-tab" data-bs-toggle="pill" data-bs-target="#v-pills-identity" type="button" role="tab" aria-controls="v-pills-identity" aria-selected="true">Identity</button>
                                        <button class="nav-link" id="v-pills-lifecycle-tab" data-bs-toggle="pill" data-bs-target="#v-pills-lifecycle" type="button" role="tab" aria-controls="v-pills-lifecycle" aria-selected="false">Lifecycle</button>
                                        <button class="nav-link" id="v-pills-spesification-tab" data-bs-toggle="pill" data-bs-target="#v-pills-spesification" type="button" role="tab" aria-controls="v-pills-spesification" aria-selected="false">Spesifications</button>
                                        <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-identity" role="tabpanel" aria-labelledby="v-pills-identity-tab">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Identity</h5>
                                        <div class="form-row row">
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Vehicle Code <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="kode_bus" id="kode_bus" title="Kode Kendaraan" />
                                                    <label class="small text-infoo">example: 4512</label>
                                                    <label class="small text-danger" id="cek_kode_bus"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Vehicle registration plates <span class="text-danger">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="nopol" id="nopol" title="Plat Nomor Kendaraan" />
                                                    <label class="small text-infoo">example: PB 7212 T</label>
                                                    <label class="small" id="cek_nopol"></label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Brand <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="merk_tipe" id="merk_tipe" title="Merk Kendaraan" />
                                                    <label class="small text-infoo">example: MITSUBISHI KANTER</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        VIN/SN <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="no_rangka" id="no_rangka" title="Nomor Rangka Kendaraan" />
                                                    <label class="small text-infoo">example: MHCNK71LYBJ022412</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Vehicle registration certificate <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="no_stnk" id="no_stnk" title="Nomor STNK" />
                                                    <label class="small text-infoo">example: 11542254</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        KIR Number <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="no_kir" id="no_kir" title="Nomor KIR" />
                                                    <label class="small text-infoo">example: SON 6433</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Type <span class="text-danger"></span>
                                                    </label>
                                                    <select class="form-select" name="type" id="type" title="Tipe Kendaraan">
                                                        <option value="" selected>Choose...</option>
                                                        <?php foreach ($type as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Operation Status
                                                    </label>
                                                    <select class="form-select" name="operation_status" id="operation_status">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Siap Guna Operasi (SGO)</option>
                                                        <option value="0">Cadangan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Status
                                                    </label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="" selected>Choose...</option>
                                                        <?php foreach ($vehicle_status as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small" >
                                                        Vehicle Image
                                                    </label>
                                                    <input class="form-control" type="file" name="foto" />
                                                    <img src="" width="100px" id="foto" class="rounded shadow-sm mt-1">
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-lifecycle" role="tabpanel" aria-labelledby="v-pills-lifecycle-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Lifecycle</h5>
                                        <div class="form-row row">
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Vehicle Year <span class="text-danger">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="thn_produksi" id="thn_produksi" />
                                                    <label class="small text-infoo">example: 2010</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Valid Date of Vehicle Number Certificate <span class="text-danger">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="masa_stnk" id="masa_stnk" id="masa_stnk" />
                                                    <label class="small text-infoo">example: 2023-11-06</label>
                                                </div>
                                            </div>                        
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Valid Date of KIR <span class="text-danger">*</span>
                                                    </label>
                                                    <input class="form-control" type="text" name="masa_kir" id="masa_kir" />
                                                    <label class="small text-infoo">example: 2020-07-16</label>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-spesification" role="tabpanel" aria-labelledby="v-pills-spesification-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Dimensions</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Widht <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                    <!-- <label class="small text-infoo">Contoh: 30</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Hight
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                    <!-- <label class="small text-infoo" >Contoh : 7 km / 1 liter</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Length <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                    <!-- <label class="small text-infoo">Contoh: 30</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Interior Volume
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                    <!-- <label class="small text-infoo" >Contoh : 7 km / 1 liter</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Passenger Volume <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                    <!-- <label class="small text-infoo">Contoh: 30</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Cargo Volume
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                    <!-- <label class="small text-infoo" >Contoh : 7 km / 1 liter</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Ground Clearance <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                    <!-- <label class="small text-infoo">Contoh: 30</label> -->
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Bed Length
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                    <!-- <label class="small text-infoo" >Contoh : 7 km / 1 liter</label> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Weight</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Curb Weight <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Gross Vehicle Weight Rating
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Performance</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Towing Capacity <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Max Payload
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Fuel Economy</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        EPA City <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        EPA Highway
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        EPA Combined
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Engine</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Engine Summary <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Engine Brand
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Aspiration
                                                    </label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Naturally Aspirated</option>  
                                                        <option value="2">Turbocharger</option>
                                                        <option value="3">Twin Turbocharger</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Block Type <span class="text-danger"></span>
                                                    </label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">I</option>  
                                                        <option value="2">V</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Bore
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Cam Type
                                                    </label>
                                                    <select class="form-select" name="status" id="status">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">DOHC</option>  
                                                        <option value="2">OHV</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Compression <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Cylinders
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Displacement
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Fuel Induction <span class="text-danger"></span>
                                                    </label>
                                                    <select class="form-select" name="fuel_induction" id="fuel_induction">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Common Rail Direct Injection</option>  
                                                        <option value="2">Sequential Multiport Fuel Injection</option>
                                                        <option value="3">Sequential Port Fuel Injection</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Max HP
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Max Torque <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="jml_seat" id="jml_seat" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Redline RPM
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Stroke
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Valves
                                                    </label>
                                                    <input class="form-control" type="text" name="bbm" id="bbm" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Transmission</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Transmission Summary <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="transmission_summary" id="transmission_summary" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Transmission Brand
                                                    </label>
                                                    <input class="form-control" type="text" name="transmission_brand" id="transmission_brand" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Transmission Type
                                                    </label>
                                                    <select class="form-select" name="transmission_type" id="transmission_type">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Automatic</option>  
                                                        <option value="2">Continuously Variable</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Transmission Gears
                                                    </label>
                                                    <input class="form-control" type="text" name="transmission_gears" id="transmission_gears" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Wheels & Tires</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Drive Type <span class="text-danger"></span>
                                                    </label>
                                                    <select class="form-select" name="drive_type" id="drive_type">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">4x4</option>  
                                                        <option value="2">6x4</option>
                                                        <option value="3">FWD</option>
                                                        <option value="3">RWD</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Brake System
                                                    </label>
                                                    <select class="form-select" name="brake_system" id="brake_system">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Air</option>  
                                                        <option value="2">Hidraulic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Front Track Width
                                                    </label>
                                                    <input class="form-control" type="text" name="front_track_width" id="front_track_width" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Rear Track Width <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="rear_track_width" id="rear_track_width" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Wheelbase
                                                    </label>
                                                    <input class="form-control" type="text" name="wheelbase" id="wheelbase" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Front Wheel Diameter
                                                    </label>
                                                    <input class="form-control" type="text" name="front_wheel_diameter" id="front_wheel_diameter" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Rear Wheel Diameter <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="rear_wheel_diameter" id="rear_wheel_diameter" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Rear Axle
                                                    </label>
                                                    <input class="form-control" type="text" name="rear_axle" id="rear_axle" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Front Tire Type
                                                    </label>
                                                    <input class="form-control" type="text" name="front_tire_type" id="front_tire_type" />
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Front Tire PSI <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="front_tire_psi" id="front_tire_psi" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Rear Tire Type
                                                    </label>
                                                    <input class="form-control" type="text" name="rear_tire_type" id="rear_tire_type" />
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Rear Tire PSI
                                                    </label>
                                                    <input class="form-control" type="text" name="rear_tire_psi" id="rear_tire_psi" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Fuel</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Fuel Type <span class="text-danger"></span>
                                                    </label>
                                                    <select class="form-select" name="fuel_type" id="fuel_type">
                                                        <option value="" selected>Choose...</option>
                                                        <option value="1">Compressed Natural Gas (CNG)</option>  
                                                        <option value="2">Diesel</option>
                                                        <option value="2">Gasoline</option>
                                                        <option value="2">Propane</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Fuel Quality
                                                    </label>
                                                    <input class="form-control" type="text" name="fuel_quality" id="fuel_quality" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Fuel Tank 1 Capacity <span class="text-danger"></span>
                                                    </label>
                                                    <input class="form-control" type="text" name="fuel_tank1_capacity" id="fuel_tank1_capacity" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Fuel Tank 2 Capacity
                                                    </label>
                                                    <input class="form-control" type="text" name="fuel_tank2_capacity" id="fuel_tank2_capacity" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Oil</h5>
                                        <div class="form-row row">
                                            <div class="col-lg-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" for="inputFirstName">
                                                        Oil Capacity
                                                    </label>
                                                    <input class="form-control" type="text" name="oil_capacity" id="oil_capacity" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Settings</h5>
                                        <div class="form-row row">
                                            <?php if(session()->get('level_id')!=3) { ?>
                                            <div class="col-md-12">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >User <span class="text-danger"></span></label>
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
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Integrations</h5>
                                        <div class="form-row row">
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        GPS
                                                    </label>
                                                    <select class="form-select" name="gps" id="gps">
                                                        <option value="" selected>Choose...</option>
                                                        <!-- <?php foreach ($vehicle_status as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        CCTV
                                                    </label>
                                                    <select class="form-select" name="gps" id="cctv">
                                                        <option value="" selected>Choose...</option>
                                                        <!-- <?php foreach ($vehicle_status as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        TOB
                                                    </label>
                                                    <select class="form-select" name="gps" id="tob">
                                                        <option value="" selected>Choose...</option>
                                                        <!-- <?php foreach ($vehicle_status as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group input-group-sm">
                                                    <label class="small mb-1" >
                                                        Temperature
                                                    </label>
                                                    <select class="form-select" name="gps" id="temperature">
                                                        <option value="" selected>Choose...</option>
                                                        <!-- <?php foreach ($vehicle_status as $key => $value) { ?>
                                                        <option value="<?=$value['id']?>"><?=$value['name']?></option>
                                                        <?php } ?> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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