<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ADD PROSPECT</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                       <div class="alert alert-success" id="success" style="display: none">
                            <strong>Well done!</strong> You successfully added prospect.
                        </div>
                         <div class="alert alert-danger" id="error" style="display: none">
                            <strong>Whoops!</strong> Something went wrong
                        </div>
                        <div class="body">
                            
                          

                             <div class="row clearfix">
                                <div class="col-sm-12">
                                     <input name="group1" type="radio" id="radio_1" value="1" checked="checked"  />
                                        <label for="radio_1">New Client</label>
                                     <input name="group1" type="radio" id="radio_2" value="2" />
                                        <label for="radio_2">Existing Client</label>   
                                </div>    
                             </div> 
                             <div class="row clearfix" id="client_name_div">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="client_name" class="form-control" placeholder="Client Name" />
                                        </div>
                                        <br/>
                                        <br/>
                                        <div class="form-line">
                                            <input type="text" id="contact_person" class="form-control" placeholder="Contact Person" />
                                        </div>
                                    </div>        
                                </div>    
                             </div> 
                             <div class="row clearfix" id="client_id_div" style="display: none;">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <select class="form-control show-tick" id="client_id">
                                                    <option value="">-- Please select --</option>
                                                    <?php foreach($client_list as $client){?>
                                                    <option value="<?php echo $client->client_id;?>"><?php echo $client->client_name;?></option>
                                                    <?php } ?>
                                                   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                             </div>  
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line" id="pt">
                                            <input type="text" id="prospect_title" class="form-control" placeholder="Prospect Title" />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prospect_source" class="form-control" placeholder="Prospect Source" />
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                             <div class="row clearfix" >
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <select class="form-control show-tick" id="prospect_type_id">
                                                    <option value="">-- Please select --</option>
                                                    <?php foreach($prospect_type_list as $pr){?>
                                                    <option value="<?php echo $pr->prospect_type_id;?>"><?php echo $pr->prospect_type;?></option>
                                                    <?php } ?>
                                                   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="no_of_prospect" class="form-control" placeholder="No of contractors" />
                                        </div>
                                    </div>
                                </div>    
                             </div>  
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prospect_email_1" class="form-control" placeholder="Email 1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prospect_email_2" class="form-control" placeholder="Email 2" />
                                        </div>
                                    </div>
                                </div>
                               
                               
                            </div>
                              <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prospect_phone_1" class="form-control" placeholder="Phone 1" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="prospect_phone_2" class="form-control" placeholder="Phone 2" />
                                        </div>
                                    </div>
                                </div>
                              
                               
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <select class="form-control show-tick" id="state" onchange="get_city(this.value)">
                                                    <option value="">-- Please select state--</option>
                                                    <?php foreach ($state_list as $state) { ?>
                                                    <option value="<?php echo $state->state_code;?>"><?php echo $state->state;?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                             <select class="form-control show-tick" id="cities">
                                                    <option value="">-- Please select city --</option>
                                                   
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                               
                            </div>
                             <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="address" rows="4" class="form-control no-resize" placeholder="Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea id="prospect_other_info" rows="4" class="form-control no-resize" placeholder="Please enter any other info you want"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group align-right">
                                        
                                           <button type="button" id="btn_submit" class="btn btn-primary waves-effect">SUBMIT</button>
                                       
                                    </div>
                                </div>
                            </div>
                            
                           
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
           
        </div>
    </section>

<script>
      
function get_city(state_code){
          $.ajax({
                type:"POST",
                url:"<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/common/get_cities",
                data:{"state_code":state_code},
                success:function(data){
                   $("#cities").html(data);
                }
            });
                
 }



</script>
