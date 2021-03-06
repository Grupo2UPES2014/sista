<!DOCTYPE html>
<!--
Copyright 2014 UPES Grupo#2 Ingenieria en Ciencias de la Computación.
[Iddo José Claros - José Carlos Escobar - Carlos Amaury Tejada]
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>SiSTA</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico">
        <link href="web/css/gui.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="sistacontainer">
            <div id="sistamenu">
                <div id="logo"></div>
                <div id="m_elementos">
                    <div class="m_elemento"><div class="ico icoTramite"></div><span>Trámites</span></div>
                    <div class="m_elemento"><div class="ico icoInbox"></div><span>Buzón</span></div>
                    <div class="m_elemento"><div class="ico icoCog"></div><span>Configuración</span></div>
                    <div class="m_elemento"><div class="ico icoInfo"></div><span>Acerca de SiSTA</span></div>
                </div>
                <div id="usuario"><img id="loading" src="web/img/ajax-loader.gif" alt="Cargando..."><span>TT200601</span><div class="ico mini icoLogout"></div></div>
            </div>
            <div id="sistacontent">
                <div id="sistaroute">SiSTA >> Trámites</div>
                <div id="sistadesktop">
                    <button onclick="javascript:Mensaje('Test', 'Mensaje de prueba', 3)">OK</button>
                    <button onclick="javascript:Mensaje('Test', 'Mensaje de prueba', 0)">Alerta</button>
                    <button onclick="javascript:Mensaje('Test', 'Mensaje de prueba', 1)">Error</button>
                    <button onclick="javascript:Mensaje('Test', 'Mensaje de prueba', 2)">Info</button>
                </div>
                <div id="sistamensajes"></div>
            </div>
        </div>
        <script src="vendors/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="web/js/gui.js" type="text/javascript"></script>
    </body>
</html>