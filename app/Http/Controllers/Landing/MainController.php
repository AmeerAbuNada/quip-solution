<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Contact\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
  public function sendContactMessage(StoreContactRequest $request)
  {
    $contact = new Contact($request->validated());
    $isSaved = $contact->save();
    if ($isSaved) {
      return response()->json([
        'message' => App::isLocale('en') ? 'Message Sent Successfully!' : 'تم إرسال الرسالة بنجاح'
      ], Response::HTTP_CREATED);
    } else {
      return response()->json([
        'message' => App::isLocale('en') ? 'Something went wrong, Please try again.' : 'فشلت عملية الإرسال, يرجى المحاولة مرة أخرى'
      ], Response::HTTP_BAD_REQUEST);
    }
  }
}
