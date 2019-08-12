<!-- <script src="ajax/modify.record.js"></script> -->
<script src="ajax/modify.akun.js"></script>


<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sponsoring</h4>
                                <button data-toggle="modal" data-target="#add-contact"  class="btn btn-outline-info"><i class="ti-plus"></i> <i class="ti-link"></i> sponsoring </button>
                                <h6 class="card-subtitle"></h6>
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
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
                                          $p=mysqli_query($con, "select * from user where sponsoring='$member[id]' order by id_user asc");

                                          while ($r=mysqli_fetch_array($p)) {


                                           ?>
                                            <tr id="row<?php echo $r['id_user'];?>">
                                                <td id="level<?php echo $r['id_user'];?>"><?php echo "$r[level]"; ?>  </td>
                                                <td id="id<?php echo $r['id_user'];?>"><?php echo "$r[id]"; ?>  </td>
                                                <td id="nama<?php echo $r['id_user'];?>"> <?php echo "$r[nama]"; ?></td>
                                                <td id="email<?php echo $r['id_user'];?>"><?php echo "$r[email]"; ?></td>
                                                <td id="alamat<?php echo $r['id_user'];?>"><?php echo "$r[alamat]"; ?></td>
                                                <td id="no_hp<?php echo $r['id_user'];?>"><?php echo "$r[no_hp]"; ?></td>


                                                <td>
                                                   <a href="javascript:void(0)" id="edit_button<?php echo $r['id_user'];?>"  onclick="edit_suplier('<?php echo $r['id_user'];?>');"> <i class="icon-pencil text-info"></i>  </a>
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
                                <h4 class="modal-title" id="myModalLabel">Add akun</h4> </div>
                            <div class="modal-body">
                                <form id="loginform" action="sponsoring.html" method="post">
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
