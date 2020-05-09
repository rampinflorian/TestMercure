# TestMercure
Test

Télécharger la librairie qui correspond et l'extraire dans un dossier "Mercure" à la racine du projet : 

https://github.com/dunglas/mercure/releases

.\mercure\mercure.exe --jwt-key='aVerySecretKey' --addr='localhost:3000' --allow-anonymous

ne fonctionne pas : 
.\mercure\mercure.exe --jwt-key='aVerySecretKey' --addr='localhost:3000' --allow-anonymous --cors-allowed-origins='*'

Sans authorization => Dans HomeController : 

Supprimer $target dans le Update. 
