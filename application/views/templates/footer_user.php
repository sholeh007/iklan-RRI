 <!-- Footer -->
 <div class="container-fluid">
     <footer class="footer bawah">
         <div class="row align-items-center justify-content-xl-between">
             <div class="col-xl-6">
                 <div class="copyright text-center text-xl-left text-muted">
                     &copy; <?= date('Y'); ?> <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                         target="_blank">Creative Tim</a>
                 </div>
             </div>
         </div>
     </footer>
 </div>
 </div>
 <!--   Core   -->
 <script src="<?= base_url('assets/'); ?>js/plugins/jquery/dist/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
 <script>
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
 </script>
 <!--   Optional JS   -->
 <script src="<?= base_url('assets/'); ?>js/plugins/chart.js/dist/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/plugins/chart.js/dist/Chart.extension.js"></script>
 <!--   Argon JS   -->
 <script src="<?= base_url('assets/'); ?>js/argon-dashboard.min.js?v=1.1.0"></script>
 <!-- SweetAlert JS -->
 <script src="<?= base_url('assets/'); ?>js/sweetalert2.all.min.js"></script>
 <script src="<?= base_url('assets/'); ?>js/my.js"></script>

 </body>

 </html>