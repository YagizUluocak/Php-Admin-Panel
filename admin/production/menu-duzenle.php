
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";


$menu_id = $_GET["menu_id"];
$menu = new menu();
$menuler = $menu->menuIdGetir($_GET["menu_id"]);

if(isset($_POST["submit"]))
{
  $menu_adi = $_POST["menu_adi"];
  $statu = $_POST["statu"];
  $link = $_POST["link"];

  $menuler = new menu();
  
  if($menuler->menuDuzenle($menu_id, $menu_adi, $statu, $link))
    {
     
        echo "<script>window.location.href='menu-duzenle.php?durum=ok&menu_id=$menu_id';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='menu-duzenle?durum=no&menu_id=$menu_id';</script>";
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
            <h3>Menü Düzenleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menü Düzenle
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
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="menu_adi">Menü Adı<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" id="menu_adi" name="menu_adi" required="required"  value="<?php echo $menuler->menu_adi?>">
                          </div>
                      </div>
                 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="link" name="link" required="required" value="<?php echo $menuler->link?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="statu">statu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="statu" id="statu">
                        <option value="ÜST BAŞLIK">ÜST BAŞLIK</option>
                            <?php
                            foreach($menu->menuGetir() as $mnu)
                            {
                              ?>               
                              <option value="<?php echo $mnu->menu_adi?>" 
                              <?php 
                              if($mnu->menu_adi == $menuler->statu)
                              {
                                echo 'selected';
                              }
                              else
                              {
                               echo '';
                              }
                              ?>>
                                <?php echo $mnu->menu_adi?>
                              </option>
                              <?php
                            }
                            ?>
                          </select>
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