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
Permitir que cualquier usuario (visitantes, líderes juveniles, padres) pueda registrar uno o múltiples campistas de forma continua sin necesidad de estar autenticado y sin que el sistema inicie sesión automáticamente tras cada registro. Esto mantiene la sesión limpia para registrar múltiples personas y asegura que los logs de auditoría (`ActivityLog`) registren correctamente la creación del campista y de su abono inicial.

### Pasos de Implementación
1. **Modificar `CreateRegistration.php` (`app/Livewire/CreateRegistration.php`):**
   - Eliminar la llamada a `\Illuminate\Support\Facades\Auth::login($user)` durante el proceso de registro para evitar que el usuario quede autenticado automáticamente tras inscribir a un campista.
2. **Modificar `AuditObserver.php` (`app/Observers/AuditObserver.php`):**
   - Ampliar la lógica de atribución de logs cuando no hay un usuario autenticado (`$userId` es null): si se está creando un `Payment`, asignar `$userId = $model->user_id` para que el abono quede correctamente auditado a nombre del campista respectivo.
3. **Verificación:**
   - Confirmar que un usuario no autenticado puede completar múltiples registros consecutivamente sin que se inicie sesión y que las tablas de auditoría reflejen correctamente la autoría de los registros y pagos.
