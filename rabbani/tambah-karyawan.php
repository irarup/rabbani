<?php require("layouts/header.php");
    $barang = query("SELECT * FROM barang");
?>

<div class="container">
  <h3>Tambah Data Karyawan</h3>
  <form class="formKaryawan" id="formPembelian" method="post" action="query/save-karyawan.php">
          <div class="input-field col s12">
              <label for="nip">NIP</label>
              <input id="nip" name="nip" type="text" data-error=".errorTxt1">
              <div class="input-field error">
                <div class="errorTxt1"></div>
              </div>
          </div>
          <div class="input-field col s12">
              <label for="nama">Nama</label>
              <input id="nama" name="nama" type="text" data-error=".errorTxt2">
              <div class="input-field error">
                <div class="errorTxt2"></div>
              </div>
          </div>
          <label for="jk">Jenis Kelamin</label>
          <div class="input-field col s12">
              <select class="browser-default" id="jk" name="jk" data-error=".errorTxt3">
                  <option value="" disabled selected>Pilih Jenis Kelamin</option>
                  <option value="l">Laki-laki</option>
                  <option value="p">Perempuan</option>
              </select>
              <div class="input-field error">
                  <div class="errorTxt3"></div>
              </div>
          </div>
          <label for="status">Status</label>
          <div class="input-field col s12">
              <select class="browser-default" id="status" name="status" data-error=".errorTxt4">
                  <option value="" disabled selected>Pilih Status</option>
                  <option value="tetap">Tetap</option>
                  <option value="kontrak">Kontrak</option>
              </select>
              <div class="input-field error">
                  <div class="errorTxt4"></div>
              </div>
          </div>
          <table id="anak" class="center-ailgn">
             <tr id="row1">
              <td width="40%">
                  <label for="nama_anak">Nama Anak</label>
                  <input id="nama_anak[]" name="nama_anak[]" type="text" data-error=".errorTxt2">
                  <div class="input-field error">
                    <div class="errorTxt2"></div>
                  </div>
              </td>
              <td width="40%">
                  <label for="jk_anak">Jenis Kelamin Anak</label>
                  <select class="browser-default" id="jk_anak" name="jk_anak[]" data-error=".errorTxt1">
                      <option value="" disabled selected>Pilih Jenis Kelamin</option>
                      <option value="l">Laki-laki</option>
                      <option value="p">Perempuan</option>
                  </select>
                  <div class="input-field error">
                      <div class="errorTxt1"></div>
                  </di>
              </td>
              <td>
                 <a class="btn green" onclick="add_row();" value="ADD ROW"><i class="material-icons">add_circle</i></a> 
              </td>
             </tr>
          </table>
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
 $rowno= $("#anak tr").length;
 $rowno=$rowno+1;
 $("#anak tr:last").after('<tr id="row'+$rowno+'"> <td width="40%"><label for="nama_anak">Nama Anak</label><input id="nama_anak[]" name="nama_anak[]" type="text" data-error=".errorTxt2"><div class="input-field error"><div class="errorTxt2"></div></div></td><td width="40%"> <label for="jk_anak">Jenis Kelamin Anak</label><select class="browser-default" id="jk_anak" name="jk_anak[]" data-error=".errorTxt1"><option value="" disabled selected>Pilih Jenis Kelamin</option><option value="l">Laki-laki</option><option value="p">Perempuan</option></select><div class="input-field error"><div class="errorTxt1"></div></di></td><td><a class="btn green" onclick="add_row();" value="ADD ROW"><i class="material-icons">add_circle</i></a>&nbsp;&nbsp;&nbsp;<a class="btn red" value="DELETE" onclick=delete_row("row'+$rowno+'")><i class="material-icons">do_not_disturb_on</i></a></td> </tr>');
}
  function delete_row(rowno)
  {
   $('#'+rowno).remove();
  }
</script>

<?php require("layouts/footer.php") ?>