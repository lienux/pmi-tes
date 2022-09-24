<!-- Disabled Backdrop Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Input</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- <form class="row g-3 needs-validation" action="<?=base_url('admin/user/save')?>" method="post" novalidate> -->
            <form class="row g-3 needs-validation" id="form" method="post" novalidate>
                <div class="modal-body">
                    <?=(isset($modal_body)) ? $modal_body : '';?>
                    <!-- <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" required>
                            <div class="invalid-feedback">Please enter name!</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" class="form-control" required>
                            <div class="invalid-feedback">Please enter email!</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" class="form-control" required>
                            <div class="invalid-feedback">Please enter password!</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="level" id="level" aria-label="Default select example" required>
                                <option value="" selected>--Select Level--</option>
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">User</option>
                            </select>
                            <div class="invalid-feedback">Please enter level!</div>
                        </div>
                    </div> -->
                    <!-- <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control">
                        </div>
                    </div> -->
                    <!-- <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                    <div class="col-sm-10">
                    <input class="form-control" type="file" id="formFile">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label for="inputTime" class="col-sm-2 col-form-label">Time</label>
                    <div class="col-sm-10">
                    <input type="time" class="form-control">
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label for="inputColor" class="col-sm-2 col-form-label">Color Picker</label>
                    <div class="col-sm-10">
                    <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#4154f1" title="Choose your color">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Textarea</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" style="height: 100px"></textarea>
                    </div>
                    </div>
                    <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                    <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                    <label class="form-check-label" for="gridRadios1">
                    First radio
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                    Second radio
                    </label>
                    </div>
                    <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                    <label class="form-check-label" for="gridRadios3">
                    Third disabled radio
                    </label>
                    </div>
                    </div>
                    </fieldset>
                    <div class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                    <div class="col-sm-10">

                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                    Example checkbox
                    </label>
                    </div>

                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                    <label class="form-check-label" for="gridCheck2">
                    Example checkbox 2
                    </label>
                    </div>

                    </div>
                    </div>

                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Disabled</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="Read only / Disabled" disabled>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Select</label>
                    <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Multi Select</label>
                    <div class="col-sm-10">
                    <select class="form-select" multiple aria-label="multiple select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                    </div>
                    </div> -->

                    <!-- <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Submit Button</label>
                    <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                    </div>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div> 
            </form>
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->


<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Basic Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>