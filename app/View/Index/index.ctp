	<?php $this->Html->meta('viewport', array('content' => 'width=device-width, initial-scale=1')); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Montserrat:400,700","Bitter:400,700"]
      }
    });
  </script>
  <link rel="shortcut icon" type="image/x-icon" href="https://y7v4p6k4.ssl.hwcdn.net/placeholder/favicon.ico">
  <link rel="apple-touch-icon" href="https://y7v4p6k4.ssl.hwcdn.net/51d1bb05fc804b2621000001/51e06f0756878bb26a000008_webclip-slate.png">
</head>
<body>
  <div class="section hero">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6">
					<?php echo $this->Html->image('iphone.png',array('width' => '330px', 'class' => 'hero-iphone')); ?>
        </div>
        <div class="w-col w-col-6 call-to-action">
          <h1 class="hero-header">Show off your beautiful photos.</h1>
          <p class="hero-subtitle">An iPhone app that lets you create beautiful photo albums with your favorite photos.</p><a class="button" href="#">Sign Up</a>
        </div>
      </div>
    </div>
  </div>
  <div class="w-hidden-small w-hidden-tiny section grey"></div>
  <div class="w-clearfix section" id="features">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6">
          <h2>Organize your photos</h2>
          <p>Make your photos easy to digest by placing them into little buckets of awesomeness. Tag it, name it, like it, doodle on it, protect it, stare at it, hug it. Everything that your photos need to get organized.</p>
          <div class="w-row">
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Album</div>
							<?php echo $this->Html->image('album.png',array('width' => '57')); ?>
            </div>
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Funnel</div>
							<?php echo $this->Html->image('filter.png',array('width' => '57px')); ?>
            </div>
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Folders</div>
							<?php echo $this->Html->image('folder.png',array('width' => '57px')); ?>
            </div>
          </div>
        </div>
        <div class="w-col w-col-6 center">
					<?php echo $this->Html->image('first-section.jpg', array('width' => '306')); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="section grey">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6 center">
					<?php echo $this->Html->image('second-section.jpg', array('width' => '274')); ?>
        </div>
        <div class="w-col w-col-6">
          <h2>Show off your gallery</h2>
          <p>You don’t want boring layouts and we don’t want you to have boring layouts. It’s all about stacking things in creative ways like a boss.</p>
          <div class="w-row">
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Standard</div>
							<?php echo $this->Html->image('basic.png',array('width' => '57px')); ?>
            </div>
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Stacked</div>
							<?php echo $this->Html->image('stacked.png',array('width' => '57px')); ?>
            </div>
            <div class="w-col w-col-4 w-col-small-4 w-col-tiny-4">
              <div class="icon-title">Tetris</div>
							<?php echo $this->Html->image('tetris.png',array('width' => '57px')); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-6">
          <h2>Share with friends</h2>
          <p>Share your photos all over the internet tubes like a real magician! Post your photos in an album and watch your album be spread like a virus all over the web clouds. You’ll love this!</p>
          <div class="w-widget w-widget-twitter social-widget">
            <iframe src="https://platform.twitter.com/widgets/tweet_button.html#url=http%3A%2F%2Fwebflow.com&amp;counturl=webflow.com&amp;text=Check%20out%20this%20site&amp;count=vertical&amp;size=m&amp;dnt=true" scrolling="no" frameborder="0" allowtransparency="true"
            style="border: none; overflow: hidden; width: 55px; height: 62px;"></iframe>
          </div>
          <div class="w-widget w-widget-gplus social-widget">
            <div class="g-plusone" data-href="http://webflow.com" data-size="tall" data-annotation="bubble" data-width="120" data-recommendations="false" id="___plusone_0" style="width: 50px; height: 60px; text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; background-position: initial initial; background-repeat: initial initial;"></div>
          </div>
          <div class="w-widget w-widget-facebook social-widget">
            <iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2Fwebflow&amp;layout=box_count&amp;action=like&amp;show_faces=false&amp;share=false" scrolling="no" frameborder="0" allowtransparency="true" style="border: none; overflow: hidden; width: 55px; height: 65px;"></iframe>
          </div>
        </div>
        <div class="w-col w-col-6 center">
					<?php echo $this->Html->image('third-section.jpg', array('width' => '250')); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="section purple">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-8">
          <h2 class="price-text">test</h2>
        </div>
        <div class="w-col w-col-4"></div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" src="js/webflow.js"></script>
</body>
</html>
