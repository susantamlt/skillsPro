<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>VIEW PROSPECT</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <input type="hidden" name="prospect_id" id="prospect_id" value="<?php echo $prospect->prospect_id;?>"/>
                    <div class="card">
                       
                        <div class="body">
                            
                          

                             <div class="row clearfix">
                                <div class="col-sm-12">
                                     <h3><?php echo $prospect->prospect_title;?></h3>   
                                </div>    
                             </div> 
                              <div class="row clearfix">
                                <div class="col-sm-6">
                                   <strong>Contractor Type:</strong>: <?php echo $prospect->prospect_type;?>
                                </div>
                                  <div class="col-sm-6">
                                   <strong>No of Contractors:</strong>: <?php echo $prospect->no_of_prospect;?>
                                </div>
                             </div> 
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                   <strong>Client Name</strong>: <?php echo $prospect->client_name;?>
                                </div>
                                  <div class="col-sm-6">
                                   <strong>Contact Person</strong>: <?php echo $prospect->decision_maker_name;?>
                                </div>
                             </div>
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                    <?php if($prospect->prospect_phone_1){?>
                                   <strong>Phone 1</strong>: <?php echo $prospect->prospect_phone_1;?>
                                   <?php } ?><br/>
                                   <?php if($prospect->prospect_phone_2){?>
                                   <strong>Phone 2</strong>: <?php echo $prospect->prospect_phone_2;?>
                                   <?php } ?>
                                </div>
                                  <div class="col-sm-6">
                                    <?php if($prospect->prospect_email_1){?>
                                     <strong>Email 1</strong>: <?php echo $prospect->prospect_email_1;?>
                                     <?php } ?>
                                     <?php if($prospect->prospect_email_2){?>
                                     <strong>Email 2</strong>: <?php echo $prospect->prospect_email_2;?>
                                     <?php } ?>
                                </div>
                             </div>  
                             <div class="row clearfix">
                                <div class="col-sm-6">
                                   <strong>Prospect Source</strong>: <a href="<?php echo $prospect->prospect_source;?>" target="_blank">Source</a>
                                </div>
                                  <div class="col-sm-6">
                                   <strong>Address</strong>: <?php echo $prospect->prospect_address;?>,<?php echo $prospect->state;?>,<?php echo $prospect->city;?>
                                </div>
                             </div>

                             <div class="row clearfix">
                                <div class="col-sm-6">
                                   <strong>Sales Person</strong>: <?php echo ucfirst($prospect->username);?>
                                </div>
                                  <div class="col-sm-6">
                                    <div class="col-sm-12">
                                        <div class="demo-switch-title">Contract Send</div>
                                        <div class="switch">
                                            <label><input type="checkbox" id="contract_send" <?php if($prospect->is_contract_send=='Y'){?> checked<?php }?>><span class="lever switch-col-green"></span></label>
                                        </div>
                                    </div>
                                     <div class="col-sm-12">
                                        <div class="demo-switch-title">Contract Received</div>
                                        <div class="switch">
                                            <label><input type="checkbox" id="contract_received" <?php if($prospect->is_contract_recived=='Y'){?> checked<?php }?>><span class="lever switch-col-green"></span></label>
                                        </div>
                                    </div>
                                </div>
                             </div>
                            
            
           
        </div>
    </section>

