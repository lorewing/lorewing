<?php $this->load->view("admincms/includes2016/header.php"); ?>
<?php $this->load->view("admincms/includes2016/top-menu.php"); ?>
<?php $this->load->view("admincms/includes2016/sidebar.php"); ?>
<?php $this->load->view("admincms/includes2016/top.php"); ?>


                    <div class="row">
                        <div class="col-md-12 ">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-red-sunglo">
                                        <i class="icon-settings font-red-sunglo"></i>
                                        <span class="caption-subject bold uppercase"> Default Form</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn btn-sm green dropdown-toggle" href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;" data-toggle="dropdown"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                                        <i class="fa fa-pencil"></i> Edit </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                                        <i class="fa fa-trash-o"></i> Delete </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                                        <i class="fa fa-ban"></i> Ban </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;"> Make admin </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Email Address"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Circle Input</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon input-circle-left">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="text" class="form-control input-circle-right" placeholder="Email Address"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user font-red"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Left Icon</label>
                                                <div class="input-icon">
                                                    <i class="fa fa-bell-o font-green"></i>
                                                    <input type="text" class="form-control" placeholder="Left icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Left Icon(.input-sm)</label>
                                                <div class="input-icon input-icon-sm">
                                                    <i class="fa fa-bell-o"></i>
                                                    <input type="text" class="form-control input-sm" placeholder="Left icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Left Icon(.input-lg)</label>
                                                <div class="input-icon input-icon-lg">
                                                    <i class="fa fa-bell-o"></i>
                                                    <input type="text" class="form-control input-lg" placeholder="Left icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Right Icon</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-microphone fa-spin font-blue"></i>
                                                    <input type="text" class="form-control" placeholder="Right icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Right Icon(.input-sm)</label>
                                                <div class="input-icon input-icon-sm right">
                                                    <i class="fa fa-bell-o"></i>
                                                    <input type="text" class="form-control input-sm" placeholder="Left icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Right Icon(.input-lg)</label>
                                                <div class="input-icon input-icon-lg right">
                                                    <i class="fa fa-bell-o font-green"></i>
                                                    <input type="text" class="form-control input-lg" placeholder="Left icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Circle Input</label>
                                                <div class="input-icon right">
                                                    <i class="fa fa-microphone"></i>
                                                    <input type="text" class="form-control input-circle" placeholder="Right icon"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Input with Icon</label>
                                                <div class="input-group input-icon right">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope font-purple"></i>
                                                    </span>
                                                    <i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body"></i>
                                                    <input id="email" class="input-error form-control" type="text" value=""> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Input With Spinner</label>
                                                <input class="form-control spinner" type="text" placeholder="Process something" /> </div>
                                            <div class="form-group">
                                                <label>Static Control</label>
                                                <p class="form-control-static"> email@example.com </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Disabled</label>
                                                <input type="text" class="form-control" placeholder="Disabled" disabled> </div>
                                            <div class="form-group">
                                                <label>Readonly</label>
                                                <input type="text" class="form-control" placeholder="Readonly" readonly> </div>
                                            <div class="form-group">
                                                <label>Dropdown</label>
                                                <select class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Multiple Select</label>
                                                <select multiple class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Textarea</label>
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputFile1">File input</label>
                                                <input type="file" id="exampleInputFile1">
                                                <p class="help-block"> some help text here. </p>
                                            </div>
                                            <div class="form-group">
                                                <label>Checkboxes</label>
                                                <div class="mt-checkbox-list">
                                                    <label class="mt-checkbox"> Checkbox 1
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox"> Checkbox 2
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox"> Checkbox 3
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Outline Checkboxes</label>
                                                <div class="mt-checkbox-list">
                                                    <label class="mt-checkbox mt-checkbox-outline"> Checkbox 1
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox mt-checkbox-outline"> Checkbox 2
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox mt-checkbox-outline"> Checkbox 3
                                                        <input type="checkbox" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Inline Checkboxes</label>
                                                <div class="mt-checkbox-inline">
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" id="inlineCheckbox1" value="option1"> Checkbox 1
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox">
                                                        <input type="checkbox" id="inlineCheckbox2" value="option2"> Checkbox 2
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-checkbox mt-checkbox-disabled">
                                                        <input type="checkbox" id="inlineCheckbox3" value="option3" disabled> Disabled
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Radios</label>
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio"> Radio 1
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> Radio 2
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio"> Radio 3
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Outline Radios</label>
                                                <div class="mt-radio-list">
                                                    <label class="mt-radio mt-radio-outline"> Radio 1
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio mt-radio-outline"> Radio 2
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio mt-radio-outline"> Radio 3
                                                        <input type="radio" value="1" name="test" />
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Inline Radio</label>
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked> Option 1
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"> Option 2
                                                        <span></span>
                                                    </label>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="optionsRadios" id="optionsRadios6" value="option3" disabled> Disabled
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn blue">Submit</button>
                                            <button type="button" class="btn default">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase">Input Height Sizing</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Large Input</label>
                                                <input type="text" class="form-control input-lg" placeholder="input-lg"> </div>
                                            <div class="form-group">
                                                <label>Large Input Group</label>
                                                <div class="input-group input-group-lg">
                                                    <span class="input-group-addon" id="sizing-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Large Input Default Group</label>
                                                <div class="input-group input-group-lg">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn green" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Default Input</label>
                                                <input type="text" class="form-control" placeholder=""> </div>
                                            <div class="form-group">
                                                <label>Default Input Group</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
                                                    <span class="input-group-addon" id="sizing-addon1">@</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Default Input Button Group</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn red" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Small Input</label>
                                                <input type="text" class="form-control input-sm" placeholder="input-sm"> </div>
                                            <div class="form-group">
                                                <label>Small Input Group</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon" id="sizing-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1"> </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Small Input Default Group</label>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" placeholder="Search for...">
                                                    <span class="input-group-btn">
                                                        <button class="btn green" type="button">Go!</button>
                                                    </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <div class="form-group">
                                                <label>Large Select</label>
                                                <select class="form-control input-lg">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Default Select</label>
                                                <select class="form-control">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Small Select</label>
                                                <select class="form-control input-sm">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn default">Cancel</button>
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Input Width Sizing</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green-haze btn-outline btn-circle btn-sm" href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;"> Option 1</a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">Option 2</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">Option 3</a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin-view2016/admin_1<?php echo base_url(); ?>admin-view2016/admin_1javascript:;">Option 4</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <form role="form">
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label>Fluid Input</label>
                                                <input type="text" class="form-control" placeholder="fluid">
                                                <div class="input-icon right margin-top-10">
                                                    <i class="fa fa-check"></i>
                                                    <input type="text" class="form-control" placeholder="fluid"> </div>
                                                <div class="input-icon margin-top-10">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder="fluid"> </div>
                                                <div class="input-group margin-top-10">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder=".input-xlarge"> </div>
                                                <div class="input-group margin-top-10">
                                                    <input type="email" class="form-control" placeholder=".input-xlarge">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <hr> </div>
                                            <div class="form-group">
                                                <label>Extra Large Input</label>
                                                <input type="text" class="form-control input-xlarge" placeholder=".input-xlarge">
                                                <div class="input-icon right input-xlarge margin-top-10">
                                                    <i class="fa fa-check"></i>
                                                    <input type="text" class="form-control" placeholder=".input-xlarge"> </div>
                                                <div class="input-icon input-xlarge margin-top-10">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder=".input-xlarge"> </div>
                                                <div class="input-group input-xlarge margin-top-10">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder=".input-xlarge"> </div>
                                                <div class="input-group input-xlarge margin-top-10">
                                                    <input type="email" class="form-control" placeholder=".input-xlarge">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <hr> </div>
                                            <div class="form-group">
                                                <label>Large Input</label>
                                                <input type="text" class="form-control input-large" placeholder=".input-large">
                                                <div class="input-icon right input-large margin-top-10">
                                                    <i class="fa fa-check"></i>
                                                    <input type="text" class="form-control" placeholder=".input-large"> </div>
                                                <div class="input-icon input-large margin-top-10">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder=".input-large"> </div>
                                                <div class="input-group input-large margin-top-10">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder=".input-large"> </div>
                                                <div class="input-group input-large margin-top-10">
                                                    <input type="email" class="form-control" placeholder=".input-large">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <hr> </div>
                                            <div class="form-group">
                                                <label>Medium Input</label>
                                                <input type="text" class="form-control input-medium" placeholder=".input-medium">
                                                <div class="input-icon right input-medium margin-top-10">
                                                    <i class="fa fa-check"></i>
                                                    <input type="text" class="form-control" placeholder=".input-medium"> </div>
                                                <div class="input-icon input-medium margin-top-10">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder=".input-medium"> </div>
                                                <div class="input-group input-medium margin-top-10">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder=".input-medium"> </div>
                                                <div class="input-group input-medium margin-top-10">
                                                    <input type="email" class="form-control" placeholder=".input-medium">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <hr> </div>
                                            <div class="form-group">
                                                <label>Small Input</label>
                                                <input type="text" class="form-control input-small" placeholder=".input-small">
                                                <div class="input-icon right input-small margin-top-10">
                                                    <i class="fa fa-check"></i>
                                                    <input type="text" class="form-control" placeholder=".input-small"> </div>
                                                <div class="input-icon input-small margin-top-10">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" placeholder=".input-small"> </div>
                                                <div class="input-group input-small margin-top-10">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                    <input type="email" class="form-control" placeholder=".input-small"> </div>
                                                <div class="input-group input-small margin-top-10">
                                                    <input type="email" class="form-control" placeholder=".input-small">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Extra Small Input</label>
                                                <input type="text" class="form-control input-xsmall" placeholder=".input-xsmall"> </div>
                                            <div class="form-group">
                                                <label>Extra Large Select</label>
                                                <select class="form-control input-xlarge">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Large Select</label>
                                                <select class="form-control input-large">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Medium Select</label>
                                                <select class="form-control input-medium">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Small Select</label>
                                                <select class="form-control input-small">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Extra Small Select</label>
                                                <select class="form-control input-xsmall">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                    <option>Option 5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-actions right">
                                            <button type="button" class="btn default">Cancel</button>
                                            <button type="submit" class="btn green">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END SAMPLE FORM PORTLET-->
                        </div>
   
                   
                </div>
                <!-- END CONTENT BODY -->
                 <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-dark"></i>
                                        <span class="caption-subject font-dark sbold uppercase">Table Footer</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_4">
                                        <thead>
                                            <tr>
                                                <th class="table-checkbox">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_4 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Salary </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="table-checkbox"> </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Salary </th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> shuxer </td>
                                                <td>
                                                    <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                                </td>
                                                <td> $1240 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> looper </td>
                                                <td>
                                                    <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                                </td>
                                                <td> $2122 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> userwow </td>
                                                <td>
                                                    <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                                </td>
                                                <td> $2324 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> user1wow </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                </td>
                                                <td> $1234 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> restest </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                </td>
                                                <td> $1233 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> foopl </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $4321 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> weep </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $1244 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> coop </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $5422 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> pppol </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $1234 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> test </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $6321 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> userwow </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                </td>
                                                <td> $1235 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> test </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                </td>
                                                <td> $2323 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-datatable bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Table Footer Feedback</span>
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_5">
                                        <thead>
                                            <tr>
                                                <th class="table-checkbox">
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="group-checkable" data-set="#sample_5 .checkboxes" />
                                                        <span></span>
                                                    </label>
                                                </th>
                                                <th> Username </th>
                                                <th> Email </th>
                                                <th> Salary </th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" style="text-align:right">Total:&nbsp;&nbsp;</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> shuxer </td>
                                                <td>
                                                    <a href="mailto:shuxer@gmail.com"> shuxer@gmail.com </a>
                                                </td>
                                                <td> $1240 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> looper </td>
                                                <td>
                                                    <a href="mailto:looper90@gmail.com"> looper90@gmail.com </a>
                                                </td>
                                                <td> $2122 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> userwow </td>
                                                <td>
                                                    <a href="mailto:userwow@yahoo.com"> userwow@yahoo.com </a>
                                                </td>
                                                <td> $2324 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> user1wow </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                </td>
                                                <td> $1234 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> restest </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                </td>
                                                <td> $1233 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> foopl </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $4321 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> weep </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $1244 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> coop </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $5422 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> pppol </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $1234 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> test </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> good@gmail.com </a>
                                                </td>
                                                <td> $6321 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> userwow </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> userwow@gmail.com </a>
                                                </td>
                                                <td> $1235 </td>
                                            </tr>
                                            <tr class="odd gradeX">
                                                <td>
                                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                                        <input type="checkbox" class="checkboxes" value="1" />
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <td> test </td>
                                                <td>
                                                    <a href="mailto:userwow@gmail.com"> test@gmail.com </a>
                                                </td>
                                                <td> $2323 </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

<?php $this->load->view("admincms/includes2016/footer.php"); ?>
