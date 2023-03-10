<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<style>

    .error {
        display: block;
        padding-top: 5px;
        font-size: 14px;
        color: red;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-5">
    <form method="post" id="update_brand" name="update_brand" enctype="multipart/form-data"
          action="<?= site_url('brands/update') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $brand['id']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $brand['name']; ?>">
        </div>
        <div class="form-group">
            <label>Slogan</label>
            <input type="text" name="slogan" class="form-control" value="<?php echo $brand['slogan']; ?>">
        </div>

        <div>
            <label>Description</label>
            <textarea name="description" id="editor1" rows="10" cols="80">
                    <?php echo $brand['description']; ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>image</label>
            <input type="file" name="image" class="form-control"/>
            <image src="<?php echo base_url("uploads/".$brand['image']); ?>" style="height: 100px;width: 100px" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Save Data</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#update_brand").length > 0) {
        $("#update_brand").validate({
            rules: {
                name: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: "Name is required.",
                }
            },
        })
    }
</script>
<?= $this->endSection() ?>
