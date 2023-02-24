# PHP_proj

Struktura:

.app/
  controllers/
  HomeController.php
   ...
.models/
    UserModel.php
    ...
.views/
.home/
    index.php
    ...
. ...
.config.php
.routes.php
.public/
    css/
    js/
    index.php

 
    Katalog app zawiera wszystkie kontrolery, modele i widoki. Kontrolery przechowują logikę biznesową i obsługują żądania HTTP. Modele reprezentują dane i zazwyczaj odpowiadają za interakcję z bazą danych lub innymi źródłami danych. Widoki są plikami HTML, które wyświetlają dane dla użytkowników.

    Katalog public zawiera wszystkie pliki publiczne, które są dostępne dla użytkowników końcowych. To w tym katalogu powinny być pliki CSS, JS oraz obrazy.

    Plik index.php w katalogu public jest punktem wejścia do aplikacji. Ten plik powinien inicjować aplikację i wywoływać odpowiednie kontrolery w zależności od ścieżki URL.

    Plik config.php może przechowywać ustawienia aplikacji, takie jak połączenie z bazą danych, stałe wartości, itp.

    Plik routes.php definiuje, jakie kontrolery powinny być wywoływane w zależności od ścieżki URL. Może to być wykonane za pomocą routingu lub innej biblioteki.