<?php

    use App\Models\Todo;

    use function Livewire\Volt\{state, rules, computed};

    state([
        'content' => '',
    ]);

    rules([
        'content' => [
            'required',
            'min:3',
            'max:120'
        ],
    ]);

    $addTodo = function() {
        $this->validate();
        Todo::create(['content'=> $this->content]);
        $this->content = '';
    };

    $count = computed(function() {
        return Todo::count();
    });

    $todos = computed(
        fn () => Todo::get(),
    );


?>

<div>
    AllTask : {{ $this->count }}
    <form wire:submit.prevent="addTodo">
        <label for="content">
            content
        </label>
        <input type="text" id="content" wire:model="content">
        <button type="submit">Add Task</button>
    </form>
    @error('content')
        <span>{{ $message }}</span>
    @enderror

    <br><br>

    @foreach ($this->todos as $todo)
        {{ $todo->content }} <br>
    @endforeach
</div>
