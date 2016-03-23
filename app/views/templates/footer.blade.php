<footer>
    <div class="container">
        <nav class="collapse navbar-collapse" role="navigation">
            @yield('footer-nav')
        </nav>
    </div>
</footer>

{{ HTML::script('js/jquery-1.11.3.min.js') }}
{{ HTML::script('js/angular.min.js') }}
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/admin.js') }}
@yield('script')
</body>
</html>
