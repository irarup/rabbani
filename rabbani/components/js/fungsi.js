//format tanggal
function dateFormat(tgl){
  var hari = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
  var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "July", "Agustus", "September", "Oktober", "November", "Desember"];

  var d = new Date(tgl);
  var _hari = d.getDay();
  var _tanggal = d.getDate();
  var _bulan = d.getMonth();
  var _tahun = d.getYear();
  var jam = d.getHours();
  var menit = d.getMinutes();

  if (jam < 12) {
        var a_p = "AM";
    } else {
        a_p = "PM";
    }
    if (jam == 0) {
        jam = 12;
    }
    if (jam > 12) {
        jam = jam - 12;
    }

    jam = checkTime(jam);
    menit = checkTime(menit);
 
      function checkTime(i) {
          if (i < 10) {
              i = "0" + i;
          }
          return i;
      }

        var tahun = (_tahun < 1000 ) ? _tahun + 1900 : _tahun;

          var tanggal = hari[_hari-1] +", " + _tanggal + " " + bulan[_bulan] + " " + tahun + " " + jam + ":" + menit + " " + a_p;
        
          return tanggal;
}
