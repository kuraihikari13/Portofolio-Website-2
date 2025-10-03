<?php 

session_start();

?>

<?php
    if(!empty($_SESSION['name']))
    {
        if($_SESSION['name'] != 'ADMIN')
        {
            $name = $_SESSION['name'];
            $kelas = $_SESSION['kelas'];
            $grade = 0;
            $login = true;
            $admin = false;

            include 'chatpop.php';
            
        }
        else
        {
            $name = $_GET['id'];
            $kelas = $_GET['kelas'];
            $grade = 0;
            $login = false;
            $admin = true;
        }
    }
    else if(!isset($_SESSION['name']))
    {
        $id = $_GET['id'];
        $kelas = $_GET['kelas'];
        $grade = 0;
        $login = false;
        $admin = false;
    }

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
    function edit() {
        if (document.getElementById('view').classList.contains('hidden')) {

            document.getElementById("view").classList.remove('hidden');
            document.getElementById("viewedit").classList.add('hidden');


        } else {
            document.getElementById("view").classList.add('hidden');
            document.getElementById("viewedit").classList.remove('hidden');
        }

    }

    function refresh() {
        window.location.reload();
    }

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

<body class="w-full h-screen bg-gray-200">


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
                
                <?php
                    if(!isset($_SESSION["name"])) {
                ?>
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
                    <a href="datamurid.php"> Data Murid</a>

                </li>
                   <li>
                    <a  href="chatbox.php"> Pesan</a>
                </li>
                <li>
                    <a href="login.php"> Login</a>
                </li>
            <?php } else if(isset($_SESSION["name"]) && $_SESSION['name'] != 'ADMIN') { ?>
                <li>
                    <a href="controller/logout.php"> Logout</a>
                </li>
            <?php } else { ?>
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
                    <a href="datamurid.php"> Data Murid</a>

                </li>
                   <li>
                    <a  href="chatbox.php"> Pesan</a>

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
                    <a href="datamurid.php"> Data Murid</a>

                </li>
                <li>
                    <a href="login.php"> Login</a>

                </li>
            </ul>
        </div>

    </div>
    <div class="w-full h-[80px]"></div>




<?php 

    include_once ('controller/connect.php');

    $classification = 0;

    if($kelas == '1A' || $kelas == '1B' || $kelas == '1C'){
        $classification = 1;
    } else if($kelas == '2A' || $kelas == '2B') {
        $classification = 2;
    } else if($kelas == '3A' || $kelas == '3B') {
       $classification = 3;
    } else if($kelas == '4A' || $kelas == '4B') {
        $classification = 4;
    } else if($kelas == '5A' || $kelas == '5B') {
        $classification = 5;
    }

    $grade += $classification;

    if($login === false){
        switch($classification){
            case "1":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE id = '$id' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE kelas = '$kelas'");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 ORDER BY total DESC");
            break;

            case "2":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE id = '$id' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");
            break;

            case "3":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE id = '$id' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
            break;

            case "4":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE id = '$id' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 ORDER BY total DESC");
            break;

            case "5":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE id = '$id' AND kelas = '$kelas' ");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 ORDER BY total DESC");
            break;
        }
    } else if($login === true){
        switch($classification){
            case "1":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE name = '$name' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_1 ORDER BY total DESC");
            break;

            case "2":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE name = '$name' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_2 ORDER BY total DESC");
            break;

            case "3":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE name = '$name' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_3 ORDER BY total DESC");
            break;

            case "4":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE name = '$name' AND kelas = '$kelas'");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_4 ORDER BY total DESC");
            break;

            case "5":
                $data = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE name = '$name' AND kelas = '$kelas' ");
                $overall_rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 ORDER BY total DESC");
                $rank = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 WHERE kelas = '$kelas' ORDER BY total DESC");
                $sorting = mysqli_query($con, "SELECT * FROM amaliyah___kelas_5 ORDER BY total DESC");
            break;
        }
    }

    include_once (__DIR__."/ranking_seeder.php");

    while($d = mysqli_fetch_array($data)){

        $name = $d['name'];

    include_once (__DIR__."/controller/student_rank.php");

    include_once (__DIR__."/ranking_class_seeder.php");

?>

    <div id="view" class=" lg:mt-20 lg:mx-20 p-4 pb-12 bg-white">
        <div>
            <div>
                <?php if($admin === true) { ?>
                <div class=" px-4 pt-4 bg-white flex justify-end ">
                    <a href="editmurid.php?id=<?php echo $d['id']; ?>&&kelas=<?php echo $d['kelas']; ?>" type="submit" class="bg-blue-500 flex space-x-2 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            <h1>Edit</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                    </a>
                </div>
            <?php } ?>
                <div class="shadow-md space-y-2 p-4 mb-12 bg-white lg:flex lg:space-x-12">
                    <div id="bio" class="flex ">
                        <img class="object-cover w-[200px] h-[300px]" src="asset/sd2.jpg" />
                        <div class="w-[500px]">
                            <h1 id="namamurid" class=" py-2 px-4  focus:border-blue-800 font-bold text-2xl"> <?php echo $d['name']; ?></h1>
                            <h1 class=" py-2 px-4 text-lg focus:border-blue-800"> <?php echo $d['nisn'] ?> / <?php echo $d['nis']; ?></h1>
                            <h1 class=" py-2 px-4 text-lg focus:border-blue-800 font-sans"> Kelas <?php echo $d['kelas']; ?></h1>
                        </div>
                    </div>


                    <div class="lg:w-[500px]  border-8 bg-blue-800 border-indigo-500">
                        <h1 class=" py-2   focus:border-blue-800 text-center text-lg font-bold text-white"> Ranking</h1>
                        <h1 class=" focus:border-blue-800 text-center text-6xl font-serif text-yellow-400"><?php echo $rank_year; ?></h1>
                        <h1 class=" py-4 focus:border-blue-800 text-center text-white text-base">
                            "Selamat <b><?php echo $d['name']; ?></b> Kamu meraih Ranking <b><i><?php echo $rank_class; ?></i></b> dari <b><i><?php echo $rank_rows; ?></i></b> siswa di kelas <?php echo $kelas; ?>,
                            dan berdasarkan total nilai kamu, kamu masuk kelas


                            <?php echo $grade + 1; ?> <?php echo $lulus; ?> di tahun depan"
                        </h1>
                        <h1 class="px-2 focus:border-blue-800 text-center border-2 border-amber-500 bg-amber-300 text-2xl font-bold font-serif"> KELAS <?php echo $grade + 1; ?> <?php echo $lulus; ?></h1>
                    </div>


                </div>

                <div class="container mx-auto lg:w-10/12 justify-center lg:flex">
                    <div class="lg:w-[500px]">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="w-full mb-2 lg:h-[300px] bg-blue-800">
                        <h1 class=" py-2 px-4  focus:border-blue-800  text-white font-bold font-sans text-xl "> Kelebihan </h1>
                        <h1 class=" py-2 px-4  focus:border-blue-800 text-justify text-white text-sm justify-center">
                            "Di kelas Adam Alfatih merupakan salah astu siswa terbaik dengan nilai tertinggi dikelasnya.
                            Adam Alfatih memiliki kemampuan yang baik dalam bidang Matematika, Qiroat, dan PPKN. Yang menunjukkan
                            bahwa Adam Alfatih mampu bersosialisasi dengan baik terhadap lingkungan sekitar, dan memiliki oemikiran yang kritis
                            terhadap angka yang matematis."
                        </h1>
                        <h1 class=" py-2 px-4  focus:border-blue-800  text-white font-bold font-sans text-xl "> Kelemahan </h1>
                        <h1 class=" py-2 px-4  focus:border-blue-800 text-justify text-white text-sm justify-center">
                            "Namun Adam Alfatih masih terbilang cukup lemah dalam mengekspresikan imajinasi, dan kreatifitasnya
                            Oleh sebab itu peran Orang tua sangat dibutuhkan dalam pembentukan kreatifitas anak"
                        </h1>

                    </div>
                </div>



                <div class="space-y-12">
                    <h1 class=" text-blue-800 text-4xl font-bold">Daftar Nilai</h1>
                    <form>
                        <table id="table_id" class="display bg-white ">
                            <thead>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Agama</td>
                                    <td id="mp1"><?php echo $d['agama'];?></td>

                                </tr>
                                <tr>
                                    <td>PPKN</td>
                                    <td id="mp2"><?php echo $d['ppkn'];?></td>

                                </tr>
                                <tr>
                                    <td>Matematika</td>
                                    <td id="mp3"><?php echo $d['matematika'];?></td>

                                </tr>
                                <tr>
                                    <td>Bahasa Inggris</td>
                                    <td id="mp4"><?php echo $d['inggris'];?></td>

                                </tr>
                                <tr>
                                    <td>Bahasa Indonesia</td>
                                    <td id="mp5"><?php echo $d['indonesia'];?></td>

                                </tr>
                                <tr>
                                    <td>QIROAT</td>
                                    <td id="mp6"><?php echo $d['qiroat'];?></td>

                                </tr>
                                <tr>
                                    <td>SBDP</td>
                                    <td id="mp7"><?php echo $d['sbdp'];?></td>

                                </tr>
                                <tr>
                                    <td>PJOK</td>
                                    <td id="mp8"><?php echo $d['pjok'];?></td>

                                </tr>

                            </tbody>
                        </table>

                    </form>


                </div>

                <div class="space-y-12 mt-24">
                    <h1 class=" text-blue-800 text-4xl font-bold">Kepribadian</h1>

                    <table id="table_id2" class="display bg-white ">
                        <thead>
                            <tr>
                                <th>Sikap</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Karakter</td>
                                <td id="kp1"><?php echo $d['karakter']; ?></td>

                            </tr>
                            <tr>
                                <td>Sosiabilitas</td>
                                <td id="kp2"><?php echo $d['sosiabilitas']; ?></td>

                            </tr>
                            <tr>
                                <td>Stabilitas</td>
                                <td id="kp3"><?php echo $d['stabilitas']; ?></td>

                            </tr>
                            <tr>
                                <td>Emosi</td>
                                <td id="kp4"><?php echo $d['emosi']; ?></td>

                            </tr>

                        </tbody>
                    </table>





                </div>
            </div>
        </div>
    </div>





<?php } ?>




</body>
<script>
    let nama = document.getElementById("namamurid").innerHTML

    let agama = document.getElementById("mp1").innerHTML
    let ppkn = document.getElementById("mp2").innerHTML
    let matematika = document.getElementById("mp3").innerHTML;
    let ing = document.getElementById("mp4").innerHTML
    let indo = document.getElementById("mp5").innerHTML
    let qiroat = document.getElementById("mp6").innerHTML
    let spdb = document.getElementById("mp7").innerHTML
    let spjok = document.getElementById("mp8").innerHTML
    let karakter = document.getElementById("kp1").innerHTML
    let sosiabilitas = document.getElementById("kp2").innerHTML
    let stabilitas = document.getElementById("kp3").innerHTML
    let emosi = document.getElementById("kp4").innerHTML
    const data = {
        labels: [
            'Matematika',
            'Agama',
            'Bahasa',
            'PPKN',
            'Seni',
            'Olahraga',
            'Kepribadian'
        ],
        datasets: [{
            label: nama,
            data: [matematika, (parseInt(agama) + parseInt(qiroat)) / 2, (parseInt(indo) + parseInt(ing)) / 2,
                ppkn, spdb, spjok, (parseInt(karakter) + parseInt(sosiabilitas) + parseInt(stabilitas) + parseInt(emosi)) / 4
            ],
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }]
    };
    const config = {
        type: 'radar',
        data: data,
        options: {
            elements: {
                line: {
                    borderWidth: 3
                }
            }
        },
    };
</script>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    $(document).ready(function() {
        $('#table_id2').DataTable();
    });
    $(document).ready(function() {
        $('#table_id3').DataTable();
    });
    $(document).ready(function() {
        $('#table_id4').DataTable();
    });
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config
    );
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