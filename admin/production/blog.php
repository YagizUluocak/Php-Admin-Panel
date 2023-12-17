
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>
<?php
$blog= new blog();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['blog_id'])) {
    $blog_id = $_GET['blog_id'];
    // sliderSil fonksiyonunu çağır
    $silme_sonuc = $blog->blogSil($blog_id);
    
    // Silme işlemi başarılıysa
    if($silme_sonuc) {
        echo "<script>window.location.href='blog.php?blogSil=ok';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    } else {
        echo "<script>window.location.href='blog.php?blogSil=no';</script>";
        exit; // İşlem tamamlandıktan sonra betik çalışmasını sonlandır
    }
}
?>

<div class="right_col">
    <div class="row">
        <a href="blog-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
        <table class="table table-bordered" style="text-align:center;">
                        <thead >
                            <tr >
                            <th scope="col" style="width: 50px; text-align:center;">ID</th>
                            <th scope="col" style="text-align:center;">Resim</th>
                            <th scope="col" style="text-align:center;">Başlık</th>
                            <th scope="col" style="text-align:center;">İçerik</th>
                            <th scope="col" style="width: 50px; text-align:center;">Onay</th>
                            <th scope="col" style="width: 100px; text-align:center;">Düzenle</th>
                            <th scope="col" style="width: 100px; text-align:center;">Sil</th>
                            </tr>
                        </thead>
                        <?php
                            if($blog->blogGetir())
                            {
                                ?>
                                    <tbody>
                                        <?php
                                        foreach($blog->blogGetir() as $blog)
                                        {
                                            ?>
                                            <tr>
                                                <th scope="row" style="text-align:center;"><?php echo $blog->blog_id?></th>
                                                <td style="width: 150px;"><img class="img-fluid" style="width: 150px;" src="./images/blog/<?php echo $blog->blog_resim?>" > </td>
                                                <td ><?php echo $blog->blog_adi?></td>
                                                <td ><?php echo $blog->blog_icerik?></td>
                                                <td style="text-align:center;">
                                                    <label class="switch">
                                                    <input type="checkbox" id="durumToggle" <?php echo ($blog->onay == 1) ? 'checked' : ''; ?>>
                                                        <span class="slider round"></span>
                                                    </label>       
                                                </td>
                                                <td><a href="blog-duzenle.php?blog_id=<?php echo $blog->blog_id?>" class="btn btn-warning btn-sm">Düzenle</a></td> 
                                                <td><a href="blog.php?blog_id=<?php echo $blog->blog_id?>&islem=sil" class="btn btn-danger btn-sm">Sil</a></td>

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