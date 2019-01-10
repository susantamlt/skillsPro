<section class="content">
        <div class="container-fluid">
            <div class="block-header">
               
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST REQUIREMENT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Prospect Title</th>
                                            <th>Type</th>
                                            <th>Requirement</th>
                                            <th>Fullfilled</th>
                                            <th>Address</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Prospect Title</th>
                                            <th>Type</th>
                                            <<th>Requirement</th>
                                            <th>Fullfilled</th>
                                            <th>Address</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($requirement as $r){?>
                                        <tr>
                                            <td><?php echo $r->client_name;?></td>
                                            <td><?php echo $r->prospect_title;?></td>
                                            <td><?php echo $r->prospect_type;?></td>
                                            <td><?php echo $r->no_of_prospect;?></td>
                                            <td><?php echo $r->no_requirement_fullfilled;?></td>
                                            <td><?php echo $r->prospect_address;?><br/>
                                                <?php echo $r->city;?>,<?php echo $r->state;?>
                                            </td>
                                            <td>
                                               <a href="<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/requirement/requirement_details/<?php echo $r->requirement_id;?>" id="view_<?php echo $r->requirement_id;?>">View Details</a><br/>
                                               <a href="<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/requirement/upload_resume_for_interview/<?php echo $r->requirement_id;?>" id="view_<?php echo $r->requirement_id;?>">Upload Resume</a>


                                            </td>
                                           
                                        </tr> 
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
      