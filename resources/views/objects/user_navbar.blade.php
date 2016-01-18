<nav class="navbar navbar-inverse navbar-lg navbar-embossed navbar-static-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-8">
            <span class="sr-only">Toggle navigation</span>
        </button>
        <a class="navbar-brand" href="/">TrakIn</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-8">
        @if(Auth::user()->group === "mentor")
        <ul class="nav navbar-nav">
            <li><a href="/">Meetings<span class="navbar-unread">1</span></a></li>
        </ul>
        @endif
        <ul class="nav navbar-nav navbar-right" style="margin-right:0px;">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right:30px;">{{ Auth::user()->name }} ({{ Auth::user()->pin }}) <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    @if(Auth::user()->group === "mentor")
                    <li><a href="#">{{ Auth::user()->hours }}</a></li>
                    @endif
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
