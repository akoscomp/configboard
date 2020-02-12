# configboard
Simple config editor with file backand

Dynamicaly build a website from XML data and from website can update the XML records.
It's usefull if you want to offer a settings page and you want to use this data on server side.

## Dependency ##
apache, nginx, etc. webserver, with php support

php-xml

## Instalation ##
It's writed in PHP. You need to download the content in wwwdata and install php-xml.

apt-get install php-xml
git clone https://github.com/akoscomp/configboard.git /var/www/html/configboard
chown www-data:www-data /var/www/html/configboard/data.xml

