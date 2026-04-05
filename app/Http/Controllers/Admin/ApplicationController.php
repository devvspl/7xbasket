<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FranchiseApplication;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = FranchiseApplication::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('city', 'like', "%$s%");
            });
        }

        $applications = $query->paginate(20)->withQueryString();

        return view('admin.applications.index', compact('applications'));
    }

    public function show(FranchiseApplication $application)
    {
        return view('admin.applications.show', compact('application'));
    }

    public function updateStatus(Request $request, FranchiseApplication $application)
    {
        $request->validate(['status' => 'required|in:pending,reviewed,approved,rejected']);
        $application->update(['status' => $request->status]);
        return back()->with('success', 'Status updated.');
    }

    public function export(): StreamedResponse
    {
        $applications = FranchiseApplication::latest()->get();

        $headers = [
            'Content-Type'        => 'text/csv',
            'Content-Disposition' => 'attachment; filename="applications.csv"',
        ];

        return response()->stream(function () use ($applications) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Name', 'Email', 'Phone', 'City', 'Budget', 'Message', 'Status', 'Date']);
            foreach ($applications as $app) {
                fputcsv($handle, [
                    $app->id, $app->name, $app->email, $app->phone,
                    $app->city, $app->investment_budget, $app->message,
                    $app->status, $app->created_at->format('Y-m-d'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }

    public function destroy(FranchiseApplication $application)
    {
        $application->delete();
        return back()->with('success', 'Application deleted.');
    }
}
