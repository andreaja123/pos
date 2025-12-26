<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->query('q');
        $perPage = $request->query('per_page', 10);

        $groups = Group::withCount('customers')
            ->when($q, fn($qB) => $qB->where('name', 'like', "%{$q}%"))
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

        return view('pelanggan.gruppelanggan', compact('groups'));
    }

    public function create()
    {
        return view('pelanggan.grupcreate');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:groups,name',
            'description' => 'nullable|string',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'active' => 'sometimes|boolean'
        ]);

        $data['active'] = $request->has('active');

        Group::create($data);

        return redirect()->route('groups.index')->with('success', 'Grup pelanggan berhasil dibuat.');
    }

    public function edit(Group $group)
    {
        return view('pelanggan.grupedit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100|unique:groups,name,' . $group->id,
            'description' => 'nullable|string',
            'discount_percentage' => 'nullable|numeric|min:0|max:100',
            'active' => 'sometimes|boolean'
        ]);

        $data['active'] = $request->has('active');

        $group->update($data);

        return redirect()->route('groups.index')->with('success', 'Grup pelanggan diperbarui.');
    }

    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Grup pelanggan dihapus.');
    }
}
