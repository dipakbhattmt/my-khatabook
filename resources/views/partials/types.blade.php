@auth
    <div class="tabs is-centered is-small">
        <ul>
            @forelse($user->type as $type)
                <li>
                    <a href="{{route('types.show',  $type)}}">{{$type->name}}</a>
                </li>
            @empty
                <li>{{__('general.no-tags-added')}}</li>
            @endforelse
        </ul>
    </div>
@endauth
