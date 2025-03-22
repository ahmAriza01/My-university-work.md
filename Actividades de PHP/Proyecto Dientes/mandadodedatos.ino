#include <WiFi.h>
#include <HTTPClient.h>
#include "DHT.h"

#define DHTPIN 4      // Pin donde está conectado el sensor DHT11
#define DHTTYPE DHT11 // Tipo de sensor

const char* ssid = "";
const char* password = "";
const char* serverName = "";

DHT dht(DHTPIN, DHTTYPE);

void setup() {
    Serial.begin(115200);
    WiFi.begin(ssid, password);

    //VALIDAR LAS CONEXIONES A LA RED
    Serial.println("Conectando a WiFi...");
    int intentos = 0;
    while (WiFi.status() != WL_CONNECTED && intentos < 20) {
        delay(500);
        Serial.print(".");
        intentos++;
    }

    if (WiFi.status() == WL_CONNECTED) {
        Serial.println("\nConectado a la red WiFi");
        Serial.print("Dirección IP: ");
        Serial.println(WiFi.localIP());
    } else {
        Serial.println("\nNo se pudo conectar a WiFi. Revisa SSID/contraseña.");
    }
    
    dht.begin();
}

void loop() {
    float temperatura = dht.readTemperature(); // Leer temperatura en grados Celsius

    // JUSTIFICACION POR LA BASE DE DATOS EN EL SERIAL
    if (isnan(temperatura)) {
        Serial.println("Error al leer el sensor DHT11");
    } else {
        Serial.print("Sensor: DHT11, Valor registrado: ");
        Serial.print(temperatura);
        Serial.println("°C");

        if (WiFi.status() == WL_CONNECTED) {
            HTTPClient http;
            http.begin(serverName);
            http.addHeader("Content-Type", "application/json");

    //IMPRESION DE DATOS EN LA BASE DE DATOS
            String jsonPayload = "{\"sensor\":\"DHT11\",\"valor\":\"" + String(temperatura) + "\"}";
            int httpResponseCode = http.POST(jsonPayload);

      // JUSTIFICACION POR LA BASE DE DATOS EN EL SERIAL
            if (httpResponseCode > 0) {
                Serial.print("Respuesta del servidor: ");
                Serial.println(http.getString());
            } else {
                Serial.print("Error en la solicitud HTTP: ");
                Serial.println(httpResponseCode);
            }
            http.end();
        } else {
            Serial.println("WiFi desconectado, no se pudo enviar datos.");
        }
    }

    delay(180000); // Esperar 3 minutos (180000 ms) antes de la siguiente lectura
}
