FROM ubuntu:20.04

# Install Git
RUN apt-get update && apt-get install -y git



# Install Nginx
RUN apt-get update && apt-get install -y nginx

# Install PHP 7.4-fpm
RUN apt-get install -y software-properties-common
RUN add-apt-repository ppa:ondrej/php
RUN apt-get update
RUN apt-get install -y php7.4-fpm

# Clone the amr-last repository
RUN git clone https://github.com/moazelgandy2/amr-last.git /var/www/html 

# Enable PHP in Nginx
RUN echo "index index.php index.html index.htm;" >> /etc/nginx/sites-available/default
RUN echo "location ~ \.php$ {" >> /etc/nginx/sites-available/default
RUN echo "include snippets/fastcgi-php.conf;" >> /etc/nginx/sites-available/default
RUN echo "fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;" >> /etc/nginx/sites-available/default
RUN echo "}" >> /etc/nginx/sites-available/default

CMD ["nginx", "-g", "daemon off;"]
