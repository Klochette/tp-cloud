import os


os.system('mysqldump --host=localhost --user=root --password=root marmishlag > ../database/dump.sql')
os.system("cd ../")
os.system("git add database")
os.system("git commit -m 'new database'")
os.system("git push")
os.system("sshpass -p 'groupe18Xd22230' ssh groupe18@20.105.199.222 sudo git --work-tree=/var/www/tp-cloud/ --git-dir=/var/www/tp-cloud/.git pull origin main")

