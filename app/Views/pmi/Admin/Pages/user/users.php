<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="flex-grow-1"><?=$table_title?></h5>
                        <div class="">
                            <?php if (session()->get('level_id')!=3) { ?>
                            <a href="#" class="btn btn-success btn-sm" onclick="modal_create()">Add New</a>
                            <?php } ?>
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
                    <table class="table datatablez table-hover" id="userTable">
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
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th>Parent</th>
                                <th scope="col">Level</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; foreach ($datausers as $key => $value) { ?>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input checkbox_users" type="checkbox" id="<?=$value['id']?>">
                                    </div>
                                </td>
                                <td><?=$value['active_name']?></td>
                                <!-- <td class="text-center"><?=$no++?></td> -->
                                <td><?=$value['name']?></td>
                                <td><?=$value['email']?></td>
                                <td><?=$value['parent_name']?></td>
                                <td><?=$value['level_name']?></td>
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