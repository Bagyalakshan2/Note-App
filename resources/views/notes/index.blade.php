<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
</head>
<style>
div{
    position: absolute;
    justify-content: center;
    align-items: center;
    top: 200px;
    left: 41%;
    background-color: rgb(205, 189, 219);
    padding: 30px;
    border: 2px solid rgb(205, 189, 219);
    border-radius: 10px;
    color: rgb(54, 66, 67);
    width: 300px;
    height: 400px;
    box-shadow: 2px 2px 3px black;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
h1{
    font-size:30px;
    padding-left:70px;
}
a{
    text-decoration: none;
    font-size: 18px;
    margin-left: 60px;
    padding:10px;
    background-color:rgb(54, 66, 67);;
    border:2px solid blue;
    border-radius:7px;
    color:white;

}
a:hover{
    background-color:rgb(72, 100, 102);
    transition:0.4s;
}
li{
    padding:10px;
    color:rgb(72, 100, 102);
    font-size:17px;
}

</Style>
<body>
    <div>
    <h1>Your Notes</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="/notes/create">Create a new note</a>

    <ul>
        @foreach ($notes as $note)
            <li>{{ $note->title }}: {{ $note->content }}</li>
        @endforeach
    </ul>
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</div>
</body>
</html>
