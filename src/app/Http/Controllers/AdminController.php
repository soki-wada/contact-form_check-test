<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminController extends Controller
{
    //
    public function admin(){
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request){
        if ($request->has('reset')){
            return redirect('/admin');
        }

        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->Paginate(7);

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request){
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')->KeywordSearch($request->keyword)->GenderSearch($request->gender)->CategorySearch($request->category_id)->DateSearch($request->date)->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=Shift_JIS',
            'Content-Disposition' => 'attachment; filename="contacts.csv"',
        ];

        $callback = function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            $header = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類'];
            fputcsv($handle, $this->convertToSjis($header));

            foreach ($contacts as $contact) {
                $row = [
                    $contact->first_name . ' ' . $contact->last_name,
                    $this->getGenderText($contact->gender),
                    $contact->email,
                    $contact->category->content,
                ];
                fputcsv($handle, $this->convertToSjis($row));
            }

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function convertToSjis(array $data): array
    {
        return array_map(function ($value) {
            return mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
        }, $data);
    }

    private function getGenderText($gender)
    {
        if ($gender == 1) {
            return '男性';
        } elseif ($gender == 2) {
            return '女性';
        } else {
            return 'その他';
        }  
    }
}
