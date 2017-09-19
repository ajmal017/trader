<?php $this->view('frontend/includes/header1'); ?>
<script src="<?php echo base_url(); ?>assets/frontend/js/libs/packages.js"></script>
<script type="text/javascript" src="https://content.jwplatform.com/libraries/L7fM8L0h.js"></script>
<script type="text/javascript">jwplayer.key="f8LoCkNhHuEPU2LM86RdEX8n";</script>
<div id="play_content" class="modal fade" tabindex=-1 role="dialog" style="margin-top:30px;">
    <div class="modal-dialog modal-md" style="float:none;margin:auto;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View</h4>
            </div>
            <div class="modal-body" style="overflow:auto;width:100%">
                <center layout="column">
                    <div class="col-xl-10 col-lg-12 col-md-12 col-sm-12">
                        <div id="myElement"></div>                        
                    </div>
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="middle-content">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>File Name</th>
        <th>File Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $package_media_list = getPackageMedia($package_id); ?>
      <?php foreach($package_media_list as $row){ 
        $file_type_ext = explode('/', $row['file_type']);
        $ext = $file_type_ext[0];
        ?>
      <tr>
        <td><?= $row['file_path']; ?></td>
        <td><?= $ext; ?></td>
        <?php if($ext == 'audio' || $ext == 'video'){ ?>
        <td><a class="btn btn-primary" href="<?= site_url().'/packages/view/'.$row['package_id'].'/'.$row['package_media_id']; ?>" target="_blank_">View</a></td>
        <?php }else{ ?>
        <td><a class="btn btn-primary" href="<?= base_url().'/uploads/packages/online_study_docs/'.$row['file_path']; ?>" target="_blank_">View</a></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>     
</div>
   <div class="clear"></div> 
  </div>
  
</div>
</body>
</html>
