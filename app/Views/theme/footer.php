<!--//banner-->
  <!-- Content Wrapper. Contains page content -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <center><strong><p class="text muted">Copyright&copy; 2020 BNG DEVELOPMENT</p></strong></center>

    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?= base_url() ?>/public/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/public/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>/public/plugins/chart.js/Chart.min.js"></script>

<!-- JQVMap -->
<script src="<?= base_url() ?>/public/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>/public/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>/public/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>/public/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/public/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/public/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/public/dist/js/pages/dashboard.js"></script>

<script src="<?= base_url() ?>/public/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/public/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/public/js/sweetalert2@9.js"></script>
    <script src="<?= base_url() ?>/public/js/myAlerts.js"></script>
    <script src="<?= base_url() ?>/public/js/form.js"></script>
    <script src="<?= base_url() ?>/public/js/side.js"></script>
    <script src="<?= base_url() ?>/public/js/table.js"></script>
    <script src="<?= base_url() ?>public/js/bootstrap-select.min.js"></script>

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    
    <script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js\dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="<?= base_url();?>\public\plugins\datatables-buttons\js\buttons.html5.min.js"></script>

</body>
</html>

<script>
// check if student late and set to absent
setInterval(function(){get_fb();}, 2000);
function get_fb(){
    $.ajax({
        type: "POST",
        url: "<?= base_url('attendance/penalty'); ?>",
        async: false,
        success: function(response){
          // console.log(response)
        }
    });
    // $('div.feedback-box').html(feedback);
}
</script>