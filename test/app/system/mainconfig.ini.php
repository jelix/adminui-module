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
htmlbare="\Jelix\AdminUI\Responses\AdminUIBareResponse"
htmllogin="\Jelix\AdminUI\Responses\AdminUILoginResponse"
htmlregister="\Jelix\AdminUI\Responses\AdminUIRegisterResponse"

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
jquery.js="adminlte-assets/plugins/jquery/jquery.js"

adminlte-bootstrap.require=jquery,jquery_ui
adminlte-bootstrap.js[]=adminlte-assets/plugins/bootstrap/js/bootstrap.bundle.min.js

adminlte-fontawesome.css[]=adminlte-assets/plugins/fontawesome-free/css/all.min.css

adminlte.require=jquery,adminlte-bootstrap,adminlte-fontawesome
adminlte.css[]=adminlte-assets/dist/css/adminlte.min.css
;adminlte.css[]=adminlte-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css
adminlte.css[]=adminui-assets/SourceSansPro/SourceSansPro.css
adminlte.css[]=adminui-assets/adminui.css
;adminlte.js[]=adminlte-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js
;adminlte.js[]=adminlte-assets/plugins/jquery-mousewheel/jquery.mousewheel.js
;adminlte.js[]=adminlte-assets/plugins/fastclick/fastclick.js
adminlte.js[]=adminlte-assets/dist/js/adminlte.min.js
adminlte.js[]=adminui-assets/adminui.js
;adminlte.include=

knob.js[] = adminlte-assets/plugins/jquery-knob/jquery.knob.min.js

daterangepicker.require=moment
daterangepicker.js[]=adminlte-assets/plugins/daterangepicker/daterangepicker.js
daterangepicker.css[]=adminlte-assets/plugins/daterangepicker/daterangepicker.css

jqvmap.js[]=adminlte-assets/plugins/jqvmap/jquery.vmap.js
jqvmap.css[]=adminlte-assets/plugins/jqvmap/jqvmap.css

sparkline.js[]=adminlte-assets/plugins/sparklines/sparkline.js

chartjs.js[]=adminlte-assets/plugins/chart.js/Chart.min.js
chartjs.css[]=adminlte-assets/plugins/chart.js/Chart.css

summernote.js[]=adminlte-assets/plugins/summernote/summernote-bs4.min.js

moment.js[]=adminlte-assets/plugins/moment/moment.min.js

tempusdominus.require=moment
tempusdominus.js[]=adminlte-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js
tempusdominus.css[]=adminlte-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css

dashboard.require=adminlte,knob

dashboard_map.require="dashboard,jqvmap,sparkline,daterangepicker"
dashboard_sales_graph.require=dashboard,chartjs
dashboard_calendar.require=dashboard,tempusdominus

[adminui]
appVersion=1.2.3
htmlLogo="<b>Admin</b>UI"
htmlLogoMini="<b>A</b>UI"
htmlCopyright="<strong>Copyright &copy; 2022 <a href="https://jelix.org">Jelix</a>.</strong> MIT licence."

bodyCSSClass="hold-transition skin-blue"
bareBodyCSSClass=""
loginBodyCSSClass="hold-transition login-page"
adminlteAssetsUrl="adminlte-assets/"

dashboardTemplate="test~dashboard"
disableDashboardMenuItem=off
fullScreenModeEnabled=off

; show a preloader icon with a vertical animation
showPreloader=off

; body.dark-mode
darkmode=off

; body.layout-navbar-fixed
header.fixed=off

; .main-header.border-bottom-0
header.border=on

; .main-header.text-sm
header.smalltext=off

; .main-header.navbar-*
header.color=blue

; .main-header.navbar-dark or .main-header.navbar-light
header.darktext=off

; .brand-link.text-sm
header.brand.smalltext = off

; body.sidebar-collapse
sidebar.collapsed=off

; body.layout-fixed
sidebar.fixed=off

; body.sidebar-mini
; when collapsed, the sidebar is still visible in a mini format
sidebar.mini=on

; .nav-sidebar.nav-flat
sidebar.nav.flat.style=off
; .nav-sidebar.nav-compact
sidebar.nav.compact=off
; .nav-sidebar.nav-child-indent
sidebar.nav.child.indent=off
; .nav-sidebar.nav-collapse-hide-child
sidebar.nav.child.collapsed=
; .nav-sidebar.text-sm
sidebar.nav.smalltext = off

; .main-sidebar.sidebar-dark-<color> or .main-sidebar.sidebar-light-<color>
sidebar.dark=on
sidebar.current-item.color=blue

; body.layout-footer-fixed
footer.fixed=off
; .main-footer.text-sm
footer.smalltext = off

; body.text-sm
body.smalltext = off


