<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Shelf;
use Livewire\Component;
use Livewire\WithPagination;

class BookList extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $category;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public $selectedBookId = null;
    public $bookTitle = null;
    public $showModal = false;

    public function confirmDelete($id, $title)
    {
        $this->selectedBookId = $id;
        $this->bookTitle = $title;
        $this->showModal = true;
    }

    public function deleteBook()
    {
        Book::findOrFail($this->selectedBookId)->delete();
        $this->showModal = false;
        session()->flash('success', 'Berhasil menghapus buku');
        return $this->redirect(route('books.index'), true);
    }

    public function render()
    {
        $books = Book::with('category')
            ->when($this->search, fn($q) => $q->search($this->search))
            ->when($this->category, fn($q) => $q->where('category_id', $this->category))
            ->paginate($this->perPage);
        $shelves = Shelf::with('categories')->orderBy('code', 'ASC')->get();

        return view('livewire.book.book-list', compact('books', 'shelves'));
    }
}
