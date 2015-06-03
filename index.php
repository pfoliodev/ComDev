<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Community Dev'</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description" content="L'Accueil du site Community Dev"/>
<meta name="keywords" content="Web, design, application, nav, news, galerie, vielle, technologie"/>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
<script type="text/javascript" src="js/news_d/jquery.js"></script>
<script type="text/javascript" src="js/news_d/carrousel.js"></script>
<script src="js/news_s/cufon-yui.js" type="text/javascript"></script>
<script src="js/news_s/Bebas_400.font.js" type="text/javascript"></script>
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />
<script type="text/javascript">
            Cufon('.cn_wrapper h1,h2', {
                textShadow: '-1px 1px black'
            });
        </script>
</head>
<body>
<?php include 'header.php'; ?>
            <section class="background">
            <div class="l-container">
            <blockquote class="quote-text">Un geek ne crie pas, il URL.</blockquote>
            </div>
        </section>
<div class="cb"></div>
<div class="title_n">News</div>
<div class="title_v">Veille Technologique</div>
<div class="cn_wrapper">
            <div id="cn_preview" class="cn_preview">
                <div class="cn_content" style="top:5px;">
                    <img src="css/img/notification.png" alt=""/>
                    <h1>Notification</h1>
                    <span class="cn_date">24/12/2014</span>
                    <span class="cn_category">Intégration</span>
                    <a href="http://tympanus.net/TipsTricks/CSS3TimedNotifications/" target="_blank" class="cn_more">Regarder</a>
                </div>
                <div class="cn_content">
                    <img src="css/img/hovereffect.png" alt=""/>
                    <h1>Effet Hover</h1>
                    <span class="cn_date">24/12/2014</span>
                    <span class="cn_category">Intégration</span>
                    <a href="http://tympanus.net/Tutorials/CaptionHoverEffects/" target="_blank" class="cn_more">Regarder</a>
                </div>
                <div class="cn_content">
                    <img src="css/img/tooltips.png" alt=""/>
                    <h1>Tooltips</h1>
                    <span class="cn_date">24/12/2014</span>
                    <span class="cn_category">Intégration</span>
                    <a href="http://tympanus.net/TipsTricks/CSS3Tooltips/" target="_blank" class="cn_more">Regarder</a>
                </div>
                <div class="cn_content">
                    <img src="css/img/creative.png" alt=""/>
                    <h1>Creative link effect</h1>
                    <span class="cn_date">24/12/2014</span>
                    <span class="cn_category">Intégration</span>
                    <a href="http://tympanus.net/Development/CreativeLinkEffects/" target="_blank" class="cn_more">Regarder</a>
                </div>
               
            </div>
            <div id="cn_list" class="cn_list">
                <div class="cn_page" style="display:block;">
                    <div class="cn_item selected">
                        <h2>Notification - Codrops</h2>
                        
                    </div>
                    <div class="cn_item">
                        <h2>Hover Effect - Codrops</h2>
                        
                    </div>
                    <div class="cn_item">
                        <h2>Tooltips - Codrops</h2>
                        
                    </div>
                    <div class="cn_item">
                        <h2>Creative link effect - Codrops</h2>
                        
                    </div>
                </div>
               
                <div class="cn_nav">
                    <a id="cn_prev" class="cn_prev disabled"></a>
                    <a id="cn_next" class="cn_next"></a>
                </div>
            </div>
        </div>
<!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/news_s/jquery.easing.1.3.js"></script>
        <script type="text/javascript">
            $(function() {

                var $cn_next    = $('#cn_next');
                var $cn_prev    = $('#cn_prev');

                var $cn_list    = $('#cn_list');
                var $pages      = $cn_list.find('.cn_page');

                var cnt_pages   = $pages.length;

                var page        = 1;

                var $items      = $cn_list.find('.cn_item');

                var $cn_preview = $('#cn_preview');

                var current     = 1;

                $items.each(function(i){
                    var $item = $(this);
                    $item.data('idx',i+1);
                    
                    $item.bind('click',function(){
                        var $this       = $(this);
                        $cn_list.find('.selected').removeClass('selected');
                        $this.addClass('selected');
                        var idx         = $(this).data('idx');
                        var $current    = $cn_preview.find('.cn_content:nth-child('+current+')');
                        var $next       = $cn_preview.find('.cn_content:nth-child('+idx+')');
                        
                        if(idx > current){
                            $current.stop().animate({'top':'-300px'},600,'easeOutBack',function(){
                                $(this).css({'top':'310px'});
                            });
                            $next.css({'top':'310px'}).stop().animate({'top':'5px'},600,'easeOutBack');
                        }
                        else if(idx < current){
                            $current.stop().animate({'top':'310px'},600,'easeOutBack',function(){
                                $(this).css({'top':'310px'});
                            });
                            $next.css({'top':'-300px'}).stop().animate({'top':'5px'},600,'easeOutBack');
                        }
                        current = idx;
                    });
                });

                $cn_next.bind('click',function(e){
                    var $this = $(this);
                    $cn_prev.removeClass('disabled');
                    ++page;
                    if(page == cnt_pages)
                        $this.addClass('disabled');
                    if(page > cnt_pages){ 
                        page = cnt_pages;
                        return;
                    }   
                    $pages.hide();
                    $cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
                    e.preventDefault();
                });
            
                $cn_prev.bind('click',function(e){
                    var $this = $(this);
                    $cn_next.removeClass('disabled');
                    --page;
                    if(page == 1)
                        $this.addClass('disabled');
                    if(page < 1){ 
                        page = 1;
                        return;
                    }
                    $pages.hide();
                    $cn_list.find('.cn_page:nth-child('+page+')').fadeIn();
                    e.preventDefault();
                });
                
            });
        </script>
         <div id="conteneur">
     <div id="carrousel">
    <div id="slide1" class="slide">
        <div class="visu">
        <a href="http://www.ergophile.com/"><img src="css/img/ergophile.png"/></a>
        </div>
        <div class="title">
        Blog sur l'ergonomie et Web mobile
        </div>
    </div>
    
    <div id="slide2" class="slide">
        <div class="visu">
        <a href="http://www.lesintegristes.net/"><img src="css/img/integriste.png"/></a>
        </div>
        <div class="title">
        Les Intégristes
        </div>
    </div>
    
    
    <div id="slide3" class="slide">
        <div class="visu">
        <a href="www.developpez.com"><img src="css/img/developpez.png"/></a>
        </div>
        <div class="title">
        Club des développeurs
        </div>
    </div>
    
    <div id="slide4" class="slide">
        <div class="visu">
        <a href="http://news.humancoders.com/t/html5"><img src="css/img/human.png"/></a>
        </div>
        <div class="title">
        Human Coders News
        </div>
    </div>
    <!--
    <div class="navigation">
        <span>1</span>
        <span>2</span>
        <span>3</span>
    </div>
    -->
     </div>
  </div>
  <section class="background_f">
            <div class="l-container_f">
                <blockquote class="quote-text_f">Quand la vie apporte des questions, Google donne les réponses.</blockquote>
            </div>
        </section>
        <div class="title_g">
Galerie</div>
<div class="container">
            <div class="grid">

            <a href="https://dribbble.com/">
                <figure class="effect-layla">
                    <img src="css/img/hv4.jpg"/>
                    <figcaption>
                        <h2>Dribbble</h2>
                        <p>Inspiration pour web designer.</p>
                    </figcaption>           
                </figure>
                </a> 

                <a href="http://www.commitstrip.com/fr/">
                <figure class="effect-layla">
                    <img src="css/img/hv36.jpg"/>
                    <figcaption>
                        <h2>CommitStrip</h2>
                        <p>Le blog qui raconte la vie des codeurs.</p>
                    </figcaption>           
                </figure>
                </a> 

                <a href="http://www.desktopography.net/">
                <figure class="effect-layla">
                    <img src="css/img/hv134.jpg"/>
                    <figcaption><h2>Desktop'</h2>
                        <p>Design de la nature sur votre bureau.</p>   
                    </figcaption>           
                </figure>
                </a>

                <a href="http://10fastfingers.com/typing-test/french">
                <figure class="effect-layla">
                    <img src="css/img/hv139.jpg"/>
                    <figcaption><h2>Fastfinger</h2>
                        <p>Améliorer votre vitesse de frappe.</p>   
                    </figcaption>           
                </figure>
                </a>

                <a href="http://www.blogduwebdesign.com/">
                <figure class="effect-layla">
                    <img src="css/img/hv123.jpg"/>
                    <figcaption><h2>WebDesign</h2>
                        <p>Magazine Webdesign et Inspiration.</p>   
                    </figcaption>           
                </figure>
                </a>   
            </div>
        </div><!-- /container -->
        <?php include "footer.php"; ?>
</body>
</html> 
