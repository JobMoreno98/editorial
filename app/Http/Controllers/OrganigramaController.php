<?php

namespace App\Http\Controllers;

use App\Models\Directorio;
use Illuminate\Http\Request;

class OrganigramaController extends Controller
{
    public function updatePadre(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:directorios,id',
            'new_parent_id' => 'nullable|exists:directorios,id',
        ]);

        $childId = $request->child_id;
        $newParentId = $request->new_parent_id;

        // 1. No permitir que un nodo sea su propio padre
        if ($childId == $newParentId) {
            return response()->json([
                'error' => 'Un puesto no puede ser su propio padre.'
            ], 422);
        }

        // 2. Evitar ciclos
        if ($newParentId && $this->isDescendant($childId, $newParentId)) {
            return response()->json([
                'error' => 'No puedes asignar un hijo como padre. Esto crearía un ciclo.'
            ], 422);
        }

        // 3. Guardar
        $puesto = Directorio::find($childId);
        $puesto->id_padre = $newParentId;
        $puesto->save();

        return response()->json(['message' => 'Jerarquía actualizada']);
    }
    private function isDescendant($parentId, $possibleDescendantId)
    {
        $hijos = Directorio::where('id_padre', $parentId)->pluck('id');

        foreach ($hijos as $hijoId) {
            if ($hijoId == $possibleDescendantId) {
                return true;
            }

            if ($this->isDescendant($hijoId, $possibleDescendantId)) {
                return true;
            }
        }

        return false;
    }
}
