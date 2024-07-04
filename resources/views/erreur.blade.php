

<div>
    eureur
</div>



<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="{{ route('create_user') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Âge</label>
                        <input type="number" class="form-control" id="age" name="age" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>




resources/views/products/index.blade.php

@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Laravel 11 CRUD with Image Upload Tutorial - ItSolutionStuff.com</h2>
  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><img src="/images/{{ $product->image }}" width="100px"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                            <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}"><i class="fa-solid fa-list"></i> Show</a>

                            <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

  </div>
</div>
@endsection
resources/views/products/create.blade.php

@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Add New Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea
                class="form-control @error('detail') is-invalid @enderror"
                style="height:150px"
                name="detail"
                id="inputDetail"
                placeholder="Detail"></textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input
                type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                id="inputImage">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection
resources/views/products/edit.blade.php

@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Edit Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Name:</strong></label>
            <input
                type="text"
                name="name"
                value="{{ $product->name }}"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Name">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
            <textarea
                class="form-control @error('detail') is-invalid @enderror"
                style="height:150px"
                name="detail"
                id="inputDetail"
                placeholder="Detail">{{ $product->detail }}</textarea>
            @error('detail')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
            <input
                type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                id="inputImage">
            <img src="/images/{{ $product->image }}" width="300px">
            @error('image')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>

  </div>
</div>
@endsection
resources/views/products/show.blade.php

@extends('products.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Show Product</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong> <br/>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Details:</strong> <br/>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong><br/>
                <img src="/images/{{ $product->image }}" width="500px">
            </div>
        </div>
    </div>

  </div>
</div>
@endsection




In this tutorial, I will show you how to generate pdf file and send email attachments in laravel 11 application.

In this example, I will simply use dompdf to generate a PDF file and send an email with a PDF attachment. We will use Gmail SMTP for the mail driver. You just need to follow a few steps to create a simple example of sending an email with the created PDF file in a Laravel app.

laravel 11 generate pdf and send email

Step for Laravel 11 Send Email with PDF Attachment Example
Step 1: Install Laravel 11
Step 2: Install dompdf Package
Step 3: Make Configuration
Step 4: Create Mail Class
Step 5: Add Route
Step 6: Add Controller
Step 7: Create View File
Run Laravel App
Step 1: Install Laravel 11

This step is not required; however, if you have not created the Laravel app, then you may go ahead and execute the below command:

composer create-project laravel/laravel example-app
Step 2: Install dompdf Package

First of all, we will install the barryvdh/laravel-dompdf composer package by following the composer command in your Laravel application.

composer require barryvdh/laravel-dompdf
Read Also: Laravel 11 Ajax Dependent Dropdown Example
Step 3: Make Configuration

In the first step, you have to add send mail configuration with mail driver, mail host, mail port, mail username, and mail password so Laravel will use those sender details on the email. So you can simply add the following:

.env

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=mygoogle@gmail.com
MAIL_PASSWORD=rrnnucvnqlbsl
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=mygoogle@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
Step 4: Create Mail Class

We are going from scratch, and in the first step, we will create an email for testing using the Laravel Mail facade. So let's simply run the command below.

php artisan make:mail MailExample
Now you will have a new folder "Mail" in the app directory with the MailExample.php file. So let's simply copy the below code and paste it into that file.

app/Mail/MailExample.php

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class MailExample extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->mailData['title'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.myTestMail',
            with: $this->mailData
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->mailData['pdf']->output(), 'Report.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
Step 5: Add Route

In this step, we need to create routes for item listings. So open your routes/web.php file and add the following route.

routes/web.php

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;

Route::get('send-email-pdf', [PDFController::class, 'index']);
Step 6: Add Controller

Here, we need to create a new controller PDFController that will manage the index method of the route. So let's add the code below.

app/Http/Controllers/PDFController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailExample;
use PDF;
use Mail;

class PDFController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["email"] = "your@gmail.com";
        $data["title"] = "From ItSolutionStuff.com";
        $data["body"] = "This is Demo";

        $pdf = PDF::loadView('emails.myTestMail', $data);
        $data["pdf"] = $pdf;

        Mail::to($data["email"])->send(new MailExample($data));

        dd('Mail sent successfully');
    }

}
Step 7: Create View File

In the last step, let's create myTestMail.blade.php (resources/views/emails/myTestMail.blade.php) for the layout of the PDF file and put the following code:

resources/views/emails/myTestMail.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $body }}</p>

    <p>Thank you</p>
</body>
</html>


In this tutorial, I will show you how to send text SMS to a mobile number using Twilio API in the laravel 11 application.

Twilio is a cloud communications platform that allows developers to add various communication channels, such as voice, SMS, and video, to their applications. The company was founded in 2008 and is headquartered in San Francisco, California. Twilio's platform provides Application Programming Interfaces (APIs) that developers can use to integrate various communication channels into their applications. This allows developers to easily create applications that can send and receive SMS messages, make and receive phone calls, and more.

In this example, we will simply install twilio/sdk composer package and send sms to specific number using Twilio API and Secret Key. you just need to follow the below steps to done example.

laravel 11 send sms using twilio

Step for Laravel 11 Send SMS to Mobile Number using Twilio API
Step 1: Install Laravel 11
Step 2: Create Twilio Account
Step 3: Install twilio/sdk Package
Step 4: Create Route
Step 5: Create Controller
Run Laravel App
Step 1: Install Laravel 11

This step is not required; however, if you have not created the Laravel app, then you may go ahead and execute the below command:

composer create-project laravel/laravel example-app
Step 2: Create Twilio Account

First you need to create and add phone number. then you can easily get account SID, Token and Number.

Create Account from here: www.twilio.com.

Next add Twilio Phone Number

Next you can get account SID, Token and Number and add on .env file as like bellow:

.env

TWILIO_SID=XXXXXXXXXXXXXXXXX
TWILIO_TOKEN=XXXXXXXXXXXXX
TWILIO_FROM=+XXXXXXXXXXX
Read Also: How to Create Custom Validation Rules in Laravel 11?
Step 3: Install twilio/sdk Package

In this step, we need to install twilio/sdk composer package to use twilio api. so let's run bellow command:

composer require twilio/sdk
Step 4: Create Route

now we will create one route for calling our example, so let's add new route to web.php file as bellow:

routes/web.php

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TwilioSMSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('sendSMS', [TwilioSMSController::class, 'index']);
Step 5: Create Controller

in this step, we will create TwilioSMSController and write send sms logic, so let's add new route to web.php file as bellow:

app/Http/Controllers/TwilioSMSController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $receiverNumber = "RECEIVER_NUMBER";
        $message = "This is testing from ItSolutionStuff.com";

        try {

            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message]);

            dd('SMS Sent Successfully.');

        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
    }
}




In this tutorial, I will show you how to generate pdf file in laravel 11 using dompdf.

We will use the DomPDF Composer package to generate a PDF file in Laravel 11. We will create 10 dummy users and some dummy text to add to the PDF file. So, let's follow the steps below to create the PDF file:

laravel 11 pdf file generate

Step for Laravel 11 Create PDF File using DomPDF Example
Step 1: Install Laravel 11
Step 2: Install DomPDF Package
Step 3: Create Controller
Step 4: Add Route
Step 5: Create View File
Run Laravel App
Step 1: Install Laravel 11

This step is not required; however, if you have not created the Laravel app, then you may go ahead and execute the below command:

composer create-project laravel/laravel example-app
Step 2: Install DomPDF Package

Next, we will install the DomPDF package using the following Composer command. Let's run the command below:

composer require barryvdh/laravel-dompdf
Read Also: How to Publish the lang Folder in Laravel 11?
Step 3: Create Controller

In this step, we will create a PDFController with a method called generatePDF() where we will write the code to generate a PDF. So, let's create the controller using the command below.

php artisan make:controller PDFController
In the `PDFController`, we also get users table data and display it into a PDF file. So, you can add some dummy data to the users table by using the following Tinker command:

php artisan tinker

User::factory()->count(10)->create()
Now, update the code in the controller file.

app/Http/Controllers/PDFController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    64353488/0278
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }
}
Step 4: Add Route

Furthermore, open `routes/web.php` file and add a GET route.

routes/web.php

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Step 5: Create View File

In the last step, let's create `myPDF.blade.php` (`resources/views/myPDF.blade.php`) for the layout of the PDF file and put the following code:

resources/views/myPDF.blade.php

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua.</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
Run Laravel App:

All the required steps have been done, now you have to type the given below command and hit enter to run the Laravel app:

php artisan serve
Now, Go to your web browser, type the given URL and view the app output:

Read Also: Laravel 11 Multiple File Upload Example
http://localhost:8000/generate-pdf
you will download the file as like below:



Now
