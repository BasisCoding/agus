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