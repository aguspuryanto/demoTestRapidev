<form action="<?= base_url('promotion') ?>" method="post" id="text-editor">
            <div class="form-group">
                <label for="title">Judul promo</label>
                <input type="text" name="name" class="form-control" placeholder="Judul promo" required>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="title">Jenis promo</label>
                    <select name="type" class="form-select form-control" aria-label="Default select example">
                        <option selected>---</option>
                        <option value="1">Diskon</option>
                        <option value="2">Cashback</option>
                    </select>
                </div>
                <div class="form-group col-4">
                    <label for="title">Presentase diskon (%)</label>
                    <input type="text" name="persen" class="form-control">
                </div>
                <div class="form-group col-4">
                    <label for="title">Maksimal diskon (Rp)</label>
                    <input type="text" name="amount" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-4">
                    <label for="title">Periode publikasi</label>
                    <input type="text" name="p_publikasi" class="form-control">
                </div>
                <div class="form-group col-4">
                    <label for="title">Periode reservasi</label>
                    <input type="text" name="p_reservasi" class="form-control">
                </div>
                <div class="form-group col-4">
                    <label for="title">Periode inap</label>
                    <input type="text" name="p_inap" class="form-control">
                </div>
            </div>

            <h3>Filter Hotel</h3>
            <div class="row">
                <div class="form-group col-6">
                    <label for="title">Jenis filter</label>
                    <select name="jh_filter" class="form-select form-control" aria-label="Default select example">
                        <option selected>---</option>
                        <option value="All">All</option>
                        <option value="Include">Include</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="title">Daftar hotel</label>
                    <select name="jh_hotel" class="form-select form-control" aria-label="Default select example">
                        <option selected>---</option>
                        <?php foreach($properties as $hotel) {
                            echo "<option value='" . $hotel['id'] . "'> " . $hotel['name'] . " </option>";
                        } ?>
                    </select>
                </div>
            </div>

            <h3>Filter Kamar</h3>
            <div class="row">
                <div class="form-group col-6">
                    <label for="title">Jenis filter</label>
                    <select name="jk_filter" class="form-select form-control" aria-label="Default select example">
                        <option selected>---</option>
                        <option value="All">All</option>
                        <option value="Include">Include</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="title">Daftar kamar</label>
                    <select name="jk_makar" class="form-select form-control" aria-label="Default select example">
                        <option selected>---</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button>
                <button type="submit" name="status" value="draft" class="btn btn-secondary">Save to Draft</button>
            </div>
        </form>