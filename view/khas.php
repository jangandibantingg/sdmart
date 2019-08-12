<div class="card-group">
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="d-flex no-block align-items-center">
                                       <div>
                                           <h3><i class="icon-screen-desktop"></i></h3>

                                       </div>
                                       <div class="ml-auto">
                                           <h4 class="counter text-success">IDR 4.000.000</h4>
                                           <p class="text-muted">PEMASUKAN</p>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-12">
                                   <div class="progress">
                                       <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- Column -->
                   <!-- Column -->
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="d-flex no-block align-items-center">
                                       <div>
                                           <h3><i class="icon-screen-desktop"></i></h3>

                                       </div>
                                       <div class="ml-auto">
                                           <h4 class="counter text-danger">IDR 4.000.000</h4>
                                           <p class="text-muted">PENGELUARAN</p>
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
                   <!-- Column -->
                   <!-- Column -->
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="d-flex no-block align-items-center">
                                       <div>
                                           <h3><i class="icon-social-dropbox"></i></h3>

                                       </div>
                                       <div class="ml-auto">
                                           <h4 class="counter text-info">IDR 4.000.000</h4>
                                           <p class="text-muted">SALDO KHAS</p>
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
                   <!-- Column -->
                   <!-- Column -->
                   <!-- Column -->
                   <div class="card">
                       <div class="card-body">
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="d-flex no-block align-items-center">
                                       <div>
                                           <h3><i class="icon-credit-card"></i></h3>

                                       </div>
                                       <div class="ml-auto">
                                           <h4 class="counter text-info">IDR 4.000.000</h4>
                                           <p class="text-muted">SALDO BANK</p>
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
               </div>
               <p class="text-right"> <small> <b>saldo berdasarkan tanggal <?php echo "".tanggal_indo($date).""; ?>.</b> </small> </p>

               <?php
                    if ($_POST['master']) {
                      mysqli_query($con,"insert into kategori_khas (nama_kategori_khas,date) values ('$_POST[master]','$date') ");
                      // echo "insert into kategori_khas (name_kategori_khas,date) values ('$_POST[master]','$date')";
                    }elseif ($_POST['submaster']) {
                      mysqli_query($con,"insert into subkategori_khas (nama_subkategori_khas,date,id_kategori_khas) values ('$_POST[submaster]','$date','$_POST[id_kategori_khas]') ");

                    }
                ?>
                <script src="ajax/modify.record.js"></script>
                <!-- <script src="ajax/suplier.record.js"></script> -->


                                 <div class="col-md-12">
                                   <div class="card">
                                       <div class="card-body">
                                         <div class="title">
                                             <h4 class="font-weight-bold text-center">ARUS KHAS <?php echo "$web[title]"; ?>
                                                <br> <small>Bulan <?php echo "".date('M Y').""; ?></small> </h4>

                                         </div>


                                         <table class="table-responsive table-striped">
                                           <thead>
                                             <tr>
                                               <th class="w-25"></th>
                                               <th class="w-25"></th>
                                               <th lass="w-20"></th>
                                               <th class="w-20 "> <p class="text-right">Debit</p> </th>
                                               <th class="w-20 "> <p class="text-right">Kredit</p> </th>
                                             </tr>
                                           </thead>
                                           <tbody>

                                             <?php
                                               $a=mysqli_query($con,"select * from kategori_khas order by id_kategori_khas asc");
                                               while ($r=mysqli_fetch_array($a)) {
                                              ?>
                                              <tr >
                                                <td ><p class="text-left font-weight-bold"> <?php echo "$r[nama_kategori_khas]"; ?></p></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                              </tr>

                                              <?php  $b=mysqli_query($con,"select * from subkategori_khas where id_kategori_khas='$r[id_kategori_khas]' order by nama_subkategori_khas asc");
                                                while ($c=mysqli_fetch_array($b)) {

                                               ?>
                                               <tr>
                                                 <td></td>
                                                 <td> <p class="text-left"> <b><?php echo "$c[nama_subkategori_khas]"; ?></b></p></td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                               </tr>

                                               <?php
                                              $d=mysqli_query($con,"select dt, day(dt) as day, keterangan, debit,kredit, id_subkategori_khas from arus_khas where  id_subkategori_khas='$c[id_subkategori_khas]' order by id_arus_khas asc");
                                                 while ($e=mysqli_fetch_array($d)) {
                                                ?>
                                                <tr>
                                                  <td></td>
                                                  <td></td>
                                                  <td><p class="text-right"> <small><?php echo "".tanggal_indo($e['dt']),""; ?></small></p></td>
                                                  <td class="text-right"> <small>IDR <?php echo "".number_format($e['debit']).""; ?></small> </td>
                                                  <td class="text-right"> <small>IDR <?php echo "".number_format($e['kredit']).""; ?></small> </td>

                                                </tr>


                                            <?php
                                            }
                                          }
                                        }
                                             ?>
                                           </tbody>
                                         </table>

                                       </diV>
                                     </div>
                                 </div>
