@extends('layouts.app')

@section('content')
    <h3 class="text-center">Insert Rating</h3>

    <form method="POST" action="{{ url('/rate') }}">
        @csrf

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Book Author :</label>
            <div class="col-sm-4">
                <select name="author_id" id="author_id" class="form-select" required>
                    <option value="">-- Select Author --</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Book Name :</label>
            <div class="col-sm-4">
                <select name="book_id" id="book_id" class="form-select" required>
                    <option value="">-- Select Book --</option>
                </select>
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Rating :</label>
            <div class="col-sm-4">
                <select name="rating" class="form-select" required>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    document.getElementById('author_id').addEventListener('change', function () {
        const authorId = this.value;
        const bookSelect = document.getElementById('book_id');
        bookSelect.innerHTML = '<option value="">Loading...</option>';

        fetch(`/api/books-by-author/${authorId}`)
            .then(res => res.json())
            .then(data => {
                bookSelect.innerHTML = '<option value="">-- Select Book --</option>';
                data.forEach(book => {
                    bookSelect.innerHTML += `<option value="${book.id}">${book.name}</option>`;
                });
            });
    });
</script>
@endpush
