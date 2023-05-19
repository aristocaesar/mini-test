<x-layouts>
    <div class="container">
        
        <x-header/>

        <article>
        <h1 class="display-3 font-weight-bold">{{$article->judul_artikel}}</h1>
        <p>{{$article->penulis->username}} - {{$article->tanggal}}</p>
        <p>{{$article->isi_artikel}}</p>
        </article>

        <div class="row flex justify-content-center my-5">
            <div class="col-8">
                <div>
                    <p class="font-weight-bold">Komentar</p>
                    <ul class="list-group">
                        @foreach ($comments as $comment)
                        <li class="list-group-item">
                            <div class="d-flex flex-colum">
                                <h6 class="font-weight-bold">{{$comment->comments->nama}}</h6>
                                <small class="font-italic pl-1"> - ({{$comment->comments->email}})</small>
                            </div>
                            <p>{{$comment->comments->isi_komentar}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
        
                <hr class="my-5">
        
                <form action="/comment/{{$id}}" method="POST">
                    @csrf
                    <p class="font-weight-bold">Kirim Komentar</p>
                    <div class="row">
                        <div class="col-12 form-group">
                            <label for="inputNama">Nama</label>
                            <input type="text" class="form-control" id="inputNama" name="nama">
                        </div>
                        <div class="col-12 form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email">
                        </div>
                        <div class="col-12 form-group">
                            <label for="inputComment">Isi Komentar</label>
                            <textarea class="form-control" name="isi_komentar" id="inputComment" cols="5" rows="4"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Kirim</button>
                </form>
            </div>
        </div>

        <footer class="py-5 text-center">
        <p>{{date('Y')}} &copy; KopetNews - Terpercaya Dalam Bidangnya | Portal No 1 DiIndonesia</p>
        </footer>
    </div>
</x-layouts>