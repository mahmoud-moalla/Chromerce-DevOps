FROM php:apache

# Set the Apache server name
RUN echo 'ServerName chromerce-www-1' >> /etc/apache2/apache2.conf

# Install required packages and PHP extensions
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    libzip-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install mysqli pdo_mysql \
    && a2enmod rewrite

# Copy necessary files
COPY . /var/www/html

# Set environment variables for database connection
ENV DB_HOST=db
ENV DB_PORT=3306
ENV DB_USER=chromerce
ENV DB_PASSWORD=password
ENV DB_NAME=chromerce

# Expose the port Apache is listening on (if needed, depends on your application)
EXPOSE 80

# Command to start Apache
CMD ["apache2-foreground"]
