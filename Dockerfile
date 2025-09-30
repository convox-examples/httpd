FROM httpd:2.4-alpine

# Copy static website files
COPY ./public-html/ /usr/local/apache2/htdocs/

# Use default Apache configuration with minor adjustments
RUN echo 'ServerName localhost' >> /usr/local/apache2/conf/httpd.conf

EXPOSE 80