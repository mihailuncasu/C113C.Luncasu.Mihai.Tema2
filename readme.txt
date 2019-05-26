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

1) Search bar-ul 
Trimitre catre metoda "search" din clasa "home" valoarea din campul de input. Aici se face un query %LIKE% dupa acel nume, se gaseste sau nu un produs iar apoi se afiseaza sau nu produsul, timitand id-ul

2) Mail-ul de activare a contului.
In prima faza, la inregistrare user-ul va avea statusul inactiv.
Dupa ce se inregistreaza, acesta primeste un mail cu un link de activare care poate fi folosit doar o data.
Link-ul este format din id-ul userului(pentru a putea fi indetificat) si un md5 peste un token generat random care este asignat fiecarui user la creeara contului.
Daca token-ul si id-ul corespund, statusul este schimbat in 1 si este generat alt token.

3) Filtrarea are loc prin selectarea doar anumitor produse ce au in campul json_params, camp codat json, la indexul 'categorie' valoarea categoriei respective.

