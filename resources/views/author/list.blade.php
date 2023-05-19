<x-layouts>
    <x-main-content>
    <!-- DataTales Example -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                        <tr>
                            <td>{{$article['judul_artikel']}}</td>
                            <td>
                                <a class="btn" href="/author/edit-article?id={{$article['id']}}">Edit</a> |
                                <button id="{{$article['id']}}" class="btn" onclick="confirmDelete(this)">Hapus</button>
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
        function confirmDelete(input) {
            const id = input.id;
            if(confirm(`Apakah kamu akan menghapus artikel dengan id ${id} ?`)){
                window.location.href = `/author/delete-article?id=${id}`;
            }
        }
    </script>

</x-layouts>