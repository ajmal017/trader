<!-- Modal -->
<div class="modal fade" id="login_modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Login</h4>
            </div>
                <div class="modal-body" style="overflow:auto;">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <label>First Name : </label>
                            <input type="text" class="form-control" name="firstname" value="{{user_info.firstname}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Middle Name : </label>
                            <input type="text" class="form-control" name="middlename" value="{{user_info.middlename}}">
                        </div>
                        
                    </div>
                </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Login" ng-click="login()"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
        </div>    
    </div>
</div>