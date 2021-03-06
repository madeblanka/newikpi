<?php $this->load->view('front/_partials/head') ?>

<body>
  <?php $this->load->view('front/_partials/navbar') ?>
  <?php $this->load->view('front/_partials/cover') ?>
 
  <section id="about" class="about section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h3>Anggota <span> IKPI Bali</span></h3>
        <p><br></p>
      </div>

      <div class="row">
        <div class="col">
          <h3>Daftar Nama Anggota</h3>
          <div class="card text-center shadow">
            <ul class="list-group list-group-flush">
              <?php foreach($anggota as $a):?>
              <li class="list-group-item" style="text-align:left;">
                <div class="row">
                  <div class="col-9" style="font-size: 13px;">
                    Anggota - <strong><a href="<?= site_url('front/Anggotadetail/'.$a->id_Anggota)?>"><?= $a->nama?></a></strong>
                  </div>
                  <div class="col-3 text-muted" style="font-size: 12px; ">
                    <i>Tanggal : <?= date('d-M-Y H:i',strtotime($a->created_at))?></i>
                  </div>
                </div>
              </li>
              <?php endforeach?>
            </ul>
            <div class="card-footer text-white py-3" style="font-size: 14px; text-align: right;">
              <strong><a href="<?= site_url('front/peraturanlist/')?>">Lihat Semua</a></strong>
            </div>
          </div>
        </div>

    </div>
  </section>

  <?php $this->load->view('front/_partials/footer') ?>