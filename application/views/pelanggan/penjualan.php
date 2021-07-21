      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <div class="row">

                <div class="col-6">
                  <h3 class="mb-0">Daftar penjualan</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data penjualan.
                  </p>
                </div>

                <div class="col-6 text-right">
                  <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPemesanan">
                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                    <span class="btn-inner--text">Tambah</span>
                  </button>
                </div>
              </div>
            </div>
            <div class="py-4 table-responsive">
              <table class="table table-flush" id="table-penjualan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th width="10%">Nama Kurir</th>
                    <th>Jumlah</th>
                    <th>Total Bayar</th>
                    <th>Waktu Pesanan</th>
                    <th>Waktu Kiriman</th>
                    <th>Waktu Selesai</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody id="table-data-penjualan">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addPemesanan" tabindex="-1" role="dialog" aria-labelledby="modal-addPemesanan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Pesanan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addPemesanan" method="POST">

                    <div class="form-group">
                      <label class="h5">QTY</label>
                      <input type="number" name="jumlah" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label class="h5">Harga</label>
                      <input type="text" name="harga" class="form-control" required readonly="">
                    </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addPemesanan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-konfirmasi" tabindex="-1" role="dialog" aria-labelledby="modal-konfirmasi" aria-modal="true">
        <div class="modal-dialog modal-success modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-success">
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Apakah anda yakin ingin mengkonfirmasi pengiriman</h4>
                <form class="form" id="form-konfirmasi" method="POST">
                  <input type="hidden" name="id_penjualan">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-kirim-barang" form="form-konfirmasi">Ok, Kirim</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>