<x-layouts>
    <x-main-content>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Artikel</h6>
            </div>
            <div class="card-body">
                <form action="/author/edit-article" method="post">
                    <input type="text" class="d-none" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan judul">
                    </div>

                    <div class="form-group">
                        <label for="body">Artikel</label>
                        <textarea name="body" class="form-control" id="body" cols="30" rows=5" placeholder="Masukkan sebuah artikel"></textarea>
                    </div>

                    <div class="form-group d-flex justify-content-end">
                        <button class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </x-main-content>
</x-layouts>