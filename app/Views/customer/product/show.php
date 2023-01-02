
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
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo base_url("uploads/" . $product['image']); ?>" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1"><?php echo $product['model']; ?></div>
                <h1 class="display-5 fw-bolder"><?php echo $product['name']; ?></h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through"></span>
                    <span>$<?php echo $product['price']; ?>.00</span>
                </div>
                <p class="lead">Brand : <?php echo !empty($product['brand']) ? $product['brand']['name'] : ""; ?></p>
                <p class="lead">Category : <?php echo !empty($product['category']) ? $product['category']['name'] : ""; ?></p>
                <p class="lead">Color : <input type="color" value="<?php echo $product['color']; ?>" readonly="readonly" disabled</p>
                <p class="lead"><?php echo $product['specifications']; ?></p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" readonly value="<?php echo $product['count']; ?>" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to wish list
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>



<?= $this->section('scripts') ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<?= $this->endSection() ?>

