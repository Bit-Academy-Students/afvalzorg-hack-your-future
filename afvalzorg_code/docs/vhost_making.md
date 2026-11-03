Virtuele Host aanmaken

Ga naar: C:\xampp\apache\conf\extra\httpd-vhosts.conf

Voeg onderaan het bestand een VirtualHost als deze toe:

<VirtualHost *:80>
  ServerName "vul hier de naam in die je de server wil geven"
  DocumentRoot "Vul hier het pad naar jouw map in"
  <Directory "Vul hier het pad naar jouw map in">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    Require local
  </Directory>
</VirtualHost>

Herstart Apache (via het XAMPP control panel)!

Hosts file aanpassen
Ga naar C:\Windows\System32\drivers\etc\hosts en voeg toe:

127.0.0.1 <servername


LET OP: je hebt Administrator rechten nodig om dit te kunnen opslaan!

Als je nu in je browser http://<servername>

verwissel <servername met de naam die je de server heb gegeven in de virtualhost file
