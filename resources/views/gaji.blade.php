<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="/gaji">
        @csrf 
        <input type="text" name="nama" placeholder="Nama karyawan"><br>
        <input type="number" name="jam" placeholder="Jumlah jam kerja"><br>
        <input type="number" name="honor" placeholder="Honor per jam"><br>
        <button type="submit" name="submit">Proses</button><br>
    </form>

    <?php
    //if(isset($biodata->nama)){
      //  echo "Nama Karyawan : ". $biodata->nama."<br>";
        //echo "Jam Kerja : ". $biodata->jam."<br>";
        //echo "Honor / Jam : ". $biodata->honor."<br>";
        //echo "Total Honor : ". $biodata->jam*$biodata->honor."<br>";
    //}
    ?>

    @isset($biodata)
        Nama Karyawan : {{ $biodata->nama }} <br>
        Jam Kerja : {{ $biodata->jam }} <br>
        Honor / Jam : {{ $biodata->honor }} <br>
        Total Honor : {{ $biodata->jam*$biodata->honor }}
    @endisset

</body>
</html>