# Add Guests to Landing Page

## Overview
The user wants to add three new guests to the "Expositores" section of the landing page:
1.  **Pastor Jhon Fabio García**
2.  **Pastor Michael Alvarez**
3.  **Adorador Juan Pablo Murillo**

## Proposed Changes

### [Landing Page]
#### [MODIFY] [welcome.blade.php](file:///home/administrador/proyectos/campamentoD/resources/views/welcome.blade.php)
-   Add a card for **Pastor Jhon Fabio García** (Icon: `fas fa-user-tie`, Label: `Expositor`).
-   Add a card for **Pastor Michael Alvarez** (Icon: `fas fa-user-tie`, Label: `Expositor`).
-   Add a card for **Adorador Juan Pablo Murillo** (Icon: `fas fa-microphone`, Label: `Adoración`).

### [Backend]
#### [MODIFY] [UserResource.php](file:///home/administrador/proyectos/campamentoD/app/Filament/Resources/UserResource.php)
-   Add "Centro Alegre" to the options list for "Zona Planeta Rica".

### [Public Form]
#### [MODIFY] [RegistrationForm.php / registration.blade.php] (To be determined)
-   Add "Centro Alegre" to the congregation list in the public registration form.

## Verification Plan
### Manual Verification
-   Check the "Expositores" section on the landing page.
-   Verify that the 3 new cards appear correctly with the correct names and titles.
-   Ensure the hover effects and animations work as expected.
-   Verify that "Centro Alegre" appears in the congregation dropdown when "Zona Planeta Rica" is selected in the User Resource form.
