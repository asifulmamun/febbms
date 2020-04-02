# February Blood Management System

# INSTALLATION

    #Database Create
        database name : febbms

        copy (documentation > #db.sql) file all query and run it on database query for create table row and column etc.
        or import (documentation > #db.sql) to your database but database name must febbms.
    
    #After database create then Input some data mannually to users table (password sha1) encryption.

    
    

    #File Changing   

    Step-1: Donwnload this file as zip. Extract to installation root folder or under folder.

            Root folder : root > all files (index.php, init.php, login.php etc)

            Other Folder : root > febbms (anyname or under more then folder where you want to install) > all files (index.php, init.php, login.php etc)


    Step-2: Open main file configuration > #conn.php

            Remove comment from line 20 to 25 and change with your database information.

            Delete all code from from line 1 to 19.


    Step-3: Open #init.php from main file. Change Home url where you have installed.

            Example: $home = '/'; // home url (if root folder '/' if other folder '/othter-Folder/')
            
            Example-2: $home = '/febbms/';

            Example-3: $home = '/your-other-folder/';



    Step-4: Open admin > #init.php from admin folder. Change Home url where you have installed.

            Example: $home = '/admin/'; // home url (if root folder '/admin/' if other folder '/othter-Folder/admin/')
            
            Example-2: $home = '/febbms/admin/';

            Example-3: $home = '/other-your-folder/admin/';


# LINK OR URL

    #Site link: Your Domain or installation link

        Example: yourdomain-or-installation.com/


    #Admin Panel Link: Your domain or installation link/admin

        Example: yourdomain-or-installation.com/admin


