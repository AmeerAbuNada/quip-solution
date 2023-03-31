<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Contact\ReplyContactRequest;
use App\Http\Requests\Dashboard\Contact\StoreContactRequest;
use App\Mail\ReplyEmail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::select('*')->with('admin');
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    if($row->status == 'pending') {
                        return '
                        <a href="'.route('contacts.show', $row->id).'" class="btn btn-icon btn-warning" ><i class="fas fa-eye fs-4"></i></a>
                                                <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                                    class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                        ';
                    }
                    return '
                    <a href="'.route('contacts.show', $row->id).'" class="btn btn-icon btn-success" ><i class="fas fa-eye fs-4"></i></a>
                                            <button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                                                class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>
                    ';

                    $actions='<a href="'.route('contacts.show', $row->id).'" class="btn btn-icon btn-warning"><i class="fas fa-eye fs-4"></i></a>';
                    $actions.= '<button type="button" onclick="delItem(\'' . $row->id . '\',this)"
                    class="btn btn-icon btn-danger"><i class="fas fa-trash fs-4"></i></button>';
                    return $actions;
                })
                ->addColumn('message_raw', function ($row) {
                    return Str::limit($row->message, 40, '...');
                })
                ->addColumn('status_raw', function ($row) {
                    if($row->reply) {
                        return '<span class="badge badge-light-success">'.__('contacts.answered').'</span> (' . $row->admin->name . ')';
                    }
                    return '<span class="badge badge-light-warning">'.__('contacts.pending').'</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d h:i a');
                })
                ->rawColumns(['action', 'status_raw'])
                ->make(true);
        }
        return response()->view('dashboard.contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return response()->view('dashboard.contacts.show', compact('contact'));
    }

    public function reply(Contact $contact, ReplyContactRequest $request) {
        $data = $request->validated();
        $data['admin_id'] = Auth::id();
        $data['status'] = 'Answered';
        $updated = $contact->update($data);
        if($updated) {
            Mail::to($contact->email)->send(new ReplyEmail($request->input('reply')));
        }
        return $updated ? parent::successResponse() : parent::errorResponse();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $deleted = $contact->delete();
        return $deleted ? parent::successResponse() : parent::errorResponse();
    }
}
