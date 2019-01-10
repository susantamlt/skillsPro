<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> View </h2>
                        </div>
                        <div class="body">
                            <div class="row">
                                <?php
                                    $_data=$data[0]['content'];
                                    $str = explode(".",$_data);
                                ?> 
                                <?php
                                if($_data!='' && $str[1]=='pdf')
                                { ?>
                                <object data="<?php echo config_item('assets_dir');?><?php echo $data[0]['content']; ?>" type="application/pdf" width="100%" height="500px"><a href="<?php echo config_item('assets_dir');?><?php echo $data[0]['content']; ?>">Download PDF</a></object>
                              <?php  } elseif($_data!='' && $str[1]== 'mp3') { ?>
                                <audio controls>
                                <source src="<?php echo config_item('assets_dir');?><?php echo $data[0]['content'];?>" type="audio/mpeg">
                                </audio>
                             <?php } elseif ($_data!='' && $str[1]=='mp4') { ?>
                                <video width="100%" height="240" controls>
                                    <source src="<?php echo config_item('assets_dir');?><?php echo $data[0]['content'];?>" type="video/mp4">
                                </video>
                               <?php }elseif ($_data!='' && $str[1]=='csv') { ?>
                                 <script src="<?php echo config_item('assets_dir');?>js/d3.min.js?v=3.2.8"></script>
                                 <div id="csv-div"></div>

                                 <script type="text/javascript"charset="utf-8">
                                    d3.text("<?php echo config_item('assets_dir');?><?php echo $data[0]['content'];?>", function(data) {
                                        var parsedCSV = d3.csv.parseRows(data);

                                        var container = d3.select("div#csv-div").append("table").selectAll("tr").data(parsedCSV).enter().append("tr").selectAll("td").data(function(d) { return d; }).enter().append("td").text(function(d) { return d; });
                                    });
                                </script>
                               <?php } else{?>
                                  <?php echo "<strong>Error:404!! The Page You are looking for was not found</strong>";?>
                                 <?php }?>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </section>