
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$soru= new soru();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['s_id'])) {
    $s_id = $_GET['s_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $soru->soruSil($s_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='s.s.s.php?soruSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='s.s.s.php?soruSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="s.s.s.ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Soru</th>
                            <th scope="col" style="text-align:center;">Cevap</th>
                            <th scope="col" style="width: 50px; text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($soru->soruGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($soru->soruGetir() as $sru)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $sru->s_id?></th>
                                                <td ><?php echo $sru->soru_adi?></td>
                                                <td style="text-align:center;"><?php echo $sru->soru_cevap?></td>
                                                <td style="text-align:center;">
                                                    <label class="switch">
                                                    <input type="checkbox" id="durumToggle" <?php echo ($sru->soru_durum == 1) ? 'checked' : ''; ?>>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td><a href="s.s.s.duzenle.php?s_id=<?php echo $sru->s_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="s.s.s.php?s_id=<?php echo $sru->s_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
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