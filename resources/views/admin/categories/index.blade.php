@extends('layouts.app')
@section('content')
    <div class="col-12 offset-2">
        <a href="{{ route('categories.create') }}" class="btn btn-success">Добавить категорию</a>
        @forelse($categories as $categoryItem)
            <h4><a href="{{ route('categories.edit', ['category' => $categoryItem]) }}">{{ $categoryItem->name }}</a> -
                {{ $categoryItem->updated_at->format('Y d-m (H:i)') }}
                &nbsp; <a href="javascript:;" style="color:red;" class="delete" rel="{{ $categoryItem->id }}">Удалить</a></h4>
        @empty
            <h3>Новостей нет</h3>
        @endforelse

        <br>
        {{ $categories->links() }}
    </div>
@stop
@push('js')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            const fetchData = async (url, options) => {
                const response = await fetch(`${url}`, options);
                const body = await response.json();
                return body;
            };
            const button = document.querySelectorAll(".delete");
            button.forEach(el => {
                el.addEventListener("click", function () {
                    if(confirm("Вы подтверждаете удаление ?")) {
                        fetchData("{{ url('/admin/categories') }}/" + this.getAttribute('rel'), {
                            method: "DELETE",
                            headers: {
                                'Content-Type': 'application/json; charset=utf-8',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then((data) => {
                            console.log('Deleted');
                        })
                    }
                });
            })

        });
    </script>
@endpush
