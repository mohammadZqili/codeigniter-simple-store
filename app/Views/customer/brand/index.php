<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if ($brands): ?>
                <?php foreach ($brands as $brand): ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="<?php echo base_url("uploads/" . $brand['image']); ?>" alt="..."/>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $brand['name']; ?></h5>
                                    <div class="justify-content-center small  mb-2">
                                        <div >Slogan : <?php echo $brand['slogan']; ?></div>
                                        <div >Description : <?php echo substr($brand['description'],0,50); ?></div>
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

<?= $this->endSection() ?>
