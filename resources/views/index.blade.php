<x-layouts>
    <div class="container">

        <x-header/>

          <div class="row p-3 my-5">
            <p class="font-weight-bold">Berita Terbaru</p>
            <div class="col-12">
                <div class="row border rounded shadow-sm">
                  <div class="col p-4 d-flex flex-column">
                    <h3 class="mb-0 font-weight-bold">Featured post</h3>
                    <small class="mb-1 text-muted">Nov 12</small>
                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                    <a href="/news/test" class="stretched-link">Continue reading</a>
                  </div>
                </div>
              </div>
          </div>

          <footer class="py-5 text-center">
            <p>{{date('Y')}} &copy; KopetNews - Terpercaya Dalam Bidangnya | Portal No 1 DiIndonesia</p>
          </footer>
    </div>
</x-layouts>