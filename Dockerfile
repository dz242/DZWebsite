FROM httpd:2.4
COPY "$pwd"/website/ /usr/lib/apache2/htdocs

