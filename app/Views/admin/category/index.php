<?= $this->extend($config->viewLayout) ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<?= $this->endSection() ?>


<?= $this->section('main') ?>
<div class="container mt-4">
    <div class="d-flex justify-content-end">
        <a href="<?php echo site_url('/categories/create') ?>" class="btn btn-success mb-2">Add Category</a>
    </div>
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
    }
    ?>
    <div class="mt-3">
        <table class="table table-bordered" id="categories-list">
            <thead>
            <tr>
                <th>Category Id</th>
                <th>Name</th>
                <th>show_room</th>
                <th>Description</th>
                <th>image</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php if($categories): ?>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><?php echo $category['name']; ?></td>
                        <td><?php echo $category['show_room']; ?></td>
                        <td><?php echo $category['description']; ?></td>
                        <td> <image src="<?php echo base_url("uploads/".$category['image']); ?>" style="height: 100px;width: 100px" /></td>
                        <td>
                            <a href="<?php echo base_url('categories/edit/'.$category['id']);?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="<?php echo base_url('categories/delete/'.$category['id']);?>" class="btn btn-danger btn-sm">Delete</a>
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
    $(document).ready( function () {
        $('#categories-list').DataTable();
    } );
</script>
<?= $this->endSection() ?>
