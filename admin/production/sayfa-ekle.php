
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

if(isset($_POST["submit"]))
{
  $sayfa = new sayfa();

  $baslik = $_POST["baslik"];
  $sayfa_url = $_POST["sayfa_url"];
  $sayfa_icerik = $_POST["sayfa_icerik"];
  $sayfa_keywords = $_POST["sayfa_keywords"];
  $sayfa_descr = $_POST["sayfa_descr"];
  $sayfa_durum = $_POST["sayfa_durum"];

  $sayfa->sayfaResimEkle($_FILES["sayfa_resim"]);
  $sayfa_resim = $_FILES["sayfa_resim"]["name"];


  if($sayfa->sayfaEkle($baslik, $sayfa_url, $sayfa_resim, $sayfa_icerik, $sayfa_keywords, $sayfa_descr, $sayfa_durum))
    {
     
        echo "<script>window.location.href='sayfa.php';</script>";
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
            <h3>Sayfa Ekleme Sayfası</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Sayfa Ekle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="sayfa_resim" id="sayfa_resim" class="form-control col-md-7 col-xs-12">    
                        </div>
                      </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="baslik">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="baslik" name="baslik" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_url">Sayfa Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="sayfa_url" name="sayfa_url" required="required">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_icerik">İçerik<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="sayfa_icerik" class="form-control col-md-7 col-xs-12" name="sayfa_icerik" >
                          
                          </textarea>
                        </div>
                      </div>

                      <script>
                        ClassicEditor
                          .create( document.querySelector( '#sayfa_icerik' ) )
                          .then( editor => {
                            console.log( editor );
                            editor.ui.view.editable.element.style.height = '300px';
                            } )
                            .catch( error => {
                              console.error( error );
                            } );
                        </script>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_keywords">Sayfa Keywords<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="sayfa_keywords" name="sayfa_keywords" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_descr">Sayfa Description<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="sayfa_descr" name="sayfa_descr" required="required">
                        </div>
                    </div>
                   
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sayfa_durum">Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="sayfa_durum" name="sayfa_durum" required="required">
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