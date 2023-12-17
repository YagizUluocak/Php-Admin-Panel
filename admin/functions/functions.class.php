<?php

 //----------LOGİN BAŞLANGIÇ----------
 class login extends Db
{
    public function giris($username, $password)
    {
        $query = "SELECT * FROM yonetici WHERE username=:username";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['username' => $username]);
 
        $user = $stmt->fetch();

        

        if ($user && isset($user->password) && password_verify($password, $user->password)) {
            return $user; // Kullanıcı doğrulandıysa kullanıcı bilgilerini döndür
        } else {
            return false; // Kullanıcı adı veya şifre hatalı
        }
    }
}

 //----------LOGİN SONU----------


//----------AYARLAR BAŞLANGIÇ----------
class ayar extends Db
{
    public function ayarGetir()
    {
        $query = "SELECT * FROM ayar where ayar_id=:id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['id'=>0]);
        return $stmt->fetch();

    }
    
    public function genelAyarGuncelle($ayar_title, $ayar_descr, $ayar_keywords, $ayar_auth)
    {
        $query = "UPDATE ayar SET 
        ayar_title=:ayar_title, 
        ayar_descr=:ayar_descr, 
        ayar_keywords=:ayar_keywords, 
        ayar_auth=:ayar_auth 
        WHERE ayar_id=0";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'ayar_title'=>$ayar_title, 
            'ayar_descr'=>$ayar_descr, 
            'ayar_keywords'=>$ayar_keywords, 
            'ayar_auth'=>$ayar_auth]);
    }
    public function iletisimAyarGuncelle($ayar_tel, $ayar_gsm, $ayar_fax, $ayar_mail, $ayar_ilce, $ayar_il, $ayar_adres, $ayar_mesai)
    {
        $query = "UPDATE ayar SET
        ayar_tel=:ayar_tel,
        ayar_gsm=:ayar_gsm,
        ayar_fax=:ayar_fax,
        ayar_mail=:ayar_mail,
        ayar_ilce=:ayar_ilce,
        ayar_il=:ayar_il,
        ayar_adres=:ayar_adres,
        ayar_mesai=:ayar_mesai
        WHERE ayar_id = 0";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'ayar_tel' => $ayar_tel,
            'ayar_gsm' => $ayar_gsm,
            'ayar_fax' => $ayar_fax,
            'ayar_mail'=> $ayar_mail,
            'ayar_ilce'=>$ayar_ilce,
            'ayar_il'=>$ayar_il,
            'ayar_adres'=>$ayar_adres,
            'ayar_mesai'=>$ayar_mesai]);
    }
    public function apıAyarGuncelle($ayar_maps, $ayar_analystic, $ayar_zopim)
    {
        $query = "UPDATE ayar SET
        ayar_maps=:ayar_maps,
        ayar_analystic=:ayar_analystic,
        ayar_zopim=:ayar_zopim
        WHERE ayar_id= 0";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'ayar_maps'=>$ayar_maps,
            'ayar_analystic'=>$ayar_analystic,
            'ayar_zopim'=>$ayar_zopim]);
    }
    public function sosyalAyarGuncelle($ayar_facebook, $ayar_twitter, $ayar_instagram, $ayar_google, $ayar_youtube)
    {
        $query = "UPDATE ayar SET
        ayar_facebook=:ayar_facebook,
        ayar_twitter=:ayar_twitter,
        ayar_instagram=:ayar_instagram,
        ayar_google=:ayar_google,
        ayar_youtube=:ayar_youtube
        WHERE ayar_id= 0";
        $stmt = $this->connect()->prepare(
            $query);
        return $stmt->execute([
            'ayar_facebook'=>$ayar_facebook,
            'ayar_twitter'=>$ayar_twitter,
            'ayar_instagram'=>$ayar_instagram,
            'ayar_google'=>$ayar_google,
            'ayar_youtube'=>$ayar_youtube
        
        ]);
    }
}
 //----------AYARLAR SONU----------


 //----------HAKKIMIZDA BAŞLANGIÇ----------
class hakkimizda extends Db
{
    
    //hakkimizda_id
    //hakkimizda_baslik
    //hakkimizda_icerik
    //hakkimizda_resim
    //hakkimizda_video
    //hakkimizda_vizyon
    //hakkimizda_misyon


    public function hakkimizdaGetir()
    {
        $query = "SELECT * FROM hakkimizda WHERE hakkimizda_id=:hakkimizda_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['hakkimizda_id' => 0]);
        return $stmt->fetch();
    }
    

        public function hakkimizdaGuncelle($baslik, $icerik, $resim, $video, $vizyon, $misyon)
    {
        $resimAdi = null;

        if (isset($_FILES['hakkimizda_resim']) && $_FILES['hakkimizda_resim']['error'] === UPLOAD_ERR_OK) {
            $resimAdi = $_FILES['hakkimizda_resim']['name'];
            $hedefKlasor = './images/hakkimizda/'; // Resimlerin yükleneceği klasörü belirleyin
            $hedefDosya = $hedefKlasor . $resimAdi;

            if (move_uploaded_file($_FILES['hakkimizda_resim']['tmp_name'], $hedefDosya)) {
                // Resim yükleme başarılı, yeni resim adını kaydet
                $resimAdi = $resimAdi;
            } else {
                // Resim yükleme başarısız
                echo "Resim yükleme başarısız!";
            }
        }

        // Resim adını veritabanına kaydetmek için kullanacağınız değeri belirledikten sonra güncelleme işlemi yapın
        $query = "UPDATE hakkimizda SET hakkimizda_baslik=:baslik, hakkimizda_icerik=:icerik";

        // Sadece resim seçildiyse resim alanını da güncelleme sorgusuna ekleyin
        if ($resimAdi) {
            $query .= ", hakkimizda_resim=:resim";
        }

        $query .= ", hakkimizda_video=:video, hakkimizda_vizyon=:vizyon, hakkimizda_misyon=:misyon";

        $stmt = $this->connect()->prepare($query);

        $params = [
            'baslik' => $baslik,
            'icerik' => $icerik,
            'video' => $video,
            'vizyon' => $vizyon,
            'misyon' => $misyon,
        ];

        // Eğer resim seçildiyse resim adını da parametrelere ekleyin
        if ($resimAdi) {
            $params['resim'] = $resimAdi;
        }

        return $stmt->execute($params);
    }


}
//----------HAKKIMIZDA SONU----------


//----------SLİDER BAŞLANGIÇ----------
class slider extends Db
{
    //$slider_id, 
    //$slider_ustbaslik, 
    //$slider_altbaslik, 
    //$slider_aciklama, 
    //$durum, 
    //$slider_resim

    public function sliderGetir()
    {
        $query = "SELECT * FROM slider";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function sliderIdGetir($slider_id)
    {
        $query = "SELECT * FROM slider WHERE slider_id=:slider_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['slider_id' => $slider_id]);
        return $stmt->fetch();
    }
    public function sliderDuzenle($slider_id, $slider_ustbaslik, $slider_altbaslik, $slider_aciklama, $durum, $slider_resim)
    {
        $resimAdi = null;

        if (isset($_FILES['slider_resim']) && $_FILES['slider_resim']['error'] === UPLOAD_ERR_OK) {
            $resimAdi = $_FILES['slider_resim']['name'];
            $hedefKlasor = './images/slider/'; // Resimlerin yükleneceği klasörü belirleyin
            $hedefDosya = $hedefKlasor . $resimAdi;

            if (move_uploaded_file($_FILES['slider_resim']['tmp_name'], $hedefDosya)) {
                // Resim yükleme başarılı, yeni resim adını kaydet
                $resimAdi = $resimAdi;
            } else {
                // Resim yükleme başarısız
                echo "Resim yükleme başarısız!";
            }
        }

        // Resim adını veritabanına kaydetmek için kullanacağınız değeri belirledikten sonra güncelleme işlemi yapın
        $query = "UPDATE slider SET slider_ustbaslik=:slider_ustbaslik, slider_altbaslik=:slider_altbaslik, slider_aciklama=:slider_aciklama, durum=:durum";

        // Sadece resim seçildiyse resim alanını da güncelleme sorgusuna ekleyin
        if ($resimAdi) {
            $query .= ", slider_resim=:slider_resim";
        }

        $query .= " WHERE slider_id=:slider_id";

        $stmt = $this->connect()->prepare($query);

        $params = [
            'slider_id' => $slider_id,
            'slider_ustbaslik' => $slider_ustbaslik,
            'slider_altbaslik' => $slider_altbaslik,
            'slider_aciklama' => $slider_aciklama,
            'durum' => $durum
        ];

        // Eğer resim seçildiyse resim adını da parametrelere ekleyin
        if ($resimAdi) {
            $params['slider_resim'] = $resimAdi;
        }
        if ($slider_aciklama !== null) {
            $params['slider_aciklama'] = $slider_aciklama;
        }
        
        if ($durum !== null) {
            $params['durum'] = $durum;
        }

        return $stmt->execute($params);
    }
    public function sliderEkle($slider_ustbaslik, $slider_altbaslik, $slider_aciklama, $durum, $slider_resim)
    {
        $query = "INSERT INTO slider(slider_ustbaslik,slider_altbaslik, slider_aciklama, durum, slider_resim) VALUES (:slider_ustbaslik, :slider_altbaslik, :slider_aciklama, :durum, :slider_resim)";
        $stmt = $this->connect()->prepare($query);
       return $stmt->execute([
            'slider_ustbaslik' => $slider_ustbaslik,
            'slider_altbaslik' => $slider_altbaslik,
            'slider_aciklama' => $slider_aciklama,
            'durum' => $durum,
            'slider_resim' => $slider_resim
        ]);
    }
    public function resimyukle(array $file)
    {
        if(isset($file))
        {
            $dest_path="./images/slider/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function sliderSil($slider_id)
    {
        $query = "DELETE FROM slider WHERE slider_id=:slider_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['slider_id' => $slider_id]);

        if($kontrol)
        {
            header("location:slider.php?sliderSil=ok");
        }
        else
        {
            header("location:slider.php?sliderSil=no");
        }
    }
}
//----------SLİDER SONU----------


//----------BLOG BAŞLANGIÇ----------
class blog extends Db
{

    //$blog_id, 
    //$blog_adi, 
    //$blog_icerik, 
    //$blog_descr, 
    //$blog_keywords, 
    //$onay, 
    //$blog_resim

    public function blogGetir()
    {
        $query = "SELECT * FROM blog";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function blogIdGetir($blog_id)
    {
        $query = "SELECT * FROM blog WHERE blog_id=:blog_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['blog_id' => $blog_id]);
        return $stmt->fetch();
    }
    public function blogEkle($blog_adi, $blog_icerik, $blog_descr, $blog_keywords, $onay, $blog_resim)
    {
        $query = "INSERT INTO blog(blog_adi, blog_icerik, blog_descr, blog_keywords, onay, blog_resim) VALUES(:blog_adi, :blog_icerik, :blog_descr, :blog_keywords, :onay, :blog_resim)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'blog_adi' => $blog_adi,
            'blog_icerik' => $blog_icerik,
            'blog_descr' => $blog_descr,
            'blog_keywords' => $blog_keywords,
            'onay' => $onay,
            'blog_resim' => $blog_resim
        ]);
    }
    public function blogresimyukle(array $file)
    {
        if(isset($file))
        {
            $dest_path="./images/blog/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }

    public function blogDuzenle($blog_id, $blog_adi, $blog_icerik, $blog_descr, $blog_keywords, $onay, $blog_resim)
    {
        $resimadi = null;

        if(isset($_FILES['blog_resim'])&& $_FILES['blog_resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES['blog_resim']['name'];
            $hedefKlasor = './images/blog/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['blog_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu!";
            }
        }

        $query = "UPDATE blog SET blog_adi=:blog_adi,blog_icerik=:blog_icerik, blog_descr=:blog_descr, blog_keywords=:blog_keywords, onay=:onay";

        if($resimadi)
        {
            $query .=", blog_resim=:blog_resim";
        }

        $query .= " WHERE blog_id=:blog_id";
        $stmt =$this->connect()->prepare($query);

        $params = [
            'blog_id'=> $blog_id,
            'blog_adi' => $blog_adi,
            'blog_icerik' => $blog_icerik,
            'blog_descr' => $blog_descr,
            'blog_keywords' => $blog_keywords,
            'onay' => $onay
        ];

        if($resimadi)
        {
            $params['blog_resim'] = $resimadi;
        }

      return $stmt->execute($params);
    }

    public function blogSil($blog_id)
    {
        $query = "DELETE FROM blog WHERE blog_id=:blog_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['blog_id' => $blog_id]);

        if($kontrol)
        {
            header("location:blog.php?blogSil=ok");
        }
        else
        {
            header("location:blog.php?blogSil=no");
        }

    }
}
//----------BLOG BİTİŞ----------

//----------HİZMETLER BAŞLANGIÇ----------
class hizmet extends Db
{
    //hizmet_id,
    //$hizmet_adi, 
    //$hizmet_icerik, 
    //$hizmet_durum, 
    //$hizmet_resim

    public function hizmetGetir()
    {
        $query = "SELECT * FROM hizmet";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function hizmetIdGetir($hizmet_id)
    {
        $query = "SELECT * FROM hizmet WHERE hizmet_id=:hizmet_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['hizmet_id'=>$hizmet_id]);
        return $stmt->fetch();
    }
    public function hizmetEkle($hizmet_adi, $hizmet_icerik, $hizmet_durum, $hizmet_resim)
    {
        $query = "INSERT INTO hizmet(hizmet_adi, hizmet_icerik, hizmet_durum, hizmet_resim) VALUES (:hizmet_adi, :hizmet_icerik, :hizmet_durum, :hizmet_resim)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'hizmet_adi' => $hizmet_adi,
            'hizmet_icerik' => $hizmet_icerik,
            'hizmet_durum' => $hizmet_durum,
            'hizmet_resim' => $hizmet_resim
        ]);
    }
    public function hizmetResimYukle(array $file)
    {
        if(isset($file))
        {
            $dest_path="./images/hizmet/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function hizmetDuzenle($hizmet_id, $hizmet_adi, $hizmet_icerik, $hizmet_durum, $hizmet_resim)
    {
        $resimadi = null;

        if(isset($_FILES['hizmet_resim'])&& $_FILES['hizmet_resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES['hizmet_resim']['name'];
            $hedefKlasor = './images/hizmet/';
            $hedefDosya = $hedefKlasor . $resimadi;

            if(move_uploaded_file($_FILES['hizmet_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarıısız Oldu.";
            }
        }
        $query = "UPDATE hizmet SET hizmet_adi=:hizmet_adi, hizmet_icerik=:hizmet_icerik, hizmet_durum=:hizmet_durum";
        if($resimadi)
        {
            $query .=", hizmet_resim=:hizmet_resim";
        }
        $query .= " WHERE hizmet_id=:hizmet_id";
        $stmt = $this->connect()->prepare($query);

        $params = [
            'hizmet_id' => $hizmet_id,
            'hizmet_adi' => $hizmet_adi,
            'hizmet_icerik' => $hizmet_icerik,
            'hizmet_durum' => $hizmet_durum,
        ];

        if($resimadi)
        {
            $params['hizmet_resim'] = $resimadi;
        }
        return $stmt->execute($params);
    }
    public function hizmetSil($hizmet_id)
    {
        $query = "DELETE FROM hizmet WHERE hizmet_id=:hizmet_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['hizmet_id' => $hizmet_id]);

        if($kontrol)
        {
            header("location:hizmet.php'hizmetSil=ok");
        }
        else
        {
            header("location:hizmet.php?hizmetSil=no");
        }
    }
}
//----------HİZMETLER BİTİŞ----------

//----------S.S.S BAŞLANGIÇ----------
    //s_id
    //soru_adi
    //soru_cevap
    //soru_durum
class soru extends Db
{
    public function soruGetir()
    {
        $query = "SELECT * FROM sorular";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function soruIdGetir($s_id)
    {
        $query = "SELECT * FROM sorular WHERE s_id=:s_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['s_id' => $s_id]);
        return $stmt->fetch();
    }
    public function soruekle($soru_adi, $soru_cevap, $soru_durum)
    {
        $query = "INSERT INTO sorular(soru_adi, soru_cevap, soru_durum) VALUES (:soru_adi, :soru_cevap, :soru_durum)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'soru_adi' => $soru_adi,
            'soru_cevap' => $soru_cevap,
            'soru_durum' => $soru_durum
        ]);
    }
    public function soruDuzenle($s_id, $soru_adi, $soru_cevap, $soru_durum)
    {
        $query = "UPDATE sorular SET soru_adi=:soru_adi, soru_cevap=:soru_cevap, soru_durum=:soru_durum WHERE s_id=:s_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            's_id' => $s_id,
            'soru_adi' => $soru_adi,
            'soru_cevap' => $soru_cevap,
            'soru_durum' => $soru_durum
        ]);
    }
    public function soruSil($s_id)
    {
        $query = "DELETE FROM sorular WHERE s_id=:s_id";
        $stmt =$this->connect()->prepare($query);
        $kontrol = $stmt->execute(['s_id' => $s_id]);

        if($kontrol)
        {
            header("location:soru.php?soruSil=ok");
        }
        else
        {
            header("location:soru.php?soruSil=no");
        }
    }
}
//----------S.S.S BİTİŞ----------

//----------TAKİM BAŞLANGIÇ----------
    //takim_id
    //kisi_adi
    //kisi_gorev
    //kisi_hakkinda
    //kisi_durum
    //kisi_resim
class takim extends Db
{
    public function takimGetir()
    {
        $query = "SELECT * FROM takim";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function takimIdGetir($takim_id)
    {
        $query = "SELECT * FROM takim WHERE takim_id=:takim_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['takim_id' => $takim_id]);
        return $stmt->fetch();
    }
    public function takimEkle($kisi_adi, $kisi_gorev, $kisi_hakkinda, $kisi_durum, $kisi_resim)
    {
        $query = "INSERT INTO takim(kisi_adi, kisi_gorev, kisi_hakkinda, kisi_durum, kisi_resim) VALUES (:kisi_adi, :kisi_gorev, :kisi_hakkinda, :kisi_durum, :kisi_resim)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'kisi_adi' => $kisi_adi,
            'kisi_gorev' => $kisi_gorev,
            'kisi_hakkinda' => $kisi_hakkinda,
            'kisi_durum' => $kisi_durum,
            'kisi_resim' => $kisi_resim
        ]);
    }
    public function takimResimYukle(array $file)
    {
        if(isset($file))
        {
            $dest_path="./images/takim/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function takimDuzenle($takim_id,$kisi_adi, $kisi_gorev, $kisi_hakkinda, $kisi_durum, $kisi_resim)
    {
        $resimadi = null;
        if(isset($_FILES['kisi_resim'])&& $_FILES['kisi_resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES['kisi_resim']['name'];
            $hedefKlasor = './images/takim/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['kisi_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu.";
            }
        }
        $query = "UPDATE takim SET kisi_adi=:kisi_adi, kisi_gorev=:kisi_gorev, kisi_hakkinda=:kisi_hakkinda, kisi_durum=:kisi_durum";

        if($resimadi)
        {
            $query .=", kisi_resim=:kisi_resim";
        }
        $query .= " WHERE takim_id=:takim_id";
        $stmt = $this->connect()->prepare($query);

        $params = [
            'takim_id' => $takim_id,
            'kisi_adi' => $kisi_adi,
            'kisi_gorev' => $kisi_gorev,
            'kisi_hakkinda' => $kisi_hakkinda,
            'kisi_durum' => $kisi_durum,
        ];
        if($resimadi)
        {
            $params['kisi_resim'] = $resimadi;
        }
        return $stmt->execute($params);
    }
    public function takimKisiSil($takim_id)
    {
        $query = "DELETE FROM takim WHERE takim_id=:takim_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['takim_id' => $takim_id]);
        if($kontrol)
        {
            header("location:takim.php?kisiSil=ok");
        }
        else
        {
            header("location:takim.php?kisiSil=no");
        }
    }
}
//----------TAKİM BİTİŞ----------

//----------REFERANS BAŞLANGIÇ----------
    //referans_id
    //referans_adi
    //referans_durum
    //referans_resim
class referans extends Db
{
    public function referansGetir()
    {
        $query = "SELECT * FROM referans";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function referansIdGetir($referans_id)
    {
        $query = "SELECT * FROM referans WHERE referans_id=:referans_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['referans_id' => $referans_id]);
        return $stmt->fetch();
    }
    public function referansEkle($referans_adi, $referans_durum, $referans_resim)
    {
        $query = "INSERT INTO referans(referans_adi, referans_durum, referans_resim) VALUES (:referans_adi, :referans_durum, :referans_resim)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'referans_adi' => $referans_adi,
            'referans_durum' => $referans_durum,
            'referans_resim' => $referans_resim
        ]);
    }
    public function referansResimEkle(array $file)
    {
        if(isset($_FILES))
        {
            $dest_path = "./images/referans/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function referansDuzenle($referans_id,$referans_adi, $referans_durum, $referans_resim)
    {
        $resimadi = null;
        if(isset($_FILES['referans_resim']) && $_FILES["referans_resim"]["error"] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES["referans_resim"]["name"];
            $hedefKlasor = './images/referans';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['referans_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu.";
            }
        }

        $query = "UPDATE referans SET referans_adi=:referans_adi, referans_durum=:referans_durum";

        if($resimadi)
        {
            $query .=", referans_resim=:referans_resim";
        }
        $query .= " WHERE referans_id=:referans_id";
        $stmt = $this->connect()->prepare($query);

        $params = [
            'referans_id' => $referans_id,
            'referans_adi' => $referans_adi,
            'referans_durum' => $referans_durum
        ];
        if($resimadi)
        {
            $params['referans_resim'] = $resimadi;
        }
        return $stmt->execute($params);
    }

    public function referansSil($referans_id)
    {
        $query = "DELETE FROM referans WHERE referans_id=:referans_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['referans_id' => $referans_id]);

        if($kontrol)
        {
            header("location:referans.php?referansSil=ok");
        }
        else
        {
            header("locattion:referans.php?referansSil=no");
        }
    }
}
//----------REFERANS BİTİŞ----------

//----------GALERİ BAŞLANGIÇ----------
    //resim_id
    //resim_baslik
    //resim_durum
    //resim

class galeri extends Db
{
    public function galeriGetir()
    {
        $query = "SELECT * FROM galeri";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function galeriIdGetir($resim_id)
    {
        $query = "SELECT * FROM galeri WHERE resim_id=:resim_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['resim_id' => $resim_id]);
        return $stmt->fetch();
    }
    public function galeriEkle($resim_baslik, $resim_durum, $resim)
    {
        $query = "INSERT INTO galeri(resim_baslik, resim_durum, resim) VALUES (:resim_baslik, :resim_durum, :resim)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'resim_baslik' => $resim_baslik,
            'resim_durum' => $resim_durum,
            'resim' => $resim
        ]);
    }
    public function galeriResimEkle(array $file)
    {
        if(isset($_FILES))
        {
            $dest_path = "./images/galeri/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function galeriDuzenle($resim_id, $resim_baslik,$resim_durum, $resim)
    {
        $resimadi = null;

        if(isset($_FILES['resim']) && $_FILES['resim']['error'] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES["resim"]["name"];
            $hedefKlasor = './images/galeri/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu.";
            }
        }

        $query = "UPDATE galeri SET resim_baslik=:resim_baslik, resim_durum=:resim_durum";

        if($resimadi)
        {
            $query .=", resim=:resim";
        }
        $query .=" WHERE resim_id=:resim_id";
        $stmt = $this->connect()->prepare($query);

         $params = [
            'resim_id' => $resim_id,
            'resim_baslik' => $resim_baslik,
            'resim_durum' => $resim_durum
        ];
        if($resimadi)
        {
            $params['resim'] = $resimadi;
        }
        return $stmt->execute($params);       
    }

    public function galeriResimSil($resim_id)
    {
        $query = "DELETE FROM galeri WHERE resim_id=:resim_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['resim_id' => $resim_id]);

        if($kontrol)
        {
            header("location:galeri.php?resimSil=ok");
        }
        else
        {
            header("location:galeri.php?resimSil=no");
        }
    }
}
//----------GALERİ BİTİŞ----------


//----------MENÜ BAŞLANGIÇ----------
class menu extends Db
{
    public function menuGetir()
    {
        $query = "SELECT * FROM menu";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function menuIdGetir($menu_id)
    {
        $query = "SELECT * FROM menu WHERE menu_id=:menu_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['menu_id' => $menu_id]);
        return $stmt->fetch();
    }
    public function menuEkle($menu_ust, $menu_ad, $menu_url, $menu_sira, $menu_durum, $sayfa_id)
    {
        $query = "INSERT INTO menu(menu_ust, menu_ad, menu_url, menu_sira, menu_durum, sayfa_id) VALUES (:menu_ust, :menu_ad, :menu_url, :menu_sira, :menu_durum, :sayfa_id)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'menu_ust' => $menu_ust,
            'menu_ad' => $menu_ad,
            'menu_url' => $menu_url,
            'menu_sira' => $menu_sira,
            'menu_durum' => $menu_durum,   
            'sayfa_id' => $sayfa_id
        ]);
    }
    public function menuDuzenle($menu_id, $menu_ust, $menu_ad, $menu_url, $menu_sira, $menu_durum)
    {
        $query = "UPDATE menu SET menu_ust=:menu_ust, menu_ad=:menu_ad, menu_url=:menu_url, menu_sira=:menu_sira, menu_durum=:menu_durum, WHERE menu_id=:menu_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'menu_id' => $menu_id,
            'menu_ust' => $menu_ust,
            'menu_ad' => $menu_ad,
            'menu_url' => $menu_url,
            'menu_sira' => $menu_sira,
            'menu_durum' => $menu_durum     
        ]);
    }
    public function menuSil($menu_id)
    {
        $query = "DELETE FROM menu WHERE menu_id=:menu_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['menu_id' => $menu_id]);

        if($kontrol)
        {
            header("location:menu.php?menuSil=ok");
        }
        else
        {
            header("locattion:menu.php?menuSil=no");
        }
    }

}
//----------MENÜ BİTİŞ----------


//----------YÖNETİCİ BAŞLANGIÇ----------
class yonetici extends Db
{
    public function yoneticiListele()
    {
        $query = "SELECT * FROM yonetici";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function yoneticiIdGetir($yonetici_id)
    {
        $query = "SELECT * FROM yonetici WHERE yonetici_id=:yonetici_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['yonetici_id' => $yonetici_id]);
        return $stmt->fetch();
    }
    public function yoneticiEkle($yonetici_adi, $yonetici_soyadi, $username, $password, $kullanici_mail)
    {
        if ($this->kullaniciAdiKontrolEt($username)) {
            return "Bu kullanıcı adı daha önce kullanılmıştır.";
        }
        $query = "INSERT INTO yonetici(yonetici_adi, yonetici_soyadi, username, password, kullanici_mail) VALUES (:yonetici_adi, :yonetici_soyadi, :username, :password, :kullanici_mail)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'yonetici_adi' => $yonetici_adi,
            'yonetici_soyadi' => $yonetici_soyadi,
            'username' => $username,
            'password' => $password,
            'kullanici_mail' => $kullanici_mail
        ]);
    }
    public function yoneticiDuzenle($yonetici_id,$yonetici_adi, $yonetici_soyadi, $username, $password, $kullanici_mail)
    {
        $query = "UPDATE yonetici SET yonetici_adi=:yonetici_adi, yonetici_soyadi=:yonetici_soyadi, username=:username, password=:password, kullanici_mail=:kullanici_mail WHERE yonetici_id=:yonetici_id";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'yonetici_id' => $yonetici_id,
            'yonetici_adi' => $yonetici_adi,
            'yonetici_soyadi' => $yonetici_soyadi,
            'username' => $username,
            'password' => $password,
            'kullanici_mail' => $kullanici_mail
        ]);
    }
    public function yoneticiSil($yonetici_id)
    {
        $query = "DELETE FROM yonetici WHERE yonetici_id=:yonetici_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['yonetici_id' => $yonetici_id]);

        if($kontrol)
        {
            header("location:yonetici.php?yoneticiSil=ok");
        }
        else
        {
            header("locattion:yonetici.php?yoneticiSil=no");
        }
    }
    public function kullaniciAdiKontrolEt($username)
    {
        $query = "SELECT * FROM yonetici WHERE username = :username";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();

        if ($result) {
            // Kullanıcı adı daha önce kullanılmış
            return true;
        } else {
            // Kullanıcı adı kullanılabilir
            return false;
        }
    }
}

class yonetim extends Db
{
    public function girisYap($username, $password)
    {
        $query = "SELECT * FROM yonetici WHERE username=:username AND password=:password";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            'username' => $username,
            'password' => $password
        ]);
        $result = $stmt->fetch();

        if ($result) {
            // Kullanıcı adı daha önce kullanılmış
            return true;
        } else {
            // Kullanıcı adı kullanılabilir
            return false;
        }
    }
}
//----------YÖNETİCİ BİTİŞ----------


//----------SAYFA BAŞLANGIÇ----------
class sayfa extends Db
{
    public function sayfaGetir()
    {
        $query = "SELECT * FROM sayfa";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function sayfaIdGetir($sayfa_id)
    {
        $query = "SELECT * FROM sayfa WHERE sayfa_id=:sayfa_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute(['sayfa_id' => $sayfa_id]);
        return $stmt->fetch();
    }
   

    public function sayfaResimEkle(array $file)
    {
        if(isset($_FILES))
        {
            $dest_path = "./images/sayfa/";
            $filename = $file["name"];
            $fileSourcePath = $file["tmp_name"];
            $fileDestPath = $dest_path.$filename;

            move_uploaded_file($fileSourcePath, $fileDestPath);
        }
    }
    public function sayfaDuzenle($sayfa_id,$baslik, $sayfa_url, $sayfa_resim, $sayfa_icerik, $sayfa_keywords, $sayfa_descr, $sayfa_durum)
    {
        $resimadi = null;
        if(isset($_FILES['sayfa_resim']) && $_FILES["sayfa_resim"]["error"] === UPLOAD_ERR_OK)
        {
            $resimadi = $_FILES["sayfa_resim"]["name"];
            $hedefKlasor = './images/sayfa/';
            $hedefDosya = $hedefKlasor.$resimadi;

            if(move_uploaded_file($_FILES['sayfa_resim']['tmp_name'], $hedefDosya))
            {
                $resimadi = $resimadi;
            }
            else
            {
                echo "Resim Yükleme İşlemi Başarısız Oldu.";
            }
        }

        $query = "UPDATE sayfa SET baslik=:baslik, sayfa_url=:sayfa_url";

        if($resimadi)
        {
            $query .=", sayfa_resim=:sayfa_resim";
        }
        $query .= ", sayfa_icerik=:sayfa_icerik, sayfa_keywords=:sayfa_keywords, sayfa_descr=:sayfa_descr, sayfa_durum=:sayfa_durum";

        $query .= " WHERE sayfa_id=:sayfa_id";
        $stmt = $this->connect()->prepare($query);

        $params = [
            'sayfa_id' => $sayfa_id,
            'baslik' => $baslik,
            'sayfa_url' => $sayfa_url,
            'sayfa_icerik' => $sayfa_icerik,
            'sayfa_keywords' => $sayfa_keywords,
            'sayfa_descr' => $sayfa_descr,
            'sayfa_durum' => $sayfa_durum
        ];
        if($resimadi)
        {
            $params['sayfa_resim'] = $resimadi;
        }
        return $stmt->execute($params);
    }
    public function sayfaSil($sayfa_id)
    {
        $query = "DELETE FROM sayfa WHERE sayfa_id=:sayfa_id";
        $stmt = $this->connect()->prepare($query);
        return $kontrol = $stmt->execute(['sayfa_id' => $sayfa_id]);

        if($kontrol)
        {
            header("location:sayfa.php?sayfaSil=ok");
        }
        else
        {
            header("locattion:sayfa.php?sayfaSil=no");
        }
    }
 
    public function sayfaEkle($baslik, $sayfa_url, $sayfa_resim, $sayfa_icerik, $sayfa_keywords, $sayfa_descr, $sayfa_durum)
    {  
         function sefseo($string) 
        {
            // Türkçe karakterleri değiştir
            $string = str_replace(
                array('Ç', 'ç', 'Ğ', 'ğ', 'ı', 'İ', 'Ö', 'ö', 'Ş', 'ş', 'Ü', 'ü'),
                array('C', 'c', 'G', 'g', 'i', 'I', 'O', 'o', 'S', 's', 'U', 'u'),
                $string
            );
        
            // Boşlukları tireye dönüştür
            $string = preg_replace('/\s+/', '-', $string);
        
            // Diğer özel karakterleri kaldır
            $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        
            // Birden fazla tireyi tek tireye indirge
            $string = preg_replace('/-+/', '-', $string);
        
            // Başta ve sonda kalan tireleri kaldır
            $string = trim($string, '-');
        
            // Küçük harfe dönüştür
            $string = strtolower($string);
        
            return $string;
        }
        // sayfa_url'yi sefseo ile dönüştürme
        $sayfa_url_sef = sefseo($sayfa_url);

        $query = "INSERT INTO sayfa(baslik, sayfa_url, sayfa_resim, sayfa_icerik, sayfa_keywords, sayfa_descr, sayfa_durum) VALUES (:baslik, :sayfa_url, :sayfa_resim, :sayfa_icerik, :sayfa_keywords, :sayfa_descr, :sayfa_durum)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            'baslik' => $baslik,
            'sayfa_url' => $sayfa_url_sef, // sefseo ile dönüştürülmüş sayfa_url
            'sayfa_resim' => $sayfa_resim,
            'sayfa_icerik' => $sayfa_icerik,
            'sayfa_keywords' => $sayfa_keywords,
            'sayfa_descr' => $sayfa_descr,
            'sayfa_durum' => $sayfa_durum
        ]);
    }
    
}
//----------SAYFA BİTİŞ----------

?>
