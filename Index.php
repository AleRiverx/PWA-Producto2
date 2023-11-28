<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="manifest.json">
    <meta name="description" content="app producto">
    <meta name="theme-color" content="#6200ee">
    <meta name="apple-mobile-web-app-title" content="Product">
    <meta name="apple-mofle-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="imagenes/Logo.PNG">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Vina+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Producto II PWA</title>
</head>
<body>
    <div class="inicio">
        <h1 class="logo-header">
            <span class="logo">PRODUCTO</span><span class="logo">II</span>
        </h1>
    </div>
    <Header>
        <nav class="links"></nav>
        <h1>PRODUCTO II</h1>
    </Header>
    <!-- Image -->
    <img src="imagenes\Logo.PNG" />
    <section id="Datos">
        <h1>Aplicaciones Web Progresivas</h1>
        <h2>División De Tecnologías De La Información Ingeniería En Desarrollo Y Gestión De Software</h2>
        <h2>Integrantes</h2>
        <h3>Ramírez Hernández Juan De Dios  UTP0147330</h3>
        <h3>Rivera Ramos Alejandra  UTP0140802</h3>
        <h3>Silva Jaime Wendy Berenice  UTP0145959</h3>
        <h3>Vázquez Sebastian Araceli   UTP0145313</h3>
        <h2>Nombre Del Profesor</h2>
        <h3>Nolasco Hérnandez Javier</h3>
        <h3>10°C</h3>
    </section>
    <div id="demo" class="wrapper">
        <button type="button" onclick="loadDoc()">Plataformas y Herramientas!</button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="contenido">
    </div>
    <div id="demo" class="wrapper1">
        <button type="button" onclick="loadDoc1()">Parametros de Configuración!</button>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div id="contenido1">
    </div>
    <div id="contenido2">
    </div>
    <!-- JavaScript -->
    <script>
        function loadDoc() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("contenido").innerHTML = this.responseText;
            }
            xhttp.open("GET", "ajax_info.html", true);
            xhttp.send();
        }
        function loadDoc1() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                // Procesar la respuesta de ajax_info1.html
                document.getElementById("contenido1").innerHTML = this.responseText;
                // Ahora, cargar las imágenes desde imagenes.html
                loadImagesFromHtml();
            };
            xhttp.open("GET", "ajax_info1.html", true);
            xhttp.send();
        }

        function loadImagesFromHtml() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function () {
                // Procesar la respuesta de imagenes.html y colocarla en contenido2
                document.getElementById("contenido2").innerHTML = this.responseText;
            };
            xhttp.open("GET", "imagenes.html", true);
            xhttp.send();
        }
    
    </script>
    <script async src="js\script.js"></script>
    <script>
        // Register the service worker if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worked.js').then(function(registration) {
            // Registration was successful
            console.log('ServiceWorker registration successful with scope: ',
            registration.scope);
        }).catch(function(err) {
            // registration failed :(
            console.log('ServiceWorker registration failed: ', err);
        });

        if('serviceWorker' in navigator){
            window.addEventListener('load',()=>{
                navigator.serviceWorker.register('service-worker.js').then((reg)=>{
                    console.log("Service worker registered",reg);
                })
            })
        }
    </script>
    <script src="js/app.js"></script>
    <footer>Universidad Tecnológica De Puebla</footer>
</body>
</html>