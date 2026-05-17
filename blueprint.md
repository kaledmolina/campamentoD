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
Implementar un sistema de control para habilitar o cerrar las inscripciones del campamento directamente desde el panel de administración de Filament (`GlobalSettingResource`), reflejando automáticamente un diseño premium de "Inscripciones Cerradas" en el formulario web (`create-registration.blade.php`).

### Pasos de Implementación
1. **Modificar `GlobalSettingResource.php` (`app/Filament/Resources/GlobalSettingResource.php`):**
   - Añadir la opción `registrations_enabled` al select de configuración con la etiqueta "Estado de las Inscripciones (1 = Abiertas, 0 = Cerradas)".
   - Configurar dinámicamente el prefijo, la etiqueta y el texto de ayuda del campo `value` dependiendo de si se está editando un costo monetario o el estado de inscripción.
   - Formatear la columna en la tabla de Filament para mostrar visualmente `🟢 ABIERTAS (1)` o `🔴 CERRADAS (0)`.
2. **Modificar `create-registration.blade.php` (`resources/views/livewire/create-registration.blade.php`):**
   - Incorporar la condición `@if ($registrationsEnabled == 0)` al inicio del formulario para mostrar una tarjeta premium de "Inscripciones Cerradas" con botones para consultar el estado, ocultando el resto del formulario.
3. **Verificación:**
   - Crear o editar la configuración `registrations_enabled` a `0` en Filament y verificar que la web muestra el mensaje de cierre con un diseño espectacular.
