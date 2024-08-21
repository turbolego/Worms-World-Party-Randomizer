<?php

/////////////////////////////////////////////////////////////////////
// This is the only portion of the code you may need to change.
// Indicate the location of your images 
$root = '';
// use if specifying path from root
//$root = $_SERVER['DOCUMENT_ROOT'];

$path = 'images/';
$path2 = 'equip/';

// End of user modified section 
/////////////////////////////////////////////////////////////////////
 
function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}

function getRandomFromArray($ar) {
    mt_srand( (double)microtime() * 1000000 ); // php 4.2+ not needed
    $num = array_rand($ar);
    return $ar[$num];
}

// Obtain list of images from directory 
$imgList = getImagesFromDir($root . $path);
$imgList2 = getImagesFromDir($root . $path2);


$img = getRandomFromArray($imgList);
$img2 = getRandomFromArray($imgList2);

if(isset($_POST["special"]))
{
	$img = "120px-Superbananaicon.png";
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">

<meta charset="utf-8" />
<title>For Fun mode randomizer!</title>
<style type="text/css">
body { font: 14px/1.3 verdana, arial, helvetica, sans-serif; }
h1 { font-size:1.3em; }
h2 { font-size:1.2em; }
a:link { color:#33c; } 
a:visited { color:#339; }
p { max-width: 60em; }
#b { background: #FFFFFF; border: 0px; inline: 0px; }
#reroll { background:url("roll.png"); }

/* so linked image won't have border */
a img { border:none; }
</style>
</head>
<body>
<center>
<h1>"For Fun" Randomizer!</h1>

<p><p>This is a randomizer for the "For Fun" mode<br>in Worms World Party on the Dreamcast!<br>
Use this webpage as a "diceroll" to select one weapon <br>and one equipment that the player can use for one turn.<br>
The player can also use contents from crates,<br> but only on the turn that the crate was captured.<br>
Have fun!</p></p>

<!-- image displays here -->
<div><img src="<?php echo $path . $img ?>" alt="" /></div>
<div><img src="<?php echo $path2 . $img2 ?>" alt="" /></div>
<form action="" method="get">
	<input type="image" src="roll.png" id="reroll" value="" />
</form>
<!--- <div><a href="#" onclick="window.location(http://turbolego.com/worms/randomizer.php);"><img src="roll.png" border="1"></a></div> --->
<form action="" method="post">
	<input type="hidden" name="special" value="" />
	<input type="submit" value="." id="b" />
</form>



</center>


</body>
</html>