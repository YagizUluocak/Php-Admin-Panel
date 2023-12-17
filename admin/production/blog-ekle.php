
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

if(isset($_POST["submit"]))
{
  $blog = new blog();

  $blog_adi = $_POST["blog_adi"];
  $blog_icerik = $_POST["blog_icerik"];
  $blog_descr = $_POST["blog_descr"];
  $blog_keywords = $_POST["blog_keywords"];
  $onay = $_POST["onay"];

  $blog->blogresimyukle($_FILES["blog_resim"]);
  $blog_resim = $_FILES["blog_resim"]["name"];

  
  
  if($blog->blogEkle($blog_adi, $blog_icerik, $blog_descr, $blog_keywords, $onay, $blog_resim))
    {
     
        echo "<script>window.location.href='blog.php';</script>";
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
            <h3>Blog</h3>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Blog Ekle
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_adi">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="blog_adi" name="blog_adi" required="required">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_icerik">Açıklama<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="blog_icerik" class="form-control col-md-7 col-xs-12" name="blog_icerik"></textarea>
                        </div>
                      </div>
                      
                        <!--CDN SCRİPT START -->
                          <script>
                            ClassicEditor
                              .create( document.querySelector( '#blog_icerik' ) )
                              .then( editor => {
                                console.log( editor );
                                editor.ui.view.editable.element.style.height = '300px';
                                } )
                                .catch( error => {
                                  console.error( error );
                                } );
                          </script>
                        <!--CDN SCRİPT END -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_resim">Resim</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="blog_resim" id="blog_resim" class="form-control col-md-7 col-xs-12">
                         
                        </div>
                      </div>
           
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="onay">durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="onay" name="onay" required="required">
                        </div>
                      </div>


                      <div class="col-md-12 col-sm-12 col-xs-12">
                            
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="slider_ustbaslik"><span class="required"></span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <h3>Meta Alanları</h3>
                        </div>
                      </div>
                          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_descr">Description<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea  class="form-control col-md-7 col-xs-12" name="blog_descr"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_keywords">Keywords<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" id="blog_keywords" name="blog_keywords" required="required">
                        </div>
                      </div>
  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="right"  class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="submit" name="submit" >Kaydet</button>
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