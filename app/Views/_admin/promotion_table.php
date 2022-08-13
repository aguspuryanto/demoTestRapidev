
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Periode publikasi</th>
                <th>Periode reservasi</th>
                <th>Periode inap</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($promotion as $key => $promo) : ?>
        <tr>
            <td><?= ++$key ?></td>
            <td><?= $promo['name'] ?></td>
            <td>
                <?php echo "<span style='color:red;'>" . $ctrl->is_publish($promo['id']) . "</span><br>"; ?>
                <?= $promo['publish_start'] . " s/d " . $promo['publish_end'] ?>
            </td>
            <td>
                <?php echo "<span style='color:red;'>" . $ctrl->can_reservation($promo['id']) . "</span><br>"; ?>
                <?= $promo['booking_start'] . " s/d " . $promo['booking_end'] ?>
            </td>
            <td>
                <?php echo "<span style='color:red;'>" . $ctrl->can_checkin($promo['id']) . "</span><br>"; ?>
                <?= $promo['stay_start'] . " s/d " . $promo['stay_end'] ?>
            </td>
            <td>
                NA
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>