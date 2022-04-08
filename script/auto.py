import os
import time

os.system('mysqldump --host=localhost --user=root --password=root marmishlag > ../database/dump.sql')
time.sleep(1)
os.system("git add ../.")
time.sleep(1)
os.system("git status")
time.sleep(1)
os.system("git commit -m 'new database'")
time.sleep(1)
os.system("git push")
time.sleep(1)
os.system("sshpass -p 'groupe18Xd22230' ssh groupe18@20.105.199.222 sudo git --work-tree=/var/www/tp-cloud/ --git-dir=/var/www/tp-cloud/.git pull origin main")
time.sleep(1)
os.system("sshpass -p 'groupe18Xd22230' ssh groupe18@20.105.199.222 sudo mysql --host=localhost --user=hugo --password=hugo123@ marmishlag < /var/www/tp-cloud/database/dump.sql")
