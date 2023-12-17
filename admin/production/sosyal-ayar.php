
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$ayar = new ayar();
$ayarlar = $ayar->ayarGetir();

if(isset($_POST["submit"]))
{
    
    $ayar_facebook = $_POST["ayar_facebook"];
    $ayar_twitter = $_POST["ayar_twitter"];
    $ayar_instagram = $_POST["ayar_instagram"];
    $ayar_google = $_POST["ayar_google"];
    $ayar_youtube = $_POST["ayar_youtube"];

    $ayarlar = new ayar();

    
    if($ayarlar->sosyalAyarGuncelle($ayar_facebook, $ayar_twitter, $ayar_instagram, $ayar_google, $ayar_youtube))
    {
        
        echo "<script>window.location.href='sosyal-ayar.php?durum=ok';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='sosyal-ayar.php?durum=no';</script>";
    }

}
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Sosyal Medya Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sosyal Medya Ayarları
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
                    <form  method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_facebook">Facebook<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_facebook" name="ayar_facebook" required="required"  value="<?php echo $ayarlar->ayar_facebook?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_twitter">Twitter<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_twitter" name="ayar_twitter" required="required" value="<?php echo $ayarlar->ayar_twitter?>" >
                        </div>
                      </div>

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_instagram">İnstagram<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_instagram" name="ayar_instagram" required="required"  value="<?php echo $ayarlar->ayar_instagram?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_google">Google<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_google" name="ayar_google" required="required"  value="<?php echo $ayarlar->ayar_google?>">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_youtube">Youtube<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_youtube" name="ayar_youtube" required="required"  value="<?php echo $ayarlar->ayar_youtube?>">
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