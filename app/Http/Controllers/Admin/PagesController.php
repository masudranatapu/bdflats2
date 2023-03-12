<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PagesRequest;
use App\Repositories\Admin\Pages\PagesInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    protected $resp;
    protected $pages;

    public function __construct(PagesInterface $pages)
    {
        $this->pages = $pages;
    }

    public function getIndex(Request $request)
    {
        $data['pages'] = $this->pages->getPages()->data;
        return view('admin.pages.index', compact('data'));
    }

    public function getCreate()
    {
        $data['page_categories'] = [];
        $categories = $this->pages->getPagesCategories()->data;
        foreach ($categories as $category) {
            $data['page_categories'][$category->PK_NO] = $category->NAME . ' (' . $category->PROPERTY_FOR . ')';
        }
        return view('admin.pages.create', compact('data'));
    }

    public function getEdit($id)
    {
        $data['page_categories'] = [];
        $categories = $this->pages->getPagesCategories()->data;
        foreach ($categories as $category) {
            $data['page_categories'][$category->PK_NO] = $category->NAME . ' (' . $category->PROPERTY_FOR . ')';
        }
        $data['page'] = $this->pages->getPage($id)->data;
        return view('admin.pages.edit', compact('data'));
    }

    public function postStore(PagesRequest $request): RedirectResponse
    {
        $this->resp = $this->pages->storePage($request);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function postUpdate(PagesRequest $request, $id): RedirectResponse
    {
        $this->resp = $this->pages->updatePage($request, $id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }

    public function getDelete($id): RedirectResponse
    {
        $this->resp = $this->pages->deletePage($id);
        return redirect()->route($this->resp->redirect_to)->with($this->resp->redirect_class, $this->resp->msg);
    }
}
