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
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)                            
                            <tr>
                                <td>{{$author->username}}</td>
                                <td>
                                    @if ($author->status == 1)
                                        <button id="{{$author->id}}" class="btn" onclick="confirmBlock(this)">Blokir</button>
                                    @else
                                        <button id="{{$author->id}}" class="btn" onclick="confirmOpenBlock(this)">Buka Blokir</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    </x-main-content>

    <script>
        function confirmBlock(input) {
            const id = input.id;
            if(confirm(`Apakah kamu akan memblokir penulis dengan id ${id} ?`)){
                window.location.href = `/admin/block-author?id=${id}`;
            }
        }

        function confirmOpenBlock(input) {
            const id = input.id;
            if(confirm(`Apakah kamu akan membuka memblokir penulis dengan id ${id} ?`)){
                window.location.href = `/admin/open-author?id=${id}`;
            }
        }
    </script>

</x-layouts>