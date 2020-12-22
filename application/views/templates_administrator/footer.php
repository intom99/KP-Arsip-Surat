<!-- Footer -->
<!-- <footer class="sticky-footer">
  <div class="container">
    <div class="copyright text-center my-auto">
      <span>&copy; KSPPS BMT Sehati 2020</span>
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

<!-- Show Password -->

<script src="<?php echo base_url() ?>assets/vendor/show-password/bootstrap-show-password.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendor/show-password/show-password.js"></script>
<!--  -->
<!-- <script type="text/javascript">
  $(window).load(function() {
    $("#filter").change(function() {
      console.log($("#filter option:selected").val());
      if ($("#filter option:selected").val() == 'hari') {
        $('#filterHari').prop('hidden', false);
        $('#filterMinggu').prop('hidden', 'true');
        $('#filterBulan').prop('hidden', 'true');

      } else if ($("#filter option:selected").val() == 'minggu') {
        $('#filterMinggu').prop('hidden', false);
        $('#filterHari').prop('hidden', 'true');
        $('#filterBulan').prop('hidden', 'true');
      } else {
        $('#filterMinggu').prop('hidden', 'true');
        $('#filterHari').prop('hidden', 'true');
        $('#filterBulan').prop('hidden', false);
      }
    });
  });
</script> -->

<script type="text/javascript">
  function showhideForm(showform) {
    if (showform == "hari") {
      document.getElementById("div1").style.display = 'block';
      document.getElementById("div2").style.display = 'none';
      document.getElementById("div3").style.display = 'none';
    }
    if (showform == "minggu") {
      document.getElementById("div2").style.display = 'block';
      document.getElementById("div1").style.display = 'none';
      document.getElementById("div3").style.display = 'none';
    }
    if (showform == "bulan") {
      document.getElementById("div3").style.display = 'block';
      document.getElementById("div1").style.display = 'none';
      document.getElementById("div2").style.display = 'none';
    }
  }
</script>

</body>

</html>