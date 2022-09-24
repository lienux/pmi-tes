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
                    <!-- <div id="map" class="position-relative"></div> -->
                    <div class="alert text-light collapse" id="alert"></div>
                    <div class="pt-4"></div>
                    <div class="collapse" id="loader_delete2">
                        <div class="d-flex justify-content-center mt-2">
                            <div class="spinner-border text-danger" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                    <table class="table table-sm datatablez table-hover" id="stopTable">
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
                                <th scope="col">Active</th>
                                <th scope="col">Name</th>
                                <th scope="col">Center</th>
                                <th scope="col">Radius</th>
                                <?php if(session()->get('level_id')!=3) { ?>
                                <th>User</th>
                                <?php } ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        <?php $no=1; foreach ($stops as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_stops" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <td><?=$value['active_name']?></td>
                                <td>
                                    <div class="text-dark"><?=$value['name']?></div>
                                </td>
                                <td>
                                    <div class="text-xs">Latitude: <span class="text-dark"><?=$value['latitude']?></span></div>
                                    <div class="text-xs">Longitude: <span class="text-dark"><?=$value['longitude']?></span></div>
                                </td>
                                <td>
                                    <div class="text-xs"><?=$value['radius']?></div>
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