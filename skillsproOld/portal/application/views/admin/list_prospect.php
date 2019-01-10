<section class="content">
        <div class="container-fluid">
            <div class="block-header">
               
<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LIST PROSPECT
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
                                            <th>No of Contractors</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Prospect Title</th>
                                            <th>Type</th>
                                            <th>No of Contractors</th>
                                            <th>Address</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach($prospect as $p){?>
                                        <tr>
                                            <td><?php echo $p->client_name;?></td>
                                            <td><?php echo $p->prospect_title;?></td>
                                            <td><?php echo $p->prospect_type;?></td>
                                            <td><?php echo $p->no_of_prospect;?></td>
                                            <td><?php echo $p->prospect_address;?><br/>
                                                <?php echo $p->city;?>,<?php echo $p->state;?>
                                            </td>
                                            <td>
                                               <a href="<?php echo base_url();?><?php echo $this->config->item('index_page');?>/admin/prospect/prospect_details/<?php echo $p->prospect_id;?>" id="view_<?php echo $p->prospect_id;?>">View Details</a>


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
      