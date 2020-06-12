## yii2-orcl12c ##
Plain Yii2 basic with modified Gii core. Mainly intended to provide UMN developers with ready to use Yii2 basic that is compatible with dev and prod environment. 

## What's the difference between this and the original Yii2? ##
Functionality wise, none. This repo is meant to store all the modifications needed to make Yii2 performance better when it is paired with Oracle 12c or the newer versions (not tested yet). There might be additions along the way when more performance issues with Oracle 12c arise - or when there are major updates in Yii2 new releases.

#### This repo contains no program thus should only be used as a base - all your templates & plugins need to be installed manually ####

## Fixes ##
Gii's slow model generation when `All relations` option is selected:
  * Prevents Gii from gathering all constraints from the active Oracle 12c schema which isn't efficient due to how slow the queries to CONSTRAINT views are (this wasn't the case with the older Oracle versions). The only constraints that will be queried are the ones linked to the generated model's table. This allows table's relationship code to be generated within a reasonable speed
  * Optimizes a few SQL for faster queries

## Notes for new UMN developers ##
It is recommended to use this repo as a base for your PHP project development. For setup, refer to the instructions below:

**A. If your development environment is local (FOR STUDENTS):**
1. Make sure that the Oracle 12c database service is up and running
2. Download Oracle 12c instant client and install it on your machine (Choose Version 12.2.0.1.0 Basic Package): 
    * For 32 bit Windows : https://www.oracle.com/database/technologies/instant-client/microsoft-windows-32-downloads.html 
    * For 64 bit Windows : https://www.oracle.com/database/technologies/instant-client/winx64-64-downloads.htmls
3. Open PHP.ini and make sure that both `extension=oci8_12c` and `extension=pdo_oci` are enabled by removing the `;` (semicollon)
4. Add instantclient directory to your env variable:
    * Click Start > Search Edit environment Variables > Open
    * Select Path > Click Edit...
    * Click New and paste your instant client installation folder (e.g `C:\oracle\instantclient_12_2`)
    * Click Ok
5. Restart windows
6. Download or clone this repo and put it in your webserver (e.g `htdocs` for apache). You can rename the downloaded folder's name to your project's name if you like.
7. Open `/config/db.php` in Yii2 folder
8. Edit yii2 db connection string to connect to Oracle:
   * Replace `IP_ADDR` with `localhost`
   * Replace `PORT` with your Oracle TCP port (default is `1521`)
   * Replace `SERVICE_NAME` with the Service you'd like to connect to (default is `ORCL`)
   * Replace `DB_USER` and `DB_PASS` with your Oracle credentials
   * It is also recommended to set `enableSchemaCache` as `true`
9. Start your webserver
10. Go to http://localhost/YOUR_YII2_FOLDER_NAME/web/index.php?r=gii%2Fdefault%2Fview&id=model to test. If there's no error then you're good to start coding your project!
 
**B. If you have an access to the development server (FOR IT UMN DEV):**
1. Connect to development server
2. Download or clone this repo and put it in your webserver (e.g `htdocs` for apache). You can rename the downloaded folder's name to your project's name if you like.
3. Open `/config/db.php` in Yii2 folder
4. Edit yii2 db connection string to connect to Oracle:
   * Replace `IP_ADDR` with the remote Oracle's IP
   * Replace `PORT` with the remote Oracle's TCP port (default is `1523`)
   * Replace `SERVICE_NAME` with the Service you'd like to connect to
   * Replace `DB_USER` and `DB_PASS` with remote Oracle credentials
   * It is also recommended to set `enableSchemaCache` as `true`
5. Start your webserver
6. Go to http://localhost/YOUR_YII2_FOLDER_NAME/web/index.php?r=gii%2Fdefault%2Fview&id=model to test. If there's no error then you're good to go!

## References for development using Yii2 Framework ##
1. Autocomplete
   * video : https://www.youtube.com/watch?v=UGZvggiYGHk
   * github : https://github.com/kartik-v/yii2-widget-select2

2. Datepicker
   * video : https://www.youtube.com/watch?v=dkNGB2OSNho   
   * datepicker : https://github.com/2amigos/yii2-date-picker-widget

3. E-mail
   * video : https://www.youtube.com/watch?v=1INgAuiUrw8
   * guide : http://www.yiiframework.com/doc-2.0/guide-tutorial-mailing.html
   * guide : http://www.yiiframework.com/doc-2.0/yii-swiftmailer-mailer.html

3. Multiple files upload 
   * Notes :
      1. Adjust `php.ini`'s `post_max_size` and `upload_max_filesize` values and set them according to your max file/post size allowed
      2. Use the function `getInstances()` instead of `getInstance()` for multiple file upload
      3. Make sure to write the file first before saving the model. If file write succeed then save the model
   * video : https://www.youtube.com/watch?v=NKG24GJpZRA

4. Dropdown
   * video : https://www.youtube.com/watch?v=Z6v9KeKDHjc
   * github : https://github.com/kartik-v/yii2-widget-select2
   * simple dropdown from database  : https://www.youtube.com/watch?v=Kg17wiJfGA8&t=322s

5. File Download through browser
   * guide : https://www.yiiframework.com/doc/api/2.0/yii-web-response#sendFile()-detail 

6. Template (UI) Admin LTE : https://github.com/dmstr/yii2-adminlte-asset  

