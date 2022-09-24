<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="flex-grow-1">Pasien List</h5>
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
                    <div class="collapse" id="loader_delete">
                        <div class="d-flex justify-content-center mt-2">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm datatablez table-hover" id="dataTable">
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
                                <th>Kode Pasien</th>
                                <th>Nama Pasien</th>
                                <th>Alamat</th>
                                <th>Golongan Darah</th>
                                <th>Rhesus</th>
                                <th>Jenis Kelamin</th>
                                <th>Keluarga</th>
                                <th>Tanggal Lahir</th>
                                <th>Telepon</th>
                                <th>Usia</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        <?php $no=1; foreach ((array) $pasien as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_multiple_delete" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <!-- <td class="text-center"><?=$no++?></td> -->
                                <td class=""><?=$value['kode_pasien']?></td>
                                <td class=""><?=$value['nama']?></td>
                                <td class=""><?=$value['alamat']?></td>                                
                                <td class=""><?=$value['gol_darah']?></td>                                
                                <td class=""><?=$value['rhesus']?></td>                                
                                <td class="">
                                    <?php 
                                        if ($value['kelamin']==0) {
                                            echo "Perempuan";
                                        }else{
                                            echo "Laki-laki";
                                        }
                                    ?>                                     
                                </td>                                
                                <td class=""><?=$value['keluarga']?></td>                                
                                <td class=""><?=$value['tgl_lahir']?></td>                                
                                <td class=""><?=$value['tlppasien']?></td>                                
                                <td class=""><?=$value['umur']?></td>                                
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

<?= view($view['pages'].$modal)?>