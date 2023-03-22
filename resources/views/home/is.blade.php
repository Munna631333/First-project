<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<script>
function show(){

    document.getElementById('content').style.height="100px"
    document.getElementById('content').style.display="block"
    document.getElementById('show').style.display="none"
}

function hide(){

document.getElementById('content').style.height="0px"
document.getElementById('content').style.display="none"
document.getElementById('show').style.display="inline"
}
</script>
<body>

<h1>Agricultural Information <button id="show" onclick="show()">show</button></h1>

<div id="content">

<p>sfamdfjgafdhasdfdfjagh</p>
<button id="hide" onclick="hide()">hide</button>
</div>

 
 
 
</body>
</html>