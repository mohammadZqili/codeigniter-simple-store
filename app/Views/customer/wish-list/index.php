
<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Shop Homepage - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php if ($wish): ?>
                    <?php foreach ($wish as $product): ?>
                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="<?php echo base_url("uploads/" . $product['product']['image']); ?>" alt="..."/>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder"><?php echo $product['product']['name']; ?></h5>

                                        <div class="justify-content-center small  mb-2">
                                            <a href="<?php echo 'wish/delete/' . $product['id']; ?>"
                                               class="btn btn-danger btn-sm">Delete</a>

                                            <a href="<?php echo '/products/' . $product['product']['id']; ?>"
                                               class="btn btn-outline-info btn-sm">Go to page</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
    </section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
<?= $this->endSection() ?>