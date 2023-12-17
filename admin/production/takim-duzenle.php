
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$takim_id = $_GET["takim_id"];
$takim = new takim();
$takimlar = $takim->takimIdGetir($_GET["takim_id"]);

if(isset($_POST["submit"]))
{
  $kisi_adi = $_POST["kisi_adi"];
  $kisi_gorev = $_POST["kisi_gorev"];
  $kisi_hakkinda = $_POST["kisi_hakkinda"];
  $kisi_durum = $_POST["kisi_durum"];

  $kisi_resim = $_FILES["kisi_resim"]["name"];

  $takimlar = new takim();
  
  if($takimlar->takimDuzenle($takim_id, $kisi_adi, $kisi_gorev, $kisi_hakkinda, $kisi_durum ,$kisi_resim))
    {
     
        echo "<script>window.location.href='takim-duzenle.php?durum=ok&takim_id=$takim_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='takim-duzenle?durum=no&takim_id=$takim_id';</script>";
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
            <h3>takim Düzenleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>takim Düzenle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kisi_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/takim/<?php echo $takimlar->kisi_resim?>" class="img-fluid" style="width:200px; margin-bottom:12px;" alt="">
                          <input type="file" name="kisi_resim" id="kisi_resim" class="form-control col-md-7 col-xs-12" value="<?php echo $takimlar->kisi_resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kisi_adi">Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="kisi_adi" name="kisi_adi" required="required"  value="<?php echo $takimlar->kisi_adi?>">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kisi_gorev">Görevi<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="kisi_gorev"><?php echo $takimlar->kisi_gorev?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kisi_hakkinda">Hakkında<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" name="kisi_hakkinda"><?php echo $takimlar->kisi_hakkinda?></textarea>
                        </div>
                      </div>


                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kisi_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="kisi_durum" name="kisi_durum" required="required" value="<?php echo $takimlar->kisi_durum?>">
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