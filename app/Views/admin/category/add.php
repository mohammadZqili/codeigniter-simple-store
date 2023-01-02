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
    <script>
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    </script>
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-5">
    <h1>Categories Add</h1>

    <form method="post" id="add_create" name="add_create" enctype="multipart/form-data"
          action="<?= site_url('/categories') ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Show room</label>
            <input type="text" name="show_room" class="form-control">
        </div>

        <div class="form-group">
            <label>image</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        <div>
            <label>Description</label>
                <textarea name="description" id="editor1" rows="10" cols="80">
            </textarea>
        </div>
        <div class="form-group">
            <br>
            <button type="submit" class="btn btn-primary btn-block">Update Data</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
<script>
    if ($("#add_create").length > 0) {
        $("#add_create").validate({
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
