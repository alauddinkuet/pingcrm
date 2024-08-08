<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Products/Index', [
            'filters' => Request::all('search', 'trashed'),
            'products' => Auth::user()->account->products()
                ->orderBy('name')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(20)
                ->withQueryString()
                ->through(fn($product) => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'sku' => $product->sku,
                    'description' => $product->description,
                    'deleted_at' => $product->deleted_at
                ]),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Products/Create');
    }

    public function store(): RedirectResponse
    {
        Auth::user()->account->products()->create(
            Request::validate([
                'name' => ['required', 'max:50'],
                'sku' => ['required', 'max:50'],
                'price' => ['required', 'numeric'],
                'description' => ['nullable']
            ])
        );

        return Redirect::route('products')->with('success', 'Product created.');
    }

    public function edit(Product $product): Response
    {
        return Inertia::render('Products/Edit', [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'sku' => $product->sku,
                'price' => $product->price,
                'description' => $product->description,
                'deleted_at' => $product->deleted_at,
            ]
        ]);
    }

    public function update(Product $product): RedirectResponse
    {
        $product->update(
            Request::validate([
                'name' => ['required', 'max:50'],
                'sku' => ['required', 'max:50'],
                'price' => ['nullable', 'numeric'],
                'description' => ['nullable']
            ])
        );

        return Redirect::back()->with('success', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return Redirect::back()->with('success', 'Product deleted.');
    }

    public function restore(Product $product): RedirectResponse
    {
        $product->restore();

        return Redirect::back()->with('success', 'Product restored.');
    }
}
