<div class="card newsfeed-user-card h-100">
    <ul class="list-group list-group-flush newsfeed-left-sidebar">

        <li class="list-group-item">
            <h6>Home</h6>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center sd-active">
            <a href="{{ url('/') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/newsfeed.png') }}" alt="newsfeed" />
                News Feed
            </a>
            <a href="#" class="newsfeedListicon"><i class="bx bx-dots-horizontal-rounded"></i></a>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/messages') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/message.png') }}" alt="message" />
                Messages
            </a>
            <span class="badge badge-primary badge-pill">2</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/groups') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/group.png') }}" alt="group" />
                Groups
            </a>
            <span class="badge badge-primary badge-pill">17</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/events') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/event.png') }}" alt="event" />
                Events
            </a>
            <span class="badge badge-primary badge-pill">3</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/saved') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/saved.png') }}" alt="saved" />
                Saved
            </a>
            <span class="badge badge-primary badge-pill">8</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/find-friends') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/find-friends.png') }}" alt="find-friends" />
                Find Friends
            </a>
            <span class="badge badge-primary badge-pill"><i class="bx bx-chevron-right"></i></span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/matches') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/matches.png') }}" alt="matches" />
                Matches
            </a>
            <span class="badge badge-primary badge-pill"><i class="bx bx-chevron-right"></i></span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ url('/teams') }}" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/team.png') }}" alt="teams" />
                Argon For Teams
            </a>
            <span class="badge badge-primary badge-pill"><i class="bx bx-chevron-right"></i></span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center newsLink">
            <a href="https://github.com/ArtMin96/argon-social" target="_blank" class="sidebar-item">
                <img src="{{ asset('assets/images/icons/left-sidebar/news.png') }}" alt="news" />
                News
            </a>
            <span class="badge badge-primary badge-pill"><i class="bx bx-chevron-right"></i></span>
        </li>

    </ul>
</div>
