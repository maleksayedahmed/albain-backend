<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsContent;
use Illuminate\Http\Request;

class AboutUsContentController extends Controller
{
    /**
     * Show the form for editing the About Us content.
     */
    public function edit()
    {
        $about = AboutUsContent::first();
        if (!$about) {
            $about = AboutUsContent::create([
                'section_title' => '',
                'paragraph_1' => '',
                'paragraph_2' => '',
                'paragraph_3' => '',
                'list_items' => json_encode([]),
            ]);
        }
        return view('admin.about_us_content.edit', compact('about'));
    }

    /**
     * Update the About Us content in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'section_title' => 'required|string|max:255',
            'paragraph_1' => 'required|string',
            'paragraph_2' => 'nullable|string',
            'paragraph_3' => 'nullable|string',
            'list_items' => 'nullable|string',
        ]);

        $about = AboutUsContent::first();
        $listItemsInput = $request->input('list_items');
        $listItems = $about->list_items; // default to current value
        if (!is_null($listItemsInput) && trim($listItemsInput) !== '') {
            $listItems = json_encode(
                array_filter(
                    array_map('trim', preg_split('/\r\n|\r|\n/', $listItemsInput))
                )
            );
        }
        $about->update([
            'section_title' => $request->section_title,
            'paragraph_1' => $request->paragraph_1,
            'paragraph_2' => $request->paragraph_2,
            'paragraph_3' => $request->paragraph_3,
            'list_items' => $listItems,
        ]);

        return redirect()->route('admin.about_us_content.edit')
            ->with('success', 'تم تحديث قسم من نحن بنجاح');
    }
} 