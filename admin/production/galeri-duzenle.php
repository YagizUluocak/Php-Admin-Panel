
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$resim_id = $_GET["resim_id"];
$galeri = new galeri();
$resimler = $galeri->galeriIdGetir($_GET["resim_id"]);

if(isset($_POST["submit"]))
{
  $resim_baslik = $_POST["resim_baslik"];
  $resim_durum = $_POST["resim_durum"];


  $resim = $_FILES["resim"]["name"];

  $resimler = new galeri();
  
  if($resimler->galeriDuzenle($resim_id, $resim_baslik, $resim_durum, $resim))
    {
     
        echo "<script>window.location.href='galeri-duzenle.php?durum=ok&resim_id=$resim_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='galeri-duzenle?durum=no&resim_id=$resim_id';</script>";
    }
}
?>
<head>
  <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
</head>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Resim Düzenleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Resim Düzenle
                        <small>,    
                        
                        <?php
                        if(isset($_GET['durum']))
                        {
                            if($_GET['durum'] == "ok")
                            {
                            ?>
                            <b style="color: green;">İşlem Başarılı..</b>
                            <?php
                            }
                            elseif($_GET['durum'] == "no")
                            {
                                ?>
                                <b style="color: red;">İşlem Başarısız..</b>
                                <?php
                            }
                        }
                        ?>

                        </small>
                     </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form  method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/galeri/<?php echo $resimler->resim ?>" class="img-fluid" style="width:200px; margin-bottom:12px;" alt="<?php echo $resimler->resim_baslik?>">
                          <input type="file" name="resim" id="resim" class="form-control col-md-7 col-xs-12" value="<?php echo $resimler->resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resim_baslik">Resim Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="resim_baslik" name="resim_baslik" required="required"  value="<?php echo $resimler->resim_baslik?>">
                        </div>
                    </div>
                   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resim_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="resim_durum" name="resim_durum" required="required" value="<?php echo $resimler->resim_durum?>">
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right"  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit" name="submit">Güncelle</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
include "../production/inc/_footer.php";
?>