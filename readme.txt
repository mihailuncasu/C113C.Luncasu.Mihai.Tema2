Aplicatia web a fost construita partial, incluzand si partea de server.
Toate itemele din Top Navigation Bar si Side Menu sunt luate din baza de date.
De asemenea, toate produsele, pozele si orice alte date.

Partea de login si register sunt interconectate astfel: 
-> user-ul poate selecta sa se logheze;
-> pe pagina de log in va gasi un singur camp unde poate introduce email-ul;
-> daca email-ul este gasit in baza de date (proces realizat folosind o cerere AJAX) va aparea si campul pentru parola (admin@gmail.com este deja in baza de date);
-> daca email-ul nu este gasit, userul are opriunea sa aleaga daca doreste sa se inregistreze sau sa se intoarca pe pagina principala;
-> logo-ul serveste drept buton de back-to-home;

-> Shopping cart-ul este complet functional, realizand cereri AJAX pentru a dispune produsele selectate de catre user;
-> Aceste produse sunt stocate in o sesiune php (in acest mod se va realiza si logarea care urmeaza sa fie implementata);

-> Pentru baza de date, in fisierul db_dumps se gaseste un script cu dump-ul pentru baza de date folosita de catre mine pentru testarea site-ului; 
-> Pentru a functiona styling-ul, este nevoie de conexiune la internet deoarece resursele externe (bootstrap si jquery) folosesc CDN-uri;
-> Incluzand si backend-ul, este nevoie de Xampp pentru ca aplicatia sa ruleze;

Partea de vizualizarea a unui produs nu este complet implementata (styling-ul lipseste).
Aplicatia in sine duce lipsa de "styling" dar aceasta problema se va rezolva in viitor cu siguranta.