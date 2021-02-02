## Руководство по установке веб приложения "Conference"

1. Програмное обеспечение:
    - Apache(веб сервер)
    - PHP(версии 7.4 и выше)
    - MySQL
    
2. Установка:
    1. Для начала потребуется выгрузить дамп базы данных. Для этого, в консоли, потребуется зайти в директорию с дампом(current/sql). Далее прописываем команду
       (mysql -uUSER -pPASSWORD -f mydb < mydb_dump.sql), где  USER - имя пользователя MySQL, PASSWORD - пароль пользователя MySQL, mydb - название вашей базы данных, mydb_dump.sql - дамп базы данных (current/sql/database.sql).
    2. После выгрузки базы данных, нужно настроить конфиг Apache. Создайте файл "yourdomain.conf", где yourdomain - название вашего сайта, и прописать туда следующие строки.

           <VirtualHost *:80>
           ServerName yourdomain.loc
           DocumentRoot /home/user/www/yourdomain
    
                <Directory /home/user/www/yourdomain>
                    Options indexes FollowSymlinks
                    AllowOverride All
                    Require all granted
                 </Directory>
    
                ErrorLog ${APACHE_LOG_DIR}/error.log
                 CustomLog ${APACHE_LOG_DIR}/access.log combined
            </VirtualHost>
       
        yourdomain - название вашего сайта,
        user - имя пользователя системы.
       Перезагрузите Apache.
    3. Далее нужно отредактировать файл hosts по пути (/etc/hosts). Потребутся добавить одну строку в файл, строка должна выглядеть так: 127.0.0.1	yourdomain.loc, где yourdomain - название вашего сайта.
    4. После выполнение вышеперечисленных шагов, создайте в директории /home/user/ папку с названием "www", и скопируйте туда папку с проектом.
    5. Что бы приложение смогло получить доступ к баде данных, отредактируйте конфиг (current/app/config/config.php).
    ****
    Всё готово.
    



