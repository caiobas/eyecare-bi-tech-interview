<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientsResource;
use App\Models\Patient;
use DateTime;

class PatientController extends Controller
{
    public function __construct(
        protected Patient $repository
    ) {
    }

    public function index()
    {
        $patients = $this->repository->where('deleted_at', null)->orderBy('id', 'desc')->get();

        return PatientsResource::collection($patients);
    }

    public function store(StorePatientRequest $request)
    {
        $data = $request->validated();

        $patient = new Patient($data);
        $patient->birthday = new DateTime($request->birthday);

        $patient->save();

        return new PatientResource($patient);
    }

    public function show(string $cpf)
    {
        $patient = $this->repository->where('cpf', $cpf)->where('deleted_at', null)->first();
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
        return new PatientResource($patient);
    }

    public function update(UpdatePatientRequest $request, string $cpf)
    {
        $data = $request->validated();

        $patient = $this->repository->where('cpf', $cpf)->where('deleted_at', null)->first();
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $validadeCpf = $this->repository->where('cpf', $data['cpf'])->first();
        if ($validadeCpf && $validadeCpf->id !== $patient->id) {
            return response()->json(
                [
                    'message' => 'The cpf has already been taken.',
                    'errors' =>
                    [
                        'cpf' => ['The cpf has already been taken.']
                    ]
                ],
                422
            );
        }

        if (isset($data['birthday'])) {
            $patient->birthday = new DateTime($request->birthday);
        }

        $patient->update($data);

        return new PatientResource($patient);
    }

    public function destroy(string $cpf)
    {
        $patient = $this->repository->where('cpf', $cpf)->where('deleted_at', null)->first();
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }

        $patient->deleted_at = new DateTime();
        $patient->save();

        return response()->json([], 204);
    }
}
