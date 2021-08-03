      <!-- Page content -->
  <div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">

          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <form id="form-filter">
                <div class="row">
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Pilih Filter</label>
                        <select class="form-control form-control-sm" id="jenis">
                          <option value="">Pilih Jenis Waktu</option>
                          <option value="tanggal_dibuat">Waktu Pesanan</option>
                          <option value="tanggal_dikirim">Waktu Dikirim</option>
                          <option value="tanggal_diterima">Waktu Selesai</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">Start Date</label>
                        <input type="date" id="start_date" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                        <label class="h5">End Date</label>
                        <input type="date" id="end_date" class="form-control form-control-sm">
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md text-right">
                    <button type="button" class="btn btn-sm btn-warning" id="btnFilter">Filter</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="py-4">
              <table class="table table-flush table-responsive" id="table-penjualan">
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
