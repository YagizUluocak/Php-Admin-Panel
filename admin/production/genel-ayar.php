
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$ayar = new ayar();
$ayarlar = $ayar->ayarGetir();

if(isset($_POST["submit"]))
{
    
    $ayar_title = $_POST["ayar_title"];
    $ayar_descr = $_POST["ayar_descr"];
    $ayar_keywords = $_POST["ayar_keywords"];
    $ayar_auth = $_POST["ayar_auth"];

    $ayarlar = new ayar();

    
    if($ayarlar->genelAyarGuncelle($ayar_title, $ayar_descr, $ayar_keywords, $ayar_auth))
    {
        
        echo "<script>window.location.href='genel-ayar.php?durum=ok';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='genel-ayar.php?durum=no';</script>";
    }

}
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Genel Ayarlar</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Genel Ayar
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_title">Site Title <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_title" name="ayar_title" required="required" value="<?php echo $ayarlar->ayar_title?>" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_descr">Site Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_descr" name="ayar_descr" required="required"  value="<?php echo $ayarlar->ayar_descr ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_keywords">Site Keywords<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_keywords" name="ayar_keywords" required="required"  value="<?php echo $ayarlar->ayar_keywords ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_auth">Site Author<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_auth" name="ayar_auth" required="required"  value="<?php echo $ayarlar->ayar_auth ?>">
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