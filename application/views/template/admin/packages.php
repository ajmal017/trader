<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/packages.js"></script>
<section class="content">
    <div class="container-fluid">
        <!--<div class="block-header">
            <h2>PACKAGES</h2>
        </div>-->
        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Package Master
                        </h2>
                    </div>
                    <div class="body">
                        <form id="addPackageForm" method="POST" action="<?php echo site_url(); ?>/admin_packages/add_package" enctype="multipart/form-data" >
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Name</label>
                                            <input type="text" name="package_name" id="package_name" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Amount</label>
                                            <input type="text" name="package_amount" id="package_amount" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Type</label>
                                            <select class="form-control" name="package_type" id="package_type">
                                                <option value="">Select</option>
                                                <option value="Lumsum">Lumsum</option>
                                                <option value="SIP">SIP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Description</label>
                                            <textarea class="form-control" name="package_desc" id="package_desc" rows="10">
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Image</label>
                                            <input type="file" class="form-control" name="files" id="files" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Downloadable Documents</label>
                                            <input type="file" class="form-control" name="downloadable_documents[]" id="downloadable_documents" multiple/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary waves-effect" id="save" value="Submit"/>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs With Custom Animations -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red">
                        <h2>
                            Packages List
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Controls</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Package Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Controls</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php 
                                    $package_list=getPackages();
                                    foreach ($package_list as $row ) { 
                                        ?>
                                        <tr id="package-id-<?php echo $row['package_id']; ?>">
                                            <td><?= $row['package_name'];?></td>
                                            <td><?= $row['package_type'];?></td>
                                            <td><?= $row['package_amount'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary waves-effect" onclick="window.open('<?= site_url(); ?>admin_packages/edit/<?php echo $row['package_id']; ?>','_blank')">Edit</button>
                                                <button type="button" class="btn btn-primary waves-effect deletePackage" ng-click="deletePackage(<?php echo $row['package_id']; ?>)">Delete</button>
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->view('template/includes/footer'); ?>
<!-- TinyMCE -->
<script src="<?= base_url(); ?>assets/template/plugins/tinymce/tinymce.js"></script>
<script>
$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = '<?= base_url(); ?>assets/template/plugins/tinymce';
});
</script>