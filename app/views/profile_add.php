                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" method="post" action="<?php echo site_url('user/profile1') ?>"   enctype="multipart/form-data">
                                      <fieldset>
                                          <legend> Profile  &nbsp;&nbsp;&nbsp; <span style="color: red;"><?php echo @$msg ;?></span></legend>
                                        
                                         <div class="control-group">
                                          <label class="control-label" for="typeahead">UserName</label>
                                          <div class="controls">
                                              <input type="text" class="span6"  name="username" id="typeahead"  data-provide="typeahead" data-items="4" value="<?php echo @$result->username ;?>" required="">      
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