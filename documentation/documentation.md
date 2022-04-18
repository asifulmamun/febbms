# February Blood Management System
Download this Application

# INSTALLATION
    
    Step-1:
    -----
    open root folder and copy the init-sammple.php file with rename init.php
    open the init.php file from root file and edit editable information with your requirements.

    Step-2:
    --------
    Open documentation folder and oepn the db.sql file with text editor copy the sql code for and query with phpmyadmin.
    Before query febbms change with your database name.

    Step-3:
    ------
    open config folder from root folder.
    Then copy the conn-smaple.php file in same directory and rename this file to conn.php
    Open the conn.php file with text editor and change database information with your database.

    Step-4:
    -------
    All done.. now you can serve this site.


# Customization

    Information Change:
    ------------------
    Go to root folder than open the init.php file with text editor and change all information variabel value with your information.
            
            From
            =======
                /*  @ Information
                    @ You can change any value from her no effect to side.
                    # Don't change the variable name just you can change only value from below.
                -------------- */

                // - Can Change with your project
                $site_name_short = 'FEBBMS';
                $site_name = 'February Blood Management System';
                $site_description = 'Donate Blood | Save Life';
                $logo_link = '';


            To
            ========
                /*  @ Information
                    @ You can change any value from her no effect to side.
                    # Don't change the variable name just you can change only value from below.
                -------------- */

                // - Can Change with your project
                $site_name_short = 'Ahoban Blood';
                $site_name = 'আহ্বান রক্তদান সংস্থা';
                $site_description = 'ধর্ম বর্ণ নির্বিশেষে, রক্ত দিবো হেসে হেসে';
                $logo_link = '';

    
    Logo Change:
    -----------
    Go to root folder>layout/assets/img/ then create a folder directory name 'uploads'
    - Must be directory name as same 'uploads'
        then here you can create any folder or directly upload your logo.
    - Go to root folder again and open the init.php file with texte editor.
        You can see a text ($logo_link = '';) paste your logo link to here example ($logo_link = './laout/assets/uloads/mylogo.png';)



If any problem
feel free mail me: hello@asifulmamun.info

Thank You
Al Mamun - asifulmamun
Kuliarchar/Mithamain - Kishoreganj