<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="flex-grow-1">Schedules</h5>
                        <div class="">
                            <a href="#" class="btn btn-success btn-sm" onclick="modal_create()">
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif;?>
                    <!-- <div id="map" class="position-relative"></div> -->
                    <div class="alert text-light collapse" id="alert"></div>
                    <div class="pt-4"></div>
                    <div class="collapse" id="loader">
                        <div class="d-flex justify-content-center mt-2">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm datatablez table-hover" id="routeTable">
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
                                <th scope="col"></th>
                                <th>Keberangkatan</th>
                                <th>Tiba</th>
                                <th scope="col">Boat</th>
                                <th scope="col">Route</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        <?php $no=1; foreach ($schedules['data'] as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_multiple_delete" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <td><?=($value['active']==1) ? '<span class="badge bg-success">active</span>' : '<span class="badge bg-danger">active</span>'?></td>
                                <td><span class="text-xs"><?=$value['time_from']?></span></td>
                                <td><span class="text-xs"><?=$value['time_to']?></span></td>
                                <td><span class="text-dark"><?=$value['boat_name']?></span></td>
                                <td><span class="text-dark"><?=$value['route_name']?></span></td>
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