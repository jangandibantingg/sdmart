<p class="text-right"> <small> <b>laporan harian tanggal <?php echo "".tanggal_indo($date).""; ?>.</b> </small> </p>
<div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="ti-receipt"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"><?php echo "".number_format(transaksi($con, 'penjualan', $date, $date, 'Y')).""; ?></h3>

                                        <h5 class="text-muted m-b-0">Penjualan </h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-info"><i class="ti-shopping-cart"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0"><?php echo "".number_format(transaksi($con, 'pembelian', $date, $date, 'Y')).""; ?></h3>
                                        <h5 class="text-muted m-b-0">Pembelian </h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-danger"><i class="icon icon-layers"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">56%</h3>
                                        <h5 class="text-muted m-b-0">Laba</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row">
                                    <div class="round align-self-center round-success"><i class="icon icon-user-following"></i></div>
                                    <div class="m-l-10 align-self-center">
                                        <h3 class="m-b-0">56%</h3>
                                        <h5 class="text-muted m-b-0">customer baru</h5></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
