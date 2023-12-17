
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";
$menu = new menu();
$sayfa = new sayfa();
if(isset($_POST["submit"]))
{
  $menu = new menu();

  $menu_ust = $_POST["menu_ust"];
  $menu_ad = $_POST["menu_ad"];
  $menu_url = $_POST["menu_url"];
  $menu_sira = $_POST["menu_sira"];
  $menu_durum = $_POST["menu_durum"];
  $sayfa_id = $_POST["sayfa_id"];

  
  if($menu->menuEkle($menu_ust, $menu_ad, $menu_url, $menu_sira, $menu_durum, $sayfa_id))
    {
     
        echo "<script>window.location.href='menu.php';</script>";
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
            <h3>Menü Ekleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menü Ekle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_ad">Menü Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="menu_ad" name="menu_ad" required="required">
                        </div>
                    </div>

              

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_id">Url Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="sayfa_id" id="sayfa_id">
                              <?php
                                foreach($sayfa->sayfaGetir() as $syf)
                                {
                                  ?>
                                  <option value="<?php echo $syf->sayfa_id?>"><?php echo $syf->sayfa_url?></option>
                                  <?php
                                }
                              ?>        
                          </select>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_ust">Üst menü<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="menu_ust" id="menu_ust">
                          <option value="ÜST BAŞLIK">ÜST BAŞLIK</option>
                            <?php
                            foreach($menu->menuGetir() as $mnu)
                            {
                              ?>               
                              <option value="<?php echo $mnu->menu_id?>"><?php echo $mnu->menu_ad?></option>
                              <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_durum">DURUM<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="menu_durum" name="menu_durum" required="required">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_sira">Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="menu_sira" name="menu_sira" required="required">
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