
@foreach ($objcat as $v)
<li class="menu-item">
    <a href="{{ route('vpublic.core.pcbloglist.index', [str_slug($v->cname), $v->cat_id]) }}">
        {{ $v->cname }}
    </a>
</li>
@endforeach