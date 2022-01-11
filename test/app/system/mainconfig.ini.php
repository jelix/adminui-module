;<?php die(''); ?>
;for security reasons , don't remove or modify the first line

locale=fr_FR
charset=UTF-8

availableLocales=fr_FR

; see http://www.php.net/manual/en/timezones.php for supported values
timeZone="Europe/Paris"

theme=adminlte

[modules]
jelix.enabled=on
jelix.installparam[wwwfiles]=vhost

test.enabled=on

jacl2.enabled=off
jacl2.installparam[eps]="[index,admin]"

jacl2db.enabled=off
jacl2db.installparam[defaultuser]=on
jacl2db.installparam[defaultgroups]=on


adminui.enabled=on
adminui.installparam[wwwfiles]=vhost

[coordplugins]

[responses]
html="\Jelix\AdminUI\Responses\AdminUIResponse"
htmlerror="\Jelix\AdminUI\Responses\AdminUIResponse"
htmllogin="\Jelix\AdminUI\Responses\AdminUIBareResponse"

[error_handling]
messageLogFormat="%date%\t%ip%\t[%code%]\t%msg%\n\tat: %file%\t%line%\n\turl: %url%\n\t%http_method%: %params%\n\treferer: %referer%\n%trace%\n\n"
errorMessage="Une erreur technique est survenue. Désolé pour ce désagrément."


[compilation]
checkCacheFiletime=on
force=off

[jResponseHtml]
plugins=debugbar

[urlengine]

; enable the parsing of the url. Set it to off if the url is already parsed by another program
; (like mod_rewrite in apache), if the rewrite of the url corresponds to a simple url, and if
; you use the significant engine. If you use the simple url engine, you can set to off.
enableParser=on

multiview=off

; basePath corresponds to the path to the base directory of your application.
; so if the url to access to your application is http://foo.com/aaa/bbb/www/index.php, you should
; set basePath = "/aaa/bbb/www/".
; if it is http://foo.com/index.php, set basePath="/"
; Jelix can guess the basePath, so you can keep basePath empty. But in the case where there are some
; entry points which are not in the same directory (ex: you have two entry point : http://foo.com/aaa/index.php
; and http://foo.com/aaa/bbb/other.php ), you MUST set the basePath (ex here, the higher entry point is index.php so
; : basePath="/aaa/" )
basePath=

; leave empty to have jelix error messages
notfoundAct="jelix~error:notfound"

jelixWWWPath="jelix/"

[fileLogger]
default=messages.log


[mailer]
webmasterEmail="laurent@jelix.org"
webmasterName=Root
mailerType=file

[mailLogger]
email="root@localhost"

[webassets_common]

adminlte-bootstrap.require=jquery
adminlte-bootstrap.css[]="adminlte-assets/bower_components/bootstrap/dist/css/bootstrap.min.css"
adminlte-bootstrap.js[]="adminlte-assets/bower_components/bootstrap/dist/js/bootstrap.min.js"

adminlte-fontawesome.css[]="adminlte-assets/bower_components/font-awesome/css/font-awesome.min.css"

adminlte.require="jquery,adminlte-bootstrap,adminlte-fontawesome"
adminlte.css[]="adminlte-assets/bower_components/Ionicons/css/ionicons.min.css"
adminlte.css[]="adminlte-assets/dist/css/AdminLTE.min.css"
adminlte.css[]="adminlte-assets/dist/css/skins/_all-skins.min.css"
adminlte.css[]="adminlte-assets/SourceSansPro/SourceSansPro.css"
adminlte.css[]="adminlte-assets/adminui.css"
adminlte.js[]="adminlte-assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"
adminlte.js[]="adminlte-assets/bower_components/fastclick/lib/fastclick.js"
adminlte.js[]="adminlte-assets/dist/js/adminlte.min.js"
adminlte.js[]="adminlte-assets/adminui.js"
;adminlte.include=

[adminui]
appVersion=1.2.3
htmlLogo="<b>Admin</b>UI"
htmlLogoMini="<b>A</b>UI"
htmlCopyright="<strong>Copyright &copy; 2022 <a href="https://jelix.org">Jelix</a>.</strong> MIT licence."

dashboardTemplate="test~dashboard"