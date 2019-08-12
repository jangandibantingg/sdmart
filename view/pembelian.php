
 <?php
   $Yposting=transaksi($con,'pembelian',$date,$date,'Y');
   $Nposting=transaksi($con,'pembelian',$date,$date,'N');
  ?>

     <!--posting akuntansi  -->
     <!--  -->
     <script src="ajax/modify.pembelian.js"></script>

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
                                                <p class="text-muted">Total Belanja </p>
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
                                                  <p class="text-muted">Tanggungan Belanja </p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="progress">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                          <br>


                                      </div>
                                      <!--  -->
                                      <!--  -->

                                      <!--  -->
                                      <!--  -->



                                  </div>
                              </div>
                            </div>
                        </div>


<div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><i class="ti-clipboard"></i> Transaksi Pembelian</h4>
                                <!-- <h6 class="card-subtitle">Use default tab with class <code>vtabs & tabs-vertical</code></h6> -->
                                <!-- Nav tabs -->
                                <div class="vtabs">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">

                                      <?php
                                            $d=mysqli_query($con, "select * from suplier where status='active' order by id_suplier ");
                                            while ($tab=mysqli_fetch_array($d)){
                                              echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#$tab[id_suplier]' role='tab'><span class='hidden-sm-up'><i class=' ti-truck'></i></span> <span class='hidden-xs-down'>$tab[nama_suplier]</span> </a> </li>";
                                            }
                                       ?>



                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                          <?php
                                            $e=mysqli_query($con, "select * from suplier where status='active' order by id_suplier  ");
                                            while ($f=mysqli_fetch_array($e)){
                                              echo "

                                              <div class='tab-pane p-20' id='$f[id_suplier]' role='tabpanel'>
                                                ";
                                                echo "  <table class='table table-responsive' >
                                                      <thead>
                                                      <tr>
                                                        <th>item</th>
                                                        <th>price</th>


                                                        <th>action</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>";
                                                $d=mysqli_query($con, "select * from item where id_suplier='$f[id_suplier]' order by nama_item asc");
                                                while ($s=mysqli_fetch_array($d)) {
                                                  echo "

                                                      <tr>
                                                        <td>$s[nama_item]</td>
                                                        <td style='text-align:left;'>".number_format($s['price'])."</td>



                                                      ";
                                                        ?>


                                                          <input type="hidden" name="quantity" id="quantity<?php echo $s["kode_item"]; ?>" class="form-control" value="1" />
                                                          <input type="hidden" name="hidden_name" id="name<?php echo $s["kode_item"]; ?>" value="<?php echo $s["nama_item"]; ?>" />
                                                          <input type="hidden" name="hidden_price" id="price<?php echo $s["kode_item"]; ?>" value="<?php echo $s["price"]; ?>" />

                                                          <!-- <button type="button" name="add_to_cart" id="<?php echo $s["kode_item"]; ?>"> <i class="mdi mdi-cart-outline"></i> </button> -->

                                                        <td>
                                                          <input type="button" name="add_to_cart" id="<?php echo $s["kode_item"]; ?>" class="text-white btn btn-info  form-control add_to_cart" value="+" />
                                                        </td>
                                                        <!-- <form id='loginform' action="transaksi.html" method="post" class='form-material m-t-40'>
                                                        <td><input type='text' class='form-control form-control-line' name='qty' value='1' size='1' /></td>
                                                          <td>

                                                        </td>

                                                        </form> -->
                                                        </tr>

                                                        <?php
                                                }


                                                  echo "
                                                  </tbody>
                                              </table >
                                              </div>





                                              ";

                                            }
                                            ?>



                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <!--  end dif -->
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title"><i class="ti-shopping-cart"></i> Keranjang Belanja <small>
                                    <a data-toggle="tab" href="#cart">Cart <span class="badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span></a></li></small>
                                  </h4>





                                  <div class="table-responsive" id="order_table">
                                       <table class="table table-bordered">
                                            <tr>
                                                 <th width="40%">Product Name</th>
                                                 <th width="10%">Quantity</th>
                                                 <th width="20%">Price</th>
                                                 <th width="15%">Total</th>
                                                 <th width="5%">Action</th>
                                            </tr>
                                            <?php
                                            if(!empty($_SESSION["shopping_cart"]))
                                            {
                                                 $total = 0;
                                                 foreach($_SESSION["shopping_cart"] as $keys => $values)
                                                 {
                                            ?>
                                            <tr>
                                                 <td><?php echo $values["product_name"]; ?></td>
                                                 <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>
                                                 <td align="right">IDR <?php echo $values["product_price"]; ?></td>
                                                 <td align="right">IDR <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
                                                 <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>"> <i class="fa fa-trash"></i> </button></td>
                                            </tr>
                                            <?php
                                                      $total = $total + ($values["product_quantity"] * $values["product_price"]);
                                                 }
                                            ?>
                                            <tr>
                                                 <td colspan="3" align="right">Total</td>
                                                 <td align="right">IDR <?php echo number_format($total, 2); ?></td>
                                                 <td></td>
                                            </tr>
                                            <tr>
                                                 <td colspan="5" align="center">
                                                      <form method="post" action="control/simpan-belanja.php?act=pembelian">
                                                           <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                                                      </form>
                                                 </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                       </table>
                                  </div>


                                  </div>
                                </div>

                              </div>




                              <!--  -->
                              <!--  -->
                              <div class="col-md-12">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title"><i class="ti-clipboard"></i> Transaksi Pembelian</h4>

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

                                          $p=mysqli_query($con, "select orders.clear, orders.id_order, item.nama_item, item.price, orders.qty, orders.kode_item, item.kode_item, orders.dt from orders,item where item.kode_item=orders.kode_item and clear='N' order by orders.id_order desc");

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
                                              <td> <button class='btn btn-outline-info' id='printbelanja'><i id='printbelanja' class='ti-printer'></i> Cetak</button> </td>
                                              <td></td>

                                            </tr>

                                      </tbody>

                                  </table>

                            </div>

                          </div>
                          </div>

                          <script>
                            $("#printbelanja").click(function(){
                                $("#printbelanja").remove();
                                loadOtherPage1();
                            });

                            function loadOtherPage1() {
                                $("<iframe id='printabel'>")
                                    .hide()
                                    .attr("src", "control/print-belanja.php")
                                    .appendTo("body");
                                }

                              </script>




                              <!--  -->
                              <!--  -->
                              <!--  -->


                    </div>


                    <script>
                    $(document).ready(function(data){
                         $('.add_to_cart').click(function(){
                              var product_id = $(this).attr("id");
                              var product_name = $('#name'+product_id).val();
                              var product_price = $('#price'+product_id).val();
                              var product_quantity = $('#quantity'+product_id).val();
                              var action = "add";
                              if(product_quantity > 0)
                              {
                                   $.ajax({
                                        url:"transaksi.html",
                                        method:"POST",
                                        dataType:"json",
                                        data:{
                                             product_id:product_id,
                                             product_name:product_name,
                                             product_price:product_price,
                                             product_quantity:product_quantity,
                                             action:action
                                        },
                                        success:function(data)
                                        {
                                             $('#order_table').html(data.order_table);
                                             $('.badge').text(data.cart_item);

                                        }
                                   });
                              }
                              else
                              {

                                   $.notify("masukan jumlah quantity", "error");
                              }
                         });
                         $(document).on('click', '.delete', function(){
                              var product_id = $(this).attr("id");
                              var action = "remove";
                              if(confirm("Are you sure you want to remove this product?"))
                              {
                                   $.ajax({
                                        url:"transaksi.html",
                                        method:"POST",
                                        dataType:"json",
                                        data:{product_id:product_id, action:action},
                                        success:function(data){
                                             $('#order_table').html(data.order_table);
                                             $('.badge').text(data.cart_item);
                                        }
                                   });
                              }
                              else
                              {
                                   return false;
                              }
                         });
                         $(document).on('keyup', '.quantity', function(){
                              var product_id = $(this).data("product_id");
                              var quantity = $(this).val();
                              var action = "quantity_change";
                              if(quantity != '')
                              {
                                   $.ajax({
                                        url :"transaksi.html",
                                        method:"POST",
                                        dataType:"json",
                                        data:{product_id:product_id, quantity:quantity, action:action},
                                        success:function(data){
                                             $('#order_table').html(data.order_table);
                                        }
                                   });
                              }
                         });
                    });
                    </script>
