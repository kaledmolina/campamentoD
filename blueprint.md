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
Resolver definitivamente la descarga de archivos vacíos en Livewire v3 reemplazando `response()->streamDownload` (cuyo búfer directo en `php://output` corrompe la respuesta JSON de Livewire) por la generación de un archivo físico temporal en `storage/app/public/reports` y retornando `response()->download(...)`. Además, implementar animaciones de carga visuales (`wire:loading`) en los botones de descarga para informar al usuario mientras se genera el archivo.

### Pasos de Implementación
1. **Modificar `ExcelReports.php` (`app/Filament/Pages/ExcelReports.php`):**
   - Crear el directorio `storage/app/public/reports` si no existe usando `Storage::disk('public')->makeDirectory('reports')`.
   - Generar y escribir el archivo CSV (`fopen`, `fwrite` con BOM UTF-8, `fputcsv`) directamente en la ruta del servidor (`storage_path('app/public/reports/...')`).
   - Retornar `return response()->download($filePath);` para que Livewire gestione correctamente la descarga binaria.
2. **Modificar Vista Blade (`excel-reports.blade.php`):**
   - Añadir directivas `wire:loading`, `wire:loading.remove` y `wire:target` en los botones de Campistas y Abonos.
   - Incorporar un ícono SVG giratorio (`animate-spin`) y texto dinámico ("Generando Reporte... ¡Por favor espera!").
3. **Verificación:**
   - Confirmar que al hacer clic se muestra la animación de carga y que el archivo descargado contiene toda la información de la base de datos sin estar vacío.
