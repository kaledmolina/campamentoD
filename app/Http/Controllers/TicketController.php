<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function download(User $user)
    {
        // Allow Admins to download any ticket.
        // Allow Users to download ONLY their own ticket.
        if (auth()->user()->id !== $user->id && !auth()->user()->is_admin) {
            abort(403, 'No tienes permiso para descargar este ticket.');
        }

        if ($user->balance > 0) {
            abort(403, 'Debes completar el pago para descargar tu ticket.');
        }

        // Generate a SIGNED url. This allows the route to be public but prevents tampering and enumeration.
        $validationUrl = \Illuminate\Support\Facades\URL::signedRoute('tickets.validate', ['user' => $user->id]);
        $qrCode = base64_encode(QrCode::format('svg')->size(200)->generate($validationUrl));

        $pdf = Pdf::loadView('pdf.ticket', compact('user', 'qrCode'));

        return $pdf->download('ticket-campamento-' . $user->document_number . '.pdf');
    }

    public function show(User $user)
    {
        // Permission Check
        if (auth()->user()->id !== $user->id && !auth()->user()->is_admin) {
            abort(403, 'No tienes permiso para ver este ticket.');
        }

        if ($user->balance > 0) {
            abort(403, 'Debes completar el pago para ver tu ticket.');
        }

        // Generate Signed QR
        $validationUrl = \Illuminate\Support\Facades\URL::signedRoute('tickets.validate', ['user' => $user->id]);
        $qrCode = base64_encode(QrCode::format('svg')->size(300)->generate($validationUrl));

        return view('tickets.show', compact('user', 'qrCode'));
    }

    public function validateUser(User $user, Request $request)
    {
        // No checks needed if using signed middleware in routes
        // If not using middleware, we could check $request->hasValidSignature() here.
        if (!$request->hasValidSignature()) {
            abort(403, 'Enlace de validación inválido o expirado.');
        }

        return view('tickets.validate', compact('user'));
    }

    public function scanner()
    {
        // Public access to scanner
        return view('tickets.scanner');
    }
}
