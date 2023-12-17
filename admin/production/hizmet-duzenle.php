
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$hizmet_id = $_GET["hizmet_id"];
$hizmet = new hizmet();
$hizmetler = $hizmet->hizmetIdGetir($_GET["hizmet_id"]);

if(isset($_POST["submit"]))
{
  $hizmet_adi = $_POST["hizmet_adi"];
  $hizmet_icerik = $_POST["hizmet_icerik"];
  $hizmet_durum = $_POST["hizmet_durum"];

  $hizmet_resim = $_FILES["hizmet_resim"]["name"];

  $hizmetler = new hizmet();
  
  if($hizmetler->hizmetDuzenle($hizmet_id, $hizmet_adi, $hizmet_icerik, $hizmet_durum, $hizmet_resim))
    {
     
        echo "<script>window.location.href='hizmet-duzenle.php?durum=ok&hizmet_id=$hizmet_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='hizmet-duzenle?durum=no&hizmet_id=$hizmet_id';</script>";
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
            <h3>Hizmet Düzenleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hizmet Düzenle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hizmet_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/slider/<?php echo $hizmetler->hizmet_resim ?>" class="img-fluid" style="width:200px; margin-bottom:12px;" alt="<?php echo $hizmetler->hizmet_adi?>">
                          <input type="file" name="hizmet_resim" id="hizmet_resim" class="form-control col-md-7 col-xs-12" value="<?php echo $hizmetler->hizmet_resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hizmet_adi">Hizmet Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hizmet_adi" name="hizmet_adi" required="required"  value="<?php echo $hizmetler->hizmet_adi?>">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hizmet_icerik">İçerik<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="hizmet_icerik"><?php echo $hizmetler->hizmet_icerik?></textarea>
                        </div>
                      </div>


                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hizmet_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hizmet_durum" name="hizmet_durum" required="required" value="<?php echo $hizmetler->hizmet_durum?>">
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