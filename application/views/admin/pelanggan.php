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
                  <h3 class="mb-0">Daftar Pelanggan</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data pelanggan.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addPelanggan">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-pelanggan">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-pelanggan">

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addPelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-addPelanggan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah pelanggan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addPelanggan" method="POST">

                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                      </div>  

                      <div class="form-group">
                        <label>HP</label>
                        <input type="number" name="hp" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required=""></textarea>
                      </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addPelanggan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updatePelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-addPelanggan" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-sm" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update pelanggan</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updatePelanggan" method="POST">

                      <input type="hidden" name="id_update">
                      <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap_update" class="form-control" required>
                      </div>  

                      <div class="form-group">
                        <label>HP</label>
                        <input type="number" name="hp_update" class="form-control" required>
                      </div>

                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat_update" required=""></textarea>
                      </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updatePelanggan" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deletePelanggan" tabindex="-1" role="dialog" aria-labelledby="modal-deletePelanggan" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus pelanggan <span id="pelanggan-delete"></span></h4>
                <form class="form" id="form-deletePelanggan" method="POST">
                  <input type="hidden" name="id_pelanggan_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-pelanggan" form="form-deletePelanggan">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>