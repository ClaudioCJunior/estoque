<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Services\EstablishmentService;
use App\Http\Requests\EstablishmentRequest;
use Inertia\Inertia;

class EstablishmentController extends Controller
{
    protected $establishmentService;

    public function __construct(EstablishmentService $establishmentService)
    {
        $this->establishmentService = $establishmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $establishments = $this->establishmentService->getAllEstablishments();
        return Inertia::render('Establishments/Index', ['establishments' => $establishments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Establishments/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstablishmentRequest $request)
    {
        $this->establishmentService->createEstablishment($request->toEstablishmentData());

        return redirect()->route('establishments.index')->with('success', 'Establishment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Establishment $establishment)
    {
        return Inertia::render('Establishments/Show', ['establishment' => $establishment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Establishment $establishment)
    {
        return Inertia::render('Establishments/Edit', ['establishment' => $establishment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstablishmentRequest $request, Establishment $establishment)
    {
        $this->establishmentService->updateEstablishment($request->toEstablishmentData(), $establishment);

        return redirect()->route('establishments.index')->with('success', 'Establishment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Establishment $establishment)
    {
        $this->establishmentService->deleteEstablishment($establishment);

        return redirect()->route('establishments.index')->with('success', 'Establishment deleted successfully.');
    }
}