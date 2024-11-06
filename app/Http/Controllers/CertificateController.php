<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $certificates = Certificate::all()->paginate(10);
        return view('certificates.index', compact('certificates'));
    }

    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();
        Certificate::create($validated);
        return view('certificates.index');
    }

    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validated();
        $certificate->update($validated);
        return view('certificates.index');
    }

    public function destroy(Request $request, Certificate $certificate)
    {
        $certificate->delete();
        return view('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
