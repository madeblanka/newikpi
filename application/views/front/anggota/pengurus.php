<?php $this->load->view('front/_partials/head')?>
<body>
    <?php $this->load->view('front/_partials/navbar')?>
     <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h3>Pengurus <span> IKPI Bali</span></h3>
            <p><br></p>
        </div>
        <div class="row justify-content-md-center">
            <?php foreach($ketua as $k):?>
            <div class="col col-lg-4" align="center">
                <div class="card">
                    <img src="<?= base_url('anggota/'.$this->anggota->getbyId($k->nra)->profile)?>" style="width:100px;display: block;
                        margin-left: auto;  margin-right: auto; margin-top: 15px;">
                    <h1><?= $this->anggota->getbyId($k->nra)->nama?></h1>
                        <p class="title"><strong>Ketua</strong></p>
                            <p>Email : <b><?= $this->anggota->getbyId($k->nra)->email?></b></p>
                            <p>Alamat : <?= $this->anggota->getbyId($k->nra)->alamat?></p>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <br><br><br><br>
        <div class="row justify-content-md-center">
            <?php foreach($wakil as $w):?>
            <div class="col col-lg-3" align="center">
                <div class="card">
                    <img src="<?= base_url('anggota/'.$this->anggota->getbyId($w->nra)->profile)?>" style="width:100px;display: block;
                        margin-left: auto;  margin-right: auto; margin-top: 15px;">
                    <h1><?= $this->anggota->getbyId($w->nra)->nama?></h1>
                        <p class="title"><strong>Wakil Ketua</strong></p>
                            <p>Email : <b><?= $this->anggota->getbyId($w->nra)->email?></b></p>
                            <p>Alamat : <?= $this->anggota->getbyId($w->nra)->alamat?></p>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <br><br><br><br>
        <div class="row justify-content-md-center">
            <?php foreach($sekre as $s):?>
            <div class="col col-lg-3" align="center">
                <div class="card">
                    <img src="<?= base_url('anggota'.$this->anggota->getbyId($s->nra)->profile)?>" style="width:100px;display: block;
                        margin-left: auto;  margin-right: auto; margin-top: 15px;">
                    <h1><?= $this->anggota->getbyId($s->nra)->nama?></h1>
                        <p class="title"><strong>Sekretaris</strong></p>
                            <p>Email : <b><?= $this->anggota->getbyId($s->nra)->email?></b></p>
                            <p>Alamat : <?= $this->anggota->getbyId($s->nra)->alamat?></p>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <br><br><br><br>
        <div class="row justify-content-md-center">
            <?php foreach($benda as $b):?>
            <div class="col col-lg-3" align="center">
                <div class="card">
                    <img src="<?= base_url('anggota/'.$this->anggota->getbyId($b->nra)->profile)?>" style="width:100px;display: block;
                        margin-left: auto;  margin-right: auto; margin-top: 15px;">
                    <h1><?= $this->anggota->getbyId($b->nra)->nama?></h1>
                        <p class="title"><strong>Bendahara</strong></p>
                            <p>Email : <b><?= $this->anggota->getbyId($s->nra)->email?></b></p>
                            <p>Alamat : <?= $this->anggota->getbyId($s->nra)->alamat?></p>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <div class="row justify-content-md-center">
            <?php foreach($humas as $h):?>
            <div class="col col-lg-3" align="center">
                <div class="card">
                    <img src="<?= base_url('anggota/'.$this->anggota->getbyId($h->nra)->profile)?>" style="width:100px;display: block;
                        margin-left: auto;  margin-right: auto; margin-top: 15px;">
                    <h1><?= $this->anggota->getbyId($h->nra)->nama?></h1>
                        <p class="title"><strong>Humas</strong></p>
                            <p>Email : <b><?= $this->anggota->getbyId($s->nra)->email?></b></p>
                            <p>Alamat : <?= $this->anggota->getbyId($s->nra)->alamat?></p>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </div>

</section>
<?php $this->load->view('front/_partials/footer')?>