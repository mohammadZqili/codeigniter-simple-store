<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-4">

    <div class="mt-3">
        <table class="table table-bordered" id="products-list">
            <thead>
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>model</th>
                <th>color</th>
                <th>specifications</th>
                <th>price</th>
                <th>count</th>
                <th>brand name</th>
                <th>category name</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($products): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['name']; ?></td>
                        <td><?php echo $product['model']; ?></td>
                        <td><?php echo $product['color']; ?></td>
                        <td><?php echo $product['specifications']; ?></td>
                        <td><?php echo $product['price']; ?></td>
                        <td><?php echo $product['count']; ?></td>
                        <td><?php echo !empty($product['brand']) ? $product['brand']['name'] : ""; ?></td>
                        <td><?php echo !empty( $product['category']) ? $product['category']['name'] : ""; ?></td>
                        <td>
                            <image src="<?php echo base_url("uploads/" . $product['image']); ?>"
                                   style="height: 100px;width: 100px"/>
                        </td>
                        <td>

                            <form action="/wish" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']?>" >
                                <input class="btn btn-primary btn-sm" type="submit" value="add to Wish list" >
                            </form>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#products-list').DataTable();
    });
</script>
<?= $this->endSection() ?>
