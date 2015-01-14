<!DOCTYPE HTML>
<html>
<head>
    <title>Menu despegable</title>
    <meta charset="UTF-8" />
    <style type="text/css">


    </style>
</head>
<body>

<div>
    <ul>
        @if($menus)
            @foreach($menus as $menu)
                <li>
                    {{ HTML::link(URL::to($menu->link), $menu->nombre,array('id'=>'d')) }}
                    @if($submenus)
                        @foreach($submenus as $submenu)
                            @if($submenu->dependencianodo==$menu->nombre)
                                <ul>
                                    <li>
                                        {{ HTML::link(URL::to($submenu->link), $submenu->nombre,array('id'=>'d')) }}
                                        @if($subsubmenus)
                                            @foreach($subsubmenus as $subsubmenu)
                                                @if($subsubmenu->dependencianodo==$submenu->nombre)
                                                    <ul>
                                                        <li>
                                                            {{ HTML::link(URL::to($subsubmenu->link), $subsubmenu->nombre,array('id'=>'d')) }}
                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    @endif
                </li>

            @endforeach
        @endif
    </ul>
</div>

</div>
</body>
</html>