<!DOCTYPE html>
<html lang="{{ Language::code() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title or 'Page' }} - {{ Config::get('app.name') }}</title>

    @assets('css', array(
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        resource_url('css/bootstrap-xl-mod.min.css'),
        resource_url('css/style.css'),
    ))

</head>
<body>

<div class="container">
    <div class="row">
        <a style="outline: none;" href="<?= site_url(); ?>"><img src="<?= resource_url('images/nova.png') ?>" alt="<?= Config::get('app.name') ?>"></a>
        <h1><strong>{{ ($title !== 'Home') ? $title : ''; }}</strong></h1>
        <hr style="margin-top: 0;">
    </div>
    {{ $content; }}
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-5">
                <p class="text-muted">Copyright &copy; {{ date('Y') }} <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework {{ $version; }} / Kernel {{ VERSION }}</b></a></p>
            </div>
            <div class="col-lg-7">
                <p class="text-muted pull-right">
                    <small><!-- DO NOT DELETE! - Statistics --></small>
                </p>
            </div>
        </div>
    </div>
</footer>

@assets('js', array(
    'https://code.jquery.com/jquery-1.12.4.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
))

</body>
</html>
