
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";
$yonetici = new yonetici();
$username = "";
$k_adi_kntrl=true;

//k_adi_kntrl = aynı kullanıcı adı kayıtlı mı sorgusu için kullanıldı.

if(isset($_POST["submit"]))
{
  $yonetici = new yonetici();

  $yonetici_adi = $_POST["yonetici_adi"];
  $yonetici_soyadi = $_POST["yonetici_soyadi"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $kullanici_mail = $_POST["kullanici_mail"]; 
  
  if($yonetici->kullaniciAdiKontrolEt($username)) 
  {
    $k_adi_kntrl=false;
  }
  else if($yonetici->yoneticiEkle($yonetici_adi, $yonetici_soyadi, $username, $password, $kullanici_mail))
  {  
    echo "<script>window.location.href='yonetici.php';</script>";
  }
}
?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Yönetici Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Yönetici Ekle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yonetici_adi">Yönetici Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="yonetici_adi" name="yonetici_adi" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="yonetici_soyadi">Yönetici Soyadı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="yonetici_soyadi" name="yonetici_soyadi" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">Kullanıcı Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="username" name="username" required="required" >
                          <?php
                          if($k_adi_kntrl == false) 
                          {
                            ?>
                            <span class="label label-danger">Kullanıcı Adı Daha önceden Alınmış.</span>
                            <?php
                          }
                        ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Şifre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="password" id="password" name="password" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kullanici_mail">Mail<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="mail" id="kullanici_mail" name="kullanici_mail">
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