#!/bin/bash

wc_bin="/usr/bin/wc"
grep_bin="/bin/grep"
awk_bin="/bin/awk"
ps_bin="/bin/ps"

logfile="/var/www/elevel/data/www/elevel.ru/_garm/check_script_nosudo/check.log"
script_path="/var/www/elevel/data/www/elevel.ru/_garm/daemon.php"


log(){
   message="$(date +"%y-%m-%d %T") $@"
   echo $message >>$logfile
}


count_proc=`${ps_bin} ax | ${grep_bin} -v grep | ${grep_bin} daemon.php | ${wc_bin} -l`
  if [ "${count_proc}" == "0" ]
    then
      log "process is not running, start the process daemon.php!"
      /usr/bin/php ${script_path}&
    else
        log "script daemon.php alredy run!"  
fi
