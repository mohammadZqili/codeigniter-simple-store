<?= $this->extend($config->viewLayout) ?>


<?= $this->section('styles') ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>

<?= $this->section('main') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/brands/create') ?>" class="btn btn-success mb-2">Add Brand</a>
    </div>
    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <table class="table table-bordered" id="brands-list">
            <thead>
            <tr>
                <th>Brand Id</th>
                <th>Name</th>
                <th>slogan</th>
                <th>Description</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($brands): ?>
                <?php foreach ($brands as $brand): ?>
                    <tr>
                        <td><?php echo $brand['id']; ?></td>
                        <td><?php echo $brand['name']; ?></td>
                        <td><?php echo $brand['slogan']; ?></td>
                        <td><?php echo $brand['description']; ?></td>
                        <td>
                            <image src="<?php echo base_url("uploads/" . $brand['image']); ?>"
                                   style="height: 100px;width: 100px"/>
                        </td>
                        <td>
                            <a href="<?php echo base_url('brands/edit/' . $brand['id']); ?>"
                               class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo base_url('brands/delete/' . $brand['id']); ?>"
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
        $('#brands-list').DataTable();
    });
</script>
<?= $this->endSection() ?>
