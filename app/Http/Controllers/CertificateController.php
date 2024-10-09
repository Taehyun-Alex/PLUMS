<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $certificates = Certificate::with('course')->paginate(10);

        if ($request->wantsJson()) {
            return response()->json($certificates);
        }

        return view('certificates.index', compact('certificates'));
    }

    public function store(Request $request)
    {
        $certificate = new Certificate();
        $certificate->course_id = $request->course_id;
        $certificate->level = $request->level;
        $certificate->save();

        if ($request->wantsJson()) {
            return response()->json($certificate, 201);
        }

        return redirect()->route('certificates.index');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $certificate->course_id = $request->course_id;
        $certificate->level = $request->level;
        $certificate->save();

        if ($request->wantsJson()) {
            return response()->json($certificate);
        }

        return redirect()->route('certificates.index');
    }

    public function destroy(Request $request, Certificate $certificate)
    {
        $certificate->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Certificate deleted successfully.']);
        }

        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
