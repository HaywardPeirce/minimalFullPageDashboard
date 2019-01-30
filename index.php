<!DOCTYPE html>
<html>

<style>
::-webkit-scrollbar { 
    display: none; 
}

body {
    margin: 0px;
}

</style>

<body>

<?php

$file_sites = file('sites.txt');
// foreach ($file_sites as $site) {
//     echo $site;
// }

// Parse without sections
$ini_array = parse_ini_file("config.ini");
//print_r($ini_array);

$seconds = (isset($ini_array['delay'])) ? $ini_array['delay'] : DEFAULT_ROTATE_SPEED;

?>

<iframe src="" id="site-frame" style="width:100%; height:100vh; border:none; margin:0; padding:0; overflow:hidden;z-index: 0;">
    Your browser doesn't support iframes
</iframe>

<script>

var sites = <?php echo json_encode($file_sites) ?>;
var ini_array = <?php echo json_encode($ini_array) ?>;

var rotateTime = ini_array['delay'];
var counter = ini_array['delay'];

var lenSites = sites.length;
//console.log(lenSites);
//console.log(lenSites);
var currentSite = 0

nextSite();
var timer = setInterval(function() { tick(); }, 1000);

//TODO: trim leading and trailing whitespace and new lines

//console.log(sites);
//console.log(ini_array);

function nextSite(site){
    
    if(currentSite == lenSites){
        currentSite = 0;
    }

    document.getElementById('site-frame').src = sites[currentSite];

    currentSite++;
    
    //console.log(currentSite);
}

function tick() {
    counter--;
    if (counter < 0) {
        counter = rotateTime;
        nextSite();
    }
}

</script>

</body>
</html>