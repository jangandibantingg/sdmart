<script src="ajax/modify.pengeluaran.js"></script>

                    <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                            <table class="table table-responsive">

                              <tr>

                                <th width="20%">From</th>
                                <th width="20%">Until</th>


                                <th></th>
                              </tr>
                              <tbody>
                                <tr>
                                  <form class="" action="" method="post">


                                  <td><input type="date" name="from" class="form-control" value="<?php echo "$date"; ?>"></td>
                                  <td><input type="date" name="until" class="form-control" value="<?php echo "$date"; ?>"></td>

                                  <td><input type="submit" name="save" class="btn btn-info" value="Cari">  </form>
                                    </td>
                                </tr>

                              </tbody>
                            </table>





                          </div>
                          </div>

                          <!--  -->
                          <div class="card">
                            <div class="card-body">
                              <button data-toggle="modal" data-target="#buttonbiaya"  class="btn btn-outline-info"><i class="ti-wallet"></i> Tambah </button>
                          <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                              <thead>
                                  <tr>
                                      <th>date</th>
                                      <th>Keterangan</th>
                                      <th width="15%">Pengeluaran</th>

                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $from=$_POST['from'];
                                  $until=$_POST['until'];

                                  $p=mysqli_query($con, "select * from arus_khas,subkategori_khas where subkategori_khas.id_subkategori_khas=arus_khas.id_subkategori_khas and arus_khas.orders='N' and arus_khas.dt >= '$from' and arus_khas.dt <= '$until' order by arus_khas.id_arus_khas desc");

                                while ($r=mysqli_fetch_array($p)) {


                                 ?>
                                  <tr id="row<?php echo $r['id_arus_khas'];?>">
                                      <td id="date<?php echo $r['id_arus_khas'];?>"><?php echo "".$r['dt'].""; ?></td>
                                      <td id="keterangan<?php echo $r['id_arus_khas'];?>"> <?php echo "$r[keterangan]"; ?></td>
                                      <td id="kredit<?php echo $r['id_arus_khas'];?>" align="right"><?php echo "".($r['kredit']).""; ?></td>




                                      <td>
                                         <a href="javascript:void(0)" id="edit_button<?php echo $r['id_arus_khas'];?>"  onclick="edit_row('<?php echo $r['id_arus_khas'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                          <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_arus_khas'];?>" value="save" onclick="save_row('<?php echo $r['id_arus_khas'];?>');" style="display:none;">
                                          <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['id_arus_khas'];?>" onclick="delete_row('<?php echo $r['id_arus_khas'];?>');"><i class="icon-trash"></i></a> -->

                                      </td>
                                  </tr>
                                  <?php
                                    }
                                    ?>
                              </tbody>

                          </table>

                        </div>

                      </div>
                          <!--  -->

                          <?php if (!empty($from)) {
                            // code...
                          ?>
                          <?php
                            $Nsubpengeluaran=pengeluaran($con,$from,$until,'N');
                            $Ysubpengeluaran=pengeluaran($con,$from,$until,'Y');

                           ?>

                              <!--posting akuntansi  -->
                              <!--  -->
                                 <p class="text-right"> <small> <b>pengeluaran berdasarkan tanggal <?php echo "".tanggal_indo($from).""; ?>. s/d <?php echo "".tanggal_indo($until).""; ?> </b></small> </p>
                              <div class="card-group">

                                                   <div class="card">
                                                       <div class="card-body">
                                                           <div class="row">
                                                               <div class="col-md-12">
                                                                   <div class="d-flex no-block align-items-center">
                                                                       <div>
                                                                           <h3><i class="ti-wallet"></i></h3>

                                                                       </div>
                                                                       <div class="ml-auto">
                                                                           <h4 class="counter text-success">IDR <?php echo "".number_format($Nsubpengeluaran).""; ?></h4>
                                                                           <p><?php echo "$Nposting"; ?></p>
                                                                           <p class="text-muted">Total Pengeluaran </p>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="col-12">
                                                                   <div class="progress">
                                                                       <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                   </div>
                                                                   <br>
                                                                   <p class="text-right">



                                                               </div>
                                                               <!--  -->
                                                               <!--  -->

                                                               <!--  -->
                                                               <!--  -->



                                                           </div>
                                                       </div>
                                                     </div>
                                                 </div>



                              <!--  -->
                              <!--  -->

                              <?php
                            }
                               ?>


                          </div>
                          <div class="modal fade" id="buttonbiaya" tabindex="-1" role="dialog" aria-labelledby="modalAddressLabel"  aria-hidden="true">
                                              <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h4 class="modal-title" id="exampleModalLabel1"> <i class="ti-wallet"></i> Pengeluaran</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      </div>
                                                      <div class="modal-body">
                                                        <form id="loginform" action="pengeluaran.html" method="post">
                                                              <div class="form-group">
                                                                  <label for="recipient-name" class="control-label">tanggal: <small class="btn waves-effect waves-light btn-xs btn-info"> m-d-Y</small></label>
                                                                  <input type="date" name="date" value="<?php echo "$date"; ?>" class="form-control" id="recipient-name1">
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="message-text" class="control-label">akun:</label>
                                                                  <select class="form-control" name="id_kategori_khas">

                                                                    <option value="">- pilih akun - </option>
                                                                    <option value="14">Biaya Oprasional </option>
                                                                    <option value="15">Biaya Non Oprasional</option>
                                                                    <option value="12">Biaya Produksi</option>
                                                                    <option value="13">Biaya Lain</option>

                                                                  </select>
                                                              </div>


                                                              <div class="form-group">
                                                                  <label for="message-text" class="control-label">Keterangan:</label>
                                                                  <input type="text" class="form-control" name="keterangan" id="recipient-name1">
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="message-text" class="control-label">Pengeluaran:</label>
                                                                    <input type="number" name="pengeluaran" class="form-control" id="recipient-name1">
                                                              </div>

                                                              <div class="form-group">
                                                                <div id="info"> </div>
                                                              </div>

                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                          <button id="submit" class="btn btn-primary">Simpan</button>
                                                      </div>
                                                        </form>
                                                  </div>
                                              </div>
                              </div>
