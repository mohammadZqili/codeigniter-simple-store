<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/products/create') ?>" class="btn btn-success mb-2">Add Product</a>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <table class="table table-bordered" id="products-list">
            <thead>
            <tr>
                <th>Product Id</th>
                <th>Name</th>
                <th>slogan</th>
                <th>Description</th>
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
                        <td><?php echo $product['slogan']; ?></td>
                        <td><?php echo $product['description']; ?></td>
                        <td>
                            <image src="<?php echo base_url("uploads/" . $product['image']); ?>"
                                   style="height: 100px;width: 100px"/>
                        </td>
                        <td>
                            <a href="<?php echo base_url('products/edit/' . $product['id']); ?>"
                               class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo base_url('products/delete/' . $product['id']); ?>"
                               class="btn btn-danger btn-sm">Delete</a>
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