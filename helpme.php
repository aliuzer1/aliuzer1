session_start();

if ($_POST){

    $kadi = $_POST["kadi"];
    $sifre = $_POST["sifre"];   

    $bul = mysqli_query("select * from uye where kadi='$kadi' && sifre='$sifre'");
    $say = mysqli_num_rows($bul);
    if($say > 0){
        $goster = mysqli_fetch_array($bul);
        $_SESSION["oturum"] = true;
        $_SESSION["kadi"] = $kadi;
        $_SESSION["sifre"] = $sifre;
        $_SESSION["eposta"] = $goster["eposta"];
        $_SESSION["rutbe"] = $goster["rutbe"];
    }else{
        echo '<font color="red">Giris basarisiz oldu</font>';
    }

}else{
    echo '<form action="" method="post">
    <table cellspacing="5" cellpadding="5">
    <tr>
    <td>Kullanici adi:</td>
    <td><input type="text" name="kadi"/></td>
    </tr>
    <tr>
    <td>Sifre</td>
    <td><input type="password" name="sifre"/></td>
    </tr>
    <tr>
    <td></td>
    <td><input type="submit" value="giris yap"/></td>
    </tr>
    </table>
    </form>';
}
