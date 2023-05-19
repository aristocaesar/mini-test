<x-layouts>
    <div class="container">

        <x-header/>

          <div class="row p-3 my-5">
            <p class="font-weight-bold">Berita Terbaru</p>
            @foreach ($articles as $item)
            <div class="col-12 my-2">
                <div class="row border rounded shadow-sm">
                  <div class="col p-4 d-flex flex-column">
                    <h3 class="mb-0 font-weight-bold">{{ $item->judul_artikel; }}</h3>
                    <small class="mb-1 text-muted">{{ $item->tanggal; }}</small>
                    <p class="card-text mb-auto">{{ substr($item->isi_artikel, 0, 200) }}...</p>
                    <a href="/news/{{ $item->id; }}" class="stretched-link">Lanjutkan Membaca</a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <footer class="py-5 text-center">
            <p>{{date('Y')}} &copy; KopetNews - Terpercaya Dalam Bidangnya | Portal No 1 DiIndonesia</p>
          </footer>
    </div>
</x-layouts>