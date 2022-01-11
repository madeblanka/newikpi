<?php $this->load->view('front/_partials/head') ?>

<body>
    <?php $this->load->view('front/_partials/navbar') ?>
    <?php $this->load->view('front/_partials/cover') ?>

    <section id="team" class="team section-bg">
        <div class="container aos-init aos-animate" data-aos="fade-up">

            <div class="section-title">
                <h3>ANGGOTA <span>IKPI BALI</span></h3>
            </div>

            <div class="row">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NRA</th>
                            <th>Nama Anggota</th>
                            <th>SK</th>
                            <th>KIP</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anggota as $a) : ?>
                            <tr>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->nra ?></a></td>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->nama ?></a></td>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->sk ?></a></td>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->kip ?></a></td>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->alamat ?></a></td>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->email ?></a></td>
                                <?php if($a->tampilkanhp==0):?>
                                <td>-</td>
                                <?php else:?>
                                <td><a href="<?= site_url('front/profileanggota/' . $a->nra) ?>" style="color: black;"><?= $a->notelp ?></a></td>
                                <?php endif?>
                            </tr>
                        <?php endforeach ?>
                </table>

            </div>

        </div>
    </section>
    <?php $this->load->view('front/_partials/footer') ?>