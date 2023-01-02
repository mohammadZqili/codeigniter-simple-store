<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link href="css/styles.css" rel="stylesheet"/>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if ($products): ?>
            <?php foreach ($products as $product): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="<?php echo base_url("uploads/" . $product['image']); ?>" alt="..."/>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><a href="/products/<?php echo  $product['id'];?>" /><?php echo $product['name']; ?></h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted text-decoration-line-through"></span>
                                    $<?php echo $product['price']; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <form action="/wish" method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
                                        <input class="btn btn-outline-dark mt-auto" type="submit" value="add to Wish list">
                                    </form>
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

<?= $this->endSection() ?>




