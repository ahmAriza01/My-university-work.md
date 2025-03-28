# 📡 Comunicación Serial con ESP32

En este apartado se muestra cómo configurar y utilizar la comunicación serial con el **ESP32** para enviar y recibir datos a través del puerto serial. A continuación, encontrarás ejemplos prácticos con distintos casos de uso de la comunicación serial.

---

## 📌 Archivos Incluidos

A continuación se detallan los archivos que se utilizan para la comunicación serial en ESP32:

### 1. **serial01.ino**
Este ejemplo demuestra cómo recibir datos a través del puerto serial y mostrarlo en el monitor serial. Se utiliza la función `Serial.read()` para leer los datos entrantes.

#### Código:
```cpp
int incomingByte = 0; // para los datos seriales entrantes

void setup() {
  Serial.begin(115200); // abre el puerto serial y establece la tasa de transferencia a 115200 bps
}

void loop() {
  // enviar datos solo cuando recibes datos
  if (Serial.available() > 0) {
    // lee el byte entrante
    incomingByte = Serial.read();

    // imprime lo recibido
    Serial.print("ESP32 recibió: ");
    Serial.println(incomingByte);
  }
}
