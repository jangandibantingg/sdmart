<script src="ajax/item.record.js"></script>

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

                                  <td><input type="submit" name="save" class="btn btn-info" value="Cari"></td>
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

                                      <th>ID</th>
                                      <th>Name</th>
                                      <th width="15%">harga beli</th>
                                      <th width="15%">harga jual</th>
                                      <th>QTY</th>
                                      <th>SUB</th>
                                      <th width="15%">Laba</th>

                                      <th>date</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $from=$_POST['from'];
                                  $until=$_POST['until'];

                                  $p=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and orders.dt >= '$from' and orders.dt <= '$until' order by orders.id_order desc");

                                while ($r=mysqli_fetch_array($p)) {
                                  $subtotal=$subtotal+$r['sell']*$r['qty'];
                                  $subtotalprice=$subtotalprice+$r['price']*$r['qty'];
                                  $laba=$r['sell']*$r['qty']-$r['price']*$r['qty'];

                                  $sublaba=$sublaba+$laba;
                                  $totallaba=$totallaba+$sublaba;


                                 ?>
                                  <tr id="row<?php echo $r['id_order'];?>">

                                      <td id="id<?php echo $r['id_order'];?>"> <?php echo "$r[id]"; ?></td>
                                      <td id="nama_item<?php echo $r['id_order'];?>"> <?php echo "$r[name]"; ?></td>
                                      <td id="satuan<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']).""; ?></td>
                                      <td id="satuan<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['sell']).""; ?></td>
                                      <td id="qty<?php echo $r['id_order'];?>"><?php echo "$r[qty]"; ?></td>
                                      <td id="id_suplier<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($r['price']*$r['qty']).""; ?></td>
                                      <td id="satuan<?php echo $r['id_order'];?>" align="right"><?php echo "".number_format($laba).""; ?></td>

                                      <td id="price<?php echo $r['id_order'];?>"><?php echo "".$r['date'].""; ?></td>

                                      <td>
                                         <a href="javascript:void(0)" id="edit_button<?php echo $r['id_order'];?>"  onclick="edit_item('<?php echo $r['id_order'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                          <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_order'];?>" value="save" onclick="save_row('<?php echo $r['id_order'];?>');" style="display:none;">
                                          <!-- <a href="javascript:void(0)" id="delete_button<?php echo $r['id_order'];?>" onclick="delete_row('<?php echo $r['id_order'];?>');"><i class="icon-trash"></i></a> -->

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
                                                                         <h4 class="counter text-danger">IDR <?php echo "".number_format($subtotal).""; ?></h4>
                                                                         <p class="text-muted">Subtotal Penjualan </p>
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
                                                                           <h4 class="counter text-success">IDR <?php echo "".number_format($totallaba).""; ?></h4>

                                                                           <p class="text-muted">Laba / keuntungan</p>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="col-12">
                                                                   <div class="progress">
                                                                       <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                                   </div>
                                                                   <br>
                                                                   <?php
                                                                    $bagilaba=$totallaba/2;
                                                                    $bs=$bagilaba*0.4; //bonus sponsor
                                                                    $bp=$bagilaba*0.6; //bonus program
                                                                    $dp=$bp%10000; // dana program
                                                                       if ($bp < 10000) { // pindah program
                                                                        $pp=0;
                                                                       }else {
                                                                        $pp=''.floor($bp/10000).'';
                                                                       }

                                                                    $di=$bagilaba*0.51; //dana investasi utama
                                                                    $pi=$di / 6 ;  // pembagian investasi utama

                                                                    $die=$bagilaba*0.49; // dana investasi eksternal
                                                                    $pie=$die/17;



                                                                    ?>
                                                                    <p class="text-right"> bonus sponsor <b><?php echo "$bs"; ?></b>  </p>
                                                                    <p class="text-right"> bonus program 1 <b><?php echo "$bp"; ?></b>  </p>
                                                                    <p class="text-right"> Dana  program 1 <b><?php echo "$dp"; ?></b>  </p>
                                                                    <p class="text-right"> ID lolos program 1 <b><?php echo "$pp"; ?></b>  </p>

                                                                    <hr>
                                                                    <p class="text-right"> dana investasi utama <b><?php echo "$di"; ?></b>  </p>
                                                                    <p class="text-right"> pembagian investasi utama <b>@<?php echo "$pi"; ?></b>  </p>
                                                                    <p class="text-right"> dana investasi external <b><?php echo "$die"; ?></b>  </p>
                                                                    <p class="text-right"> pembagian investasi external <b>@<?php echo "$pie"; ?></b>  </p>


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
