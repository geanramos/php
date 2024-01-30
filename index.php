<?php
$id = $_GET["v"];
$url = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=9qIUIeTG2Zw&format=json';

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

if ($response === false) {
    echo 'Falha ao obter informações do video.';
    exit;
}

$videoData = json_decode($response, true);

if (empty($videoData)) {
    echo 'Falha ao obter informações do vídeo.';
    exit;
}

$title = $videoData['title'];
$authorName = $videoData['author_name'];
$videoUrl = $videoData['html'];
$thumbnailUrl = $videoData['thumbnail_url'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="https://gean.me/favicon.ico" type="image/x-icon">
  <link rel="alternate" type="application/rss+xml" title="Gean Ramos &raquo; Feed" href="https://feeds.feedburner.com/geanramos" />
  <title>Veja como milhares de pessoas estão recebendo PIX de R$500 todos os dias. | Gean Ramos</title>
  <meta name="description" content="Dicas e estrategias de como ganhar dinheiro na internet de forma fácil, rapida e honesta 100% comprovada | marketing de Afiliados | hotmart | afiliado iniciante | renda extra | trabalhar em casa" />
  <meta name="category" content="marketing digital, renda extra, trabalhar de casa, marketing de afiliados, hotmart, eduzz, monetizze, ganhar dinheiro na internet, gean ramos" />
  <meta name="url" content="https://gean.me/?v=<?php echo $id; ?>" />
  <meta name="subject" content="Dicas e estrategias de como ganhar dinheiro na internet de forma fácil, rapida e honesta 100% comprovada | marketing de Afiliados | hotmart | afiliado iniciante | renda extra | trabalhar em casa" />
  <meta name="abstract" content="Como ganhar dinheiro na internet para iniciantes" />
<!-- Redes Sociais -->
  <meta itemprop="name" content="Veja como milhares de pessoas estão recebendo PIX de R$500 todos os dias. | Gean Ramos" />
  <meta itemprop="description" content="Dicas e estrategias de como ganhar dinheiro na internet de forma fácil, rapida e honesta 100% comprovada | marketing de Afiliados | hotmart | afiliado iniciante | renda extra | trabalhar em casa" />
  <meta itemprop="image"  content="https://gean.me/assets/images/oghome.jpg" />
<!-- Facebook ID para moderar -->
<meta property="fb:app_id" content="" />
<!-- para o Twitter Card-->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@geanramos" />
  <meta name="twitter:title" content="Veja como milhares de pessoas estão recebendo PIX de R$500 todos os dias. | Gean Ramos" >
  <meta name="twitter:description" content="Dicas e estrategias de como ganhar dinheiro na internet de forma fácil, rapida e honesta 100% comprovada | marketing de Afiliados | hotmart | afiliado iniciante | renda extra | trabalhar em casa" />
  <meta name="twitter:creator" content="@geanramos" />
  <!-- imagens largas para o Twitter Summary Card precisam ter pelo menos 280x150px -->
  <meta name="twitter:image" content="https://gean.me/assets/images/oghome.jpg" />
  <meta property="og:url" content="https://gean.me/?v=<?php echo $id; ?>" />
  <meta property="og:title" content="Veja como milhares de pessoas estão recebendo PIX de R$500 todos os dias. | Gean Ramos">
  <meta property="og:description" content="Dicas e estrategias de como ganhar dinheiro na internet de forma fácil, rapida e honesta 100% comprovada | marketing de Afiliados | hotmart | afiliado iniciante | renda extra | trabalhar em casa" />
  <meta property="og:image" content="https://gean.me/assets/images/oghome.jpg" />
<!-- FIM Redes Sociais -->


  <link rel="stylesheet" href="assets/web/assets/mobirise-icons2/mobirise2.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons-bold/mobirise-icons-bold.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/parallax/jarallax.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,400;0,700;1,400;1,700&display=swap&display=swap"></noscript>
  <link rel="preload" as="style" href="assets/mobirise/css/mbr-additional.css?v2">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css?v2" type="text/css">
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu3 cid-tFWZdQY9HC" once="menu" id="menu3-6">    
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="?v=9qIUIeTG2Zw">
                        <img src="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=125&d=retro&r=G" alt="Gean Ramos" style="height: 3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black text-primary display-5">Gean Ramos</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
					<li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#header9-7">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#header9-7">Serviços</a></li>
                    <li class="nav-item"><a class="nav-link link text-black text-primary display-4" href="index.html#header9-7">Contato</a></li>
				</ul>
                <div class="icons-menu">
                    <a class="iconfont-wrapper" href="https://fb.com/geanramoss" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-facebook socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://twitter.com/geanramos" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-twitter socicon"></span>
                    </a>
                    <a class="iconfont-wrapper" href="https://instagram.com/geanramus" target="_blank">
                        <span class="p-2 mbr-iconfont socicon-instagram socicon"></span>
                    </a>
                    
                </div>
                <div class="navbar-buttons mbr-section-btn"><a class="btn btn-success display-4" href="https://gean.me/form" target="_blank"><span class="mobi-mbri mobi-mbri-share mbr-iconfont mbr-iconfont-btn"></span>Inscreva-se</a></div>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="video4 cid-tFWYYK3Kjb" id="video4-5">
    
    
     
    <div class="container">
        <div class="title-wrapper mb-5">
            <h3 class="mbr-section-title mbr-fonts-style mb-0 display-2"><strong>Descubra agora como milhares de pessoas estão recebendo PIX de R$500 todos os dias.</strong></h3>
        </div>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 video-block">
                <div class="video-wrapper"><iframe class="mbr-embedded-video" src="https://www.youtube.com/embed/9qIUIeTG2Zw" width="1280" height="720" frameborder="0" allowfullscreen></iframe></div>
                <p class="mbr-description pt-2 mbr-fonts-style display-4"><strong>
                    ATENÇÃO:</strong> <em>Veja Agora o Método ÚNICO e SIMPLES que Eu Uso para CRIAR Negócios de Sucesso na Internet 100% do Zero</em></p>
            </div>
            <div class="col-12 col-lg">
                <div class="text-wrapper">
                    <h5 class="mbr-section-subtitle mbr-fonts-style mb-3 display-5"><strong>OLHA QUE DEMAIS...</strong></h5>
                    <p class="mbr-text mbr-fonts-style display-4">Você não tem ideia do que eu já passei na vida... Literalmente "chorei" pela situação que eu vivia... Sem saber como sair! Vim de uma família humilde do interior do RS, eu era a ilustração da derrota. ... agora, justamente por ter passado muito trabalho, eu aprendi a não desistir, a encarar de frente, a correr atrás mesmo que meu corpo não aguentasse mais... ...e isso aconteceu nas madrugadas em claro no meu quarto. Foram 5 anos de decepção tentando, era enganado, gastava o que não tinha... cada vez mais frustrado. ... Até que um dia (provavelmente era minha última tentativa) eu <strong>"Descobri Um Método"</strong> que literalmente me salvou... salvou a mim, minha família e todos ao meu redor! E de lá pra cá eu passei de "ninguém" para "o mais bem sucedido da família (sem exagero)...</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="header9 cid-tFXsod8CGB mbr-fullscreen mbr-parallax-background" id="header9-7">

    

    
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>

    <div class="text-center container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
                
                <h1 class="mbr-section-title mbr-fonts-style mb-3 display-2"><strong>VOCÊ JÁ FEZ ALGUMA
</strong><div><strong>VENDA NA INTERNET?</strong></div></h1>
                <p class="mbr-text mbr-fonts-style display-4">
                    <center><img src="https://i1.wp.com/gean.me/assets/images/ja.png?resize=92,100"></center></p>
                <div class="mbr-section-btn mt-3"><a class="btn btn-success display-5" href="./form#sim"><span class="mbrib-smile-face mbr-iconfont mbr-iconfont-btn"></span>SIM, JÁ FIZ</a>
                    <a class="btn btn-secondary display-5" href="./form#nao"><span class="mbrib-sad-face mbr-iconfont mbr-iconfont-btn"></span>AINDA NÃO</a></div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="footer7 cid-tFWYuchjFs" once="footers" id="footer7-2">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="col-12">
                <p class="mbr-text mb-0 mbr-fonts-style display-7">
                    © GeanRamos.com.br</p>
            </div>
        </div>
    </div>
</section><script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>  <script src="assets/parallax/jarallax.js"></script>  <script src="assets/smoothscroll/smooth-scroll.js"></script>  <script src="assets/ytplayer/index.js"></script>  <script src="assets/dropdown/js/navbar-dropdown.js"></script>  <script src="assets/playervimeo/vimeo_player.js"></script>  <script src="assets/theme/js/script.js"></script>  
  
  
</body>
<script id="hotmart_launcher_script" type="text/javascript">
	(function(l,a,u,n,c,h,e,r){l['HotmartLauncherObject']=c;l[c]=l[c]||function(){
	(l[c].q=l[c].q||[]).push(arguments)},l[c].l=1*new Date();h=a.createElement(u),
	e=a.getElementsByTagName(u)[0];h.async=1;h.src=n;e.parentNode.insertBefore(h,e)
	})(window,document,'script','//launcher.hotmart.com/launcher.js','hot');
	hot('account','20566118-6ad9-40b2-aff3-fb639846f1b6');
</script>
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga'); 
    ga('create', 'UA-59300081-1', 'auto');
    ga('require', 'displayfeatures');
    ga('linker:autoLink', ['gean.me']);
    ga('send', 'pageview', '/?url=' + document.location.pathname + document.location.search + '&ref=' + document.referrer);
</script>
	  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11162521048"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-11162521048');
</script>
	  <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '765378418452076');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=765378418452076&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
<!-- Event snippet for Formula negocio online - views page conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-11162521048/_RQJCI_N8Z0YENib2sop'});
</script>
</html>