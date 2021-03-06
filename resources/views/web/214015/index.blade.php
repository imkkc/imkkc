<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="/webstyle/214015/css/bootstrap.css" rel='stylesheet' type='text/css' />
  <!------ commn-js files ----->
  <script src="/webstyle/214015/js/jquery.min.js"> </script>
  <!------ commn-js files ----->
  <!----- theme-style ----->
  <link href="/webstyle/214015/css/style.css" rel='stylesheet' type='text/css' />
  <!----- theme-style ----->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
  <body>

  <!---header--->
  <div class="header">
          <!---container--->
          <div class="container">
          <div class="top-header">
          <div class="logo">
          <a href="index.html"><img src="/webstyle/214015/images/logo.png"/></a>
          </div>
          <div class="menu">
          <a class="toggleMenu" href="#"><img src="/webstyle/214015/images/nav-icon.png" alt="" /> </a>
          <ul class="nav" id="nav">
          <li class="active"><a href="#home">Home</a></li>
          <li><a href="#about" class="scroll">About</a></li>
          <li><a href="#team" class="scroll">Team</a></li>
          <li><a href="#work" class="scroll">Work</a></li>
          <li><a href="#services" class="scroll">Services</a></li>
          <li><a href="#features" class="scroll">Features</a></li>
          <li><a href="#contact" class="scroll">Contact</a></li>
          </ul>
          <script type="text/javascript" src="/webstyle/214015/js/responsive-nav.js"></script>
  <script type="text/javascript" src="js/move-top.js"></script>
  <script type="text/javascript" src="js/easing.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
      });
    });
  </script>

  </div>
  <div class="clearfix"> </div>
  </div>
  </div>
  <!---container--->
  </div>
  <!---header--->

  <!---banner--->
  <!----start-slider-script---->
  <script src="/webstyle/214015/js/responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 4
      $("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });

    });
  </script>
  <!----//End-slider-script---->
  <!-- Slideshow 4 -->
  <div  id="top" class="callbacks_container">
    <ul class="rslides" id="slider4">
      <li>
        <img src="/webstyle/214015/images/banner.jpg" alt="">
        <div class="caption bounceInDown" data-wow-delay="0.4s">
          <div class="slide-text-info">
            <h1>welcome to our marketplace</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Sed nisi metus,tristique ndolor non,ornare sagittis dolor.Nulla vestibulu lacus...</p>
            <div class="slide-btns">
              <a class="startnow" href="#">VIWE MORE</a>
              <a class="livedemo" href="#">VIDEO TOUR</a>
            </div>
          </div>
        </div>
      </li>
      <li>
        <img src="/webstyle/214015/images/leaf.jpg" alt="">
        <div class="caption">
          <div class="slide-text-info bounceInDown" data-wow-delay="0.4s">
            <h1>welcome to our marketplace</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Sed nisi metus,tristique ndolor non,ornare sagittis dolor.Nulla vestibulu lacus...</p>
            <div class="slide-btns">
              <a class="startnow" href="#">VIWE MORE</a>
              <a class="livedemo" href="#">VIDEO TOUR</a>
            </div>
          </div>
        </div>
      </li>
      <li>
        <img src="/webstyle/214015/images/banner.jpg" alt="">
        <div class="caption">
          <div class="slide-text-info bounceInDown" data-wow-delay="0.4s">
            <h1>welcome to our marketplace</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Sed nisi metus,tristique ndolor non,ornare sagittis dolor.Nulla vestibulu lacus...</p>
            <div class="slide-btns">
              <a class="startnow" href="#">VIWE MORE</a>
              <a class="livedemo" href="#">VIDEO TOUR</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="clearfix"> </div>
  <!----- //End-slider---->

  <!---banner--->

  <!---content--->
  <div class="content">
    <div class="content-top" id="about">
      <!---container--->
      <div class="container">
        <div class="content-we">
          <h2><span class="we-are"> </span>
            WE ARE MODEST.</h2>
        </div>
        <div class="row">
          <div class="col-md-7 para-matter">
            <p class="sit"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi metus, tristique ndolor non, ornare sagittis dolor. Nulla vestibulu lacus sed molestie gravida. Crferm entum  quismagna congue, vel sodales arcu vestibulum. Nunc lobortis dui magna, quis lacusullamcorper at. </p>
            <p class="sed">Phasellus sollicitudin ante eros ornare, sit amet luctus lorem semper. Suspendisse posuere, quamdictum consectetur, augue metus pharetra tellus, eu feugiatloreg egetnisi. Cras ornare bibendum ante, ut bibendum odio convallis eget. vel sodales arcu vestibulum</p>
            <div class="face">
              <ul>
                <li><a class="facebook" href="#"><span> </span></a></li>
                <li><a class="twitter"href="#"><span> </span></a></li>
                <li><a class="gmail"href="#"><span> </span></a></li>
                <li><a class="dribble"href="#"><span> </span></a></li>
                <li><a class="been"href="#"><span> </span></a></li>
                <div class="clearfix"> </div>
              </ul>
            </div>
          </div>
          <div class="col-md-5 text-matter">
            <div class="top-list">
              <div class="top-list-left">
                <span><label>01</label></span>
              </div>
              <div class="top-list-right">
                <h4>Dedication to the customers</h4>
                <p>Integer vel lacus non dui ullamcorper venenatis. Aliquam vitae tristique nisi, vitae </p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="top-list-middle">
              <div class="top-list-left">
                <span><label>02</label></span>
              </div>
              <div class="top-list-right">
                <h4>Dedication to the customers</h4>
                <p>Integer vel lacus non dui ullamcorper venenatis. Aliquam vitae tristique nisi, vitae </p>
              </div>
              <div class="clearfix"> </div>
            </div>
            <div class="top-list-last">
              <div class="top-list-left">
                <span><label>03</label></span>
              </div>
              <div class="top-list-right">
                <h4>Dedication to the customers</h4>
                <p>Integer vel lacus non dui ullamcorper venenatis. Aliquam vitae tristique nisi, vitae </p>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!---content-we-are--->
    <div class="content-we-are" id="team">
      <!---container--->
      <div class="container">
        <div class="content-we">
          <h2><span class="we-are"> </span>
            meet the team.</h2>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="image-matter">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/men.jpg" /></a>
              <div class="image-bro">
                <h4>Gloria Bromley</h4>
                <p>CEO and Founder</p>
              </div>
              <ul class="img-social-stags">
                <li><a class="twitter" href="#"><span> </span></a><li>
                <li><a class="facebook" href="#"><span> </span></a><li>
                <li><a class="linkedin" href="#"><span> </span></a><li>
                  <div class="clearfix"> </div>
              </ul>
            </div>
          </div>
          <!----->
          <div class="col-md-3">
            <div class="image-matter">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/men-w.jpg" /></a>
              <div class="image-bro">
                <h4>Gloria Bromley</h4>
                <p>CEO and Founder</p>
              </div>
              <ul class="img-social-stags">
                <li><a class="twitter" href="#"><span> </span></a><li>
                <li><a class="facebook" href="#"><span> </span></a><li>
                <li><a class="linkedin" href="#"><span> </span></a><li>
                  <div class="clearfix"> </div>
              </ul>
            </div>
          </div>
          <!----->
          <div class="col-md-3">
            <div class="image-matter">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/women.jpg" /></a>
              <div class="image-bro">
                <h4>Gloria Bromley</h4>
                <p>CEO and Founder</p>
              </div>
              <ul class="img-social-stags">
                <li><a class="twitter" href="#"><span> </span></a><li>
                <li><a class="facebook" href="#"><span> </span></a><li>
                <li><a class="linkedin" href="#"><span> </span></a><li>
                  <div class="clearfix"> </div>
              </ul>
            </div>
          </div>
          <!---- End ---->
          <div class="col-md-3">
            <div class="image-matter">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/1.jpg" /></a>
              <div class="image-bro">
                <h4>Gloria Bromley</h4>
                <p>CEO and Founder</p>
              </div>
              <ul class="img-social-stags">
                <li><a class="twitter" href="#"><span> </span></a><li>
                <li><a class="facebook" href="#"><span> </span></a><li>
                <li><a class="linkedin" href="#"><span> </span></a><li>
                  <div class="clearfix"> </div>
              </ul>
            </div>
          </div>
          <div class="clearfix"> </div>
          <!---- End ---->
        </div>
      </div>
    </div>

    <!---container--->
    <div class="content-part-work" id="work">
      <div class="container">
        <div class="content-work">
          <h2><span class="work"> </span>
            lovely work.</h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/sky.jpg"  alt=""/></a>
              <span class="plus"> </span>

              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/high.jpg" alt=""/></a>
              <span class="plus"> </span>
              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/road.jpg" title="sky" alt=""/></a>
              <span class="plus"> </span>
              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="clearfix"> </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/sea.jpg"  alt=""/></a>
              <span class="plus"> </span>

              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/stone.jpg" alt=""/></a>
              <span class="plus"> </span>
              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="col-md-4">
            <div class="partnership">
              <a href="#"><img class="img-responsive" src="/webstyle/214015/images/bird.jpg" title="sky" alt=""/></a>
              <span class="plus"> </span>
              <p class="partnership-guid">partnership guidlines</p>

            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
        <div class="show-me">
          <a class="show-more"href="#">SHOW ME MORE</a>
        </div>
      </div>
    </div>
    <!---container--->

    <!---container--->
    <div class="content-what" id="services">
      <div class="container">
        <div class="content-we">
          <h2><span class="we-are"> </span>
            what we do.</h2>
        </div>
        <div class="row">
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/setting.png" alt=""/></a>
            <h4>Easy theme Setup</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/pencil.png" alt=""/></a>
            <h4>pixel perfect design</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/phone.png"  alt=""/></a>
            <h4>responsive display</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/clock.png" alt=""/></a>
            <h4>24/7 support</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="clearfix"> </div>
        </div>

        <div class="row">
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/setting.png" alt=""/></a>
            <h4>Easy theme Setup</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/pencil.png" alt=""/></a>
            <h4>pixel perfect design</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/phone.png"  alt=""/></a>
            <h4>responsive display</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="col-md-3 easy-them">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/clock.png" alt=""/></a>
            <h4>24/7 support</h4>
            <p>Nunc mattis lorem in leo lobortis, ut venenatis justo commodo. Maecenas a justo nec velit egestas fermentum.</p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!---container--->
    <div class="content-features" id="features">
      <div class="container">
        <div class="content-work">
          <h2><span class="work"> </span>
            FEATURES.</h2>
        </div>
        <div class="row">
          <div class="col-md-4 features-grass">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/grass.jpg" alt=""/></a>
            <h4>Product Design: Eames Chairs</h4>
            <p>Eames designs are certainly iconic. Everyone of us know at least two or three of their famous chairs. I would even risk saying that most of us dream about having a nice Eames.</p>
          </div>
          <div class="col-md-4 features-grass">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/cycle.jpg" alt=""/></a>
            <h4>Elegant and Colorful Logos</h4>
            <p>Eames designs are certainly iconic. Everyone of us know at least two or three of their famous chairs. I would even risk saying that most of us dream about having a nice Eames.</p>
          </div>
          <div class="col-md-4 features-grass">
            <a href="#"><img class="img-responsive" src="/webstyle/214015/images/water.jpg" alt=""/></a>
            <h4>A Showcase of Creative</h4>
            <p>Eames designs are certainly iconic. Everyone of us know at least two or three of their famous chairs. I would even risk saying that most of us dream about having a nice Eames.</p>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
    <!---container--->
    <div class="content-stay" id="contact">
      <div class="container">
        <div class="content-we-touch">
          <h2><span class="we-are-touch"> </span>
            stay in touch.</h2>
        </div>
      </div>
      <div class="container">
        <div class="row contact-box">
          <div class="col-md-6 contact-info">
            <h3>contact information</h3>
            <p class="info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi metus, tristique nec dolor non, ornare sagittis dolor. Nulla vestibulum lacus sed molestie gravida.</p>
            <p class="info">Cras fermentum elit quis magna congue, vel sodales arcu vestibulum. Nunc lobortis dui magna, quis dapibus lacus </p>
          </div>

          <div class="col-md-6 contact-form">
            <form>
              <div class="row">
                <div class="col-md-6 your-name">
                  <span>YOUR NAME:</span>
                  <input type="text"name="your name">
                </div>
                <div class="col-md-6 your-name">
                  <span>YOUR EMAIL:</span>
                  <input type="text"name="your email">
                </div>
              </div>

              <div class=" your-msg">
                <span>YOUR MESSAGE:</span>
                <textarea cols="70" rows="5"name="message"> </textarea>
              </div>

              <div class="your-submit">
                <input type="submit"value="SEND MESSAGE" />

              </div>
            </form>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!---content--->
  <!---footer---->
  <div class="footer">
    <div class="container">
      <div class="footer-top">
        <div class="footer-class">
          <p>Copyright &copy; 2014.Company name All rights reserved.</p>
        </div>
        <div class="footer-class-right">
          <ul>
            <li><a class="twitter" href="#"><span> </span></a><li>
            <li><a class="facebook" href="#"><span> </span></a><li>
            <li><a class="skype" href="#"><span> </span></a><li>
            <li><a class="been" href="#"><span> </span></a><li>
            <li><a class="linkedin" href="#"><span> </span></a><li>
          </ul>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

      });
    </script>
    <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

  </div>
  <!---footer---->

  </body>
</html>