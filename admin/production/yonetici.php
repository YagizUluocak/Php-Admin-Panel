
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$yonetici= new yonetici();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['yonetici_id'])) {
    $yonetici_id = $_GET['yonetici_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $yonetici->yoneticiSil($yonetici_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='yonetici.php?yoneticiSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='yonetici.php?yoneticiSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="yonetici-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr>
                            <th scope="col" style="text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Yönetici Adı</th>
                            <th scope="col" style="text-align:center;">Yönetici Soyadı</th>
                            <th scope="col" style="width: 50px; text-align:center;">Yönetici Mail</th>
                            <th scope="col" style="width: 100px; text-align:center;">İncele</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($yonetici->yoneticiListele())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($yonetici->yoneticiListele() as $yntc)
                                        {
                                            ?>
                                            <tr>
                                            <td ><?php echo $yntc->yonetici_id?></td>
                                                <td scope="row" style="text-align:center;"><?php echo $yntc->yonetici_adi?></td>
                                                <td ><?php echo $yntc->yonetici_soyadi?></td>
                                                <td style="text-align:center;"><?php echo $yntc->kullanici_mail?></td>

                                                <td><a href="yonetici-duzenle.php?yonetici_id=<?php echo $yntc->yonetici_id?>" class="btn btn-warning btn-sm">İncele</a></td> 
                                                <td><a href="yonetici.php?yonetici_id=<?php echo $yntc->yonetici_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                <?php
                            }
                        ?>                 
        </table>
    </div>
</div>





<?php
include "../production/inc/_footer.php";
?>