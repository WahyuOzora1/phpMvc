<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>
            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start"><?php echo $mhs['nama']; ?>
                        <a href="<?=BASE_URL;?>mahasiswa/detail/<?= $mhs['id']?>" class="badge bg-primary "> Detail</a>
                    </li>
            </ul>
        <?php endforeach; ?>
        </div>
    </div>

</div>