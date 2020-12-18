<html>
  <head>
    <meta charset="utf-8">
    <title>Facebook Downloader</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <nav>
      <div class="wrap">
      <div class="title">
       <h3>IG-FB</h3>
      </div>
      <div class="tblmenubox">
        <div class="togel tblmenu">

        </div>
      </div>
      <div class="menu">
        <ul>
          <li><a href="fbdown.php">Facebook Downloader</a></li>
          <li><a href="igdown.php">Instagram Downloader</a></li>

        </ul>
      </div>
      </div>
    </nav>
    <div class="content">
      <center><h2>Facebook Downloader</h2></center>
      <center><form action="#Downloader" method="post" id="form1">
         <input type="text" name="url" placeholder="Enter Video Url">
       </form>
     </center>
     <center><button type="submit" form="form1" value="submit" class="button button5">Submit</button></center>
     <footer><p>Made With ❤️ By Rezzaapr</p></footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
      $(".togel.tblmenu").click(function () {
      $(".menu").toggleClass("sh");
      });
    </script>
    </html>
  </body>
<?php
if(isset($_POST['url'])){
  $url= preg_match('/facebook.com\/(.*)/ims', $_POST['url'], $matches) ? $matches[1] : null;
  $options  = array('http' => array('user_agent' => 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:79.0) Gecko/20100101 Firefox/79.0'));
  $context  = stream_context_create($options);
  $content= file_get_contents('https://mbasic.facebook.com/'.$url, false, $context);
  $vurl = preg_match('/<a href=\"\/video_redirect\/\?src\=(.*?)\"/ims', $content, $matches) ? $matches[1] : null;
  $thumb = preg_match('/<img src=\"https:\/\/z-m-scontent(.*?)\"/ims', $content, $matches) ? $matches[1] : null;
  $title = preg_match('/<head><title>(.*?)<\/title>/ims', $content, $matches) ? $matches[1] : null;
  $vu = urldecode($vurl);
  if ($vu == null){
    echo '<center><h2>Error! Video Mungkin Bersifat Private</h2>';
  } else {
    echo '<center><img class="thumb"'.'src=https://z-m-scontent'.$thumb.'></center>';
    echo '<center><h4>'.$title.' </h4></center>';
    echo '<center><a href='.$vu.' </a><button class="button button5">Download Video</button></center>';
  }
  }