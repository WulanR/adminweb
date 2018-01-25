<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="page-header">Tambah Tempat</h1>
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

                                    <form method="post" id='form-tempat' enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/add_tempat/simpan">
                                        <div class="form-group">
                                            <label>Admin</label>
                                            <input type="text" class="form-control" name="id_admin" value="<?php echo $this->session->userdata('id_admin') ?>" readonly="TRUE">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Tempat</label>
                                            <input type="text" class="form-control" name="nm_tempat">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat_wis">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control" name="keterangan">
                                        </div>
                                        <div class="form-group">
                                            <label>Biaya</label>
                                            <input type="number" class="form-control" name="harga_wis">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" id="foto" name="foto">
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