<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $certificates = Certificate::query()->paginate(10);
        return view('certificates.index', compact('certificates'));
    }

    public function create() {
        return view('certificates.create');
    }

    public function store(StoreCertificateRequest $request)
    {
        $validated = $request->validated();
        Certificate::create($validated);
        return redirect(route('certificates.index'));
    }

    public function edit(Certificate $certificate) {
        return view('certificates.edit', compact('certificate'));
    }
    public function update(Request $request, Certificate $certificate)
    {
        $validated = $request->validated();
        $certificate->update($validated);
        return redirect(route('certificates.index'));
    }

    public function delete(Certificate $certificate) {
        return view('certificates.delete', compact('certificate'));
    }

    public function destroy(Request $request, Certificate $certificate)
    {
        $certificate->delete();
        return redirect(route('certificates.index'))->with('success', 'Certificate deleted successfully.');
    }
}
