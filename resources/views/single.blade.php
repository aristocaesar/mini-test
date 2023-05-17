<x-layouts>
    <div class="container">
        
        <x-header/>

        <article>
        <h1 class="display-3 font-weight-bold">{{$title}}</h1>
        <p class="">{{$author}} - {{$date}}</p>
        <p>{{$body}}</p>
        </article>

        <x-comment/>

        <footer class="py-5 text-center">
        <p>{{date('Y')}} &copy; KopetNews - Terpercaya Dalam Bidangnya | Portal No 1 DiIndonesia</p>
        </footer>
    </div>
</x-layouts>