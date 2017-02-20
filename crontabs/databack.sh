#!/bin/bash
DUMP=/usr/bin/mysqldump 
OUT_DIR=/usr/share/mysql/mysql_data_backup
LINUX_USER=root
#DB_NAME=comment shopping user wealth
DB_USER=root
DB_PASS=shike123
DAYS=30
cd $OUT_DIR
DATE=`date +%Y-%m-%d`
OUT_SQL=$DATE.sql
TAR_SQL="mysql_bak_$DATE.gz"
$DUMP -u$DB_USER -p$DB_PASS --database shike |gzip >$TAR_SQL
# tar -czf $TAR_SQL ./$OUT_SQL
# rm $OUT_SQL
chown $LINUX_USER:$LINUX_USER $OUT_DIR/$TAR_SQL
find $OUT_DIR -name "mysql_bak*" -type f -mtime +$DAYS -exec rm {} \;
