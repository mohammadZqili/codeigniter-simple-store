<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link href="css/styles.css" rel="stylesheet"/>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php if ($categories): ?>
                <?php foreach ($categories as $category): ?>
                    <div class="col mb-5">
                        <div class="card h-100">

                            <img class="card-img-top" src="<?php echo base_url("uploads/" . $category['image']); ?>" alt="..."/>
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder"><?php echo $category['name']; ?></h5>
                                    <div class="justify-content-center small  mb-2">
                                        <div >Show room : <?php echo $category['show_room']; ?></div>
                                        <div >Description : <?php echo substr($category['description'],0,50); ?></div>
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