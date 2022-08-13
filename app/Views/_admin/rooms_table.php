
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($rooms as $key => $room) : ?>
        <tr>
            <td><?= ++$key ?></td>
            <td><?= $room['name'] ?></td>
            <td>
                NA
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>