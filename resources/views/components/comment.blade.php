<div class="row flex justify-content-center my-5">
    <div class="col-8">
        <div>
            <p class="font-weight-bold">Komentar</p>
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="d-flex flex-colum">
                        <h6 class="font-weight-bold">Aristo Caesar Pratama </h6>
                        <small class="font-italic pl-1"> - (aristo.belakang@gmail.com)</small>
                    </div>
                    <small class="text-muted">15 - Mei - 2023</small>
                    <p>Consequat est cupidatat ad quis aute cillum. Commodo ullamco ea mollit id sint aliqua. Labore sit adipisicing anim ad qui.</p>
                </li>
            </ul>
        </div>

        <hr class="my-5">

        <form action="/comment" method="POST">
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
                    <label for="inputComment">Email</label>
                    <textarea class="form-control" name="comment" id="inputComment" cols="5" rows="4"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Kirim</button>
        </form>
    </div>
</div>