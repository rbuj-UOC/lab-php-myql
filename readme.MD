# Entorn de desenvolupament

## Programari

- [Visual Studio Code](https://code.visualstudio.com/)
- [Docker Desktop](https://www.docker.com/get-started/)

## Depuració a Mac

Per iniciar la depuració del fitxer `index.php` amb VS Code:
1. Obrir l'aplicació `Docker Desktop` si no s'ha obert abans per iniciar el dimoni
2. Obrir l'aplicació `Visual Studio Code`:
   1. Obrir la carpeta on es trobin aquests fitxers
   2. Iniciar la composició: fer clic al fitxer `docker-compose.yml` i seleccionar `Compose Up`
   3. Obrir el fitxer `index.php` i afegir algun breakpoint
   4. Iniciar la depuració: `Run and Debug`, `Listen for Xdebug`
3. Obrir [http://localhost:8080](http://localhost:8080) al navegador web preferit