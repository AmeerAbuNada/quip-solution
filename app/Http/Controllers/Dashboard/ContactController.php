<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Contact\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                            class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>';
                })
                ->addColumn('name', function ($row) {
                    return $row->first_name . ' ' . $row->last_name;
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return response()->view('dashboard.contacts.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact($request->validated());
        $isSaved = $contact->save();
        if($isSaved) {
            return response()->json([
                'message' => App::isLocale('en') ? 'Message Sent Successfully!' : 'تم إرسال الرسالة بنجاح'
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'message' => App::isLocale('en') ? 'Something went wrong, Please try again.' : 'فشلت عملية الإرسال, يرجى المحاولة مرة أخرى'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $deleted = $contact->delete();
        return response()->json([
            'message' => $deleted ? 'Contact Deleted Successfully!' : 'Failed to delete contact, Please try again.',
        ], $deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
