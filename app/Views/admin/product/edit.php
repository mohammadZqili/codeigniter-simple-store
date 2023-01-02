<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class="container mt-5">
    <form method="post" id="update_product" name="update_product" enctype="multipart/form-data"
          action="<?= site_url('products/update') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $product['name']; ?>">
        </div>
        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model" class="form-control" value="<?php echo $product['model']; ?>">
        </div>
        <div class="form-group">
            <label>color</label>
            <input type="color" name="color" class="form-control" value="<?php echo $product['color']; ?>">
        </div>

        <div class="form-group">
            <label>count</label>
            <input type="number" name="count" class="form-control" value="<?php echo $product['count']; ?>">
        </div>
        <div class="form-group">
            <label>price</label>
            <input type="number" name="price" class="form-control" value="<?php echo $product['price']; ?>">
        </div>


        <div class="form-group">
            <label>brand</label>
            <select class="form-control" id="brands" name="brand_id" form="update_product">
                <option value="" selected disabled hidden>Choose here</option>
                <?php foreach ($brands as $brand) { ?>
                    <option <?php echo $product['brand_id']==$brand['id'] ? "selected" : ""  ?> value="<?php echo $brand['id'] ?>"> <?php echo $brand['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>category</label>
            <select class="form-control" id="cats" name="category_id" form="update_product">
                <option value="" selected disabled hidden>Choose here</option>

                <?php foreach ($categories as $category) { ?>
                    <option <?php echo $category['category_id']==$category['id'] ? "selected" : ""  ?>
                            value="<?php echo $category['id'] ?>"> <?php echo $category['name'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!--        <div class="form-group">-->
        <!--            <label>brand name</label>-->
        <!--            <input type="text" name="brand_id" class="form-control" value="-->
        <?php //echo $product['brand']['name']; ?><!--">-->
        <!--        </div>-->
        <!--        <div class="form-group">-->
        <!--            <label>category name</label>-->
        <!--            <input type="text" name="category_id" class="form-control"-->
        <!--                   value="--><?php //echo $product['category']['name']; ?><!--">-->
        <!--        </div>-->

        <div class="form-group">
            <label>specifications</label>
            <textarea name="specifications" id="editor1" rows="10" cols="80">
                    <?php echo $category['specifications']; ?>
            </textarea>
        </div>
        <div class="form-group">
            <label>image</label>
            <input type="file" name="image" class="form-control"/>
            <image src="<?php echo base_url("uploads/" . $category['image']); ?>" style="height: 100px;width: 100px"/>
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
    if ($("#update_product").length > 0) {
        $("#update_product").validate({
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
