<?php include ("header.php"); ?>

<!--TOUR PACKAGES-->
    <div class="tour-packages font-poppins" id="TourPackage">
      <div class="container">
          <div class="row">
              <div class="col-8">
              <?php
            $pages_dir='menu';
            if(!empty($_GET['p'])) {

                $pages=scandir($pages_dir,0);
                unset($pages[0],$pages[1]);
                $p=$_GET['p'];
                if(in_array($p.'.php',$pages)){
                    include($pages_dir.'/'.$p.'.php');
                }else{
                    echo'Halaman Tidak Ditemukan';
                }
            } else {
                include($pages_dir.'/paket-wisata.php');
            }
          ?> 
              </div>
              <div class="col-4 bg-kiri">
                  <form class="d-flex bg-form-kiri">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-dark" type="submit">Search</button>
                  </form>
                  <br>
                  <div class="ratio ratio-16x9 video-kiri">
                      <iframe src="https://www.youtube.com/embed/xdoL8oULI8k" title="Youtube video" allowfullscreen></iframe>
                  </div>
                  <br>
                  <div class="ratio ratio-16x9 video-kiri">
                      <iframe src="https://www.youtube.com/embed/5dAnrBlpPro" title="Youtube video" allowfullscreen></iframe>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!--TOUR PACKAGES END-->

<?php include ("footer.php"); ?>
    <!-- ABOUT-->
    <!-- <div class="about font-poppins" id="About">
        <div class="judul-about">About</div>
        <div class="h6 lh-lg p-2 kalimat-about">
            Danau Labuan Cermin adalah salah satu objek wisata air yang berlokasi di Desa 
            Labuan Kelambu, Kecamatan Biduk-biduk, Kabupaten Berau, Kalimantan Timur. 
            Tempat wisata alam ini dikelola oleh masyarakat sekitar bekerja sama dengan 
            Lembaga Masyarakat Labuan Cermin yang menaunginya. Danau ini memiliki dua rasa, 
            asin (air laut) di bagian dasar dan tawar di bagian permukaan. Fenomena alam disebut 
            juga sebagai Meromictic lake. Dinamakan Labuan Cermin karena airnya begitu bening 
            dan mengkilap layaknya cermin.
        </div>
    </div> -->
    <!--ABOUT END -->
   