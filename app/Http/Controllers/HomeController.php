<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController extends Controller
{
    public function index(Request $req)
    {
      return view('home',['posts'=>Post::inRandomOrder()->get()]);
    }

    public function presentation(Request $req)
    {
      return view('presentation');
    }

    public function sendMail(Request $req)
    {
      $req->validate([
        'subject'=>'required|string',
        'content'=>'required|string',
      ]);

      $data = [
        'subject'=>$req->input('subject'),
        'content'=>$req->input('content'),
      ];

      $mail = new PHPMailer(true);

      try {
          //Server settings
          // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = 'pro1.mail.ovh.net';                     //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = 'support@code-facile.ovh';                     //SMTP username
          $mail->Password   = '{pRjkN?5d5pZ*797)MG(D7Pt:^43HMX5L@4nph6>h-d=8Cv{t9';                               //SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('support@code-facile.ovh');
          $mail->addAddress('baku2426@gmail.com');     //Add a recipient

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = $data['subject'];
          $mail->Body    = $data['content'];

          $mail->send();
      } catch (Exception $e) {
          
      }

      return back();
    }
}
