<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyDoI-E830UnZhFQHQzuut4kx8niDz6K0FY' );
$registrationIds = array( $_GET['id'] );
// prep the bundle
$msg = array
(
	'message' 	=> 'here is a message. message',
	'title'		=> 'This is a title. title',
	'subtitle'	=> 'This is a subtitle. subtitle',
	'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'largeIcon'	=> 'large_icon',
	'smallIcon'	=> 'small_icon'
);
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;
?>

<script src="https://www.gstatic.com/firebasejs/4.6.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCm46I8WR2PGIbl-m3QvgOrEpZ_2Dch8dg",
    authDomain: "tempayan-verifikator.firebaseapp.com",
    databaseURL: "https://tempayan-verifikator.firebaseio.com",
    projectId: "tempayan-verifikator",
    storageBucket: "tempayan-verifikator.appspot.com",
    messagingSenderId: "526893705541"
  };
  firebase.initializeApp(config);
</script>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:inline-block;height:300px;width:120px;"
     data-ad-client="ca-pub-5960857306045367"
     data-ad-slot="9516640137"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-5960857306045367",
    enable_page_level_ads: true
  });
</script>
Leebong Island Destinasi Liburan dengan Dua Sensasi
<!--  -->
Bagi anda yang  ingin menikmati liburan suasana pantai sekaligus hutan yang rimbun,  Leebong island dapat menjadi alternatif destinasi pilihan liburan anda. 
Leboong Island terletak di desa Lasar, kecamatan Membalong, Belitung. Meski namanya pulau, akses kesana tidaklah sulit, dari pusat kota Tanjungpandan perjalanan menuju Leebong Island hanya membutuhkan waktu sekitar 50 menit.
Sebelum menyebrang ke Leebong Island, perjalanan dimulai menuju Pelabuhan Tanjung Ruu, kondisi jalan yang beraspal dibutuhkan waktu sekitar 30  menit dari pusat kota Tanjungpandan untuk  tiba di pelabuhan yang terletak di desa pegantungan ini. 

Sepanjang perjalanan menuju pelabuhan Tanjung Ruu kita  akan menikmati hamparan pohon kelapa, melewati pelabuhan besar Tanjung Batu, dan melewati desa-desa yang menjadi permukiman penduduk.  
Tiba di Pelabuhan Tanjung Ruu  anda akan langsung disambut jejeran perahu bersandar  yang siap mengantarkan anda ke Leebong Island. Saat ini ada sekitar delapan perahu  yang dipergunakan untuk mengangkut wisatawan menuju Leebong Island. 
Untuk tiba di Leebong Island kita harus menyewa perahu  yang mirip dengan perahu nelayan ini sebesar Rp 300.000 untuk pulang dan pergi. Perahu  ini bisa menampung sekitar 10-13 orang wisatawan. 
Perjalanan Pos Belitung bersama Asosiasi Pelaku Pariwisata Indonesia (ASPPI)  menuju Leebong Island,  menumpang perahu  Pak Ateng, salah satu nelayan yang dua tahun belakangan ini memilih beralih profesi dari nelayan menjadi pengantar wisatawan dari Pelabuhan Tanjung Ruu Menuju Leebong Island. 
"Dulunya nelayan, sekarang nganter tamu lah. Kadang kalau lagi ramai  satu hari dua kali balik nganter tamu, tapi kalau sepi sekali, penghasilan juga lumayan sekitar Rp tiga juta/bulan," kata Ateng saat ditanyai Pos Belitung. 

Lelaki Kelahiran 1977 itu, merupakan warga asal pulau rengit, mengajak rombongan kami berkeliling dan menyusuri peraiaran menuju pulau Leebong. 
Untuk tiba menuju ke pulau yang diimpikan menjadi mildive nya Belitung dibutuhkan waktu yang relatif singkat  sekitar waktu 20 menit,  namun hari itu kami memilih untuk berputar mengelilingi keindahan lautan pantai Barat Belitung, mengelilingi pulau pasir dan sekitarnya.  
Kombinasi laut biru yang jernih dan bersih, tampak serasi dengan puluhan ribu mangrove yang membentang disepanjang perairan. Menariknya, kita juga akan menyusuri lorong mangrove yang sempit, yang hanya bisa dilalui satu perahu. Dari situ kita bisa menikmati keindahan alam yang begitu eksotis. 
Hamparan mangrove indah yang menawan membentuk kerumunan. Membuat mata tak mampu berpaling dan ingin mengabadikan berbagai keindahan alam nan cantik itu. Diperjalanan menuju Leebong kita juga melewati pulau Rengit, pulau Pasir dan pulau Bintang. 
Biasanya wisatawan yang akan berkunjung ke Pulau Leebong, memilih singgah sebentar untuk mengabadikan beberapa moment di Pulau Pasir. Sama halnya dengan kami hari itu yang memilih berhenti untuk menikmati keindahan pulau pasir. 

Rombongan kami tiba di dermaga pulau Leebong sekitar pukul 11.00 WIB, perahu memilih bersandar di dermaga yang didepannya sudah terbentang jembatan kayu dan bangunan kayu. Dari kejauhan sudah terlihat kemewahan leebong island, tenda-tenda berjejer terbentang menghadap ke laut. 
Leebong dikelilingi hamparan pasir putih yang indah, memiliki hutan alami yang ditumbuhi berbagai pohon, tak jarang kita bisa menemukan burung lokal di Pulau ini. Rancangan bangunan pantai yang memadukan arsitektur tradisional dan modern, yang  terbuat dari kayu-kayu lokal dan atap alang-alang yang berpadu dengan lingkungan.
Cuaca di Pulau Leebong terbilang bersahabat dan tenang dengan ombak yang hampir tak ada. Sehingga ini menjadi pilihan yang aman bagi anda yang menyukai water sport. 
Pulau seluas 37 hektar siap memanjakan para wisatawan dengan berbagai  fasilitas mewah seperti wifi, water sport seperti kayak, cano,  banana boads, snorkling, diving. Bagi anda yang ingin memacu adrenalin, jet ski juga tersedia untuk menemani anda berkeliling di pulau-pulau terdekat.  
Tak hanya itu fasilitas olahraga seperti tenis meja, lapangan futsal dan golf alam juga tersedia di pulau yang dikelola oleh PT Leebong Okta Samasta. 
Fasilitas lain yang ditawarkan dari pulau yang mulai beroperasi sejak tahun 2015 silam ini ada rumah pohon, gazebo kayu, dan toilet bak hotel berbintang, restoran, cottage, dan lainnya. Semua bangunan ini terbuat daru kayu yang memiliki pemandangan yang berbeda. 
Setiap titik pulau ini memiliki latar yang begitu alami, bagi anda yang gemar berselfie tempat ini wajib anda kunjungi. Bagi anda yang kebetulan berkunjung pada pagi dan sore hari, anda  bisa menikmati sunset maupun sunrise dipulau ini. 
Bagi anda yang ingin bermalam di pulau ini, anda dapat menyewa cottage berlantai dua yang terbuat dari kayu. Biaya sewa dibandrol Rp. 4,8 juta permalam yang dilengkapi dengan berbagai fasilitas seperti rumah pada umumnya. 
Jika anda datang bersama rombongan, anda dapat menyewa barak atau tenda yang mampu menampung 30 orang untuk ukuran besar, dan 15 orang untuk ukuran sedang yang dilengkapi dengan fasilitas listrik, air bersih dan kelambu. 



Pulau yang terkenal dengan keindahan dan kebersihan ini  masih dalam proses penyempurnaan, namun pesonanya sudah mampu menarik wisatawan sekitar 500-900 orang pertahunnya.   
Aktivitas lain yang bisa dilakukan di Leebong Island ialah memancing, mukat ikan, dan juga nyulo mencari/menangkap udang menggunakan lampu dan perangkap udang di sepanjang pantai Leebong. Bahkan managemen juga menyediakan peralatan tradisional untuk menangkap ikan seperti Ambong dan Tangguk. 
Bagi anda yang suka berpetualang di hutan, Leebong Island juga menyediakan tracking hutan yang suasananya masih sangat hijau bak hutan sungguhan. Hutan yang ditumbuhi berbagai pohon seperti simpur, bakau, seru dan lainnya. Untuk kenyamanan pengunjung pengelola kerap melakukan fogging. 
Kita bisa berkeliling hutan menggunakan sepeda atau berjalan kaki. Menikmati suara burung-burung ataupun bercengkrama dengan alam nan indah. Perjalanan mengeliling hutan ini akan memberikan kejutan bagi anda.  Tepat dipenghujung hutan  kita  akan menemukan pantai Gusong 3 atau pantai sikas, yang menyajikan pemandangan tak kalah menariknya.
Di Pantai Sikas kita beristirahat di Gazebo Laut sembari menikamati deburan air dan hamparan magrove. Anda juga bisa menyaksikan keindahan laut dari pinggir pantai, sudah disediakan berbgai kursi santai dan tenda serta shower.  Aktivitas lain yang bisa juga dilakukan di Pantai Sikas yakni berenang, mencari ikan, dan water sport. Lautnya jernih, kita juga bisa menemukan bintang laut disini.
Direktur Leebong Island, Sugianto mengatakan pulau Leebong mengusung konsep back to nature, yang memberikan kesan dan sensasi liburan yang berbeda. Satu tempat yang memadukan dua keindahan alam yakni pantai dan hutan.  
"Kita sengaja memilih tempat ini untuk pemerataan destinasi wisata di Belitung, kita ingin tonjolkan bahwa ke pulau atau pantai itu gak selalu panas, tapi juga bisa rindang dengan banyak pohon, kalau orang kepantai identik hitam, tapi kita disini rindang dan gak panas," kata Toto kepada Pos Belitung beberapa waktu lalu. 
Untuk menikmati keindahan dan fasiltas Leebong Island dibandrol paket sebesar Rp 470.000/orang, ini sudah termasuk biaya perjalanan, penggunaan fasilitas di pulau, termasuk biaya makan siang yang menyajikan sea food sebagai menu utama. Menu andalan disini diantaranya ialah steam ikan dan cumi. Bagi anda yang ingin menikmati liburan indah di Leebong Island jangan lupa reservasi dulu ya di travel agent.  
"Market kita adalah travel agent, jadi mereka yang bikin paket. Kita saling bersinergi untuk kembangkan pariwisata ini," kata lelaki kelahiran 1981 ini. 
Lelaki yang kerap disapa pak Toto itu mengatakan pihaknya berencana akan terus  melakukan pengembangan seperti membuat resort ditengah laut, pembangunan rumah adat, dan penambahan fasilitas lainnya. Kendati sudah beroperasi sejak akhir 2015 silam. grand opening Leebong Island direncanakan akan dilakukan pada pertengahan tahun ini. 
"Banyak yang akan kita kembangkan, cuma kan ini bertahap sekarang kita lagi bikin three house sama rumah adat. Kita punya banyak andalan seperti rumah pohon, dan pohon-pohon ini memang asli karena dulunya ini hutan belantara kemudian sekitar 3 tahun kita mulai bertahap membangun," katanya. 