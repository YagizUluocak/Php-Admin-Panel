
<?php
require_once('../functions/db.class.php');
include "../functions/functions.class.php";
include "../production/inc/_header.php";

?>  

<?php
$galeri = new galeri();

if(isset($_GET['islem']) && $_GET['islem'] === 'sil' && isset($_GET['resim_id']))
{
  $resim_id = $_GET['resim_id'];

  $silme_sonuc = $galeri->galeriResimSil($resim_id);
  
  if($silme_sonuc)
  {
    echo "<script>window.location.href='galeri.php?resimSil=ok';</script>";
    exit;
  }
  else
  {
    echo "<script>window.location.href='galeri.php?resimSil=no';</script>";
    exit;
  }
}
?>
     
     
<!-- page content -->
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Resim Galeri<small>, resim işlemleri</small> </h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>RESİMLER</h2>
                    <a href="galeri-ekle.php" class="btn btn-primary" style="float:right; margin-top:6px;">Yeni Ekle <i class="fa fa-plus"></i></a>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">

                    <div class="row">

                      <p>Resim Öğeleri</p>

                      <?php
                      if($galeri->galeriGetir())
                      {
                        ?>
                        <?php
                        foreach($galeri->galeriGetir() as $glr)
                        {
                          ?>
                          <div class="col-md-55">
                            <div class="thumbnail">
                              <div class="image view view-first">
                                <img class="img-fluid" style="width: 100%; height:100%; display: block;"  src="./images/galeri/<?php echo $glr->resim ?>" alt="image" />
                                <div class="mask">
                                  <p><?php echo $glr->resim_baslik ?> </p>
                                  <div class="tools tools-bottom">
                                    <a href="galeri-duzenle.php?resim_id=<?php echo $glr->resim_id ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="galeri.php?resim_id=<?php echo $glr->resim_id ?>&islem=sil"><i class="fa fa-times"></i></a>
                                  </div>
                                </div>
                              </div>
                              <div class="caption">
                                <p><?php echo $glr->resim_baslik ?></p>
                              </div>
                            </div>
                          </div>
                          <?php
                        }
                        ?>
                          
                        <?php                 
                      }
                      ?>
                      

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
<!-- /page content -->
<?php
include "../production/inc/_footer.php";
?>