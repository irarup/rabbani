<?php require("layouts/header.php");
    $id = $_GET["id"];
    $data = query("SELECT * FROM barang WHERE id_barang = $id")[0];

?>

<div class="container">
  <h3>Edit Data Barang</h3>
  <form class="formBarang" id="formBarang" method="post" action="query/update-barang.php">
          <input type="hidden" value="<?= $id?>" name="id">
          <div class="row">
              <div class="input-field col s12">
                  <label for="nama_barang">Nama Barang</label>
                  <input id="nama_barang" name="nama_barang" type="text" value="<?= $data["nama_barang"]?>" data-error=".errorTxt1">
                  <div class="errorTxt1"></div>
              </div>
              <div class="input-field col s12">
                  <label for="harga">Harga</label>
                  <input id="harga" name="harga" type="text" data-error=".errorTxt2" value="<?= $data["harga"]?>">
                  <div class="errorTxt2"></div>
              </div>
              <div class="input-field col s12">
                  <label for="stock">Stock</label>
                  <input id="stock" name="stock" type="text" data-error=".errorTxt3" value="<?= $data["stok"]?>">
                  <div class="errorTxt3"></div>
              </div>
              <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="action">Edit
                    <i class="material-icons right">edit_mode</i>
                  </button>
              </div>
          </div>
  </form>
</div>

<?php require("layouts/footer.php") ?>