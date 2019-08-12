
 <?php
   $Yposting=transaksi($con,'penjualan',$date,$date,'Y');
   $Nposting=transaksi($con,'penjualan',$date,$date,'N');
  ?>

     <!--posting akuntansi  -->
     <!--  -->
     <script src="ajax/modify.pembelian.js"></script>

     <!-- <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex no-block align-items-center">
                                            <div>
                                                <h3><i class="ti-agenda"></i></h3>

                                            </div>
                                            <div class="ml-auto">
                                                <h4 class="counter text-info"> <?php echo "".number_format($Yposting).""; ?></h4>
                                                <p class="text-muted">Total pendapatan bulanan </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                                  <h4 class="counter text-success"> <?php echo "".number_format($Nposting).""; ?></h4>
                                                  <p class="text-muted">Pendapatan harian </p>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="progress">
                                              <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                          <br>


                                      </div>



                                  </div>
                              </div>
                            </div>
                        </div> -->


<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title"><i class="ti-clipboard"></i> Pricelist Menu <?php echo "$web[title]"; ?></h4>
              <!-- <h6 class="card-subtitle">Use default tab with class <code>vtabs & tabs-vertical</code></h6> -->
              <!-- Nav tabs -->

                  <ul class="nav nav-tabs customtab" role="tablist">

                    <?php
                          $d=mysqli_query($con, "select * from kategori_menu where username='$_SESSION[user_session]' and status='active' order by id_kategori_menu ");
                          while ($tab=mysqli_fetch_array($d)){
                            echo "<li class='nav-item'> <a class='nav-link' data-toggle='tab' href='#$tab[id_kategori_menu]' role='tab'><span class='hidden-sm-up'><i class='icon-cup'></i></span> <span class='hidden-xs-down'>$tab[nama_kategori_menu]</span> </a> </li>";
                          }
                     ?>



                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">

                        <?php
                          $e=mysqli_query($con, "select * from kategori_menu where status='active' order by id_kategori_menu  ");
                          while ($f=mysqli_fetch_array($e)){
                            echo "

                            <div class='tab-pane p-20' id='$f[id_kategori_menu]' role='tabpanel'>
                               <div class='row button-group'>
                              ";

                              $d=mysqli_query($con, "select * from menu where id_kategori_menu='$f[id_kategori_menu]' order by price asc");
                              while ($s=mysqli_fetch_array($d)) {
                                $idmenu="BRG000$s[id_menu]";
                                echo "




                                    ";
                                      ?>
                                        <div class="col-lg-4 col-md-12">
                                          <button  name="addcart" class="btn waves-effect waves-light btn-block btn-outline-info" id="<?php echo $idmenu; ?>">
                                             <small><b><?php echo "$s[name]"; ?></b></small> <br>
                                            <small><?php echo "".number_format($s['sell']).""; ?></small>
                                            <i class="ti-shopping-cart"></i>
                                          </button>
                                          </div>

                                        <input type="hidden" name="page" id="page<?php echo $idmenu; ?>" class="form-control" value="<?php echo "$page"; ?>" />
                                        <input type="hidden" name="quantity" id="quantity<?php echo $idmenu; ?>" class="form-control" value="1" />
                                        <input type="hidden" name="hidden_name" id="name<?php echo $idmenu; ?>" value="<?php echo $s["name"]; ?>" />
                                        <input type="hidden" name="hidden_id_menu" id="id_menu<?php echo $idmenu; ?>" value="<?php echo $s["id_menu"]; ?>" />
                                        <input type="hidden" name="hidden_price" id="price<?php echo $idmenu; ?>" value="<?php echo $s["sell"]; ?>" />



                                      <?php
                              }


                                echo "

                                </div>
                            </div>





                            ";

                          }
                          ?>



                  </div>

          </div>
      </div>
    </div>
                      <!--  end dif -->
                      <div class="col-md-6">
                          <div class="card">
                              <div class="card-body">
                                  <h4 class="card-title"><i class="ti-shopping-cart"></i> Keranjang Belanja <small>
                                  </li></small>
                                  </h4>





                                  <div class="table-responsive" id="order_table">
                                       <table class="table-responsive table-striped">
                                            <tr>
                                                 <th width="40%">Item</th>
                                                 <th width="10%">QTY</th>
                                                 <th width="20%">Price</th>
                                                 <th width="25%">Total</th>
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
                                                 <td align="right"> <?php echo $values["product_price"]; ?></td>
                                                 <td align="right"> <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
                                                 <td  align="right"><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>"> <i class="fa fa-trash"></i> </button></td>
                                            </tr>
                                            <?php
                                                      $total = $total + ($values["product_quantity"] * $values["product_price"]);
                                                 }
                                            ?>
                                            <tr align="left">
                                                 <td colspan="3" align="right">Total</td>
                                                 <td align="right"> <?php echo number_format($total, 2); ?></td>
                                                 <td></td>
                                            </tr>

                                            <tr>

                                                       <?php if(isset($_SESSION["shopping_cart"])){
                                                         ?>
                                                         <td colspan="5"  align="center">
                                                              <form method="post" action="control/simpan-belanja.php?act=<?php echo "$page"; ?>">
                                                                   <input type="submit" name="place_order" class="btn btn-outline-info" value="Place Order" />
                                                              </form>
                                                         </td>


                                                       <?php } ?>


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
                              <div class="col-md-6">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title"><i class="ti-printer"></i> Cashier</h4>
                                  <h4 align="right"> <b>Stardeltamart;</b> </h4>
                                  <p align="right">www.Stardeltamart.com</p>
                                  <form id="loginform" action="cashier.html" method="post">
                                  <table class="table table-responsive">

                                      <tbody>
                                        <?php


                                          $_SESSION['from-penjualan'] = $_POST['from'];
                                          $_SESSION['until-penjualan'] = $_POST['until'];

                                          $from= $_SESSION['from-penjualan'];
                                          $until= $_SESSION['until-penjualan'];

                                          $p=mysqli_query($con, "select orders.cashier, orders.clear, orders.transaksi, orders.id_order, menu.name, menu.price, menu.sell, orders.qty, orders.id_menu, menu.id_menu, orders.dt from orders,menu where menu.id_menu=orders.id_menu and clear='N' and transaksi='penjualan' and orders.cashier='N' order by orders.id_order desc");

                                           while ($r=mysqli_fetch_array($p)) {
                                         ?>
                                          <tr id="row<?php echo $r['id_order'];?>">

                                              <td width="40%">

                                                 <?php echo "$r[qty]"; ?>x <?php echo "".number_format($r['sell']).""; ?> (<?php echo "".number_format($r['sell']*$r['qty']).""; ?>)
                                               </td>
                                               <td> <?php echo "$r[name]"; ?></td>

                                          </tr>
                                          <?php
                                            $subtotal=$subtotal+$r['sell']*$r['qty'];
                                            }
                                            ?>
                                            <tr>

                                              <td><b>subtotal </b> </td>
                                              <td  align="right"><b><?php echo "".number_format($subtotal).""; ?></b> </td>


                                            </tr>
                                            <tr>
                                              <td><label for=""> ID </label></td>
                                                <td>
                                                  <select class="form-control" name="id">
                                                    <option value=""> pilih id </option>
                                                    <?php
                                                        $m=mysqli_query($con, "select * from user where sponsoring='$_SESSION[user_session]'");
                                                        while ($id=mysqli_fetch_array($m)) {
                                                     ?>
                                                     <option value="<?php echo "$id[id]"; ?>"><?php echo "$id[id] - $id[nama] "; ?></option>

                                                   <?php } ?>
                                                  </select>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td><small>CASH</small></td>
                                                <input type="hidden" name="total" value="<?php echo "$subtotal"; ?>" value="">
                                                <td  align="right" colspan="2">
                                                  <input type="text" name="cash" value="" class="form-control">

                                                  <!-- <input type="number" class="form-control" name="" value=""> -->

                                                  <button id="submit" name="button" class="btn btn-outline-info"> Submit</button></td>




                                            </tr>


                                      </tbody>

                                  </table>
                                </form>
                                <div class="" id="info">

                                </div>
                            </div>

                          </div>
                          </div>






                              <!--  -->
                              <!--  -->
                              <!--  -->


                    </div>


                    <script>
                    $(document).ready(function(data){
                          $("button").click(function(e) {
                              var product_id = $(this).attr("id");
                              var product_name = $('#name'+product_id).val();
                              var product_page = $('#page'+product_id).val();
                              var product_id_menu = $('#id_menu'+product_id).val();
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
                                             product_page:product_page,
                                             product_id_menu:product_id_menu,
                                             product_price:product_price,
                                             product_quantity:product_quantity,
                                             action:action
                                        },
                                        success:function(data)
                                        {
                                             $('#order_table').html(data.order_table);
                                             $('.badge').text(data.cart_item);
                                             $.notify("produk berhasil ditambahkan", "success");


                                        }
                                   });
                              }

                         });

                         $(document).on('click', '.delete', function(){
                              var product_id = $(this).attr("id");
                              var action = "remove";

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
