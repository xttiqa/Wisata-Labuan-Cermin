<body>
    <!-- ABOUT-->
    <div class="beranda font-poppins" id="Beranda">
        <div class="judul-halaman">About</div>
        <div class="h6 lh-lg p-2 kalimat-beranda">
            Danau Labuan Cermin adalah salah satu objek wisata air yang berlokasi di Desa 
            Labuan Kelambu, Kecamatan Biduk-biduk, Kabupaten Berau, Kalimantan Timur. 
            Tempat wisata alam ini dikelola oleh masyarakat sekitar bekerja sama dengan 
            Lembaga Masyarakat Labuan Cermin yang menaunginya. Danau ini memiliki dua rasa, 
            asin (air laut) di bagian dasar dan tawar di bagian permukaan. Fenomena alam disebut 
            juga sebagai Meromictic lake. Dinamakan Labuan Cermin karena airnya begitu bening 
            dan mengkilap layaknya cermin.
        </div>
        <div class="toggle-question">
            <div id="flip">Apakah ada fasilitas penginapan di dekat Labuan Cermin?</div>
                <div id="panel">Ya, ada beberapa penginapan sederhana di sekitar Biduk-Biduk, wisata perahu, serta snorkeling dilaut.</div>
            <div id="flip2">Berapa harga tiket masuk ke Labuan Cermin?</div>
                <div id="panel2">Harga tiket tergantung pada paket yang anda pilih</div>
            <div id="flip3">Apa saja hal yang perlu diperhatikan saat berkunjung ke Labuan Cermin?</div>
                <div id="panel3">Pengunjung disarankan untuk menjaga kebersihan, tidak membuang sampah sembarangan, dan penting untuk membawa perlengkapan pribadi seperti sunblock, obat-obatan, dan perlengkapan snorkeling.</div>
        </div>
    </div>
    <!--ABOUT END -->

    <!--PERTANYAAN-->

    <script> 
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").slideToggle("slow");
        });
        $("#flip2").click(function(){
            $("#panel2").slideToggle("slow");
        });
        $("#flip3").click(function(){
            $("#panel3").slideToggle("slow");
        });
    });
    </script>
</body>
