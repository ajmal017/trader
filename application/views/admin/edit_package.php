<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/css/bootstrap-wysihtml5.css">
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/libs/packages.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:;">Edit Package</a></li>
    </ol>
</div>

<?php 
$package_data=getPackages($package_id);
//dump($package_data);
?>
<div class="container-fluid-md">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">Edit Package</h4>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="fa fa-fw fa-minus"></i></a>
                    <a href="#" data-rel="reload"><i class="fa fa-fw fa-refresh"></i></a>
                    <a href="#" data-rel="close"><i class="fa fa-fw fa-times"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <div class="alert alert-block alert-danger" style="display: none;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <p class="error_message"></p>
                </div>
                <div class="col-md-8">
                    <form id="editPackageForm" method="POST" action="<?php echo site_url(); ?>/admin_packages/edit_package" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Name</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="package_name" id="package_name" value="<?php echo $package_data['package_name']; ?>">
                                <input type="hidden" class="form-control" name="package_id" id="package_id" value="<?php echo $package_data['package_id']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Amount</label>
                            <div class="controls">
                                <input type="text" class="form-control" name="package_amount" id="package_amount" value="<?php echo $package_data['package_amount']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Type</label>
                            <div class="controls">
                                <select class="form-control" name="package_type" id="package_type">
                                    <option value="">Select</option>
                                    <option value="Lumsum" <?php if($package_data['package_type'] == "Lumsum"){ echo "selected"; } ?> >Lumsum</option>
                                    <option value="SIP" <?php if($package_data['package_type'] == "SIP"){ echo "selected"; } ?>>SIP</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Description</label>
                            <div class="controls">
                                <textarea id="wysiwyg" class="form-control" name="package_desc" id="package_desc" rows="10"><?php echo trim($package_data['package_desc']); ?></textarea>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Image</label>
                            <span><img src="<?php echo imagePath($package_data['package_image'],'packages',100,100); ?>" style="width:100px;height:100px;"></span>
                            <div class="controls">
                                <input type="hidden" name="package_image" id="package_image" value="<?php echo $package_data['package_image']; ?>"/>
                                <input type="file" class="form-control" name="files" id="files" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1">Package Downloadable Documents</label>
                            <div class="controls">
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
                                <input type="hidden" name="downloadable_documents_already_count" value="<?php echo @$downloadable_documents_already_count; ?>">
                                <input type="file" class="form-control" name="downloadable_documents[]" id="downloadable_documents" multiple/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="exampleInputText1"></label>
                            <div class="controls">
                                <input type="submit" class="btn btn-primary" id="save" value="Submit"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
</div>
</div>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/assets/plugins/bootstrap-wysihtml5/js/bootstrap-wysihtml5.js"></script>
<script>
    jQuery(function ($) {
        $('#wysiwyg').wysihtml5({
            stylesheets: ['assets/plugins/bootstrap-wysihtml5/css/wysiwyg-color.css']
        });
        $('.wysihtml5-toolbar .btn-default').removeClass('btn-default').addClass('btn-white');
    });
</script>
            </div>
        </div>
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>
