<?php
function extractChannelId($videoUrl) {
    $html = file_get_contents($videoUrl);
    $pattern = '/\"channelId\":\"(.*?)\"/';
    preg_match($pattern, $html, $matches);
    if (isset($matches[1])) {
        return $matches[1];
    }
    return null;
}

if (isset($_GET['v'])) {
    $videoId = $_GET['v'];
    $videoUrl = "https://www.youtube.com/watch?v=$videoId";
    $channelId = extractChannelId($videoUrl);

    if ($channelId) {
        $feedUrl = "https://www.youtube.com/feeds/videos.xml?channel_id=$channelId";
        $xml = simplexml_load_file($feedUrl);
        $author = (string)$xml->author->name;
        $title1 = (string)$xml->entry->title;
        $description = (string)$xml->entry->children('media', true)->group->description;
        $pubDate = (string)$xml->entry->published;
		$dataFormatada = date("d M Y", strtotime($pubDate));
    }
}

function getDataPublicacao($UrlVideoYT) {
    $html = file_get_contents($UrlVideoYT);
    
    if ($html) {
        // Use uma expressão regular para encontrar a data de publicação
        if (preg_match('/<meta itemprop="datePublished" content="([^"]+)"/', $html, $matches)) {
            $publishedDate = $matches[1];
            $formattedDate = date("d M Y", strtotime($publishedDate));
            return $formattedDate;
        } else {
            return "01/10/2023";
        }
    } else {
        return "00/00/0000";
    }
}
$UrlVideoYT = "https://www.youtube.com/watch?v=$videoId"; // URL do vídeo do YouTube
$date = getDataPublicacao($UrlVideoYT);
?>

<?php
$id = $_GET["v"];
$url = 'https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=' . $id . '&format=json';
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
?><!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?php echo $title; ?> | Gean Ramos</title>
    <meta name="description" content="Os melhores vídeo de <?php echo $author; ?>. Assista Agora!" />
    <link rel="canonical" href="https://gean.me/watch?v=<?php echo $videoId; ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php echo $author; ?> - Feed" href="https://gean.me/feeds/videos.xml?channel_id=<?php echo $channelId; ?>" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo $title; ?> – Gean Ramos" />
    <meta name="twitter:description" content="Os melhores vídeo de <?php echo $author; ?>. Assista Agora!" />
    <meta name="twitter:image:src" content="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&output=jpg&q=90&t=square" />

    <!-- Facebook OpenGraph -->
    <meta property="og:title" content="<?php echo $title; ?> – Gean Ramos" />
    <meta property="og:description" content="Os melhores vídeo de <?php echo $author; ?>. Assista Agora!" />
    <meta property="og:image" content="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&output=jpg&q=90&t=square" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700;900&display=swap" as="style" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <!-- Ionicons -->
    <link rel="preload" href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" as="style" />
    <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet" />
    <script>
      if (localStorage.getItem("theme") === "dark") {
        document.documentElement.setAttribute("dark", "");
        document.documentElement.classList.add("dark-mode");
      }
    </script>
	<link rel="stylesheet" type="text/css" href="./watch.css">
  </head>

  <body>
    <!-- begin header -->
    <header class="header" id="top">
      <div class="container">
        <div class="row">
          <div class="header__inner col col-12">
            <div class="logo">
              <a class="logo__link" href="/">
                Gean Ramos
              </a>
            </div>

            <nav class="main-nav">
              <div class="main-nav__box">
                <div class="nav__icon-close">
                  <i class="ion ion-md-close"></i>
                </div>
                <div class="nav__title">Menu</div>
                <ul class="nav__list list-reset">
                  <li class="nav__item">
                    <a href="/" class="nav__link">Home</a>
                  </li>

                  <li class="nav__item">
                    <a href="/mini-curso-gratis" class="nav__link">Grana Fácil</a>
                  </li>

                  <li class="nav__item">
                    <a href="https://redirect.geanramos.com/#como-funciona" class="nav__link">Como Funciona?</a>
                  </li>

                  <li class="nav__item">
                    <a href="/channel/<?php echo $channelId; ?>" class="nav__link">Feed</a>
                  </li>

                  <li class="nav__item nav__item-icon">
                    <div class="toggle-theme">
                      <div class="toggle-moon" title="Enable dark mode"><i class="ion ion-ios-moon"></i></div>
                      <div class="toggle-sun" title="Enable light mode"><i class="ion ion-ios-sunny"></i></div>
                    </div>
                  </li>
                </ul>
              </div>
            </nav>

            <div class="nav-button">
              <i class="nav__icon icon__menu ion ion-md-menu"></i>
              <i class="nav__icon icon__search ion ion-md-search"></i>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- end header -->

    <!-- begin search -->
    <div class="search">
      <div class="container">
        <div class="row">
          <div class="col col-12">
            <div class="search__box">
              <div class="search__group">
                <div class="search__close">
                  <i class="ion ion-md-close"></i>
                </div>
                <label for="js-search-input" class="screen-reader-text">Buscar...</label>
                <input type="text" id="js-search-input" class="search__text" autocomplete="off" placeholder="Type to search..." />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row search-results-list" id="js-results-container"></div>
      </div>
    </div>
    <!-- end search -->

    <!-- begin content -->
    <main class="content" aria-label="Content">
      <div class="post-head">
        <div class="container">
          <div class="row">
            <div class="col col-12">
              <div class="post-video">
                <div class="post-video__wrap">
                  <iframe src="https://gean.me/embed?v=<?php echo $videoId; ?>" loading="lazy" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
              </div>
            </div>

            <div class="col col-12">
              <div class="post__info post__info-video">
                <div class="post__tags">
                  <a href="./" class="post__tag">Home</a>

                  <a href="https://gean.me/channel/<?php echo $channelId; ?>" class="post__tag"><?php echo $author; ?></a>
                </div>

                <h1 class="post__title"><?php echo $title; ?></h1>

                <div class="post__meta">
                  <a href="https://gean.me/channel/<?php echo $channelId; ?>" class="post__author-image">
                    <img class="lazy" data-src="https://i1.wp.com/static.vecteezy.com/system/resources/previews/009/469/625/large_2x/play-button-youtube-video-player-red-play-button-free-vector.jpg?resize=50,50" alt="<?php echo $author; ?>" />
                  </a>

                  <div class="post__meta-bottom">
                    <a class="post__author" href="https://gean.me/channel/<?php echo $channelId; ?>"><?php echo $author; ?></a>
                    <time class="post__date" datetime="<?php echo $pubDate; ?>"><?php echo $date; ?></time>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- begin post -->
      <div class="container animate">
        <article class="post">
          <div class="post__content">
            <p>
              Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic
              world view of disruptive innovation via workplace <a href="https://gean.me/channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> diversity and empowerment.
            </p>

            <p>
              Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud
              solution. User generated content in real-time will have multiple touchpoints for offshoring.
            </p>

            <h3 id="synergistically-evolve">Synergistically evolve</h3>

            <p>
              Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performance indicators offline to maximise the long tail. Keeping your eye on the ball while performing a deep dive on
              the start-up mentality to derive convergence on cross-platform integration.
            </p>

            <p>
              <!-- <img src="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&output=jpg&q=90&t=square#wide" alt="City" /> -->
			  <img src="https://img.youtube.com/vi/<?php echo $videoId; ?>/maxresdefault.jpg#wide" alt="<?php echo $title; ?>" />
              <em>Photo by <a href="https://gean.me/channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> on <a href="https://gean.me/channel/<?php echo $channelId; ?>">YouTube</a></em>
            </p>
			
            <p>
              Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic
              world view of disruptive innovation via workplace diversity and empowerment.
            </p>

            <p>
              Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close
              the loop on focusing solely on the bottom line.
            </p>

            <blockquote>
              <p>The longer I live, the more I realize that I am never wrong about anything, and that all the pains I have so humbly taken to verify my notions have only wasted my time!</p>
            </blockquote>

            <p>
              Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud
              solution. User generated content in real-time will have multiple touchpoints for offshoring.
            </p>

            <p>
              Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric “outside the box” thinking. Completely pursue scalable customer service through
              sustainable <a href="https://unsplash.com/photos/10py7Mvmf1g">Ken Cheung</a> potentialities.
            </p>

            <h3 id="podcasting">Podcasting</h3>

            <p>
              Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or
              “organic” sources.
            </p>

            <p>
              <img src="https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&output=jpg&q=90&t=square" alt="<?php echo $title; ?>" /> <em>Photo by <a href="https://gean.me/channel/<?php echo $channelId; ?>"><?php echo $author; ?></a> on <a href="https://gean.me/channel/<?php echo $channelId; ?>">YouTube</a></em>
            </p>

            <p>
              Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art
              customer service.
            </p>

            <p>
              Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical
              architectures.
            </p>

            <p>
              Credibly reintermediate backend ideas for cross-platform models. Continually reintermediate integrated processes through technically sound intellectual capital. Holistically foster superior methodologies without market-driven
              best practices.
            </p>
          </div>

          <div class="post__share">
            <ul class="share__list list-reset">
              <li class="share__item">
                <a
                  class="share__link share__twitter"
                  href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=https://gean.me/watch?v=<?php echo $videoId; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Twitter"
                  rel="nofollow"
                >
                  <i class="ion ion-logo-twitter"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__facebook"
                  href="https://www.facebook.com/sharer/sharer.php?u=https://gean.me/watch?v=<?php echo $videoId; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Facebook"
                  rel="nofollow"
                >
                  <i class="ion ion-logo-facebook"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__pinterest"
                  href="http://pinterest.com/pin/create/button/?url=https://gean.me/watch?v=<?php echo $videoId; ?>&amp;media=https://images.weserv.nl/?url=img.youtube.com/vi/<?php echo $videoId; ?>/sddefault.jpg&w=640&h=360&output=jpg&q=90&t=square&amp;description=<?php echo $title; ?>"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=900,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on Pinterest"
                  rel="nofollow"
                >
                  <i class="ion ion-logo-pinterest"></i>
                </a>
              </li>
              <li class="share__item">
                <a
                  class="share__link share__linkedin"
                  href="https://www.linkedin.com/shareArticle?mini=true&url=https://gean.me/watch?v=<?php echo $videoId; ?>&title=<?php echo $title; ?>&summary=Assista Agora os melhores vídeo de <?php echo $author; ?>&source=Gean Ramos"
                  onclick="window.open(this.href, 'pop-up', 'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"
                  title="Share on LinkedIn"
                  rel="nofollow"
                >
                  <i class="ion ion-logo-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </article>
      </div>
      <!-- end post -->

      <!-- begin related posts -->
      <div class="container">
        <section class="related-posts is-related animate">
          <div class="row">
            <div class="col col-12">
              <div class="container__inner">
                <div class="section__info">
                  <div class="section__head">
                    <h2 class="section__title">You may also like</h2>
                    <a class="section__link" href="#/blog">
                      <a href="#/tags#workflow" class="section__link related-tag">See all<span> workflow</span></a>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="article col col-4 col-d-6 col-t-12">
                    <div class="article__inner">
                      <div class="article__head">
                        <time class="article__date" datetime="2020-11-14T12:01:35+00:00">14 Nov 2020</time>

                        <div class="video-icon">
                          <div class="circle pulse"></div>
                          <div class="circle">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                              <polygon points="40,30 65,50 40,70"></polygon>
                            </svg>
                          </div>
                        </div>

                        <a class="article__image" href="https://gean.me/">
                          <img class="lazy" data-src="https://img.youtube.com/vi/9qIUIeTG2Zw/mqdefault.jpg" alt="Descubra agora como milhares de pessoas estão recebendo pix de R$500 todos os dias." />
                        </a>
                      </div>

                      <div class="article__content">
                        <h2 class="article__title">
                          <a href="https://gean.me/">Descubra agora como milhares de pessoas estão recebendo pix de R$500 todos os dias.</a>
                        </h2>

                        
                      </div>
                    </div>
                  </div>

                  <div class="article col col-4 col-d-6 col-t-12">
                    <div class="article__inner">
                      <div class="article__head">
                        <time class="article__date" datetime="2020-11-10T12:01:35+00:00">10 Nov 2020</time>

                        <a class="article__image" href="#/strive-not-to-be-a-success-but-rather-to-be-of-value">
                          <img class="lazy" data-src="https://menca.netlify.app/images/09.jpg" alt="Strive not to be a success, but rather to be of value" />
                        </a>
                      </div>

                      <div class="article__content">
                        <h2 class="article__title">
                          <a href="#/strive-not-to-be-a-success-but-rather-to-be-of-value">Strive not to be a success, but rather to be of value</a>
                        </h2>

                        
                      </div>
                    </div>
                  </div>

                  <div class="article col col-4 col-d-6 col-t-12">
                    <div class="article__inner">
                      <div class="article__head">
                        <time class="article__date" datetime="2020-11-07T12:01:35+00:00">07 Nov 2020</time>

                        <a class="article__image" href="#/what-you-do-speaks-so-loudly-that-I-cannot-hear-what-you-say">
                          <img class="lazy" data-src="https://menca.netlify.app/images/08.jpg" alt="What you do speaks so loudly that I cannot hear what you say" />
                        </a>
                      </div>

                      <div class="article__content">
                        <h2 class="article__title">
                          <a href="#/what-you-do-speaks-so-loudly-that-I-cannot-hear-what-you-say">What you do speaks so loudly that I cannot hear what you say</a>
                        </h2>

                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- end related posts -->

      <div class="container">
        <div class="row">
          <div class="col col-12">
            <!-- begin comments -->
            <div class="show-comments">
              <button class="button disqus-button" id="show-comments-button" onclick="disqus();return false;">Show Comments</button>
            </div>

            <div id="disqus_thread" class="post__comments">
              <div id="disqus_empty"></div>
            </div>

            <script>
              var disqus_loaded = false;
              var disqus_shortname = "geanramos";
              var disqus_container = document.getElementById("disqus_thread");
              function disqus() {
                if (!disqus_loaded) {
                  disqus_loaded = true;
                  var e = document.createElement("script");
                  e.type = "text/javascript";
                  e.async = true;
                  e.src = "//" + disqus_shortname + ".disqus.com/embed.js";
                  (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(e);
                  // Hide the button after opening
                  document.getElementById("show-comments-button").style.display = "none";
                  // Show disqus comments
                  disqus_container.classList.add("is-open");
                }
              }
            </script>

            <noscript>
              Please enable JavaScript to view the
              <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
            </noscript>
            <!-- end comments -->
          </div>
        </div>
      </div>
    </main>
    <!-- end content -->

    <!-- begin footer -->
    <footer class="footer">
      <div class="footer__inner">
        <div class="container">
          <div class="row">
            <div class="col col-5 col-d-12">
              <div class="footer__author">
                <div class="footer__author-avatar">
                  <img class="lazy" data-src="https://2.gravatar.com/avatar/243ade88800c944ed2ba3410d0e30f50?s=105&d=retro&r=G" alt="Camelia Mendes" />
                </div>
                <h3 class="footer__author-name">Gean Ramos</h3>
                <p class="footer__author-bio">Desenha, fala e escreve sobre web, ética, privacidade e desenvolvimento. Compartilho tutoriais de design, recursos gratuitos e inspiração.</p>

                <div class="social">
                  <ul class="social__list list-reset">
                    <li class="social__item">
                      <a class="social__link" href="https://twitter.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-twitter"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://facebook.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-facebook"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://instagram.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-instagram"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://pinterest.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-pinterest"></i></a>
                    </li>

                    <li class="social__item">
                      <a class="social__link" href="https://youtube.com" target="_blank" rel="noopener" aria-label=" link"><i class="ion ion-logo-youtube"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="col col-6 push-1 col-d-12 push-d-0">
              <div class="footer__gallery">
                <h3 class="footer__gallery-title">Galeria</h3>

                <div class="gallery-footer">
                  <div class="gallery" style="grid-template-columns: repeat(3, auto);">
                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/100.jpg" alt="Rest" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/101.jpg" alt="Lifestyle" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/102.jpg" alt="Hobby" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/103.jpg" alt="Notes" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/104.jpg" alt="Rest" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/105.jpg" alt="Hobby" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/106.jpg" alt="Fashion" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/107.jpg" alt="Notes" loading="lazy" />
                    </div>

                    <div class="gallery__image">
                      <img src="https://menca.netlify.app/images/108.jpg" alt="Rest" loading="lazy" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="footer__info">
        <div class="container">
          <div class="row">
            <div class="col col-12">
              <div class="footer__info-box">
                <div class="copyright">2023 &copy; <a href="/">Zeta</a>. Ramos & Designed by <a href="https://instagram.com/geanramus">@GeanRamus</a>.</div>
                <div class="top" title="Top"><i class="ion ion-ios-arrow-up"></i></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->

    <script src="https://menca.netlify.app/js/scripts.js"></script>
    <script src="https://menca.netlify.app/js/common.js"></script>
  </body>
</html>
