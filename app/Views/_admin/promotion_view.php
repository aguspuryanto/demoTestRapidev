<?=$this->include('_partials/header') ?>

<div class="container-fluid">
  <div class="row">
    <?//=view('_partials/navbar.php'); ?>
    <?=$this->include('_partials/navbar') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Promotion</h1>
        </div>

        <?php if(session()->getFlashData('success')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashData('success') ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>

        <?=$this->include('_admin/promotion_form') ?>
        <?=$this->include('_admin/promotion_table') ?>
        <?php
            // include_once ('promotion_form.php');
            // include_once ('promotion_table.php');
        ?>

        <script type="text/javascript">
        $(function() {
            $('input[name*="p_"]').daterangepicker();
        });
        </script>

    </main>
  </div>
</div>

<?=$this->include('_partials/footer') ?>