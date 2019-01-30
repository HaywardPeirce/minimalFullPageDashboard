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
//parse the list of sites into a PHP list
$file_sites = file('sites.txt');

//parse the config file variables into a PHP arrary
$ini_array = parse_ini_file("config.ini");

?>

<iframe src="" id="site-frame" style="width:100%; height:100vh; border:none; margin:0; padding:0; overflow:hidden;z-index: 0;">
    Your browser doesn't support iframes
</iframe>

<script>

//pass the list of sites, and the config variables in from PHP
var sites = <?php echo json_encode($file_sites) ?>;
var ini_array = <?php echo json_encode($ini_array) ?>;

//setup the variables to keeping track of which site to move to when looping through
var rotateTime = ini_array['delay'];
var counter = ini_array['delay'];
var lenSites = sites.length;
var currentSite = 0

//go to the first site before starting to loop (as the loop will wait first)
nextSite();

//loop through each second, and call the function to handle changing the counter
var timer = setInterval(function() { tick(); }, 1000);

//TODO: trim leading and trailing whitespace and new lines

//function for updating which site to move to, and setting the current site
function nextSite(site){
    
    //if we have reached the end of the list of sites, start back at the beginning
    if(currentSite == lenSites){
        currentSite = 0;
    }

    //set the source of the iframe to the URL of the current site
    document.getElementById('site-frame').src = sites[currentSite];

    currentSite++;
    
}

//function for counting down from the timer
function tick() {
    counter--;

    //if we have reached the end of the countdown timer, move to the next site and start the timer over again
    if (counter < 0) {
        counter = rotateTime;
        nextSite();
    }
}

</script>

</body>
</html>