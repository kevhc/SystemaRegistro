</div>
</div>
<script src="<?php echo BASE_URL . 'Assets/libs/jquery/dist/jquery.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/sidebarmenu.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/app.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/libs/apexcharts/dist/apexcharts.min.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/libs/simplebar/dist/simplebar.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/dashboard.js' ?>"></script>
<script src="<?php echo BASE_URL . 'Assets/js/Custom.js' ?>"> </script>
<!--DATATABLE-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script
    src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.8/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/r-2.5.0/sl-1.7.0/datatables.min.js">
</script>



<script>
const base_url = "<?php echo BASE_URL; ?>";
</script>


<?php if (!empty($data['script'])) { ?>

<script src="<?php echo BASE_URL . 'Assets/js/pages/' . $data['script'] ?>"> </script>

<?php } ?>

</body>

</html>