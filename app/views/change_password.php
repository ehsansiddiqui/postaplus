                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" method="post" action="<?php echo site_url('user/chngpwd') ?>"   enctype="multipart/form-data">
                                      <fieldset>
                                          <legend>Change Password  &nbsp;&nbsp;&nbsp; <span style="color: red;"><?php echo @$msg ;?></span></legend>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="typeahead">Old Password</label>
                                          <div class="controls">
                                              <input type="text" class="span6"  name="old_pwd" id="typeahead"  data-provide="typeahead" data-items="4" value="" required="">      
                                          </div>
                                        </div>
                                        
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="typeahead">New Password</label>
                                          <div class="controls">
                                              <input type="text" class="span6"  name="new_pwd" id="typeahead"  data-provide="typeahead" data-items="4" value="" required="">      
                                          </div>
                                        </div>
                                        
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="typeahead">Confirm Password</label>
                                          <div class="controls">
                                              <input type="text" class="span6"  name="cfrm_pwd" id="typeahead"  data-provide="typeahead" data-items="4" value="" required="">      
                                          </div>
                                        </div>
                                        
                                         <div class="form-actions">
                                            <input type="submit"  name="submit" class="btn btn-primary" value="Save changes">
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>