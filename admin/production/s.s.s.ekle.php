
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

if(isset($_POST["submit"]))
{
  $soru = new soru();

  $soru_adi = $_POST["soru_adi"];
  $soru_cevap = $_POST["soru_cevap"];
  $soru_durum = $_POST["soru_durum"];

  
  
  if($soru->soruekle($soru_adi, $soru_cevap, $soru_durum))
    {
     
        echo "<script>window.location.href='s.s.s.php';</script>";
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
            <h3>SIk Sorulan Soru Ekle</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Soru
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="soru_adi">Soru<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="soru_adi" name="soru_adi" required="required">
                        </div>
                    </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="soru_cevap">Cevap<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="soru_cevap"></textarea>
                        </div>
                      </div>


                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="soru_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="soru_durum" name="soru_durum" required="required">
                        </div>
                      </div>

    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right"  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit" name="submit">Kaydet</button>
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