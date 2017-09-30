<?php $this->view('frontend/includes/header1'); ?>
<script src="<?php echo base_url(); ?>assets/frontend/js/libs/packages.js"></script>
<link href="http://vjs.zencdn.net/5.8.8/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<script src="http://vjs.zencdn.net/5.8.8/video.js"></script>
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
      <?php $package_media_list = getPackageMedia($package_id,$package_media_id); ?>
      <?php foreach($package_media_list as $row){ 
        $file_type_ext = explode('/', $row['file_type']);
        $ext = $file_type_ext[0];
        ?>
        <?php if($ext == 'audio' || $ext == 'video'){ ?>
            <video id="video-js" class="video-js vjs-default-skin" preload="auto" controls="controls" width="800" height="500" data-setup="\'{&quot;example_option&quot;:true}\'">
              <source src="<?= base_url().'/uploads/packages/online_study_docs/'.$row['file_path']; ?>" type="<?= $row['file_type']; ?>" />
                  To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
              </video>    
        <?php } ?>
      <?php } ?>
</div>
   <div class="clear"></div> 
  </div>
  
</div>
</body>
</html>
