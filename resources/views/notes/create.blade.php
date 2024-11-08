<!DOCTYPE html>
<html>
<head>
    <title>Create Note</title>
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
    position:absolute;
    top:400px;
    left:50px;


}
a:hover{
    background-color:rgb(72, 100, 102);
    transition:0.4s;
}
input{
    padding:10px;
    width: 300px;
    height:20px;
    border:none;
    border-bottom:2px solid black;
    border-radius:7px;



}
button{

    font-size: 18px;
    margin-left: 60px;
    padding:10px;
    background-color:rgb(54, 66, 67);;
    border:2px solid blue;
    border-radius:7px;
    color:white;
    position:absolute;
    margin-top:30px;
    margin-left:80px;

}
button:hover{
    background-color:rgb(72, 100, 102);
    transition:0.4s;
}
textarea{
    padding:10px;
    width: 300px;
    height:20px;
    border:none;
    border-bottom:2px solid black;
    border-radius:7px;

}
</style>
<body>
    <div>
    <h1>Create a New Note</h1>

    <form action="/notes" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Create Note</button>
    </form>

    <a href="/">Back to notes</a>
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this note?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>

</div>
</body>
</html>
