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
-   Add `images/logos_distrito.png` below the main logo, centered.
-   Add `images/logos_distrito.png` below the main logo, centered.
-   **Refinements:**
    -   **Countdown Label:** Insert `<p>` with "CUENTA REGRESIVA" text above `#countdown` div. Style with gold color and tracking.
-   **Refinements:**
    -   **Countdown Label:** Insert `<p>` with "CUENTA REGRESIVA" text above `#countdown` div. Style with gold color and tracking.
    -   **Navbar:** Reduce `py` padding, reduce logo width/height, and reduce text size slightly.
    -   **Hero Layout:** Adjust `min-h-screen` behavior, reduce bottom margins of logos, and ensure content fits better on smaller screens without feeling "tight".
-   **Final Polish:**
    -   Reduce spacing between main logo and district logos.
    -   Make main logo slightly smaller (`max-w-3xl`).
    -   Increase Navbar padding slightly (`py-4`) from previous reduction to find sweet spot.
    -   Improve vertical symmetry.
-   **Final Adjustments (User Request):**
    -   **Hero Content:** Shift content up/compact vertical spacing to prevent crowding near the bottom arrow.
    -   **Countdown:** Bring "Cuenta Regresiva" label closer to the logos.
    -   **Hero Logo:** Make slightly smaller (`max-w-2xl`).
    -   **Navbar:** Increase size/padding (`py-6`) and make the top-left logo bigger.
-   **Visual Polish:**
    -   **Background Colors:** Change Hero overlay from **Black** to **Gold/Brown** gradient to match reference image (remove dark/black aesthetic).
-   **Navbar Polish:**
    -   **Scroll Background:** Update JS logic to use a dark brown/gold backdrop (`bg-[#422006]/90`) instead of black on scroll.
    -   **Text Size:** Increase menu item text size from `text-xs` to `text-sm` or `text-base`.
-   **Section Backgrounds (Ref 2):**
    -   **Introduction:** Change from default/black to **Dark Brown Gradient** (`from-[#422006] to-[#2a1205]`).
    -   **Expositores (Main):** Change from black to **Light Gold/Beige Radial Gradient** (`from-[#EEDC82] via-[#D4AF37]/30 to-[#8B4513]/80`) to provide contrast.
    -   **Expositores (Cards):** Change from `bg-gray-900` to **Brown Gradient cards** (`bg-gradient-to-br from-[#8D6E63] to-[#3E2723]`).
    -   **Cronograma:** Update to **Dark Chocolate Gradient** (`bg-gradient-to-b from-[#2a1205] to-[#1a0b03]`) to match Intro/Hero depth.
    -   **Inversión:** Update to **Bright Gold/Yellow Gradient** (`bg-gradient-to-br from-[#FDB931] via-[#F5D061] to-[#D4AF37]`) for high impact.
    -   **Footer:** Update to **Warm Brown Gradient** (`bg-gradient-to-t from-[#3E2723] to-[#1a0b03]`).
-   **Other Pages Refinement:**
    -   **Fix 404:** Verify route for `/consultar`. It might be named differently in `web.php` (e.g., `/consultation`).
    -   **Registration & Consultation:** Apply the **Gold/Brown** theme (backgrounds, buttons, inputs) to match the landing page.
    -   **Global Layout (`app.blade.php`):**
        -   **Navbar Structure:** Adopt the **"Pill" Design** for the desktop menu links container:
            -   Wrap links in: `div class="hidden md:flex space-x-8 items-center bg-black/30 backdrop-blur-md px-8 py-3 rounded-full border border-white/10"`
            -   Remove the heavy solid background from the main `<nav>` tag, or adjust it to be compatible (e.g., sticky/fixed or solid dark brown if content scrolls behind).
        -   **Footer:** Apply **Warm Brown Gradient** (`from-[#3E2723] to-[#1a0b03]`).
        -   **Navigation:** Rename "Programa" link to "Agenda" and ensure it points to `#cronograma`.

## Verification Plan
### Manual Verification
-   **Visual Check:** Open the landing page.
-   **Confirm:**
    -   The main logo appears correctly.
    -   The new image `logos_distrito.png` appears **below** the main logo.
    -   Both images are centered and responsive.
    -   The transitions are smooth.
-   **Visual Check:** Open the landing page and hover over the guest cards.
-   **Confirm:**
    -   The border changes to gold.
    -   A soft gold glow appears around the card.
    -   The card scales up slightly.
    -   The transitions are smooth.
