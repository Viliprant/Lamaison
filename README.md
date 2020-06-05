## Projet boutique LaMaison

<p> Il faut au préalable créer votre base de données et modifier votre .env </p>

<p> Tout d'abord, installer les dépendences composer puis npm </p>

<pre><code>composer install
npm install</pre></code>

<p> Lancer la création des données via le seeder</p>

<pre><code>php artisan migrate:fresh --seed</pre></code>

<p>Lancer un serveur PHP</p>

<pre><code>php artisan serve</pre></code>

<p> Il ne vous reste plus qu'à vous connecter sur votre localhost avec votre navigateur </p>
