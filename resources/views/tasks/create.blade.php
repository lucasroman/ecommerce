<h1>Create Task</h1>

<form method="POST" action={{ route('tasks.store') }}>
    @csrf

    <div>
        <input id="done" type="checkbox">
        <label for="done">Done</label>
    </div>

    <div>
        <label for="title">Title</label>
        <input id="title" type="text">
    </div>

    <div>
        <lable for="description">Description</lable>
        <textarea id="description" name="description" rows="4" cols="50">
        </textarea>
    </div>

    <input type="submit" value="Create">
</form>