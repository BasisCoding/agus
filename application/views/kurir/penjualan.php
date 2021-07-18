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
              <table class="table table-flush" id="table-penjualan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Nama Kurir</th>
                    <th>Jumlah</th>
                    <th>Total Bayar</th>
                    <th>Waktu Pesanan</th>
                    <th>Waktu Kiriman</th>
                    <th>Waktu Selesai</th>
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