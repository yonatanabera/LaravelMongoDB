<h1>Laravel MongoDb</h1>
<h3>Steps</h3>
<ul>
    <li>Prepare php server</li>
    <li>Download MongoDB</li>
    <li>Download MongoDB php driver from <a href="https://pecl.php.net/package/mongodb/1.9.1/windows"> PECL </a></li>
    <p>Download the "Thread Safe"</p>
    <li>Extract the file, and copy the php_mongodb.dll file to Xampp/php/ext/</li>
    <li>open php.ini file and add new extension=php_mongodb.dll</li>
    <li>Download new laravel project</li>
    <li>Download mongoDB library from <a href="https://github.com/jenssegers/laravel-mongodb">Laravel MongoDB</a></li>
</ul>

<h1>Sweet Alert laravel</h1>

<p><a href="https://realrashid.github.io/sweet-alert/install">Laravel sweet alert</a></p>

<p>Use this link to include into your laravel project. </p>

composer require realrashid/sweet-alert

<p> Then add the following code into config/app service provider </p>

RealRashid\SweetAlert\SweetAlertServiceProvider::class,

<p> Then add the following code to aliases </p>

'Alert' => RealRashid\SweetAlert\Facades\Alert::class,

<p>include the sweet alert, using this code into your main view/layout</p>

@include('sweetalert::alert')

<p>publish the sweet alert using this command </p>

php artisan sweetalert:publish

<p> To use, you can import in your control and use as follow </p>

use RealRashid\SweetAlert\Facades\Alert;

or

Use Alert;

<p>In your controller method use</p>

Alert::alert('Title', 'Message', 'Type');
Alert::success('Success Title', 'Success Message');
Alert::warning('Warning Title', 'Warning Message');
Alert::error('Error Title', 'Error Message');
Alert::question('Question Title', 'Question Message');
Alert::toast('Toast Message', 'Toast Type');
Alert::toast()->success('Message');

<p> To alert, and require confirm use the code below. </p>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const urls = $(this).parents()[0].attributes[0].value; //Get the URL of the form, which is about to be submitted
            swal({
                title: 'Are you sure?',
                text: 'This record and it`s details will be permanantly deleted!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],

            }).then(function(value) {
                if (value) {
                    $.ajax({
                        headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                        type: "DELETE",
                        url: urls,
                        success: function (data) {
                                window.location.href={{ route('item.index') }};
                            }
                    });
                }
            });
        });
    </script>
