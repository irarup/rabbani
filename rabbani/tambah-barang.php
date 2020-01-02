<?php require("layouts/header.php") ?>

<div class="container">
  <h3>Tambah Barang Baru</h3>
  <form class="formBarang" id="formBarang" method="post" action="query/save-barang.php">
          <div class="row">
              <div class="input-field col s12">
                  <label for="nama_barang">Nama Barang</label>
                  <input id="nama_barang" name="nama_barang" type="text" data-error=".errorTxt1">
                  <div class="errorTxt1"></div>
              </div>
              <div class="input-field col s12">
                  <label for="harga">Harga</label>
                  <input id="harga" name="harga" type="text" data-error=".errorTxt2">
                  <div class="errorTxt2"></div>
              </div>
              <div class="input-field col s12">
                  <label for="stock">Stock</label>
                  <input id="stock" name="stock" type="text" data-error=".errorTxt3">
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