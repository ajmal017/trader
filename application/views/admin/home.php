<script src="<?php echo base_url(); ?>assets/admin/js/libs/home.js"></script>
<div class="page-subheading page-subheading-md">
    <ol class="breadcrumb">
        <li class="active"><a href="javascript:void(0);">Dashboard</a></li>
    </ol>
</div>
<div class="container-fluid-md">
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="panel">
                <div class="panel-body">
                    <button button="button" class="btn btn-primary" ng-click="clear_cache()">Clear Cache</button>
                    <button button="button" class="btn btn-primary" ng-click="generate_payout()">Generate Payout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){        
        $('.clear_cache').click(function(){
            if(confirm("Do you want to clear cache ?"))
            {
                Barva.admin.clear_cache();    
            }
            
        });
    });
</script>
            </div>
        </div>
    <?php $this->load->view('admin/includes/footer'); ?>    
    </body>
</html>
