
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$ayar = new ayar();
$ayarlar = $ayar->ayarGetir();

if(isset($_POST["submit"]))
{
    
    $ayar_maps = $_POST["ayar_maps"];
    $ayar_analystic = $_POST["ayar_analystic"];
    $ayar_zopim = $_POST["ayar_zopim"];
   

    $ayarlar = new ayar();

    
    if($ayarlar->apıAyarGuncelle($ayar_maps, $ayar_analystic, $ayar_zopim))
    {
        
        echo "<script>window.location.href='api-ayar.php?durum=ok';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='api-ayar.php?durum=no';</script>";
    }

}
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>API Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>API Ayarları
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_maps">Maps<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_maps" name="ayar_maps" required="required"  value="<?php echo $ayarlar->ayar_maps?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_analystic">Analystic<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_analystic" name="ayar_analystic" required="required" value="<?php echo $ayarlar->ayar_analystic?>" >
                        </div>
                      </div>

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_zopim">Zopim<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_zopim" name="ayar_zopim" required="required"  value="<?php echo $ayarlar->ayar_zopim?>">
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