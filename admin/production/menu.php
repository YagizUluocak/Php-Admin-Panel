
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php

$menu= new menu();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['menu_id'])) {
    $menu_id = $_GET['menu_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $menu->menuSil($menu_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='menu.php?menu_id=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='menu.php?menu_id=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="menu-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>                         
                            <th scope="col" style="text-align:center;">Menü Adı</th>
                            <th scope="col" style="width: 150px; text-align:center;">Üst Menü</th>
                            <th scope="col" style="text-align:center;">Url</th>
                            <th scope="col" style="text-align:center;">Sıra</th>
                            <th scope="col" style="text-align:center;">Durum</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($menu->menuGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($menu->menuGetir() as $mnu)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $mnu->menu_id?></th>
                                                
                                                <td ><?php echo $mnu->menu_ad?></td>
                                                <td style="text-align:center;"><?php echo $mnu->menu_ust?></td>
                                                <td style="text-align:center;"><?php echo $mnu->menu_url?></td>
                                                <td style="text-align:center;"><?php echo $mnu->menu_sira?></td>
                                                <td style="text-align:center;"><?php echo $mnu->menu_durum?></td>
                                                <td><a href="menu-duzenle.php?menu_id=<?php echo $mnu->menu_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="menu.php?menu_id=<?php echo $mnu->menu_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>
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