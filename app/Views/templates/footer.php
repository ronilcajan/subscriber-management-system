<script type="text/javascript"> var SITE_URL = "<?= site_url() ?>";</script>
<!-- ===== jQuery ===== -->
<script src="<?= site_url() ?>plugins/components/jquery/dist/jquery.min.js"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="<?= site_url() ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="<?= site_url() ?>assets/js/jquery.slimscroll.js"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="<?= site_url() ?>assets/js/waves.js"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="<?= site_url() ?>assets/js/sidebarmenu.js"></script>
<script src="<?= site_url() ?>plugins/components/icheck/icheck.min.js"></script>
<script src="<?= site_url() ?>plugins/components/icheck/icheck.init.js"></script>
<!-- ===== Custom JavaScript ===== -->
<script src="<?= site_url() ?>assets/js/custom.js"></script>
<script src="<?= site_url() ?>assets/js/jasny-bootstrap.js"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="<?= site_url() ?>plugins/components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="<?= site_url() ?>plugins/components/switchery/dist/switchery.min.js"></script>
<script src="<?= site_url() ?>plugins/components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="<?= site_url() ?>plugins/components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<script src="<?= site_url() ?>plugins/components/datatables/jquery.dataTables.min.js"></script>

    <!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

<script src="<?= site_url() ?>plugins/components/dropify/dist/js/dropify.min.js"></script>
<script>
    $('.dropify').dropify();
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
    });
</script>

<script src="<?= site_url() ?>plugins/components/styleswitcher/jQuery.style.switcher.js"></script>

<script src="<?= site_url() ?>assets/js/users.js"></script>
<script src="<?= site_url() ?>assets/js/subscriber.js"></script>
<script src="<?= site_url() ?>assets/js/account.js"></script>
<script src="<?= site_url() ?>assets/js/payment.js"></script>
<script src="<?= site_url() ?>assets/js/transaction.js"></script>
