<form class="mr-3" action="{{$route}}" method="{{$methodType}}">
    @csrf
    <input type="hidden" name="user_id" value="{{$id}}">
    <button class="btn btn-sm btn-{{$btnColor}}" type="submit">{{$btnName}}</button>
</form>
