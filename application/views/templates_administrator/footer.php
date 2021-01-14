<!-- Footer -->
<!-- <footer class="sticky-footer mt-5">
  <div class="container">
    <div class="copyright text-center my-auto">
      <span>&copy; KSPPS BMT Sehati 2021</span>
    </div>
  </div>
</footer> -->
<!-- End of Footer -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/demo/datatables-demo.js"></script>

<!-- Datepicker jquery -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Show Password -->

<script src="<?php echo base_url() ?>assets/vendor/show-password/bootstrap-show-password.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/show-password/show-password.js"></script>
<!--  -->

<script type="text/javascript">
  function showhideForm(showform) {
    if (showform == "tanggal") {
      document.getElementById("div1").style.display = 'block';
      document.getElementById("div2").style.display = 'none';
    }
    if (showform == "bulan") {
      document.getElementById("div2").style.display = 'block';
      document.getElementById("div1").style.display = 'none';
    }
  }

  // $(function() {
  //   $("#tgl_awal").datepicker({
  //     dateFormat: "dd-mm-yy",
  //     // autoclose: true
  //   });
  // });
  // $(function() {
  //   $("#tgl_akhir").datepicker({
  //     dateFormat: "dd-mm-yy",
  //     // autoclose: true
  //   });
  // });

  // $(function() {
  //   var dateFormat = "dd-mm-yy",
  //     from = $("#tgl_awal")
  //     .datepicker({
  //       defaultDate: "+1w",
  //       changeMonth: true,
  //       numberOfMonths: 1
  //     })
  //     .on("change", function() {
  //       to.datepicker("option", "minDate", getDate(this));
  //     }),
  //     to = $("#tgl_akhir").datepicker({
  //       defaultDate: "+1w",
  //       changeMonth: true,
  //       numberOfMonths: 1
  //     })
  //     .on("change", function() {
  //       from.datepicker("option", "maxDate", getDate(this));
  //     });

  //   function getDate(element) {
  //     var date;
  //     try {
  //       date = $.datepicker.parseDate(dateFormat, element.value);
  //     } catch (error) {
  //       date = null;
  //     }

  //     return date;
  //   }
  // });
</script>

</body>

</html>