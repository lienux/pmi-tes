<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="flex-grow-1"><?=$table_title?></h5>
                        <div class="">
                            <a href="#" class="btn btn-success btn-sm" onclick="modal_create()">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert text-light collapse" id="alert"></div>
                    <div class="pt-4"></div>
                    <div class="collapse" id="loader_delete2">
                        <div class="d-flex justify-content-center mt-2">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm datatablez table-hover" id="vehicleTable">
                        <thead>
                            <tr>
                                <th width="40">
                                    <div class="btn-group" role="group">
                                        <a href="#"  data-bs-toggle="dropdown">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="">
                                            <li><a class="dropdown-item" href="#" onclick="modal_delete_check();">Delete Selected</a></li>
                                        </ul>
                                    </div>
                                </th>
                                <!-- <th class="text-center" width="10">No</th> -->
                                <th>Vehicle</th>
                                <th></th>
                                <th>STNK</th>
                                <th>KIR</th>
                                <th>Specification</th>
                                <th>Integration</th>
                                <th>User</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        <?php $no=1; foreach ($vehicles as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_vehicles" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <!-- <td class="text-center"><?=$no++?></td> -->
                                <td class="img-td">
                                    <div class="row">
                                        <div class="big-circle">
                                            <img src="<?=base_url('uploads/images/vehicles/'.$value['foto']); ?>" class="img-circle">
                                            <?php if ($value['operation_status']==1) { ?>
                                                <div class="small-circle bg-success"></div>
                                            <?php } else { ?>
                                                <div class="small-circle bg-warning"></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-dark">Code: <?=$value['kode_bus']?></div>
                                    <a href="#"><div class="text-xs"><?=$value['thn_produksi'].' ['.$value['merk_tipe'].']'?></div></a>
                                    <div class="text-xs">VIN/SN: <span class="text-dark"><?=$value['no_rangka']?></span></div>
                                    <div class="text-xs">Licence Plate: <span class="text-dark"><?=$value['nopol']?></span></div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-xs">No: <span class="text-dark"><?=$value['no_stnk']?></span></div>
                                    <div class="text-xs">Valid True: <span class="text-dark"><?=$value['masa_stnk']?></span></div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-xs">No: <span class="text-dark"><?=$value['no_kir']?></span></div>
                                    <div class="text-xs">Valid True: <span class="text-dark"><?=$value['masa_kir']?></span></div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-xs">Seat: <span class="text-dark"><?=$value['jml_seat']?></span></div>
                                    <div class="text-xs">BBM (km/liter): <span class="text-dark"><?=$value['bbm']?></span></div>
                                </td>
                                <td class="text-nowrap">
                                    <div class="text-xs">GPS: <span class="text-dark"></span></div>
                                    <div class="text-xs">CCTV: <span class="text-dark"></span></div>
                                    <div class="text-xs">TOB: <span class="text-dark"></span></div>
                                    <div class="text-xs">Sensor: <span class="text-dark"></span></div>
                                </td>
                                <td>
                                    <?php if(session()->get('level_id')!=3) { ?>
                                        <div class="text-xs"><?=$value['users_name']?></div>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="#" data-bs-toggle="dropdown">
                                            <i class="fas fa-cogs"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="">
                                            <li><a class="dropdown-item" href="#" onclick="modal_edit(<?=$value['id']?>)">Edit</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="modal_delete(<?=$value['id']?>)">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<?=(isset($modal)) ? $modal : '';?>