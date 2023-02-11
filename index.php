<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    <script type="text/javascript" src="instascan.min.js"></script>
  </head>
  <body style="background-color: black;">
    <div style="display: block; width: 100%; margin: 0px auto;color: white;background-color: black;">
        <div >
            <center><h1 style="padding-left: 20px;">Vuelva a escanear el QR</h1></center>
          <center><video id="preview" width="350px" height="350px" style="border-radius: 20px;"></video></center>
        </div>
    </div>
   
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        location.replace(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
  </body>
</html>