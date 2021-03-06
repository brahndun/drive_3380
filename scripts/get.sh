#!/bin/bash

git clone https://github.com/brahndun/drive_3380.git /home/git/drive_3380 && echo "CLONED"

grep -Eo "1[0-9]{9}" /home/git/drive_3380/.git/logs/refs/heads/master > /home/git/timestamps/gitcommit

chmod 777 /home/git/timestamps/gitcommit

if [ $(cat /home/git/timestamps/lastcommit) -gt $(cat /home/git/timestamps/gitcommit) ]; then
    rsync -r /home/git/drive_3380/* /var/www/html/ && echo "FILES MOVED"
    rm -rf /home/git/drive_3380 && echo "GIT REPO DELETED"
    rm -rf /var/www/html/README.md /var/www/html/.git && echo "EXCESS FILES DELETED"
    date +%s > /home/git/timestamps/lastcommit
    chmod 777 /home/git/timestamps/lastcommit
else
    rsync -r /home/git/drive_3380/* /var/www/html/ && echo "FILES MOVED"
    rm -rf /home/git/drive_3380 && echo "GIT REPO DELETED"
    rm -rf /var/www/html/README.md /var/www/html/.git && echo "EXCESS FILES DELETED"
fi
