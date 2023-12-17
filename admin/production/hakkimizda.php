
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";



$hakkimizda = new hakkimizda();
$hakkimizda = $hakkimizda->hakkimizdaGetir();

if(isset($_POST["submit"]))
{
  $baslik = $_POST["hakkimizda_baslik"];
  $icerik = $_POST["hakkimizda_icerik"];
  $resim = $_FILES["hakkimizda_resim"]["name"];
  $video = $_POST["hakkimizda_video"];
  $vizyon = $_POST["hakkimizda_vizyon"];
  $misyon = $_POST["hakkimizda_misyon"];

  $hakkimizda = new hakkimizda();

  if($hakkimizda->hakkimizdaGuncelle($baslik, $icerik, $resim, $video, $vizyon, $misyon))
    {
        
        echo "<script>window.location.href='hakkimizda.php?durum=ok';</script>";
    }
    else
    {
        
        echo "<script>window.location.href='hakkimizda.php?durum=no';</script>";
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
            <h3>Hakkımızda Ayarları</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hakkımızda Ayarları
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <img  src="./images/hakkimizda/<?php echo $hakkimizda->hakkimizda_resim?>" class="img-fluid" style="width:150px;" alt="">
                          <input type="file" name="hakkimizda_resim" id="hakkimizda_resim" class="form-control col-md-7 col-xs-12" value="<?php echo $hakkimizda->hakkimizda_resim?>">
                         
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_baslik">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hakkimizda_baslik" name="hakkimizda_baslik" required="required"  value="<?php echo $hakkimizda->hakkimizda_baslik?>">
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_icerik">İçerik<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="hakkimizda_icerik" class="form-control col-md-7 col-xs-12" name="hakkimizda_icerik" >
                          <?php echo $hakkimizda->hakkimizda_icerik?>
                          </textarea>
                        </div>
                      </div>

                      <script>
                        ClassicEditor
                          .create( document.querySelector( '#hakkimizda_icerik' ) )
                          .then( editor => {
                            console.log( editor );
                            editor.ui.view.editable.element.style.height = '300px';
                            } )
                            .catch( error => {
                              console.error( error );
                            } );
                        </script>





                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_video">Video Kodu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hakkimizda_video" name="hakkimizda_video" required="required"  value="<?php echo $hakkimizda->hakkimizda_video?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_vizyon">Vizyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hakkimizda_vizyon" name="hakkimizda_vizyon" required="required"  value="<?php echo $hakkimizda->hakkimizda_vizyon?>">
                        </div>
                      </div>

                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hakkimizda_misyon">Misyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="hakkimizda_misyon" name="hakkimizda_misyon" required="required"  value="<?php echo $hakkimizda->hakkimizda_misyon?>">
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