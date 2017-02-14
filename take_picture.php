<?php
//recup du dernier chiffre pour le nom de la photo qui va etre prise
$lastImgNum = file_get_contents('/var/www/html/lastImgNum.txt');
echo "lastImgNum read for this use is ".$lastImgNum."<br>";

//on incrémente de 1 pour la nouvelle photo
$lastImgNum+=1;
//On écrit ce nombre dans le fichier
file_put_contents('/var/www/html/lastImgNum.txt', $lastImgNum);
echo "lastImgNum written for next use is ".$lastImgNum."<br>";

//on normalise le nom de l'image en concaténant des zéros au précédent nombre
$imgName=str_pad($lastImgNum,6,"0",STR_PAD_LEFT);
echo "imgName for this use is ".$imgName."<br>";

//on execute une commande qui va déclencher la caméra branchée à la raspberry et on la stocke dans le dossier '/var/www/img' 
// height 480 ; width 640 ; qualité de l'image (comprise entre 1 et 100, 5 suffit largement) 5 ; temps d'ouverture de l'objectif 500ms ; -o : dossier d'enregistrement de l'image
shell_exec("raspistill -q 5 -w 640 -h 480 -t 500 -o /var/www/html/images/cam_pics/".$imgName.".jpg");
echo "Shot image ".$imgName.".jpg<br>";

//on écrit le nom de l'image dans 'ajax_info.txt' pour qu'on puisse l'utiliser en string de src d'une balise image HTML
$imgName="images/cam_pics/".$imgName.".jpg";
file_put_contents('/var/www/html/ajax_info.txt', $imgName);
echo "Saved ".$imgName." to /var/www/html/ajax_info.txt <br>";
?>
