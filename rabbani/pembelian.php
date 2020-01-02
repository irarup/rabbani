<?php require("layouts/header.php");
    $barang = query("SELECT * FROM barang");
?>

<div class="container">
  <h3>Pembelian Barang</h3>
  <form class="formPembelian" id="formPembelian" method="post" action="query/save-pembelian.php">
          <table id="pembelian" class="center-ailgn">
             <tr id="row1">
              <td width="40%">
                  <label for="barang">Barang</label>
                  <select class="browser-default" id="barang" name="barang[]" data-error=".errorTxt1">
                      <option value="" disabled selected>Pilih barang</option>
                      <?php foreach ($barang as $brg) : ?>
                          <option value="<?= $brg["id_barang"] ?>"><?= $brg["nama_barang"] ?></option>
                      <?php endforeach;?>
                  </select>
                  <div class="input-field error">
                      <div class="errorTxt1"></div>
                  </di>
              </td>
              <td width="40%">
                  <label for="jumlah">Jumlah Barang</label>
                  <input id="jumlah" name="jumlah[]" type="text" data-error=".errorTxt2">
                  <div class="errorTxt2"></div>
              </td>
              <td>
                 <a class="btn green" onclick="add_row();" value="ADD ROW"><i class="material-icons">add_circle</i></a> 
              </td>
             </tr>
          </table>
              <div class="input-field col s12">
                  <i class="material-icons prefix">event</i>
                  <label for="tgl">Tanggal Transaksi</label>
                  <input id="tgl" name="tgl" type="text" class="datepicker" data-error=".errorTxt6">
                  <div class="errorTxt6"></div>
              </div>
              <div class="input-field col s12">
                  <label for="pembayaran">Pembayaran Cash</label>
                  <input id="pembayaran" name="pembayaran" type="text" data-error=".errorTxt3">
                  <div class="errorTxt3"></div>
              </div>
              <div class="input-field col s12">
                  <label for="pembayaran_non">Pembayaran Non Cash</label>
                  <input id="pembayaran_non" name="pembayaran_non" type="text" data-error=".errorTxt4">
                  <div class="errorTxt4"></div>
              </div>
              <div class="input-field col s12">
                  <label for="diskon">Diskon</label>
                  <input id="diskon" name="diskon" type="text" data-error=".errorTxt5">
                  <div class="errorTxt5"></div>
              </div>
              <div class="input-field col s12">
                  <button class="btn waves-effect waves-light right submit" type="submit" name="submit">Simpan
                    <i class="material-icons right">move_to_inbox</i>
                  </button>
              </div>
          </div>
  </form>
</div>




<script type="text/javascript">
function add_row()
{
 $rowno= $("#pembelian tr").length;
 $rowno=$rowno+1;
 $("#pembelian tr:last").after('<tr id="row'+$rowno+'"><td width="40%"><label for="barang">Barang</label><select class="browser-default" id="barang" name="barang[]" data-error=".errorTxt1"><option value="" disabled selected>Pilih barang</option><?php foreach ($barang as $brg) : ?><option value="<?= $brg["id_barang"] ?>"><?= $brg["nama_barang"] ?></option><?php endforeach;?> </select><div class="input-field error"><div class="errorTxt1"></div></di></td><td width="40%"><label for="jumlah">Jumlah Barang</label><input id="jumlah" name="jumlah[]" type="text" data-error=".errorTxt2"><div class="errorTxt2"></div></td><td><a class="btn green" onclick="add_row();" value="ADD ROW"><i class="material-icons">add_circle</i></a>&nbsp;&nbsp;&nbsp;<a class="btn red" value="DELETE" onclick=delete_row("row'+$rowno+'")><i class="material-icons">do_not_disturb_on</i></a></td> </tr>');
}
  function delete_row(rowno)
  {
   $('#'+rowno).remove();
  }
</script>

<?php require("layouts/footer.php") ?>