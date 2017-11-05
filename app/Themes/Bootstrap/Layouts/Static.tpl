@layout('Default', 'Bootstrap')

@section('content')
<div class="container">
    <div class="row">
        <a style="outline: none;" href="<?= site_url(); ?>"><img src="<?= resource_url('images/nova.png') ?>" alt="<?= Config::get('app.name') ?>"></a>
        <h1><strong>{{ ($title !== 'Home') ? $title : ''; }}</strong></h1>
        <hr style="margin-top: 0;">
    </div>
    {{ $content; }}
</div>
@stop

@section('footer')
<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-6">
                Copyright &copy; <?= date('Y') ?> <a href="http://www.novaframework.com/" target="_blank"><strong>Nova Framework <?= VERSION; ?> / Kernel <?= App::version(); ?></strong></a> - All rights reserved.
            </div>
            <div class="col-lg-6">
                <p class="text-muted pull-right">
                    <small><!-- DO NOT DELETE! - Statistics --></small>
                </p>
            </div>
        </div>
    </div>
</footer>
@stop
