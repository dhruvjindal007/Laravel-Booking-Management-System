<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Webpage;
class WebPageController extends Controller
{
    //
    public function index()
    {
        $data = Webpage::where('status', 1)->get();
        return view('AdminDashboard.WebPage.index', ['data' => $data]);
        // $pages = Webpage::all(); // or Webpage::paginate(10);
        // return view('AdminDashboard.WebPage.index', compact('pages'));
    }
    public function add()
    {
        return view('AdminDashboard.WebPage.addEdit');
    }
    public function save(Request $request)
    {
        $page = new WebPage([
            'name' => $request->get('page_name'),
            'slug' => $request->get('page_slug'),
            'html' => $request->get('page_content'),
            'status' => $request->get('page_status'),
            'created_by' => Auth::user()->user_type,
        ]);
        $page->save();
        return redirect()->route('webpage.index')->with('success', 'Page created successfully');
    }
    public function edit($id)
    {
        $data = Webpage::find($id);
        return view('AdminDashboard.WebPage.addEdit', ['data' => $data]);
    }
    public function update(Request $request, $id)
    {
        $page = WebPage::find($id);
        $page->name = $request->get('page_name');
        $page->slug = $request->get('page_slug');
        $page->html = $request->get('page_content');
        $page->status = $request->get('page_status');
        $page->created_by = Auth::user()->id;
        $page->save();
        return redirect()->route('webpage.index')->with('success', 'Page updated successfully');
    }
    public function viewDelete($id)
    {
        return view('AdminDashboard.WebPage.delete', ['id' => $id]);
    }
    public function delete($id)
    {
        WebPage::where('id', $id)->delete();
        return redirect()->route('webpage.index');
    }
    public function landing()
    {
        // Logic for landing page
        $pages = Webpage::all();
        return view('index', compact('pages'));
    }
    public function viewPage($page)
    {
        $data = Webpage::where('slug', $page)->first();
        $pages = Webpage::where('status', 1)->get();
        return view('dynamic', ['data' => $data, 'pages' => $pages]);
    }
}
