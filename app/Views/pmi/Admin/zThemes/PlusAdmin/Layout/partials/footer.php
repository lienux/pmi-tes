<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
<div class="copyright">
&copy; Copyright <strong><span><?=$dorbitt->copyright?></span></strong>. All Rights Reserved
</div>
<div class="credits">
<!-- All the links in the footer should remain intact. -->
<!-- You can delete the links only if you purchased the pro version. -->
<!-- Licensing information: https://bootstrapmade.com/license/ -->
<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
Developed by <a href="<?=$dorbitt->developer_site?>"><?=$dorbitt->developed?></a>
</div>
</footer><!-- End Footer -->


<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="<?=base_url();?>/vendors/jquery/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<!-- <script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script> -->
<script src="<?=base_url();?>/vendors/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/php-email-form/validate.js"></script>
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/quill/quill.min.js"></script>
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
<!-- <script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script> -->
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/chart.js/chart.min.js"></script>
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="<?=base_url();?>/templates/NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>

<!-- <script src="<?=base_url();?>/vendors/DataTables/datatables.min.js"></script> -->

<!-- Template Main JS File -->
<script src="<?=base_url();?>/templates/NiceAdmin/assets/js/main.js"></script>

<script src="<?=base_url();?>/assets/js/dorbitt.js"></script>

<!-- dataTables -->
<script src="<?=base_url();?>/vendors/DataTables/datatables.min.js"></script>

<?=(isset($appjs)) ? $appjs : '';?>