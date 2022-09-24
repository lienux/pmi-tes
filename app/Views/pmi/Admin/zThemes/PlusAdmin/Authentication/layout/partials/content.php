<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="<?=base_url();?>" class="logo d-flex align-items-center w-auto">
                                <img src="<?=base_url($identity['logo']);?>" alt="">
                                <span class="d-none d-lg-block"><?=$identity['app']?></span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <?= view($authentication.$form)?>

                            </div>
                        </div>

                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            <a href="<?=$identity['developer_site']?>" target="_blank"><?=$identity['developed']?></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>
</main><!-- End #main -->