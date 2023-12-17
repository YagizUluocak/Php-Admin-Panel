
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$ayar = new ayar();
$ayarlar = $ayar->ayarGetir();

if(isset($_POST["submit"]))
{
    
    $ayar_tel = $_POST["ayar_tel"];
    $ayar_gsm = $_POST["ayar_gsm"];
    $ayar_fax = $_POST["ayar_fax"];
    $ayar_mail = $_POST["ayar_mail"];
    $ayar_ilce = $_POST["ayar_ilce"];
    $ayar_il = $_POST["ayar_il"];
    $ayar_adres= $_POST["ayar_adres"];
    $ayar_mesai= $_POST["ayar_mesai"];

    $ayarlar = new ayar();

    
    if($ayarlar->iletisimAyarGuncelle($ayar_tel, $ayar_gsm, $ayar_fax, $ayar_mail, $ayar_ilce, $ayar_il, $ayar_adres, $ayar_mesai))
    {
        
        echo "<script>window.location.href='iletisim-ayar.php?durum=ok';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='iletisim-ayar.php?durum=no';</script>";
    }

}
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>İletişim Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>İletişim Ayarları
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_tel">Telefon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_tel" name="ayar_tel" required="required" value="<?php echo $ayarlar->ayar_tel?>" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_gsm">GSM<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_gsm" name="ayar_gsm" required="required"  value="<?php echo $ayarlar->ayar_gsm?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_fax">Fax<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_fax" name="ayar_fax" required="required"  value="<?php echo $ayarlar->ayar_fax?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_mail">Mail<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_mail" name="ayar_mail" required="required"  value="<?php echo $ayarlar->ayar_mail?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_ilce">İlçe<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_ilce" name="ayar_ilce" required="required"  value="<?php echo $ayarlar->ayar_ilce?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_il">İL<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_il" name="ayar_il" required="required"  value="<?php echo $ayarlar->ayar_il?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_adres">Adres<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_adres" name="ayar_adres" required="required"  value="<?php echo $ayarlar->ayar_adres?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ayar_mesai">Mesai<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="ayar_mesai" name="ayar_mesai" required="required"  value="<?php echo $ayarlar->ayar_mesai?>">
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