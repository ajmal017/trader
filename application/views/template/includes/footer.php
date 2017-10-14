<!-- Large Size -->
<div class="modal fade" id="error_log" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                <h4 class="modal-title modal_msg" id="largeModalLabel">Errors</h4>
            </div>
            <div class="modal-body">
                <span id="errors"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Core Js -->
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<!--<script src="<?= base_url(); ?>assets/template/plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="<?= base_url(); ?>assets/template/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>

<!-- Autosize Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url(); ?>assets/template/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/template/js/admin.js"></script>

<!-- Demo Js -->
<script src="<?= base_url(); ?>assets/template/js/demo.js"></script>


<script>
$(function () {
    //Textare auto growth
    autosize($('textarea.auto-growth'));
    $('.datepicker').bootstrapMaterialDatePicker({
        format: 'YYYY-MM-DD',
        clearButton: true,
        weekStart: 1,
        time: false
    });
});
</script>    
</body>

</html>