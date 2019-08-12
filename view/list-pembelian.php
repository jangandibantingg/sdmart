<script src="ajax/modify.pembelian.js"></script>

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

                                  <td>  <button type="submit" class="btn btn-outline-info" name="button"> <i class="ti-search"></i> cari</button> </td>
                                </tr>
                                </form>

                              </tbody>
                            </table>





                          </div>
                          </div>

                          <!--  -->
                          <div class="card">
                            <div class="card-body">

                              <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                  <thead>
                                      <tr>
                                          <th></th>
                                          <th>Name</th>
                                          <th width="15%">Price</th>
                                          <th>QTY</th>
                                          <th>SUB</th>
                                          <th>date</th>
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php


                                      $_SESSION['from-pembelian'] = $_POST['from'];
                                      $_SESSION['until-pembelian'] = $_POST['until'];

                                      $from= $_SESSION['from-pembelian'];
                                      $until= $_SESSION['until-pembelian'];

                                      $p=mysqli_query($con, "select orders.clear, orders.id_order, item.nama_item, item.price, orders.qty, orders.kode_item, item.kode_item, orders.dt from orders,item where item.kode_item=orders.kode_item and orders.dt between '$from' and  '$until' order by orders.id_order desc");

                                       while ($r=mysqli_fetch_array($p)) {
                                     ?>
                                      <tr id="row<?php echo $r['id_order'];?>">
                                          <td>  <a href="javascript:void(0)" id="delete_button<?php echo $r['id_order'];?>" onclick="delete_row('<?php echo $r['id_order'];?>');"><i class="icon-trash"></i></a></td>
                                          <td id="nama_item<?php echo $r['id_order'];?>">
                                            <?php
                                            if ($r['clear'] == 'N') {
                                              echo "<i class='ti ti-clipboard' title='belum masuk laporan'></i>";
                                            }else {
                                              echo "<i class='ti ti-agenda'></i>";
                                            }
                                             ?>
                                             <?php echo "$r[nama_item]"; ?>
                                           </td>
                                          <td id="satuan<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']).""; ?></td>
                                          <td id="qty<?php echo $r['id_order'];?>"><?php echo "$r[qty]"; ?></td>
                                          <td id="id_suplier<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']*$r['qty']).""; ?></td>
                                          <td id="price<?php echo $r['id_order'];?>"><?php echo "".tanggal_indo($r['dt']).""; ?></td>

                                          <td>

                                             <a href="javascript:void(0)" id="edit_button<?php echo $r['id_order'];?>"  onclick="edit_item('<?php echo $r['id_order'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                             <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_order'];?>" value="save" onclick="save_row('<?php echo $r['id_order'];?>');" style="display:none;">


                                          </td>
                                      </tr>
                                      <?php
                                        $subtotal=$subtotal+$r['price']*$r['qty'];
                                        }
                                        ?>
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                          <td  align="right"><b>subtotal balanja</b>  </td>
                                          <td  align="right"> <b><?php echo "".number_format($subtotal).""; ?></b> </td>
                                          <td></td>
                                          <td></td>

                                        </tr>

                                  </tbody>

                              </table>

                        </div>

                      </div>
                      <?php if (!empty($from)) {
                        // code...
                      ?>
                      <?php
                        $Yposting=transaksi($con,'pembelian',$from,$until,'Y');
                        $Nposting=transaksi($con,'pembelian',$from,$until,'N');
                       ?>

                          <!--posting akuntansi  -->
                          <!--  -->
                          <div class="card-group">
                                             <div class="card">
                                                 <div class="card-body">
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                             <div class="d-flex no-block align-items-center">
                                                                 <div>
                                                                     <h3><i class="ti-agenda"></i></h3>

                                                                 </div>
                                                                 <div class="ml-auto">
                                                                     <h4 class="counter text-danger">IDR <?php echo "".number_format($Yposting).""; ?></h4>
                                                                     <p class="text-muted">Sudah terposting </p>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-12">
                                                             <div class="progress">
                                                                 <div class="progress-bar bg-danger" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                               </div>
                                               <div class="card">
                                                   <div class="card-body">
                                                       <div class="row">
                                                           <div class="col-md-12">
                                                               <div class="d-flex no-block align-items-center">
                                                                   <div>
                                                                       <h3><i class="ti-clipboard"></i></h3>

                                                                   </div>
                                                                   <div class="ml-auto">
                                                                       <h4 class="counter text-success">IDR <?php echo "".number_format($Nposting).""; ?></h4>
                                                                       <p><?php echo "$Nposting"; ?></p>
                                                                       <p class="text-muted">Belum terposting </p>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                           <div class="col-12">
                                                               <div class="progress">
                                                                   <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                               </div>
                                                               <br>
                                                               <p class="text-right">
                                                               <form class=""  action="control/posting.php?act=pembelian" method="post">
                                                                 <input type="hidden" name="dana" value="<?php echo "$Nposting"; ?>">
                                                                 <input type="hidden" name="from" value="<?php echo "$from"; ?>">
                                                                 <input type="hidden" name="until" value="<?php echo "$until"; ?>">
                                                                 <button type="submit" class="btn btn-outline-success text-right"  name="button"> <i class="ti-save"></i> posting</button>
                                                               </form>
                                                               <small>seteh diposting data akan masuk ke <a href="./khas.aspx">khas & bank</a> 'BIAYA DAN BAHAN BAKU'</small> </p>

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
