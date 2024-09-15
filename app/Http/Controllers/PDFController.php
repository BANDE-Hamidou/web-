<?php
namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf; // Corriger l'importation
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::all(); // Utilisation de 'all' au lieu de 'get' pour récupérer tous les utilisateurs

        $data = [
            'title' => 'Bienvenue au garage XYZ', // Correction du français
            'date' => date('d/m/Y'), // Format de date plus courant en français
            'users' => $users
        ];

        $pdf = Pdf::loadView('myPDF', $data);

        return $pdf->download('Garage_xyz_facture.pdf');
    }
}
