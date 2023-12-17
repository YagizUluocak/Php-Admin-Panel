
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$slider= new slider();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['slider_id'])) {
    $slider_id = $_GET['slider_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $slider->sliderSil($slider_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='slider.php?sliderSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='slider.php?sliderSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="slider-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Resim</th>
                            <th scope="col" style="text-align:center;">Üst Başlık</th>
                            <th scope="col" style="text-align:center;">Alt Başlık</th>
                            <th scope="col" style="width: 50px; text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($slider->sliderGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($slider->sliderGetir() as $slid)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $slid->slider_id?></th>
                                                <td style="width: 150px;"> <img class="img-fluid" style="width: 150px;" src="./images/slider/<?php echo $slid->slider_resim?>" > </td>
                                                <td ><?php echo $slid->slider_ustbaslik?></td>
                                                <td style="text-align:center;"><?php echo $slid->slider_altbaslik?></td>
                                                <td style="text-align:center;">
                                            
                                                <label class="switch">
                                                <input type="checkbox" id="durumToggle" <?php echo ($slid->durum == 1) ? 'checked' : ''; ?>>
                                                    <span class="slider round"></span>
                                                </label>
                                            
                                                </td>
                                                <td><a href="slider-duzenle.php?slider_id=<?php echo $slid->slider_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="slider.php?slider_id=<?php echo $slid->slider_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>

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