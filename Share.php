<!DOCTYPE html>
<html>
<head>
<title>USE-ME</title>
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
              <!-- Include the jQuery library -->
              <script src="http://code.jquery.com/jquery-1.11.1.min.js">
              </script>
              <!-- Include the jQuery Mobile library -->
              <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js">
              </script>
</head>
<body>
<section id="page1" data-role="page">
<header data-role="header" data-theme="b"><h1>LIKE AND SHARE</h1></header>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div class="fb-like" data-href="https://www.facebook.com/UseMePage" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>




<footer data-role="footer" data-theme="b"><h1></h1></footer>
</section>
</body>
</html>