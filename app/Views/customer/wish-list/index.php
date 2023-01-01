<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/wish/empty') ?>" class="btn btn-success mb-2">Empty Wish list</a>
    </div>
    <div class="mt-3">
        <table class="table table-bordered" id="cart-list">
            <thead>
            <tr>
                <th>Wish list Id</th>
                <th>product name</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($wish): ?>
                <?php foreach ($wish as $product): ?>
                    <tr>
                        <td><?php echo $product['id']; ?></td>
                        <td><?php echo $product['product']['name']; ?></td>
                        <td>
                            <image src="<?php echo base_url("uploads/" . $product['product']['image']); ?>"
                                   style="height: 100px;width: 100px"/>
                        </td>
                        <td>
                            <a href="<?php echo base_url('wish/delete/' . $product['id']); ?>"
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#cart-list').DataTable();
    });
</script>
<?= $this->endSection() ?>
