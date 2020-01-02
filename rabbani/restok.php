<?php
  require("layouts/header.php") ;

  $barang = query("SELECT * FROM barang");
?>

<div class="container">
  <h3>Tambah Stok Barang</h3>
  <form class="formStock" id="formStok" method="post" action="query/restok-barang.php">
            <div class="row">
             <div class="col m12 s12">
                <label for="barang">Barang</label>
                <select class="browser-default" id="barang" name="barang" data-error=".errorTxt1">
                    <option value="" disabled selected>Pilih barang</option>
                    <?php foreach ($barang as $brg) : ?>
                        <option value="<?= $brg["id_barang"] ?>"><?= $brg["nama_barang"] ?></option>
                    <?php endforeach;?>
                </select>
                <div class="input-field error">
                    <div class="errorTxt1"></div>
                </div>
              </div>
              <div class="input-field col s12">
                  <i class="material-icons prefix">event</i>
                  <label for="tgl">Tanggal</label>
                  <input id="tgl" name="tgl" type="text" class="datepicker" data-error=".errorTxt6">
                  <div class="errorTxt6"></div>
              </div>
              <div class="input-field col s12">
                  <label for="stock">Jumlah</label>
                  <input id="stock" name="jumlah" type="text" data-error=".errorTxt3">
                  <div class="errorTxt3"></div>
              </div>
              <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="action">Simpan
                    <i class="material-icons right">add_box</i>
                  </button>
              </div>
          </div>
  </form>
</div>

<?php require("layouts/footer.php") ?>