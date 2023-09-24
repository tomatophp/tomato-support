<?php

namespace TomatoPHP\TomatoSupport\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use TomatoPHP\TomatoAdmin\Facade\Tomato;
use TomatoPHP\TomatoSupport\Transformers\PagesResource;

class PageController extends Controller
{
    public string $model;

    public function __construct()
    {
        $this->model = \TomatoPHP\TomatoSupport\Models\Page::class;
    }

    /**
     * List All Pages
     *
     * get all pages on the system
     *
     * @param Request $request
     * @return View|JsonResponse
     */
    public function index(Request $request): View|JsonResponse
    {
        return Tomato::index(
            request: $request,
            model: $this->model,
            view: 'tomato-support::pages.index',
            table: \TomatoPHP\TomatoSupport\Tables\PageTable::class,
            resource: config('tomato-support.resources.pages.index')
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function api(Request $request): JsonResponse
    {
        return Tomato::json(
            request: $request,
            model: \TomatoPHP\TomatoSupport\Models\Page::class,
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return Tomato::create(
            view: 'tomato-support::pages.create',
        );
    }

    /**
     * @param Request $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $response = Tomato::store(
            request: $request,
            model: \TomatoPHP\TomatoSupport\Models\Page::class,
            validation: [
                'color' => 'nullable|max:255',
                'title' => 'required|array',
                'title*' => 'required|string|max:255',
                'short_description' => 'nullable|array',
                'slug' => 'required|max:255|string',
                'body' => 'nullable|array',
                'is_active' => 'nullable',
                'has_view' => 'nullable',
                'view' => 'nullable|max:255|string'
            ],
            message: __('Page updated successfully'),
            redirect: 'admin.pages.index',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    /**
     * Get Page Content By Slug
     *
     * you can select a page by slug to view it's content
     *
     * @param \TomatoPHP\TomatoSupport\Models\Page $model
     * @return View|JsonResponse
     */
    public function show($model): View|JsonResponse
    {
        $model = \TomatoPHP\TomatoSupport\Models\Page::where('slug', $model)->orWhere('id', $model)->firstOrFail();
        if($model){
            return Tomato::get(
                model: $model,
                view: 'tomato-support::pages.show',
                hasMedia: true,
                collection: [
                    "cover" => false,
                    "gallery" => true,
                ],
                resource: config('tomato-support.resources.pages.show')
            );
        }
        else {
            abort(404);
        }

    }

    /**
     * @param \TomatoPHP\TomatoSupport\Models\Page $model
     * @return View
     */
    public function edit(\TomatoPHP\TomatoSupport\Models\Page $model): View
    {
        return Tomato::get(
            model: $model,
            view: 'tomato-support::pages.edit',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );
    }

    /**
     * @param Request $request
     * @param \TomatoPHP\TomatoSupport\Models\Page $model
     * @return RedirectResponse|JsonResponse
     */
    public function update(Request $request, \TomatoPHP\TomatoSupport\Models\Page $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::update(
            request: $request,
            model: $model,
            validation: [
                'color' => 'nullable|max:255',
                'title' => 'sometimes|array',
                'title*' => 'sometimes|string|max:255',
                'short_description' => 'nullable|array',
                'slug' => 'sometimes|max:255|string',
                'body' => 'nullable|array',
                'is_active' => 'nullable',
                'has_view' => 'nullable',
                'view' => 'nullable|max:255|string'
            ],
            message: __('Page updated successfully'),
            redirect: 'admin.pages.index',
            hasMedia: true,
            collection: [
                "cover" => false,
                "gallery" => true,
            ]
        );

         if($response instanceof JsonResponse){
             return $response;
         }

         return $response->redirect;
    }

    /**
     * @param \TomatoPHP\TomatoSupport\Models\Page $model
     * @return RedirectResponse|JsonResponse
     */
    public function destroy(\TomatoPHP\TomatoSupport\Models\Page $model): RedirectResponse|JsonResponse
    {
        $response = Tomato::destroy(
            model: $model,
            message: __('Page deleted successfully'),
            redirect: 'admin.pages.index',
        );

        if($response instanceof JsonResponse){
            return $response;
        }

        return $response->redirect;
    }

    public function html($slug){
        $page= \TomatoPHP\TomatoSupport\Models\Page::where('slug', $slug)->firstOrFail();
        return view('tomato-support::pages.html', compact('page'));
    }
}
