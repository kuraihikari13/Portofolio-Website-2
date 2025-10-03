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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a class="text-blue-800" href="datamurid.php"> Data Murid</a>

                </li>

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
            <?php } ?>
            </ul>


        </div>

    </div>
    <div class="lg:hidden w-full bg-white fixed mt-[80px] z-50">
        <div class="flex justify-center">
            <ul id="burgermenu" class=" bg-white text-black w-10/12 h-0 hidden pb-4 space-y-4 ">
                <li>
                    <a href="home.php">Beranda</a>
                </li>
                <li>
                    <a href="Profil.php">Profil</a>
                </li>
                <li>
                    <a href="visimisi.php">Visi Misi</a>
                </li>
                <li>
                    <a class="text-blue-800" href="datamurid.php"> Data Murid</a>

                </li>
                <li>
                    <a href="login.php"> Login</a>

                </li>
            </ul>
        </div>

    </div>



    <div class="w-full h-[80px]"></div>

    <div class="mt-24 px-24">
        <div>
            <div>
                <div class="w-full flex">
                    <div class="p-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="?kelas=1"> Kelas 1</a>
                        </button>
                    </div>
                    <div class="p-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="?kelas=2"> Kelas 2</a>
                        </button>
                    </div>
                    <div class="p-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="?kelas=3"> Kelas 3</a>
                        </button>
                    </div>
                    <div class="p-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="?kelas=4"> Kelas 4</a>
                        </button>
                    </div>
                    <div class="p-12">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <a href="?kelas=5"> Kelas 5</a>
                        </button>
                    </div>
                </div>
                <div>
                    <table id="table_id" class="display ">
                        <thead>
                            <tr>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Naik Menuju Kelas</th>
                            </tr>
                        </thead>
                        <?php include ('controller/connect.php'); ?>
                        <tbody>
                        <?php
                        if(isset($_GET['kelas'])){
                            $kelas = $_GET['kelas'];

                            switch($kelas) {
                                case "1":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 ORDER BY total DESC");
                                break;
                                case "2":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");
                                break;
                                case "3":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
                                break;
                                case "3":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
                                break;
                                case "4":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 ORDER BY total DESC");
                                break;
                                case "5":
                                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5");
                                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 ORDER BY total DESC");
                                break;
                            }
                        ?>
                        <?php

                            include ('controller/ranking_seeder.php');

                            while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $d['nisn']; ?></td>
                            <td><?php echo $d['nis']; ?></td>
                            <td><a href="muridorg.php?id=<?php echo $d['id']; ?>&&kelas=<?php echo $d['kelas']; ?>"><?php echo $d['name']; ?></a></td>
                            <td>
                            <?php 
                                    if($d['gender'] = 'L'){
                                        echo "Laki-laki";
                                    } else if ($d['gender'] = 'P') {
                                        echo "Perempuan";
                                    }
                            ?>
                            </td>
                            <td><?php echo $d['kelas']; ?></td>
                            <?php include ('controller/ranking_class_seeder.php'); ?>
                            <td><?php echo $kelas + 1 . $lulus; ?></td>
                        </tr>
                        <?php } ?>

                    <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>




</body>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
</script>
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