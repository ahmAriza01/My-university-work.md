# ESP32 Deep Sleep with Timer Wake Up

### Descripción

Este código implementa un modo de suspensión profunda (Deep Sleep) en la ESP32, utilizando un temporizador como fuente de activación. También muestra cómo almacenar datos en la memoria RTC para mantener información entre reinicios.

### Funcionamiento

La ESP32 entrará en modo de suspensión profunda durante un tiempo determinado y se despertará automáticamente cuando el temporizador expire. Al despertar, el código imprimirá en el monitor serie el motivo del despertar y el número de reinicios registrados.

### Características

- Usa el temporizador interno para despertar la ESP32.

- Guarda variables en la memoria RTC para persistir datos entre reinicios.

- Reduce el consumo de energía al apagar la mayoría de los periféricos.

------------

### Explicación del Código

1. Definición de Variables y Constantes

- uS_TO_S_FACTOR: Factor de conversión de microsegundos a segundos.

- TIME_TO_SLEEP: Tiempo que la ESP32 dormirá antes de despertarse.

- RTC_DATA_ATTR int bootCount: Variable almacenada en la memoria RTC para contar los reinicios.

- RTC_DATA_ATTR int Covid: Variable que decrece en cada reinicio.


2. Función print_wakeup_reason()

Determina la razón por la cual la ESP32 se despertó e imprime un mensaje en el monitor serie.

3. Función setup()

1. Inicializa la comunicación serie.


2. Incrementa el contador de reinicios y reduce el valor de Covid.


3. Imprime en el monitor serie la razón del despertar.


4. Configura el temporizador como fuente de activación para el Deep Sleep.


5. Inicia el modo de suspensión profunda con esp_deep_sleep_start().



4. Función loop()

No se ejecuta debido a que la ESP32 entra en Deep Sleep.
 
----------

>**Codigo para su consulta**
   >
   >- **[Codigo Deep Sleep](./.ino)**