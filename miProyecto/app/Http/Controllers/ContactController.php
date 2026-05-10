<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Aquí iría la lógica para enviar un email o guardar en BD
        return back()->with('success', 'Gracias por contactar con nosotros. Te responderemos pronto.');
    }
}