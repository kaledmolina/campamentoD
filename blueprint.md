# Add Guests to Landing Page

## Overview
The user wants to add three new guests to the "Expositores" section of the landing page:
1.  **Pastor Jhon Fabio García**
2.  **Pastor Michael Alvarez**
3.  **Adorador Juan Pablo Murillo**

Also, enhance the visual presentation of these cards.

## Proposed Changes

### [Landing Page]
#### [MODIFY] [welcome.blade.php](file:///home/administrador/proyectos/campamentoD/resources/views/welcome.blade.php)
-   Add a card for **Pastor Jhon Fabio García**, **Pastor Michael Alvarez**, and **Adorador Juan Pablo Murillo**.
-   **UI Enhancements:**
    -   Add `border border-transparent group-hover:border-gold-500/50` to the card container.
    -   Add `group-hover:shadow-[0_0_30px_rgba(212,175,55,0.2)]` for a gold glow effect on hover.
    -   Update the inner gradient to be slightly more visible on hover.
    -   Add `scale-105` transform on hover for a subtle lift effect.

### [Backend]
#### [MODIFY] [UserResource.php](file:///home/administrador/proyectos/campamentoD/app/Filament/Resources/UserResource.php)
-   Add "Centro Alegre" to the options list for "Zona Planeta Rica".

### [Public Form]
#### [MODIFY] [RegistrationForm.php / registration.blade.php] (To be determined)
-   Add "Centro Alegre" to the congregation list in the public registration form.
-   Smoother background transitions.

### [Hero Section]
#### [MODIFY] [welcome.blade.php](file:///home/administrador/proyectos/campamentoD/resources/views/welcome.blade.php)
-   Change background image to `images/16x9.png`.
-   Replace "CAMPAMENTO JUVENIL 2026" text with `images/camp_logo_2026.png`.

## Verification Plan
### Manual Verification
-   **Visual Check:** Open the landing page and hover over the guest cards.
-   **Confirm:**
    -   The border changes to gold.
    -   A soft gold glow appears around the card.
    -   The card scales up slightly.
    -   The transitions are smooth.
