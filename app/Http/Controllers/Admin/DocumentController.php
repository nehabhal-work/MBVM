<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $this->validated($request);

        Document::create($validated + [
            'file'       => $request->hasFile('file') ? $request->file('file')->store('documents', 'public') : null,
            'sort_order' => $validated['sort_order'] ?? ((int) Document::max('sort_order') + 1),
            'is_active'  => true,
        ]);

        return $this->back('नवीन दस्तऐवज जोडला.');
    }

    public function update(Request $request, Document $document)
    {
        $validated = $this->validated($request);
        $validated['sort_order'] ??= $document->sort_order;

        if ($request->hasFile('file')) {
            $this->deleteFile($document);
            $validated['file'] = $request->file('file')->store('documents', 'public');
        } elseif ($request->boolean('remove_file')) {
            $this->deleteFile($document);
            $validated['file'] = null;
        }

        $document->update($validated);

        return $this->back('दस्तऐवज अद्ययावत केला.');
    }

    public function toggle(Document $document)
    {
        $document->update(['is_active' => !$document->is_active]);

        return $this->back($document->is_active ? 'दस्तऐवज सुरू (Active) केला.' : 'दस्तऐवज बंद (Inactive) केला.');
    }

    public function destroy(Document $document)
    {
        $this->deleteFile($document);
        $document->delete();

        return $this->back('दस्तऐवज हटवला.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:1000'],
            'icon'          => ['required', Rule::in(array_keys(Document::ICONS))],
            'pending_label' => ['nullable', 'string', 'max:100'],
            'sort_order'    => ['nullable', 'integer', 'min:0', 'max:999'],
            'file'          => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:10240'],
        ], [
            'file.mimes' => 'फाईल फक्त PDF / DOC / DOCX स्वरूपात असावी.',
            'file.max'   => 'फाईल १० MB पेक्षा मोठी नसावी.',
        ]);

        unset($validated['file']);
        $validated['pending_label'] = ($validated['pending_label'] ?? null) ?: 'मंजुरीनंतर उपलब्ध';

        return $validated;
    }

    private function deleteFile(Document $document): void
    {
        if ($document->file) {
            Storage::disk('public')->delete($document->file);
        }
    }

    private function back(string $message)
    {
        return redirect()->route('admin.users.index', ['tab' => 'documents'])->with('success', $message);
    }
}
