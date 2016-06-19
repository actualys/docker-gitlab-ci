FROM drupaldocker/php:cli-7.0
MAINTAINER drupal-docker

RUN apt-get update && apt-get install -y mysql-client openssh-client rsync wget curl \
  && composer global require drush/drush:8.* \
  && ln -s ~/.composer/vendor/bin/drush /usr/local/bin/drush \
  && drush core-status -y \
  && rm -rf /var/lib/apt/lists/*

COPY setup-ssh.sh /
RUN chmod +x /setup-ssh.sh

CMD ["drush", "core-cli"]
