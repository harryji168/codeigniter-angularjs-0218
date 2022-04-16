FROM php:7.4-apache
#RUN docker-php-ext-install mysqli

WORKDIR /usr/src/app

ENV PORT 8089
ENV HOST 0.0.0.0

# Copy local code to the container image.
COPY . . 

RUN cd public 

CMD php index.php