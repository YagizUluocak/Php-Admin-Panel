
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$slider_id = $_GET["slider_id"];
$slid = new slider();
$slider = $slid->sliderIdGetir($_GET["slider_id"]);

if(isset($_POST["submit"]))
{
  $slider_ustbaslik = $_POST["slider_ustbaslik"];
  $slider_altbaslik = $_POST["slider_altbaslik"];
  $slider_aciklama = $_POST["slider_aciklama"];
  $durum = $_POST["durum"];
  $slider_resim = $_FILES["slider_resim"]["name"];

  $slider = new slider();
  
  if($slider->sliderDuzenle($slider_id, $slider_ustbaslik, $slider_altbaslik, $slider_aciklama, $durum, $slider_resim))
    {
     
        echo "<script>window.location.href='slider-duzenle.php?durum=ok&slider_id=$slider_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='slider-duzenle?durum=no&slider_id=$slider_id';</script>";
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
            <h3>Slider Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Ayarları
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/slider/<?php echo $slider->slider_resim ?>" class="img-fluid" style="width:200px; margin-bottom:12px;" alt="">
                          <input type="file" name="slider_resim" id="slider_resim" class="form-control col-md-7 col-xs-12" value="<?php echo $slider->slider_resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ustbaslik">Üst Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="slider_ustbaslik" name="slider_ustbaslik" required="required"  value="<?php echo $slider->slider_ustbaslik?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_altbaslik">Alt Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="slider_altbaslik" name="slider_altbaslik" required="required"  value="<?php echo $slider->slider_altbaslik?>">
                        </div>
                    </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_aciklama">Açıklama<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="slider_aciklama"><?php echo $slider->slider_aciklama?></textarea>
                        </div>
                      </div>


                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="durum">durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="durum" name="durum" required="required" value="<?php echo $slider->durum?>">
                        </div>
                      </div>

    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right"  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit" name="submit" >Güncelle</button>
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