<?php $this->view('template/includes/header'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ng/admin/packages.js"></script>
<?php 
$package_data=getPackages($package_id);
?>
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
                            Edit Package
                        </h2>
                    </div>
                    <div class="body">
                        <form id="editPackageForm" method="POST" action="<?php echo site_url(); ?>/admin_packages/edit_package" enctype="multipart/form-data" >
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Name</label>
                                            <input type="text" class="form-control" name="package_name" id="package_name" value="<?php echo $package_data['package_name']; ?>">
                                            <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $package_data['package_id']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Amount</label>
                                            <input type="text" class="form-control" name="package_amount" id="package_amount" value="<?php echo $package_data['package_amount']; ?>">
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
                                                <option value="Lumsum" <?php if($package_data['package_type'] == "Lumsum"){ echo "selected"; } ?> >Lumsum</option>
                                                <option value="SIP" <?php if($package_data['package_type'] == "SIP"){ echo "selected"; } ?>>SIP</option>
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
                                            </textarea>
                                            <textarea class="form-control" name="package_desc" id="package_desc" rows="10"><?php echo trim($package_data['package_desc']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Package Image</label>
                                            <span><img class="img-responsive thumbnail" ng-src="<?php echo imagePath($package_data['package_image'],'packages',100,100); ?>"></span>
                                            <input type="hidden" name="package_image" id="package_image" value="<?php echo $package_data['package_image']; ?>"/>
                                            <input type="file" class="form-control" name="files" id="files" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <?php 
                                            if(!empty($package_data['study_data'])){ ?>
                                            <div>
                                                <ul>
                                                <?php 
                                                $downloadable_documents_already_count = 0;
                                                foreach($package_data['study_data'] as $pi){ 
                                                    ?>
                                                    <li id="package-media-id-<?= $pi['package_media_id']; ?>"><a href="<?php echo base_url().'uploads/packages/online_study_docs/'.$pi['image_path']; ?>"><?php echo $pi['image_path']; ?></a>                           <span ng-click="delete_package_media(<?= $pi['package_media_id']; ?>)">X</span></li>
                                                <?php $downloadable_documents_already_count++; } ?>   
                                                </ul>
                                            </div>
                                            <?php } ?>
                                        <div class="form-line">
                                            <label>Package Downloadable Documents</label>
                                            <input type="hidden" name="downloadable_documents_already_count" value="<?php echo @$downloadable_documents_already_count; ?>">
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