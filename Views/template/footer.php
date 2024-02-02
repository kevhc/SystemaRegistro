</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


<!-- Bootstrap core JavaScript-->
<script src="<?php echo BASE_URL . 'Assets/vendor/jquery/jquery.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo BASE_URL . 'Assets/vendor/jquery-easing/jquery.easing.min.js' ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo BASE_URL . 'Assets/js/sb-admin-2.min.js' ?>"></script>

<!-- Page level plugins -->

<script src="<?php echo BASE_URL . 'Assets/vendor/chart.js/Chart.min.js' ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo BASE_URL . 'Assets/vendor/datatables/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/vendor/datatables/dataTables.bootstrap4.min.js' ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo BASE_URL . 'Assets/js/demo/datatables-demo.js' ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo BASE_URL . 'Assets/js/demo/chart-area-demo.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/demo/chart-pie-demo.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/Custom.js' ?>"> </script>


<script>
const base_url = "<?php echo BASE_URL; ?>";
</script>


<?php if (!empty($data['script'])) { ?>

<script src="<?php echo BASE_URL . 'Assets/js/pages/' . $data['script'] ?>"> </script>

<?php } ?>


</body>

</html>