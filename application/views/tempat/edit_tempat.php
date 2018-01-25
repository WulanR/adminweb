<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Edit Tempat</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-10">

                                <?php
                                    if(!empty($notif)){
                                    echo '<div class="alert alert-success">';
                                    echo $notif;
                                    echo '</div>';
                                    }
                                ?>
                                     <form method="post" id='form-tempat' enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/edit_tmp/edit/<?php echo $tempat->ID_TEMPAT; ?>">
                                        
                                        <div class="form-group">
                                            <label>Admin</label>
                                            <input type="text" class="form-control" name="id_admin" value="<?php echo $tempat->ID_ADMIN; ?>" readonly="TRUE">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Tempat</label>
                                            <input type="text" class="form-control" name="nm_tempat" value="<?php echo $tempat->NAMA_TEMPAT; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat_wis" value="<?php echo $tempat->ALAMAT_WISATA; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan" value="<?php echo $tempat->KETERANGAN; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input type="number" class="form-control" name="harga_wis" value="<?php echo $tempat->HARGA_WISATA; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="foto">
                                        </div>
                                        
                                        <button type="submit" value="Submit" name="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>