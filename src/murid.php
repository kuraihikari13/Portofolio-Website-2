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
</script>

<body class="w-full h-screen bg-gray-200">
<div id="nav" class="w-full bg-blue-800  h-[80px] text-white flex justify-center fixed z-20 ">
    <div class="flex justify-between w-10/12 ">
    <div><img class="flex mt-[15px] h-[50px] w-[50px]" src="asset/logo.jpg" /></div>

      <div onclick="burger()" class="flex lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>

      </div>
     
      <ul class="lg:flex hidden space-x-8 hover:text py-[24px] ">
        <li>
          <a href="home.php">Beranda</a>
        </li>
        <li>
          Profil
        </li>
        <li>
          Visi Misi
        </li>
        <li>
          <a href="datamurid.php"> Data Murid</a>

        </li>
           <li>
                    <a  href="chatbox.php"> Pesan</a>

                </li>
        <li>
          Login
        </li>
      </ul>


    </div>
    
  </div>   

    <div class="lg:hidden w-full bg-black fixed mt-[80px] z-10 ">
        <div class="flex justify-center">
            <ul id="burgermenu" class=" bg-black text-white w-10/12 h-0 hidden pb-4 space-y-4 ">
                <li>
                    Beranda
                </li>
                <li>
                    Profil
                </li>
                <li>
                    Visi Misi
                </li>
                <li>
                    Data Murid
                </li>
                <li>
                    Login
                </li>
            </ul>
        </div>

    </div>


    <div class="w-full h-[80px]"></div>

    <div class="mt-24 mx-20 p-4 pb-12 bg-white">
        <div>
            <div>
                <div class="shadow-md space-y-2 p-4 mb-12 bg-white ">

                    <form>
                        <div class="w-[900px]">
                            <input placeholder="ADAM ALFATIH" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text">
                            <input placeholder="3146211234/3051" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text">
                            <input placeholder="Kelas IA" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text">
                            
                        </div>
                        <div class="w-full flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>


                    </form>



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
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>PPK</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Matematika</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>B.Inggris</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>B.Indonesia</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>QIROAT</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>SBDP</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>PJOK</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>


                            </tbody>
                        </table>
                        <div class="w-full flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-12 rounded">
                                Submit
                            </button>
                        </div>
                    </form>


                </div>

                <div class="space-y-12 mt-24">
                    <h1 class=" text-blue-800 text-4xl font-bold">Kepribadian</h1>
                    <form>
                        <table id="table_id2" class="display bg-white ">
                            <thead>
                                <tr>
                                    <th>Jenis Kepribadian</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sikap</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Sosialisasi</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Rasa Ingin Tahu</td>
                                    <td> <input placeholder="Input Nilai" class="w-[400px] py-2 px-4  focus:border-blue-800" type="text"></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="w-full flex justify-end mt-12">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Submit
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>




</body>
<script>
    $(document).ready(function() {
        $('#table_id').DataTable();
    });
    $(document).ready(function() {
        $('#table_id2').DataTable();
    });
</script>

</html>