<?php
session_start();
?>

<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

  <link href="/dist/output.css" rel="stylesheet">
</head>

<script>
  function burger() {

    if (document.getElementById('burgermenu').classList.contains('h-52')) {
      document.getElementById("burgermenu").classList.remove('h-52');
      document.getElementById("burgermenu").classList.add('h-0');
      document.getElementById("burgermenu").classList.add('hidden');



    } else {
      document.getElementById("burgermenu").classList.remove('h-0');
      document.getElementById("burgermenu").classList.add('h-52');
      document.getElementById("burgermenu").classList.remove('hidden');
    }




  }



  // element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
  window.addEventListener("scroll", function() { // or window.addEventListener("scroll"....
    var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"

    if (st => 0) {
      document.getElementById("nav").classList.remove('bg-black');
      document.getElementById("nav").classList.remove('bg-opacity-50');
      document.getElementById("nav").classList.add('bg-white');
      document.getElementById("nav").classList.add('shadow-lg');


    } else {
      document.getElementById("nav").classList.add('bg-black');
      document.getElementById("nav").classList.add('bg-opacity-50');

      document.getElementById("nav").classList.remove('text-white');
      document.getElementById("nav").classList.remove('bg-white');
      document.getElementById("nav").classList.remove('shadow-lg');
    }
    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
  }, false);
</script>

<body class="w-full h-screen">


  <div id="nav" class="w-full bg-white bg-opacity-50 h-[80px] text-black flex justify-center fixed z-50 ">
    <div class="flex justify-between w-10/12 ">
      <div class="flex"><img class="flex mt-[15px] h-[50px] w-[50px]" src="asset/logo.jpg" />
        <h1 class="text-xl text-green-600 px-4 py-[20px] font-bold">SD SWASTA AMALIYAH</h1>
      </div>

      <div onclick="burger()" class="flex lg:hidden py-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

      </div>

      <ul class="lg:flex hidden space-x-8 hover:text py-[24px] z-50 ">
        <li>
          <a href="home.php">Beranda</a>
        </li>
        <li>
          <a class="text-blue-800" href="Profil.php">Profil</a>
        </li>
        <li>
          <a href="visimisi.php">Visi Misi</a>
        </li>
        <li>
          <a href="datamurid.php"> Data Murid</a>

        <?php
                    if(!isset($_SESSION["name"])) {
                ?>
                <li>
                    <a href="login.php"> Login</a>
                </li>
            <?php } else if(isset($_SESSION["name"])) { ?>
              <li>
                    <a href="chatbox.php"> Pesan</a>

                </li>
                <li>
                    <a href="controller/logout.php"> Logout</a>
                </li>
            <?php } ?>      </ul>


    </div>

  </div>
  <div class="lg:hidden w-full bg-white fixed mt-[80px] z-50">
    <div class="flex justify-center">
      <ul id="burgermenu" class=" bg-white text-black w-10/12 h-0 hidden pb-4 space-y-4 ">
        <li>
          <a href="home.php">Beranda</a>
        </li>
        <li>
          <a class="text-blue-800" href="Profil.php">Profil</a>
        </li>
        <li>
          <a href="visimisi.php">Visi Misi</a>
        </li>
        <li>
          <a href="datamurid.php"> Data Murid</a>

        </li>
        <li>
          <a href="login.php"> Login</a>

        </li>
      </ul>
    </div>

  </div>



  <div class="w-full h-[80px]"></div>


  <div class="bg-blue-800 h-[600px] w-full lg:flex">

    <img class="object-cover lg:w-[600px] hidden lg:flex lg:rounded-br-[200px]" src="asset/kepsek2.jpg" />

    <div class="p-20 space-y-5 bg-blue-800">
      <h1 class="text-4xl font-bold text-white ">Sambutan Kepala Sekolah</h1>
      <p class="text-white text-lg">"Assalamu'alaikum Warahmatullahi Wabarakaatuh.
        Salam sejahtera untuk kita semua. Selamat datang di website SD Swasta Amaliyah. Website ini dibangun
        sebagai sarana atau media informasi dan komunikasi sekolah, karena sejalan dengan perkembangan
        teknologi industri 4.0 yang berguna untuk memudahkan mencari informasi tentang SD Swasta Amaliyah . Kualitas
        layanan menjadi salah satu misi sekolah dan kaitannya dengan transparansi dan akuntabilitas
        sekolah. Menjalankan sebagai pimpinan di SD Swasta Amaliyah, harapan tentu untuk mengembangkan
        sekolah besar ini menjadi lebih baik lagi, bertabur bintang baik akademik maupun non akademik.
        Sekolah yang akan melahirkan generasi yang inovatif, kreatif, religius, dan akhlakul karimah yang
        berwawasan luas serta mengabdi kepada agama, bangsa, dan negara. Selaku pimpinan saya mendorong
        terus perkembangan inovasi dan kreasi warga sekolah. Mengeratkan tali saliturahmi, kekeluargaan,
        dan kerjasama seluruh warga sekolah. Dari lubuk hati yang paling dalam.
        Wassalamu'alaikum Warohmatullahi Wabarokatuh"
        <br><b>Safrijal Efendi, S.E.<b></br>
      </p>
    </div>

  </div>


  <div class="lg:relative lg:z-10 w-full lg:h-[800px] lg:mt-24 mt-[600px] lg:py-56 ">
    <div class="lg:relative lg:flex hidden bg-blue-800  h-[400px] p-12 space-y-4">

    </div>
    <div class="lg:flex lg:justify-center ">
      <div class="lg:flex lg:w-10/12 lg:justify-between lg:absolute lg:top-[50px] ">
        <img class="lg:object-cover  lg:h-[500px] lg:w-[400px] w-full" src="asset/sd.jpg" />
        <div class="py-[10px]  space-y-24">
          <h1 class=" text-blue-800 lg:w-[500px] font-bold text-5xl">Profil SD Swasta Amaliyah</h1>
          <p class=" bg-blue-800 text-white lg:w-[500px] w-full font-normal p-4">
            "SD Swasta Amaliyah merupakan sekolah dasar yang berletak di Jalan Tani Asli Gang Asal, Tanjung Gusta, Kec. Sunggal, Kab. Deli Serdang Prov. Sumatera Utara.
            Sekolah ini berdiri sejak tahun 2012, namun sudah menghasilkan ratusan tamatan siswa yang kompeten, dan memiliki
            Sekolah Swasta Amaliyah telah berhasil memberikan pendidikan sekolah dasar terbaik bagi anak dari orang tua murid
            yang mempercayakan anaknya untuk bersekolah disini. Dengan fokus utama untuk mempersiapkan siswa masuk kejenjang
            yang lebih tinggi, dengan berazazkan ketakwaan kepada Tuhan Yang Maha Esa.""
          </p>
        </div>


      </div>
    </div>


  </div>



  <div>

    <div class='lg:flex w-full'>
      <div class='relative lg:w-6/12 mb-[50px]'>
        <img class=' lg:w-full lg:h-[700px] ' src='asset/pres4.jpg' />

        <div class='absolute top-0 p-8'>
          <h1 class="text-6xl font-bold text-white">Prestasi </h1>
        </div>
        <div class='absolute bottom-0  lg:h-[400px] lg:w-6/12 bg-blue-800'>
          <div class='p-4'>
            <h1 class="lg:text-4xl  font-bold text-white">Ekstrakulikuler </h1>
            <div class=' border-b-4 w-[100px] border-[#18a4e0] '></div>

            <p class='lg:text-xl text-white my-8'>
              SD Swasta Amaliyah memiliki beberapa ekskul yang dapat melatih siswa menjadi pribadi yang tangguh, dan peduli
              akan lingkungan sekitar, seperti ekskul Pramuka, Cinta Alam, dan Paskibraka
            </p>
          </div>

        </div>
      </div>

      <div class='lg:w-6/12'>
        <div class='flex'>
          <div class='w-6/12 h-[350px] bg-[#eea03b]'>
            <div class='p-4'>
              <h1 class="lg:text-4xl text-xl font-bold text-white">Olimpiade </h1>
              <div class=' border-b-4 w-[100px] border-blue-800 '></div>

              <p class='lg:text-xl text-white my-8'>
                SD Swasta Amaliyah juga melatih siswa yang memiliki kemampuan agar dapat memanfaatkan kemampuannya
                kedalam ajang olimpiade baik itu akademis, maupun non akademis.
              </p>
            </div>
          </div>
          <div class='w-6/12  '>
            <img class='w-full h-[350px]' src='asset/pres2.jpg' />
          </div>

        </div>

        <div class='flex'>
          <div class='w-6/12 '>
            <img class='w-full h-[350px]' src='asset/pres3.jpg' />
          </div>
          <div class='w-6/12 h-[350px] bg-blue-500'>
            <div class='p-4'>
              <h1 class="lg:text-4xl text-xl font-bold text-white">Pentas Seni </h1>
              <div class=' border-b-4 w-[100px] border-[#eea03b] '></div>

              <p class=' text-white my-6 text-sm'>
                Untuk memperingati beberapa hari besar Nasional di Indonesia, SD Swasta Amaliyah setiap tahunya
                secara rutin melaksanakan berbagi kegiatan seperti Perayaan HUT RI, Pentas Seni, Hari guru, dll.
                Kegiatan keagamaan juga menjadi agenda kegiatan bagi siswa SD Amaliyah setiap tahunnya.

              </p>
            </div>
          </div>


        </div>


        <div>

        </div>
      </div>
    </div>

  </div>

</body>
<footer class="mt-24 ">
  <div>
    <div class='w-full lg:h-[400px] bg-blue-800 lg:mt-12 px-8 lg:flex'>
      <div class='container mx-auto lg:w-10/12 lg:space-x-32 lg:flex text-white'>
        <div class='py-16 space-y-4 '>
          <img class='h-[120px] w-[120px]' src='asset/logo.jpg' />
          <h1 class='font-bold'>SD Swasta Amaliyah </h1>
          <div class='space-y-1'>

            <span class='py-2 text-md text-white'>Jalan Tani Asli Gang Asal, Tanjung Gusta, Kec. Sunggal, Kab. Deli Serdang Prov. Sumatera Utara</span>
            <div class='flex'>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" color='white' viewBox="0 0 20 20" fill="currentColor">
                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
              </svg>
              <p class='px-2 text-white  text-md'>(061) 8213207 </p>
            </div>
            <div class='flex'>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" color='white' viewBox="0 0 20 20" fill="currentColor">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />

              </svg>

              <span class='px-2 text-white  text-md'>sdamaliyahmedan@gmail.com</span>
            </div>
          </div>

        </div>




      </div>
      <div class="py-12">
        <div class="mapouter">
          <div class="gmap_canvas"><iframe class="gmap_iframe w-full h-[300px] lg:w-[600px] " frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Jalan Tani Asli Gang Asal, Tan'jung Gusta, Kec. Sunggal, Kab. Deli Serdang&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>
          <style>
            .mapouter {
              position: relative;
              text-align: right;

            }

            .gmap_canvas {
              overflow: hidden;
              background: none !important;

            }
          </style>
        </div>

      </div>
    </div>
    <div class='w-full h-[50px] bg-blue-900 '>
      <div class='container mx-auto w-10/12  flex py-[5px] lg:py-[15px] justify-center'>
        <h1 class='text-white text-sm '>© 2022 Yayasan Amaliyah Medan</h1>
      </div>

    </div>

  </div>

</footer>

</html>