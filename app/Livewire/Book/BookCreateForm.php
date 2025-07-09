<?php

namespace App\Livewire\Book;

use App\Models\Book;
use App\Models\Category;
use App\Models\Shelf;
use Illuminate\Database\Query\Builder;
use Livewire\Component;

class BookCreateForm extends Component
{
    public $code;
    public $title;
    public $author;
    public $publisher;
    public $year;
    public $stock = 0;
    public $category;

    public function save()
    {
        $this->validate([
            'code' => 'required|string|unique:books,code',
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'year' => 'required|digits:4|integer|max:' . date('Y'),
            'stock' => 'numeric',
            'category' => 'required|string',
        ], [
            'code.required' => 'Kode buku wajib diisi',
            'code.unique' => 'Kode buku sudah terdaftar',
            'title.required' => 'Judul buku wajib diisi',
            'author.required' => 'Pengarang wajib diisi',
            'publisher.required' => 'Penerbit wajib diisi',
            'year.required' => 'Tahun wajib diisi',
            'year.integer' => 'Tahun harus berupa angka',
            'year.digits' => 'Tahun harus terdiri dari 4 digit angka',
            'year.max' => 'Tahun tidak boleh lebih dari ' . date('Y'),
            'stock.numeric' => 'Stok harus berupa angka',
            'category.required' => 'Kategori wajib dipilih'
        ]);

        try {
            $book = Book::create([
                'code' => $this->code,
                'title' => $this->title,
                'author' => $this->author,
                'publisher' => $this->publisher,
                'year' => $this->year,
                'stock' => $this->stock,
                'category_id' => $this->category,
            ]);
            if (!$book) {
                session()->flash('error', 'Gagal menambahkan buku');
                return $this->redirect(route('books.create'), true);
            }
            session()->flash('success', 'Berhasil menambahkan buku');
            return $this->redirect(route('books.create'), true);
        } catch (\Throwable $th) {
            session()->flash('error', 'Gagal menambahkan buku');
            return $this->redirect(route('books.create'), true);
        }
    }

    public function render()
    {
        $shelves = Shelf::with('categories')->orderBy('code', 'ASC')->get();
        return view('livewire.book.book-form', compact('shelves'));
    }
}
