<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Index view</h1>
    <h2>home</h2>
    <a href="<?php echo url("/"); ?>/Absen">Absen</a>
</body>
<script>
    // xmlHttp.open("GET", "/Absen/rekam")
    function ajax(url){
        const xmlHttp = new XMLHttpRequest()
        xmlHttp.open("GET", "/Absen/"+url)
        xmlHttp.onload=function(){
            console.log(JSON.parse(this.responseText));
        }
        xmlHttp.send()
    }
    // bisa multiple
    ajax("rekam")
    ajax("akun")
</script>
</html>