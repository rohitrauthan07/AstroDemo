<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role', 'user')->get();
            return view('admin.index', compact('users'));
        } catch (\Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to fetch users.']);
        }
    }

    public function manageCategories($userId)
    {
        try {
            $user = User::findOrFail($userId);
            $categories = Category::where('user_id', $userId)->with('subcategories')->get();
            return view('admin.manage_categories', compact('user', 'categories'));
        } catch (\Exception $e) {
            Log::error('Error managing categories: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to load categories.']);
        }
    }

    public function storeCategory(Request $request, $userId)
    {
        $request->validate(['name' => 'required']);

        try {
            Category::create([
                'name' => $request->name,
                'user_id' => $userId
            ]);
            return redirect()->route('admin.manageCategories', $userId)->with('success', 'Category added successfully.');
        } catch (\Exception $e) {
            Log::error('Error adding category: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to add category.']);
        }
    }

    public function storeSubcategory(Request $request, $userId)
    {
        $request->validate(['name' => 'required', 'category_id' => 'required']);

        try {
            Subcategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id
            ]);
            return redirect()->route('admin.manageCategories', $userId)->with('success', 'Subcategory added successfully.');
        } catch (\Exception $e) {
            Log::error('Error adding subcategory: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to add subcategory.']);
        }
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate(['name' => 'required']);

        try {
            $category = Category::findOrFail($id);
            $category->update(['name' => $request->name]);
            return redirect()->back()->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update category.']);
        }
    }

    public function deleteCategory($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->subcategories()->delete();
            $category->delete();
            return redirect()->back()->with('success', 'Category and its subcategories deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete category.']);
        }
    }

    public function updateSubcategory(Request $request, $id)
    {
        $request->validate(['name' => 'required']);

        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->update(['name' => $request->name]);
            return redirect()->back()->with('success', 'Subcategory updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating subcategory: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to update subcategory.']);
        }
    }

    public function deleteSubcategory($id)
    {
        try {
            $subcategory = Subcategory::findOrFail($id);
            $subcategory->delete();
            return redirect()->back()->with('success', 'Subcategory deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting subcategory: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete subcategory.']);
        }
    }
}
