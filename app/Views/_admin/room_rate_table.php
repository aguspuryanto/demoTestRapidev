
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Tgl</th>
                <th>Rate</th>
                <th>Promo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        // echo json_encode($roomRate); die();
        foreach ($roomRate as $key => $roomrate) : 
        ?>
        <tr>
            <td><?= ++$key ?></td>
            <td><?= $roomrate['name'] ?></td>
            <td><?= date("Y-m-d", strtotime($roomrate['date'])) ?></td>
            <td>
                <?= $roomrate['rate'] ?>
                
            </td>
            <td>
                <?= ($roomrate['no_promo']==0) ? "Promo" : ""; ?><br>
                <?php if($roomrate['no_promo']==0) : 
                echo "Harga s/ Diskon = " . $ctrl->getPromoPrice($roomrate) . "<br>";
                echo "Komisi s/ Diskon = " . $ctrl->getKomisiPrice($ctrl->getPromoPrice($roomrate));
                endif; ?>
            </td>
            <td>
                NA
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>