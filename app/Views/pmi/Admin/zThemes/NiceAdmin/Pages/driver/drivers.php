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
                    <table class="table table-sm datatablez table-hover" id="driverTable">
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
                                <th>Active</th>
                                <!-- <th class="text-center" width="10">No</th> -->
                                <th>Images</th>
                                <th scope="col">Name</th>
                                <th scope="col">Birth</th>
                                <th scope="col">SIM</th>
                                <th scope="col">Integration</th>
                                <?php if(session()->get('level_id')!=3) { ?>
                                <th>User</th>
                                <?php  } ?>
                                <th>Actions</th>
                                <!-- <th></th> -->
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        <?php $no=1; foreach ($drivers as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_drivers" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <td><?=$value['active_name']?></td>
                                <!-- <td class="text-center"><?=$no++?></td> -->
                                <td>
                                    <img src="<?=base_url()?>/uploads/images/drivers/<?=$value['foto_pengemudi']?>" class="img-thumbnail" alt="Driver" width="50px">
                                    <img src="<?=base_url()?>/uploads/images/drivers/<?=$value['foto_sim']?>" class="img-thumbnail" alt="SIM" width="50px">
                                    <img src="<?=base_url()?>/uploads/images/drivers/<?=$value['foto_ktp']?>" class="img-thumbnail" alt="KTP" width="50px">
                                </td>
                                <td>
                                    <div class="text-dark"><?=$value['name']?></div>
                                    <div class="text-xs">Phone: <span class="text-dark"><?=$value['telp']?></span></div>
                                </td>
                                <td>
                                    <div class="text-dark"><?=$value['tempat_lahir']?></div>
                                    <div class="text-xs"><?=$value['tanggal_lahir']?></div>
                                </td>
                                <td>
                                    <div class="text-xs">No: <span class="text-dark"><?=$value['no_sim']?></span></div>
                                    <div class="text-xs">Valid True: <span class="text-dark"><?=$value['masa_sim']?></span></div>
                                </td>
                                <td>
                                    <div class="text-xs">iButton: <span class="text-dark"></span></div>
                                    <div class="text-xs">Card: <span class="text-dark"></span></div>
                                </td>
                                <?php if(session()->get('level_id')!=3) { ?>
                                <td><div class="text-xs"><?=$value['users_name']?></div></td>
                                <?php } ?>
                                <td class="text-center">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="btn-group" role="group">
                                                <a href="#" data-bs-toggle="dropdown">
                                                    <i class="fas fa-cogs"></i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="">
                                                    <li><a class="dropdown-item" href="#" onclick="modal_edit(<?=$value['id']?>)">Edit</a></li>
                                                    <li><a class="dropdown-item" href="#" onclick="modal_delete(<?=$value['id']?>)">Delete</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- <div class="col">
                                            <a href="#">
                                                <i class="fas fa-chevron-down" onclick="detail_baris(<?=$value['id']?>)"></i>
                                            </a>
                                        </div> -->
                                    </div>
                                </td>
                            </tr>
                            <!-- <tr class="collapse baris_hide" id="baris<?=$value['id']?>">
                                <td colspan="8">
                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?=base_url('uploads/images/drivers/'.$value['foto_pengemudi']);?>" class="img-thumbnail" width="150" alt="Driver">
                                                <div class="card-body">
                                                    <p class="card-text">Foto Pengemudi</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?=base_url('uploads/images/drivers/'.$value['foto_sim'])?>" class="img-thumbnail" width="150" alt="License">
                                                <div class="card-body">
                                                    <p class="card-text">Foto SIM</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card shadow-sm">
                                                <img src="<?=base_url('uploads/images/drivers/'.$value['foto_ktp'])?>" class="img-thumbnail" width="150" alt="KPT">
                                                <div class="card-body">
                                                    <p class="card-text">Foto KTP</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>

<?=(isset($modal)) ? $modal : '';?>