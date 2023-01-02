
<?= $this->extend($config->viewLayout) ?>



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

<?= $this->endSection() ?>

