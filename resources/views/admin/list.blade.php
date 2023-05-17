<x-layouts>
    <x-main-content>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>
                                <a class="btn" href="/admin/edit-article?id=1">Edit</a> |
                                <button id="Tiger Nixo" class="btn" onclick="confirmDelete(this)">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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