<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index(Request $request)
    {
        $query = Redirect::latest();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('from_path', 'like', "%$s%")
                  ->orWhere('to_path', 'like', "%$s%");
            });
        }

        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $redirects = $query->paginate(20)->withQueryString();

        return view('admin.redirects.index', compact('redirects'));
    }

    public function create()
    {
        return view('admin.redirects.form', ['redirect' => new Redirect()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        Redirect::create($data);

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect created successfully.');
    }

    public function edit(Redirect $redirect)
    {
        return view('admin.redirects.form', compact('redirect'));
    }

    public function update(Request $request, Redirect $redirect)
    {
        $data = $this->validated($request, $redirect->id);

        $redirect->update($data);

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect updated successfully.');
    }

    public function destroy(Redirect $redirect)
    {
        $redirect->delete();

        return back()->with('success', 'Redirect deleted.');
    }

    public function toggle(Redirect $redirect)
    {
        $redirect->update(['is_active' => !$redirect->is_active]);

        $state = $redirect->is_active ? 'enabled' : 'disabled';

        return back()->with('success', "Redirect {$state}.");
    }

    private function validated(Request $request, ?int $excludeId = null): array
    {
        $fromRule = 'required|string|max:500|unique:redirects,from_path';
        if ($excludeId) {
            $fromRule .= ',' . $excludeId;
        }

        $data = $request->validate([
            'from_path'   => $fromRule,
            'to_path'     => 'required|string|max:500',
            'status_code' => 'required|integer|in:301,302,307,308',
            'is_active'   => 'nullable|boolean',
        ]);

        // Normalise paths
        $data['from_path'] = Redirect::normalisePath($data['from_path']);
        $data['to_path']   = $data['to_path']; // allow full URLs too
        $data['is_active'] = (bool) ($data['is_active'] ?? true);

        return $data;
    }
}
