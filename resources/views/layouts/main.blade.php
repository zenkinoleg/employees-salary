<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>

	<!-- Latest compiled and minified Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Latest DataTable CSS-->
	<link rel="stylesheet" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css">
	<!-- App's CSS -->
    <link rel="stylesheet" href="css/style.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Moment JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<!-- Latest compiled Bootstrap JavaScript -->
	<script src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
	<!-- Latest DataTable JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Sweet Alert 2 JS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<!-- App's JS -->
    <script src="js/script.js"></script>
</head>

<body>
    <div class="container">

	<header class="header mt-3">
		<ul class="list-group list-group-horizontal">
			<li class="list-group-item"><a href="/">Employees</a></li>
			<li class="list-group-item"><a href="/about">About</a></li>
		</ul>
	</header>

	<div class="content">
	    <div class="row">
			<h2>@yield('title')</h2>
		</div>
        <main class="main">
            @yield('content')
        </main>
	</div>

    <footer class="footer">
        <div class="footer">
			2019 &copy; Zenkin Oleg. All Rights Reserved<br />
			Feel free to <a href="mailto:zenkin.oleg.dev@gmail.com">email me</a> or check out my <a href="https://github.com/zenkinoleg">other works</a>
        </div>
    </footer>

    </div>
</body>
</html>
