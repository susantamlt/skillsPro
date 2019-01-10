    
      <section class="content">
            <input type="hidden" name="page" id="page" value="classes" />
            <div class="container-fluid">
                <div class="block-header">
                    <h2>Class Dashboard</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-pink">
                            <div class="icon">
                                <i class="material-icons">library_books</i>
                            </div>
                            <div class="content">
                                <!-- <div class="text">My Course</div> -->
                               <div class="text"> <a href="<?php echo base_url('sales/classes/courseview');?>" class=""><h5>My Course</h5></a></div>
                                <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">5</div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-cyan">
                            <div class="icon">
                                <i class="material-icons">class</i>
                            </div>
                            <div class="content">
                                <div class="text"> <a href="<?php echo base_url('sales/classes/classeview');?>" class=""><h5>Upcoming Class</h5></a></div>
                                <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-light-green">
                            <div class="icon">
                                <i class="material-icons">event_available</i>
                            </div>
                            <div class="content">
                                <!-- <div class="text">Upcoming Exam</div> -->
                                 <div class="text"> <a href="<?php echo base_url('sales/classes/examview');?>" class=""><h5><b>Upcoming Exam</b></h5></a></div>
                                <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">0</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box bg-orange">
                            <div class="icon">
                                <i class="material-icons">import_contacts</i>
                            </div>
                            <div class="content">
                                <!-- <div class="text">Project/Assessment</div> -->
                                <div class="text"> <a href="<?php echo base_url('sales/classes/projesctview');?>" class=""><h5><b>Project/Assessment</b></h5></a></div>
                                <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>    
    