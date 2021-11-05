<form class="mr-3" action="{{$route}}" method="{{$methodType}}">
    @csrf
    @method($method)
    <button class="btn btn-sm btn-{{$btnColor}}" type="submit"><i>{{$btnName}}</i></button>
</form>
