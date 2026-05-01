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
        if ($request->filled('source')) {
            $query->where('source', $request->source);
        }
        if ($request->filled('spam')) {
            $query->where('is_spam', (bool) $request->spam);
        }
        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%$s%")
                  ->orWhere('email', 'like', "%$s%")
                  ->orWhere('phone', 'like', "%$s%")
                  ->orWhere('pincode', 'like', "%$s%");
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
            fputcsv($handle, ['ID','Name','Email','Phone','Pincode','Store Area','Property Type','Opening Timeline','City','Budget','Source','Spam','Status','IP','Date']);
            foreach ($applications as $app) {
                fputcsv($handle, [
                    $app->id, $app->name, $app->email, $app->phone,
                    $app->pincode, $app->store_area, $app->property_type,
                    $app->opening_timeline, $app->city, $app->investment_budget,
                    $app->source, $app->is_spam ? 'Yes' : 'No',
                    $app->status, $app->ip_address,
                    $app->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($handle);
        }, 200, $headers);
    }

    public function destroy(FranchiseApplication $application)
    {
        $application->delete();
        return redirect()->route('admin.applications.index')->with('success', 'Application deleted.');
    }
}
