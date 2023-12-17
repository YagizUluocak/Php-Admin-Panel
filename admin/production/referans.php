
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$referans= new referans();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['referans_id'])) {
    $referans_id = $_GET['referans_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $referans->referansSil($referans_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='referans.php?referansSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='referans.php?referansSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="referans-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Resim</th>
                            <th scope="col" style="text-align:center;">Referans Adı</th>
                            <th scope="col" style="width: 50px; text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($referans->referansGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($referans->referansGetir() as $ref)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $ref->referans_id?></th>
                                                <td style="width: 150px;"> <img class="img-fluid" style="width: 150px;" src="./images/referans/<?php echo $ref->referans_resim?>" > </td>
                                                <td ><?php echo $ref->referans_adi?></td>
                                                <td style="text-align:center;">                                 
                                                    <label class="switch">
                                                    <input type="checkbox" id="durumToggle" <?php echo ($ref->referans_durum == 1) ? 'checked' : ''; ?>>
                                                        <span class="slider round"></span>
                                                    </label>                                        
                                                </td>
                                                <td><a href="referans-duzenle.php?referans_id=<?php echo $ref->referans_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="referans.php?referans_id=<?php echo $ref->referans_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
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