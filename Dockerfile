FROM mysql
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=studentapp
COPY init.sql /docker-enterypoint-initdb.d/
EXPOSE 3306
CMD ["mysqld"]