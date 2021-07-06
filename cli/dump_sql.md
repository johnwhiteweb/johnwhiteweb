
Files Path (files path maybe different between servers): 
cd /var/www/html/

Create backup file for the current folder:
tar -czvf  06-07-2021.tar.gz .

Create Database Backup: 
mysqldump -p -h localhost -u {user} {database} >06-07-2021.sql

change {user} to the database user  (you can take it from wp-config.php)
change {database}  to the database name  (you can take it from wp-config.php)
after run the mysqldump you need to enetr the database user password (Enter password:)




to copy files to tnother server: 

cd /path to files 
wget https://ewxample.com/06-07-2021.tar.gz
wget https://ewxample.com/06-07-2021.sql

extract the tar.gz file:
tar –xvzf 06-07-2021.tar.gz

restor the database:
mysqldump -p -h localhost -u {user} {database} <06-07-2021.sql
change {user} to the database user  (you can take it from wp-config.php)
change {database}  to the database name  (you can take it from wp-config.php)
after run the mysqldump you need to enetr the database user password (Enter password:)