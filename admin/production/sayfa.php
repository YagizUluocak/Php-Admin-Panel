
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$sayfa= new sayfa();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['sayfa_id'])) {
    $sayfa_id = $_GET['sayfa_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $sayfa->sayfaSil($sayfa_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='sayfa.php?sayfaSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='sayfa.php?sayfaSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="sayfa-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Başlık</th>
                            <th scope="col" style="text-align:center;">İçerik</th>
                            <th scope="col" style="width: 50px; text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($sayfa->sayfaGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($sayfa->sayfaGetir() as $syf)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $syf->sayfa_id?></th>         
                                                <td ><?php echo $syf->baslik?></td>
                                                <td ><?php echo $syf->sayfa_icerik?></td>
                                                <td style="text-align:center;">                                 
                                                    <label class="switch">
                                                    <input type="checkbox" id="durumToggle" <?php echo ($syf->sayfa_durum == 1) ? 'checked' : ''; ?>>
                                                        <span class="slider round"></span>
                                                    </label>                                        
                                                </td>
                                                <td><a href="sayfa-duzenle.php?sayfa_id=<?php echo $syf->sayfa_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="sayfa.php?sayfa_id=<?php echo $syf->sayfa_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
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