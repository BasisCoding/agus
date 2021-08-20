    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-gradient-danger border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">DATA PENJUALAN</h5>
                  <span class="h2 font-weight-bold mb-0 text-white" id="total-penjualan"></span>
                </div>
              </div>
              <p class="mt-3 mb-0 text-sm">
                <a href="<?= base_url($this->session->userdata('link').'/listPenjualanPelanggan') ?>" class="text-nowrap text-white font-weight-600">Lihat Data</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      