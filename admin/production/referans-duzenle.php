
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$referans_id = $_GET["referans_id"];
$referans = new referans();
$referanslar = $referans->referansIdGetir($_GET["referans_id"]);

if(isset($_POST["submit"]))
{
  $referans_adi = $_POST["referans_adi"];
  $referans_durum = $_POST["referans_durum"];

  $referans_resim = $_FILES["referans_resim"]["name"];

  $referanslar = new referans();
  
  if($referanslar->referansDuzenle($referans_id, $referans_adi, $referans_durum, $referans_resim))
    {
     
        echo "<script>window.location.href='referans-duzenle.php?durum=ok&referans_id=$referans_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='referans-duzenle?durum=no&referans_id=$referans_id';</script>";
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
            <h3>Referans Düzenleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Referans Düzenle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="referans_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/referans/<?php echo $referanslar->referans_resim ?>" class="img-fluid" style="width:200px; margin-bottom:12px;" alt="<?php echo $referanslar->referans_adi?>">
                          <input type="file" name="referans_resim" id="referans_resim" class="form-control col-md-7 col-xs-12" value="<?php echo $referanslar->referans_resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="referans_adi">Referans Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="referans_adi" name="referans_adi" required="required"  value="<?php echo $referanslar->referans_adi?>">
                        </div>
                    </div>
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="referans_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="referans_durum" name="referans_durum" required="required" value="<?php echo $referanslar->referans_durum?>">
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