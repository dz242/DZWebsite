FROM httpd:2.4

# To build this shit, use the below docker build command
# docker build -t dz-website .

# To run this shit with the volume and port stuff, use the below docker run command:
# [NOTE] The command must be run from the source git repo directory
# docker run -d --name dz-apache2 -p 5301:80 -v ${PWD}/website:/usr/local/apache2/htdocs/ dz-website

# Only one real line lol
