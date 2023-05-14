<h2>Description</h2>
A simple CRUD application for managing a shop inventory, made using Symfony framework.
<h2>Functionality</h2>
<ul>
    <li>List of items added, with item's price and amount.</li>
    <li>Adding, updating and deleting items.</li>
    <li>Verification for item fields (field must not by empty, title longer than 3 characters, price higher than zero).</li>
    <li>Increasing and decreasing sort by item ID and title.</li>
    <li>Total price of all items and total amount of all items.</li>
    <li>Search items by title and/or item ID.</li>
</ul>
<h2>Launch Instructions</h2>
<ol>
    <li>Pull the application from the GitHub directory.</li>
    <li>Run your CLI tool as Administrator, set the current directory to the project's main directory and run 'composer install' to auto-install required dependencies.</li>
    <li>Migrate the database schema by running php bin/console doctrine:migrations:migrate on your cli. Type 'yes' and click enter when prompted.</li>
    <li>Load the data to the database by running php bin/console doctrine:fixtures:load on your cli. Type 'yes' and click enter when prompted.</li>
    <li>After the installation is complete, run 'symfony server:start' to launch the development server.</li>
    <li>You should be able to access the project at http://127.0.0.1:8000/ on your browser.</li>
</ol>