<html>
  <head>
    <meta charset="utf-8">
    <title>Instagram Downloader</title>
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
          <li><a href="https://rezzaaapr.my.id">Facebook Downloader</a></li>
          <li><a href="igdown.php">Instagram Downloader</a></li>

        </ul>
      </div>
      </div>
    </nav>
    <div class="content">
      <center><h2>Instagram Donwloader</h2></center>
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
  $title = preg_match('/instagram.com\/p\/(.*?)\//ims', $_POST['url'], $matches) ? $matches[1] : null;
  $output=file_get_contents('https://instagram.com/p/'.$title.'/?__a=1');
  $profile = json_decode($output, true);
  $img_url = $profile["graphql"]["shortcode_media"]["display_url"];
  $url = $profile["graphql"]["shortcode_media"]["video_url"];
  echo '<center><img class="thumb"'.'src='.$img_url.'></center>';
  echo '<center><a href='.$url.' </a><button class="button button5">Download Video</button></center>';
}