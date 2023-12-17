
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$takim= new takim();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['takim_id'])) {
    $takim_id = $_GET['takim_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $takim->takimKisiSil($takim_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='takim.php?takimSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='takim.php?takimSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="takim-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Resim</th>
                            <th scope="col" style="text-align:center;">Adı</th>
                            <th scope="col" style="text-align:center;">Görev</th>
                            <th scope="col" style="width: 50px; text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($takim->takimGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($takim->takimGetir() as $tkm)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $tkm->takim_id?></th>
                                                <td style="width: 150px;"> <img class="img-fluid" style="width: 150px;" src="./images/takim/<?php echo $tkm->kisi_resim?>" > </td>
                                                <td style="text-align:center;"><?php echo $tkm->kisi_adi?></td>
                                                <td style="text-align:center;"><?php echo $tkm->kisi_gorev?></td>
                                                <td style="text-align:center;">
                                                    <label class="switch">
                                                    <input type="checkbox" id="durumToggle" <?php echo ($tkm->kisi_durum == 1) ? 'checked' : ''; ?>>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </td>
                                                <td><a href="takim-duzenle.php?takim_id=<?php echo $tkm->takim_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="takim.php?takim_id=<?php echo $tkm->takim_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
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