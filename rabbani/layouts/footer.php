<!-- Compiled and minified JavaScript -->
    <script src="components/js/jquery-3.4.1.js"></script>
    <script src="components/js/jquery.validate.min.js"></script>
    <script src="components/js/additional-methods.min.js"></script>
    <script src="components/js/materialize.min.js"></script>
    <script src="components/js/fungsi.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.sidenav').sidenav();
        });

        $(document).ready(function(){
          $('.fixed-action-btn').floatingActionButton();
        });

        $(document).ready(function(){
          $('.tooltipped').tooltip();
        });

        $(document).ready(function(){
          $('.slider').slider();
        });

        //float button
        $(document).ready(function(){
          $('.fixed-action-btn').floatingActionButton();
        });

        //tanggal
        $(document).ready(function(){
          $('.datepicker').datepicker();
        });

        // MODAL

        $(document).ready(function() {
            $('#delete').modal();
        });

//barang validation
      jQuery.validator.addMethod("lettersonly", function(value, element) {
          return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
      }, "Hanya isi dengan huruf")

       $("#formBarang").validate({
        rules: {
            nama_barang: {
                required: true,
                lettersonly: true,
                minlength: 1
            },
            stock: {
                required: true,
                min:0,
                number: true
            },
            harga: {
              required: true,
              min: 0,
              number: true
            },
        },
        //For custom messages
        messages: {
            nama_barang:{
                required: "Masukan nama barang",
                minlength: "Masukan minimal 1 karakter"
            },
            harga:{
              required: "Harga harus diisi",
              number:"Hanya isi dengan angka",
              min: "Nilai minimal adalah 0"

            },
            stock:{
              required: "Stok harus diisi",
              number:"Hanya isi dengan angka",
              min: "Nilai minimal adalah 0"
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });

    // Pembelian Validation
    $("#formPembelian").validate({
        rules: {
            barang: {
                required: true,
            },
            jumlah: {
                required: true,
                min:1,
                number: true
            },
            tgl: {
              required: true,
            },
            pembayaran: {
                min:0,
                number: true
            },
            pembayaran_non: {
                min:0,
                number: true
            },
            diskon: {
                min:0,
                number: true
            },
        },
        //For custom messages
        messages: {
            barang: {
                required: "Barang harus diisi",
            },
            jumlah: {
                required: "Jumlah harus diisi",
                min: "Minimal jumlah 1",
                number: "Hanya isi dengan angka"
            },
            tgl: {
              required: "Tanggal harus diisi",
            },
            pembayaran: {
                min:"Minimal pembayaran 0",
                number: "Hanya diisi dengan angka"
            },
            pembayaran_non: {
                min:"Minimal pembayaran Non Cash 0",
                number: "Hanya diisi dengan angka"
            },
            diskon: {
               min:"Minimal diskon 0",
               number: "Hanya diisi dengan angka"
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });

    // form restok
    $("#formStock").validate({
        rules: {
            barang: {
                required: true,
            },
            tgl: {
                required: true,
            },
            jumlah: {
              required: true,
              min: 0,
              number: true
            },
        },
        //For custom messages
        messages: {
            barang:{
              required: "Silahkan pilih barang",
            },
            tgl:{
              required: "Tanggal harus diisi",
            },
            Jumlah:{
              required: "Jumlah harus diisi",
            },
        },
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     });

  //detail Barang
  $(function()
  {
    $('.show_hide').on('click', function()
    {
      var target = $(this).data('target');
        $('.detail'+target).toggle();
        var SH = this.SH^=1;
        $(this).text(SH?'expand_less':'expand_more');
    });
  });
    </script>
  </body>
</html>