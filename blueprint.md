# Blueprint: Campamento Juvenil 2026 - Conquistadores Pentecostales Distrito 27

## 1. Overview & Capabilities
Este proyecto es una aplicación web full-stack desarrollada con Laravel 11, Livewire, y FilamentPHP para la gestión integral del **Campamento Juvenil 2026** organizado por los Conquistadores Pentecostales del Distrito 27. 

La plataforma cuenta con dos componentes principales:
1. **Landing Page y Portal Público:** Una interfaz moderna, atractiva y responsiva donde los jóvenes pueden explorar la información del evento (expositores, cronograma, costos, lugar) y realizar su inscripción (individual o grupal), adjuntar comprobantes de pago y consultar el estado de su registro.
2. **Panel de Administración (Filament):** Un sistema de gestión robusto para administradores, donde pueden revisar y aprobar inscripciones pendientes, gestionar abonos (pagos por cuotas), aplicar cupones de descuento, administrar usuarios/campistas por zonas y congregaciones, y generar reportes o tickets de entrada.

## 2. Project Outline & Implemented Features

### Diseño y Estética (UI/UX)
- **Tema Visual Premium:** Paleta de colores basada en tonos dorados, café oscuro y contrastes elegantes (`#D4AF37`, `#422006`, `#2a1205`, `#1a0b03`).
- **Efectos Modernos:** Uso de Glassmorphism (`backdrop-blur-md`, fondos semitransparentes), sombras con resplandor dorado (`shadow-[0_0_30px_rgba(212,175,55,0.2)]`), y micro-interacciones en tarjetas (escalado `scale-105` y bordes dorados en hover).
- **Secciones de la Landing Page:**
  - **Hero:** Logotipos oficiales del campamento y del distrito, contador regresivo ("Cuenta Regresiva") y fondo temático.
  - **Introducción & Video:** Sección de bienvenida y reproductor de video promocional (`video-caamp.mp4`).
  - **Expositores:** Tarjetas con fotografías reales de los invitados (Pastores Jhon Fabio García y Michael Alvarez, Adorador Juan Pablo M., Coro y Conquistadores Distrito 27) ordenadas por jerarquía.
  - **Cronograma & Inversión:** Detalles de la agenda y planes de asistencia (Investidura Total y Estadía Parcial a $120.000).
  - **Navegación & Footer:** Barra de navegación fija estilo "Pill" con cambio de fondo al hacer scroll, y pie de página con derechos de autor actualizados.

### Backend y Gestión (Filament & Livewire)
- **Inscripciones y Usuarios (`UserResource`):** Gestión completa de campistas, validación de menores de edad con consentimiento de padres, cartas pastorales, asignación de congregaciones por zonas (incluyendo "Centro Alegre" en Planeta Rica y "El Poblado" en Montería).
- **Gestión de Abonos (`PaymentResource` & `PendingRegistrationResource`):** Control de pagos e inscripciones pendientes, con flujos de aprobación/rechazo (con notas de motivo), cálculo automático de saldos pendientes y visualización de comprobantes.
- **Cupones y Descuentos:** Creación y validación de cupones aplicables a los costos totales de los campistas.
- **Tickets y Reportes:** Generación de tickets de entrada con códigos QR/firmados y reportes exportables para control de asistencia y pagos.

## 3. Plan for Current Requested Change

### Objetivo
Solucionar definitivamente la descarga del archivo en blanco en el Reporte de Campistas (`ExcelReports.php`). Este problema ocurre porque el desbordamiento de memoria o tiempo de ejecución en colecciones grandes de Eloquent provoca un cierre fatal de PHP que no puede ser capturado por bloques `try...catch`, dejando el búfer de descarga vacío. Para solucionarlo, se implementará el uso de generadores (`cursor()`) con complejidad espacial O(1) y se filtrará explícitamente por campistas (`where('is_admin', false)`).

### Pasos de Implementación
1. **Modificar `ExcelReports.php` (`app/Filament/Pages/ExcelReports.php`):**
   - Reemplazar `User::with('payments')->chunk(100, ...)` por un bucle `foreach (User::where('is_admin', false)->with('payments')->orderBy('id', 'desc')->cursor() as $user)`.
   - El uso de `cursor()` utiliza un generador de PHP (`yield`) que hidrata exactamente un modelo de Eloquent a la vez en memoria RAM, garantizando un consumo de memoria O(1) (constante) sin importar la cantidad de registros.
   - Aplicar esta misma optimización con `cursor()` en `exportPayments()` para máxima estabilidad y rendimiento en ambos reportes.
2. **Verificación:**
   - Confirmar que el archivo se genera y descarga exitosamente con todos los campistas inscritos y sin agotar la memoria del servidor.
