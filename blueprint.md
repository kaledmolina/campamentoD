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
1. En la vista de "Detalles del Abono", el botón actual de "Descargar Comprobante" utiliza el método `->url(...)` con `->openUrlInNewTab()`, lo cual provoca que los navegadores abran el archivo en una nueva pestaña en lugar de descargarlo al dispositivo del usuario. El objetivo es habilitar la descarga real y directa del archivo.
2. En las tablas de abonos e inscripciones pendientes (`PaymentResource`, `PendingRegistrationResource`, `PaymentsRelationManager`), agregar el botón de acción para descargar el comprobante directamente desde la tabla y agruparlo junto con las demás acciones existentes mediante `ActionGroup`.
3. Configurar modales explícitos de confirmación con títulos y descripciones claras al aprobar o rechazar un pago, y optimizar las tablas para dispositivos móviles ocultando columnas secundarias por defecto.

### Pasos de Implementación
1. **Modificar Infolists (`PaymentResource.php` y `PendingRegistrationResource.php`):**
   - Reemplazar `->url(...)` y `->openUrlInNewTab()` por `->action(fn($record) => \Illuminate\Support\Facades\Storage::disk('public')->download($record->proof_path))` en el botón de descarga.
2. **Modificar Tablas y Acciones (`PaymentResource.php`, `PendingRegistrationResource.php`, `PaymentsRelationManager.php`):**
   - Envolver las acciones de cada tabla dentro de `Tables\Actions\ActionGroup::make([ ... ])` y agregar `Action::make('download')`.
   - Configurar `modalHeading`, `modalDescription` y `modalSubmitActionLabel` en las acciones `approve` y `reject`.
   - Agregar el formulario de motivo de rechazo en `PaymentsRelationManager.php` para mantener consistencia.
   - Configurar las columnas secundarias con `visibleFrom('md')` y `wrap()` en el nombre del campista para una visualización perfecta en móviles sin scroll horizontal.
3. **Verificación:**
   - Comprobar mediante la revisión de código y diagnósticos del IDE que no existan errores de sintaxis ni de uso de métodos en Filament.
