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
              </div>
            </div>
            <div class="py-4">
              <div class="block p-3">
                <form class="form" id="form-addPenjualan">
                  <div class="row">

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <select class="form-control" name="id_pelanggan" data-toggle="select">
                          <option value="">Bukan Pelanggan</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" name="jumlah" required="">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Total Bayar</label>
                        <input type="number" id="harga" class="form-control" disabled="">
                      </div>
                    </div>

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
              <table class="table table-flush" id="table-penjualan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Jumlah</th>
                    <th>Total Bayar</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-penjualan">
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade show" id="modal-deletePenjualan" tabindex="-1" role="dialog" aria-labelledby="modal-deletePenjualan" aria-modal="true">
        <div class="modal-dialog modal-danger modal-dialog-top modal-sm" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Warning !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus penjualan <span id="penjualan-delete"></span></h4>
                <form class="form" id="form-deletePenjualan" method="POST">
                  <input type="hidden" name="id_penjualan">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-penjualan" form="form-deletePenjualan">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>