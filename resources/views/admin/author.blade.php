<x-layouts>
    <x-main-content>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Penulis</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>
                                <a class="btn" href="#" data-toggle="modal" data-target="#editStatus">Edit</a> |
                                <button id="Tiger Nixo" class="btn" onclick="confirmDelete(this)">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengguna - </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/list-author" method="post">
                <div class="modal-body">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Status Pengguna</label>
                      </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
            </div>
        </div>
    </div>
  
      

    </x-main-content>

    <script>
        function confirmDelete(input) {
            const id = input.id;
            if(confirm(`Apakah kamu akan menghapus artikel dengan id ${id} ?`)){
                window.location.href = `/admin/delete-article?id=${id}`;
            }
        }
    </script>

</x-layouts>