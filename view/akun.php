<!-- <script src="ajax/modify.record.js"></script> -->
<script src="ajax/modify.akun.js"></script>


<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User list </h4>
                                <button data-toggle="modal" data-target="#add-contact"  class="btn btn-outline-info"><i class="icon-user-follow"></i> Add </button>
                                <button data-toggle="modal" data-target="#edit-role"  class="btn btn-outline-info"><i class="ti-harddrive"></i> Edit Role </button>
                                <h6 class="card-subtitle"></h6>
                              <div class="table-responsive m-t-40">
                                     <table id="myTable" class="table table-striped">
                                        <thead>
                                            <tr>
                                              <th>Role</th>
                                              <th>ID</th>
                                              <th>Nama</th>
                                              <th>email</th>
                                              <th>alamat</th>
                                              <th>No HP</th>
                                              <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          $p=mysqli_query($con, "select * from user order by id_user asc");
                                          while ($r=mysqli_fetch_array($p)) {
                                         if ($r['level'] == 'admin') {
                                           $level = "<i class='ti-harddrive text-danger'> admin</i>  ";
                                         }elseif($r['level'] == 'invest' || $r['level'] == 'akun') {
                                           $level = "<i class='icon-layers text-info'> seller</i> ";
                                         }else {
                                           $level = "<i class='ti-user text-success'> ID</i> ";
                                         }

                                          ?>


                                            <tr id="row<?php echo $r['id_user'];?>">
                                                <td id="level<?php echo $r['id_user'];?>"><?php echo "$level"; ?>  </td>
                                                <td id="id<?php echo $r['id_user'];?>"><?php echo "$r[id]"; ?>  </td>
                                                <td id="nama<?php echo $r['id_user'];?>"> <?php echo "$r[nama]"; ?></td>
                                                <td id="email<?php echo $r['id_user'];?>"><?php echo "$r[email]"; ?></td>
                                                <td id="alamat<?php echo $r['id_user'];?>"><?php echo "$r[alamat]"; ?></td>
                                                <td id="no_hp<?php echo $r['id_user'];?>"><?php echo "$r[no_hp]"; ?></td>


                                                <td>
                                                   <a href="javascript:void(0)" id="edit_button<?php echo $r['id_user'];?>"  onclick="edit_row('<?php echo $r['id_user'];?>');"> <i class="icon-pencil text-info"></i>  </a>
                                                    <input type='button' class="btn btn-success" id="save_button<?php echo $r['id_user'];?>" value="save" onclick="save_row('<?php echo $r['id_user'];?>');" style="display:none;">
                                                    <a href="javascript:void(0)" id="delete_button<?php echo $r['id_user'];?>" onclick="delete_row('<?php echo $r['id_user'];?>');"><i class="icon-trash"></i></a>

                                                </td>
                                            </tr>
                                            <?php
                                              }
                                              ?>
                                        </tbody>
                                        <tfoot>
                                            <tr id="row<?php echo $r['id_kategori_khas'];?>">


                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->

                        <!-- Column -->

                        <!-- Column -->

                        <!-- Column -->

                    </div>
                </div>
                <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">


                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title" id="myModalLabel">Add User</h4> </div>
                            <div class="modal-body">
                                <form id="loginform" action="akun.html" method="post">
                                    <div class="form-group">
                                        <div class="col-md-12 m-b-20">
                                          <input type="text"  name="nama" class="form-control" placeholder="nama" />
                                            <input type="hidden"  name="sponsoring" value="<?php echo "$member[id]"; ?>" class="form-control" placeholder="nama" /></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="email" class="form-control" placeholder="email"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="no_hp" class="form-control" placeholder="no hp"></div>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" name="alamat" class="form-control" placeholder="alamat"></div>
                                        <div class="col-md-12 m-b-20">
                                          <select class="form-control" name="level">
                                            <option value=""> pilih level </option>
                                            <option value="akun"> <i class="ti-user"></i> akun</option>
                                            <option value="invest"> <i class="ti-user"></i> invest</option>
                                            <option value="admin"> <i class="ti-user"></i> admin</option>
                                          </select>

                                            </div>



                                    </div>
                                    <div id="info">

                                    </div>
                            </div>
                            <div class="modal-footer">


                              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                              <button id="submit"  class="btn btn-outline-info"><i class="ti-save-alt"></i> Proses</button>
                            </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
