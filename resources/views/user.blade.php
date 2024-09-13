<form action="{{route('user.update')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"/>
    <button type="submit">Submit</button>
</form>
