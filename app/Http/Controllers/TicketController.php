<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function download()
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->balance > 0) {
            abort(403, 'Debes completar el pago para descargar tu ticket.');
        }

        $qrCode = base64_encode(QrCode::format('svg')->size(200)->generate(route('tickets.validate', $user->id)));

        $pdf = Pdf::loadView('pdf.ticket', compact('user', 'qrCode'));

        return $pdf->download('ticket-campamento-' . $user->document_number . '.pdf');
    }

    public function validateUser(User $user)
    {
        if (!auth()->user()->can_validate && !auth()->user()->is_admin) {
            abort(403, 'No tienes permisos para validar tickets.');
        }

        return view('tickets.validate', compact('user'));
    }

    public function scanner()
    {
        if (!auth()->user()->can_validate && !auth()->user()->is_admin) {
            abort(403, 'No tienes permisos para escanear tickets.');
        }

        return view('tickets.scanner');
    }
}
