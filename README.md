# SNIR-1

https://www.youtube.com/watch?v=n5gor3Bdmmk#t=795s

---

https://www.framboise314.fr/wp-content/uploads/2017/11/03_1_1_InstallationQt_LED_v2.pdf

https://www.electronicsforu.com/electronics-projects/setting-qt-software-on-raspberry-pi


```html

            // Affichage de la page HTML
            client.println("<!DOCTYPE html><html>");
            client.println("<head><meta name=\"viewport\" content=\"width=device-width, 
            			initial-scale=1\">");
            client.println("<link rel=\"icon\" href=\"data:,\">");
            // CSS : boutons on/off
            client.println("<style>html { font-family: Helvetica; display: inline-block; 
            			margin: 0px auto; text-align: center;}");
            client.println(".button { background-color: #4CAF50; border: none; 
            			color: white; padding: 16px 40px;");
            client.println("text-decoration: none; font-size: 30px; margin: 2px; 
            			cursor: pointer;}");
            client.println(".button2 {background-color: #555555;}</style></head>");

            // En-tête page Web
            client.println("<body><h1>ESP32 Web Server</h1>");

            // Affichage de l'état actuel et les boutons ON/OFF pour GPIO 26
            client.println("<p>GPIO 26 - State " + output26State + "</p>");
            // Si output26State est éteint, il affiche le bouton ON
            if (output26State == "off") {
              client.println("<p><a href=\"/26/on\"><button class=\"button\">
              			ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/26/off\"><button class=\"button button2\">
              			OFF</button></a></p>");
            }

            // Affichage de l'état actuel et les boutons ON/OFF pour GPIO 27
            client.println("<p>GPIO 27 - State " + output27State + "</p>");
            // Si output27State est éteint, il affiche le bouton ON
            if (output27State == "off") {
              client.println("<p><a href=\"/27/on\"><button class=\"button\">
              			ON</button></a></p>");
            } else {
              client.println("<p><a href=\"/27/off\"><button class=\"button button2\">
              			OFF</button></a></p>");
            }
            client.println("</body></html>");
```
