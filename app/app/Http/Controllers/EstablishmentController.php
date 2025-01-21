<?php

namespace App\Http\Controllers;

use App\Models\Establishment;
use App\Services\EstablishmentService;
use App\Http\Requests\EstablishmentRequest;
use App\Interfaces\Services\IEstablishmentService;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class EstablishmentController extends Controller
{
    protected $establishmentService;

    public function __construct(IEstablishmentService $establishmentService)
    {
        $this->establishmentService = $establishmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $establishments = $this->establishmentService->getAllByUserPaginated(10, $user->id);

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
        $this->establishmentService->create($request->toEstablishmentData());

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
        $user = Auth::user();

        $this->establishmentService->update($request->toEstablishmentData(), $establishment->id, $user->id);

        return redirect()->route('establishments.index')->with('success', 'Establishment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Establishment $establishment)
    {
        $user = Auth::user();

        $this->establishmentService->delete($establishment->id, $user->id);

        return redirect()->route('establishments.index')->with('success', 'Establishment deleted successfully.');
    }
}