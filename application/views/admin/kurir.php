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
                  <h3 class="mb-0">Daftar Kurir</h3>
                  <p class="text-sm mb-0">
                    Tabel ini berisi informasi data Kurir.
                  </p>
                </div>

                <div class="col-6 text-right">
                    <button class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="modal" data-target="#modal-addKurir">
                      <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                      <span class="btn-inner--text">Tambah</span>
                    </button>
                </div>

              </div>
            </div>
            <div class="py-4">
              <table class="table table-flush" id="table-kurir">
                <thead class="thead-light">
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody id="table-data-kurir">

                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>

      <div class="modal fade" id="modal-addKurir" tabindex="-1" role="dialog" aria-labelledby="modal-addKurir" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Kurir</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-addKurir" method="POST">
                    <div class="row">

                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">Nama Lengkap</label>
                          <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">Username</label>
                          <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">Password</label>
                          <input type="password" name="password" class="form-control" required>
                        </div>  
                      </div>

                      <div class="col-md">
                        <div class="form-group">
                          <label class="h5">HP</label>
                          <input type="number" name="hp" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label class="h5">Logo</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" lang="en" name="foto">
                            <label class="custom-file-label h5" for="foto">Select Foto</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="h5">Alamat</label>
                          <textarea class="form-control" name="alamat" required=""></textarea>
                        </div>
                      </div>


                    </div>

                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-addKurir" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="modal-updateKurir" tabindex="-1" role="dialog" aria-labelledby="modal-addKurir" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-top modal-md" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Update Kurir</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                  <form class="form" id="form-updateKurir" method="POST">

                      <input type="hidden" name="id_update">
                      <div class="row">

                        <div class="col-md">
                          <div class="form-group">
                            <label class="h5">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap_update" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label class="h5">HP</label>
                            <input type="number" name="hp_update" class="form-control" required>
                          </div>

                        </div>

                        <div class="col-md">

                          <div class="form-group">
                            <label class="h5">Username</label>
                            <input type="text" name="username_update" class="form-control" required readonly="">
                          </div>

                          <div class="form-group">
                            <input type="hidden" name="foto_lama">
                            <label class="h5">Logo</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="foto_update" lang="en" name="foto_update">
                              <label class="custom-file-label h5" for="foto_update">Select Foto</label>
                            </div>
                          </div>

                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md">
                          
                          <div class="form-group">
                            <label class="h5">Alamat</label>
                            <textarea class="form-control" name="alamat_update" required=""></textarea>
                          </div>
                        </div>
                      </div>
                    
                  </form> 
                </div>

                <div class="modal-footer mt-0">
                  <button type="submit" form="form-updateKurir" class="btn btn-primary align-right">Save</button>
                </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade show" id="modal-deleteKurir" tabindex="-1" role="dialog" aria-labelledby="modal-deleteKurir" aria-modal="true">
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
                <h4 class="heading mt-4">Apakah anda yakin ingin menghapus Kurir <span id="Kurir-delete"></span></h4>
                <form class="form" id="form-deleteKurir" method="POST">
                  <input type="hidden" name="id_kurir_delete">
                  <input type="hidden" name="foto_delete">
                </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-white" id="btn-delete-Kurir" form="form-deleteKurir">Ok, Hapus</button>
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>